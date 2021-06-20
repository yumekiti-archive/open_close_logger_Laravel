<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    //
    public function show($device_id)
    {
        
        $logs = Auth::user()->
            devices()->
            where('id', $device_id)->
            firstOrFail()->
            logs()->
            get();

        return $logs;
    }
}
