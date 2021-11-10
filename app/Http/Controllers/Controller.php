<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Config;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($data = null, $message = 'success') {
		return response()->json(["data" => $data, "message" => $message, "status" => Config::get('const.status_code.success')]);
	}

    public function invalid($data = null, $message = 'something went wrong') {
		return response()->json(["data" => $data, "message" => $message, "status" => Config::get('const.status_code.invalid')]);
	}
}
