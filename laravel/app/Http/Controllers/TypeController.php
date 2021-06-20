<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    //
    public function show($device_id)
    {
        $devices = Auth::user()->
        devices()->
        firstOrFail()->
        type()->
        firstOrFail()->
        where('device_id', $device_id)->
        get();

        return response()->json($devices);
    }
}
