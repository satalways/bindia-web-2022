<?php

namespace App\Http\Controllers;

use App\Logic\Feedback;
use App\Models\FeedbackDB;
use App\Models\Orders;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function customFeedback(Request $request)
    {
        if (!$request->query('token')) abort(404);

        return $string = decodeString($request->query('token'), false, 'mqg"i]Ii$2C^:>IQ9}.~G<jbdH{u');
    }

    public function feedback(Request $request)
    {
        $token = base64_decode($request->get('token'));

        if (!is_json($token)) abort(404);
        $token = json_decode($token);
        if (!isset($token->data_id)) abort(404);

        $order = Orders::query()->findOrFail($token->data_id);

        $rows = FeedbackDB::query()
            ->where('active', true)
            ->where('type', $token->type)
            ->orderBy('sort')->get();

        return view('order.feedback.feedback', [
            'order' => $order,
            'token' => $token,
            'title' => 'Requested Feedback | Bidia.dk',
            'rows' => $rows,
            'seo' => seo('Feedback')
        ]);
    }

    public function feedbackPost(Request $request)
    {
        if (!$request->ajax()) abort(404);

        switch ($request->post('action')) {
            case 'saveRating':
                $Feedback = new Feedback();
                return $Feedback->saveFeedback($request->except('action'), $request->file('file'));
            default:
                abort(404);
        }
    }

    public function success()
    {
        return view('order.feedback.success');
    }
}
