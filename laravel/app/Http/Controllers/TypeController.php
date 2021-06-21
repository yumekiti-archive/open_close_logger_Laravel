<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    //
    public function show()
    {
        $devices = Auth::user()->
        devices()->
        firstOrFail()->
        type()->
        firstOrFail()->
        get();

        return response()->json($devices);
    }

    public function only($device_id)
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
