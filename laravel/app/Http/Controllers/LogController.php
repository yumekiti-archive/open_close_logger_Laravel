<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Device;
use App\Events\StateEvent;

class LogController extends Controller
{
    //
    public function state(){

        $logs = Auth::user()->
        devices()->
        firstOrFail()->
        logs()->
        firstOrFail()->
        get();

        //状態取得
        foreach($logs as $log){
            $state[$log->device_id] = $log->state;
        }

        return $state;
    }
    
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
        $log = null;
        $user = null;
        
        $device = Device::where('token', $req->input('token'))->firstOrFail();

        $user = $device->user()->firstOrFail();

        if($req->input('state')){
            $log = $device->open();
        }else{
            $log = $device->close();
        }

        event(new StateEvent($log, $user));
    }
}
