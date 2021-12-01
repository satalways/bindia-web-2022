<?php

namespace App\Http\Controllers;

use App\Logic\Job;
use App\Models\CountryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Jobs extends Controller
{
    public function index()
    {
        $questions = config('jobs.questions');

        return view('jobs.index', [
            'seo' => seo('Jobs'),
            'questions' => config('jobs.questions'),
            'countries' => CountryModel::query()->orderBy('printable_name')->get()
        ]);
    }

    public function oldJobs()
    {
        return redirect()->route('jobs', [
            'questions' => config('jobsquestions')
        ], 301);
    }

    public function post(Request $request)
    {
        if (!$request->ajax()) abort(404);
        //Log::info($request->allFiles());

        $Job = new Job();
        return $Job->saveJob($request->post());
    }
}
