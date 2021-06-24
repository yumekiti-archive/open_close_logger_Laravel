<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function show()
    {
        $devices = Auth::user()->
        devices()->
        firstOrFail()->
        categories()->
        firstOrFail()->
        get();

        return response()->json($devices);
    }

    public function only($device_id)
    {
        $devices = Auth::user()->
        devices()->
        firstOrFail()->
        categories()->
        firstOrFail()->
        where('device_id', $device_id)->
        get();

        return response()->json($devices);
    }
}
