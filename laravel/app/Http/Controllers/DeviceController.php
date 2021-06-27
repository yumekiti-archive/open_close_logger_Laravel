<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

//hashのため
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
        $name = $req->input('device_name');
        $token = hash('sha512', $name . Str::random(10));

        $devices = Auth::user()->devices();

        $data = $devices->create([
            'device_name' => $name,
            'token' => $token,
        ]);
        
        $data->
        categories()->
        sync([
            'category_id' => $req->input('id'),
        ]);

    }

}
