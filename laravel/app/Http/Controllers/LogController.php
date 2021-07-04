<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Device;
use App\Events\StateEvent;

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

        $log = null;

        if($req->input('state')){
            $log = $device->open();
        }else{
            $log = $device->close();
        }

        broadcast(new StateEvent($log));
    }
}
