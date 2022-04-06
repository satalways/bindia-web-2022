<?php

namespace App\Logic;

use App\Models\FeedbackDB;
use App\Models\Orders;
use Carbon\Carbon;

class Feedback
{
    public function saveFeedback(array $args = [], $file = null)
    {
        $default = [
            'type' => '',
            'data_id'
        ];
        $args = set_args($args, $default);

        $data['time'] = Carbon::now();
        $data['ip'] = getIP();

        if (blank($args['type'])) return 'Feedback type missing.';
        $data['type'] = $args['type'];

        if ($args['type'] !== 'customized' && empty($args['data_id'])) return 'Order ID missing.';

        $data['data_id'] = $args['data_id'];
        $order = Orders::query()->find($args['data_id']);
        if (!$order && $args['type'] !== 'customized') return 'Order for this feedback not found in system';

        if ($data['type'] === 'customized') {
            $data['name'] = $args['name'];
            $data['email'] = $args['email'];
            $data['phone'] = $args['phone'];
        } else {
            $data['name'] = $order->full_name;
            $data['email'] = $order->email;
            $data['phone'] = $order->shipping_phone;
        }
        $data['email_sent_to_staff'] = false;
        $data['c21_id'] = 0;

        $x = 0;
        foreach ($args['answers'] as $id => $answer) {
            $question = FeedbackDB::query()->find($id);
            $data['question_' . $x] = $question->question;
            if ($question->question_type == 1) {
                if (blank($answer))
                    $data['question_' . $x . '_answer'] = '-1';
                else
                    $data['question_' . $x . '_answer'] = 'rating_' . $answer;
            } else {
                $data['question_' . $x . '_answer'] = $answer;
            }
            $x++;
        }

        $feedback = new \App\Models\Feedback();
        foreach ($data as $key => $value) {
            $feedback->{$key} = $value;
        }
        try {
            $feedback->save();
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        $filePath = '';
        if ($file && $file->isValid()) {
            try {
                $file->move(storage_path('rf/' . $feedback->id), $file->getClientOriginalName());
                $filePath = storage_path('rf/' . $feedback->id) . DIRECTORY_SEPARATOR . $file->getClientOriginalName();
            } catch (\Exception) {

            }

        }

        $Files = [];
        if ($order) {
            $Files[] = $order->pdf();
        }
        if (is_file($filePath)) {
            $Files[] = $filePath;
        }

        ## Send email to admin
        $template = template('15.5.13');
        if (!$template) {
            send_mail(config('app.dev_emails'), "Template # 15.5.13 missing", "When customer submit requested feedback from web site.");
        } else {
            if ($feedback->avg <= 3) {
                $subject_data["id"] = "[ID:" . $feedback->id . "] Bad ";
            } else {
                $subject_data["id"] = "[ID:" . $feedback->id . "]";
            }
            $subject_data["type"] = "[" . ucwords($feedback->type) . "]";
            $subject_data["rating"] = $feedback->avg;
            $subject_data["shop"] = shop($feedback->shop)->long_name ?? '';
            $subject_data['link'] = get_admin_link('rfeedback.php?id=' . $feedback->id);

            $subject_data['table'] = view('order.feedback.feedback_table', [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'feedback' => $feedback,
                'id' => $feedback->id,

//                'questions' => $questions,
//                'params' => $params,
//                'id' => $id,
//                'fileurl' => $fileurl,
//                'path' => $path,
            ])->render();

            return send_mail('office@bindia.dk', $template->subject, $template->content, $subject_data, $Files);
        }

        return 'OK';
    }

}
