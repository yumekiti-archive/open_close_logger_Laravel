<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DeviceController extends Controller
{
    //
    public function full()
    {
        $devices = Auth::user()->devices()->with('logs', 'categories')->get();

        return response()->json($devices);
    }

    public function show($device_id)
    {
        $devices = Auth::user()->devices()->firstOrFail()->where('id', $device_id)->get();

        return response()->json($devices);
    }

    public function create(Request $req)
    {
        $token = hash('sha256', Str::random(10));

        $devices = Auth::user()->devices()->create([
            'device_name' => $req->input('device_name'),
            'token' => $token,
        ]);
    }

}
