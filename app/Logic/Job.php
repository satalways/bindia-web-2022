<?php

namespace App\Logic;

use App\Models\JobsAnswersModel;
use App\Models\JobsModel;
use Carbon\Carbon;

class Job
{
    public function saveJob(array $args = [])
    {
        $questions = config('jobs.questions');

        if (empty($args['job_title'])) return 'Please select job type';

        $details = [];
        foreach ($questions as $x => $qs) {
            foreach ($qs['q'] as $y => $q) {

                if (isset($q['required']) && $q['required']) {
                    if ($q['type'] === 'File' && !request()->hasFile('questions_' . $x . '_' . $y)) {
                        return $questions[$x]['q'][$y]['question'];
                    } elseif ($q['type'] === 'Phone' && (empty($args['questions'][$x][$y]) || !is_phone($args['questions'][$x][$y]))) {
                        return [
                            'error' => 'Invalid Number: ' . $questions[$x]['q'][$y]['question'],
                            'id' => 'questions_' . $x . '_' . $y
                        ];
                    } elseif ($q['type'] === 'Email' && (empty($args['questions'][$x][$y]) || !is_email($args['questions'][$x][$y]))) {
                        return [
                            'error' => 'Invalid: ' . $questions[$x]['q'][$y]['question'],
                            'id' => 'questions_' . $x . '_' . $y
                        ];
                    } elseif ($q['type'] === 'Number' && (empty($args['questions'][$x][$y]) || !is_numeric($args['questions'][$x][$y]))) {
                        return [
                            'error' => 'Invalid Number: ' . $questions[$x]['q'][$y]['question'],
                            'id' => 'questions_' . $x . '_' . $y
                        ];
                    } elseif ($q['type'] === 'Photo' && !request()->hasFile('questions_' . $x . '_' . $y)) {
                        return [
                            'error' => $questions[$x]['q'][$y]['question'],
                            //'error' => request()->hasFile('questions_' . $x . '_' . $y) ? 'Yes' : 'No',
                            'id' => 'questions_' . $x . '_' . $y
                        ];
                    } elseif (!in_array($q['type'], [
                            'Photo', 'Number', 'Email', 'Phone', 'File'
                        ]) && empty($args['questions'][$x][$y])) {
                        return [
                            'error' => 'Missing: ' . $questions[$x]['q'][$y]['question'],
                            'id' => 'questions_' . $x . '_' . $y
                        ];
                    } else {
                        if ($q['type'] === 'Phone' && !empty($args['questions'][$x][$y])) {
                            $args['questions'][$x][$y] = formatize_phone_number($args['questions'][$x][$y]);
                        }

                        $details[] = [
                            'question' => $questions[$x]['q'][$y]['question'],
                            'question_type' => $q['type'],
                            'answer' => $args['questions'][$x][$y] ?? null,
                            'order' => $x + $y,
                            'category' => __('job.' . $qs['lang_key']),
                            'input_name' => 'questions_' . $x . '_' . $y
                        ];
                    }
                } else if ($q['type'] === 'Phone' && !empty($args['questions'][$x][$y]) && !is_phone($args['questions'][$x][$y])) {
                    return [
                        'error' => 'Invalid Number: ' . $questions[$x]['q'][$y]['question'],
                        'id' => 'questions_' . $x . '_' . $y
                    ];
                } else if ($q['type'] === 'Email' && !empty($args['questions'][$x][$y]) && !is_email($args['questions'][$x][$y])) {
                    return [
                        'error' => 'Invalid: ' . $questions[$x]['q'][$y]['question'],
                        'id' => 'questions_' . $x . '_' . $y
                    ];
                } else if ($q['type'] === 'Number' && !empty($args['questions'][$x][$y]) && !is_numeric($args['questions'][$x][$y])) {
                    return [
                        'error' => 'Invalid Number: ' . $questions[$x]['q'][$y]['question'],
                        'id' => 'questions_' . $x . '_' . $y
                    ];
                } else {
                    if ($q['type'] === 'Phone' && !empty($args['questions'][$x][$y])) {
                        $args['questions'][$x][$y] = formatize_phone_number($args['questions'][$x][$y]);
                    }


                    $details[] = [
                        'question' => $questions[$x]['q'][$y]['question'],
                        'question_type' => $q['type'],
                        'answer' => $args['questions'][$x][$y] ?? null,
                        'order' => $x + $y,
                        'category' => __('job.' . $qs['lang_key']),
                        'input_name' => 'questions_' . $x . '_' . $y
                    ];
                }

                if (!isset($data['email']) && $q['type'] === 'Email' && is_email($args['questions'][$x][$y])) {
                    $data['email'] = $args['questions'][$x][$y];
                }
                if ($q['type'] === 'Photo') {
                    $photoObject = request()->file('questions_' . $x . '_' . $y);
                }
            }
        }
        //return $details;
        $data['datetime'] = Carbon::now();
        $data['job_title'] = $args['job_title'];
        $data['ip'] = request()->ip();

        try {
            $job = new JobsModel();
            foreach ($data as $key => $value) {
                $job->{$key} = $value;
            }
            $job->save();
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        foreach ($details as &$detail) {
            $detail['job_number'] = $job->id;
        }

        try {
            JobsAnswersModel::query()->insert($details);
        } catch (\Exception $exception) {
            $job->delete();
        }

        if (isset($photoObject) && $photoObject->isValid()) {
            try {
                $photoObject->move(storage_path('jobs/' . $job->id), $photoObject->getClientOriginalName());
            } catch (\Exception $exception) {
            }
        }

        if (request()->hasFile('attachment')) {
            foreach (request()->file('attachment') as $file) {
                if ($file->isValid()) {
                    try {
                        $file->move(storage_path('jobs/' . $job->id . '/attachments'), $file->getClientOriginalName());
                    } catch (\Exception $exception) {

                    }
                }
            }
        }

        $template = template('10.5.1');

        if (!$template) {
            $subject = 'New job received. (No template set yet)';
            $body = "Dear Administrator<br /><br />New job has been posted. Please login to Administrator panel and goto Data => Jobs to view job details.<br />
            <br />This is an auto generated message. You didn't set email template for Job. Please goto Email Templates => For Management and set template for job.<br />
            <br />Best Regards,<br />System Administrator.";
        } else {
            //$template = $template->toArray();
            if ($template['subject'] == '') {
                $subject = 'Job form received';
            } else {
                $subject = $template['subject'];
            }

            $body = $template['content'];
        }

        $to = getOption('send_jobs_emails');
        if (!is_email($to)) {
            $to = 'office@bindia.dk';
        }

        send_mail($to, $subject, $body, $job->fields(), $job->files());

        $autoResponse = template('10.1.1');
        if (!$autoResponse) {
            send_mail(config('app.dev_emails'), 'Template # 10.1.1 missing', 'When Job application received.');
        } else {
            //$autoResponse = $autoResponse;
            //$Fields2['{name}'] = $Jobs->get_job_applicant_name($job->id);
            //$content = str_ireplace(array_keys($Fields2), array_values($Fields2), $autoResponse['content']);

            send_mail($job->email, $autoResponse->subject, $autoResponse->content . '<br><br><h3>Here is your job application.</h3><br>', $job->fields());
        }

        return 'OK';
    }
}
