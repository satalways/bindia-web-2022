<?php

namespace App\Http\Controllers;

use App\Logic\Order;
use App\Models\Contact;
use App\Models\Feedback;
use App\Models\JobsModel;
use App\Models\OrderItems;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Monolog\Handler\SwiftMailerHandler;

class App extends Controller
{
    public function home()
    {
        $feedbacks = Feedback::query()
            ->orderByDesc('id')
            //->where('user_rating', 5)
            ->where('time', '>=', Carbon::now()->subMonths(3))
            ->where('published', true)
            ->where('deleted', false)
            ->orderByDesc('id')
//            ->where(function ($query) {
//                $query->where(function ($query) {
//                    $query->where('type', 'weborder')
//                        ->where('question_6_answer', '<>', '')
//                        ->where('question_7_answer', 'Yes');
//                })
//                    ->orWhere(function ($query) {
//                        $query->where('type', 'weborder2')
//                            ->where('question_5_answer', '<>', '')
//                            ->where('question_6_answer', 'Yes');
//                    });
//            })
            ->limit(20)
            ->get();

        $randomItem = OrderItems::query()
            ->orderByRaw('RAND()')
            ->where('active', true)
            ->limit(1)
            ->get();

        return view('home', [
            'feedbacks' => $feedbacks,
            'seo' => seo('home'),
            'randomItem' => $randomItem
        ])->render();
    }

    public function contact()
    {
        return view('contact', [
            'title' => __('contact.title'),
            'seo' => seo('Contact')
        ]);
    }

    public function saveContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|phone_number',
            'email' => 'email',
            'comments' => 'required',

            /**(
             * This is for Spam check, Do not remove this.
             */
            'birthday' => '',
//            'captcha' => 'required|captcha'
        ]);

        /**
         * if birthday field is selected by any bot then it will not serve.
         * This option is to stop bots
         */
        if (!blank($request->birthday)) {
            abort('403');
        }

        try {
            $id = Contact::query()
                ->insertGetId([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => formatize_phone_number($request->phone),
                    'datetime' => Carbon::now(),
                    'comments' => $request->comments,
                    'ip' => getIP(),
                    'subject' => 'Contact Form'
                ]);

            $attachedFile = '';
            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                try {
                    $request->file('file')->move(storage_path('contact/' . $id), $request->file('file')->getClientOriginalName());
                    $attachedFile = storage_path('contact/' . $id) . DIRECTORY_SEPARATOR . $request->file('file')->getClientOriginalName();
                } catch (\Exception) {
                    $attachedFile = '';
                }
            }

            $template = template('3.5.3');
            $fields = $request->post();
            $fields['shop'] = '';
            send_mail('office@bindia.dk', $template->subject, $template->content, $fields, $attachedFile);
        } catch (\Exception $exception) {
            return redirect()->back()->with('message', $exception->getMessage());
        }

        return redirect()->back()->withSuccess('OK');
    }

    public function appAjax(Request $request)
    {
        if (!$request->ajax()) abort(404);

        switch ($request->post('action')) {
            case 'getCart':
                $O = new Order();
                $data = $O->getSessionCart();
                $discount_amount = $amount = $qty1 = 0;
                foreach ($data as $id => $qty) {
                    if (empty($id)) continue;
                    $amount += item($id)->price * $qty;
                    $discount_amount += item($id)->price_orange * $qty;
                    $qty1 += $qty;
                }
                return response([
                    'qty' => $qty1,
                    'amount' => $amount,
                    'discount_amount' => $discount_amount
                ])->header('Content-Type', 'text/json');
                break;
            default:
                abort(404);
        }
    }

    public function confirmInterview(Request $request)
    {
        if (!$request->get('id')) abort(404);
        $id = base64_decode($request->get('id'));
        $job = JobsModel::query()->whereRaw('md5(id)=?', [$id])->first();
        if (!$job) abort(404);
        if ($job->interview_confirmed) abort(404);
        $job->interview_confirmed = true;
        $job->status = 'Interview Confirmed';
        $job->interview_confirmed_time = Carbon::now();

        try {
            $job->save();
        } catch (\Exception $exception) {
            abort(403);
        }

        return view('silent.confirm_interview');
    }

    public function markPaid()
    {
        $request = request()->get('token');

        $token = request()->get('token');
        $data = JWT::decode($token, 'shakeelAhmedSiddiqi', ['HS256']);

        if (!$data->id) {
            return 'Invalid token!';
        }

        $O = new Order();
        return $O->markOrderPaid($data->id);
    }

    public function generalPost(Request $request)
    {
        if (!$request->ajax()) abort(404);

        switch ($request->post('action')) {
            case 'saveCookieConsent':
                $cookie = cookie('CookieConsent', 1, 9999999);
                return response('OK')->cookie($cookie);

                break;
            default:
                abort(403, 'Unauthorized!');
        }
    }

    public function areaPage($area)
    {
//        $fixAreas = TakeoutZonesModel::query()
//            ->whereNull('area_slug')
//            ->get();
//
//        foreach ($fixAreas as $row) {
//            $row->area_slug = \Str::slug($row->area);
//            $row->save();
//        }

        $row = TakeoutZonesModel::query()->where('area_slug', $area)->firstOrFail();
        $rows = TakeoutZonesModel::query()->select(['area_slug'])->distinct('area_slug')->get();

        return view('seo_pages.take-away', [
            'row' => $row,
            'rows' => $rows
        ]);
    }
}
