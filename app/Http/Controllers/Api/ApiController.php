<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    private $headerKey = '659565dsd$fsdFFD353DFSDs';

    public function __construct()
    {
        $this->middleware('web');
    }


    public function jobFiles(Request $request)
    {
        if (!localhost()) {
            if (!$request->header('bindiaKey')) abort(404);
            if ($request->header('bindiaKey') !== $this->headerKey) abort(404);
        }

        return Storage::disk('local_main')->allFiles('jobs');
    }

    public function getJobFile(Request $request)
    {
        if (!localhost()) {
            if (!$request->header('bindiaKey')) abort(404);
            if ($request->header('bindiaKey') !== $this->headerKey) abort(404);
            if (!$request->header('bindiaFile')) abort(404);
        }

        //return Storage::disk('local_main')->get($request->header('bindiaFile'));
        //return $request->header('bindiaFile');
        if (Storage::disk('local_main')->exists($request->header('bindiaFile'))) {
            return 'OK' . Storage::disk('local_main')->get($request->header('bindiaFile'));
        } else {
            return 'File not found.';
        }
    }

    public function delJobFile(Request $request)
    {
        if (!localhost()) {
            if (!$request->header('bindiaKey')) abort(404);
            if ($request->header('bindiaKey') !== $this->headerKey) abort(404);
            if (!$request->header('bindiaFile')) abort(404);
        }

        if (Storage::disk('local_main')->exists($request->header('bindiaFile'))) {
            if (Storage::disk('local_main')->delete($request->header('bindiaFile'))) {
                @rmdir(dirname(Storage::disk('local_main')->path($request->header('bindiaFile'))));
                return 'OK';
            } else {
                return 'No';
            }
        } else {
            return 'File not found.';
        }
    }

    public function contactFiles(Request $request)
    {
        if (!localhost()) {
            if (!$request->header('bindiaKey')) abort(404);
            if ($request->header('bindiaKey') !== $this->headerKey) abort(404);
        }

        return Storage::disk('local_main')->allFiles('contact');
    }
}
