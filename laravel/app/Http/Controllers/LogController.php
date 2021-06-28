<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Device;

class LogController extends Controller
{
    //
    public function show($device_id)
    {
        $logs = Auth::user()->
        devices()->
        firstOrFail()->
        logs()->
        firstOrFail()->
        where('device_id', $device_id)->
        get();

        return $logs;
    }

    public function log(Request $req)
    {
        $device = Device::where('token', $req->input('token'))->firstOrFail();

        if($req->input('state')){
            $device->open();
        }else{
            $device->close();
        }
    }
}
