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

        $device = Auth::user()->devices()->create([
            'device_name' => $name,
            'token' => $token,
        ]);
        
        $devices = Auth::user()->devices();
        
        $data = $devices->
        firstOrFail()->
        categories()->
        firstOrFail()->
        where('id', $req->input('id'));

        return $data->get('open_icon');
        
        // $devices->
        // findOrFail($device->id)->
        // categories()->
        // create([
        //     'category_name' => $req->input('category_name'),
        //     'open_icon' => $data->get('open_icon'),
        //     'close_icon' => $data->get('close_icon'),
        //     'cmd' => $data->get('cmd'),
        //     'device_id' => $device->id,
        // ]);
    }

}
