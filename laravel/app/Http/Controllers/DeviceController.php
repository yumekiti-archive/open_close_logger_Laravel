<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    //
    public function full()
    {
        $devices = Auth::user()->devices()->with('logs', 'type')->get();

        return response()->json($devices);
    }

    public function show($device_id)
    {
        $devices = Auth::user()->devices()->firstOrFail()->where('id', $device_id)->get();

        return response()->json($devices);
    }

}
