<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

//hashのため
use Illuminate\Support\Str;

class DeviceController extends Controller
{
    //
    public function index()
    {
        $devices = Auth::user()->devices()->get();

        return $devices;
    }

    public function show($device_id)
    {
        $devices = Auth::user()->devices()->firstOrFail()->where('id', $device_id)->get();

        return response()->json($devices);
    }

    public function create(Request $req)
    {
        $name = $req->input('device_name');
        $token = hash('sha512', Str::random(10) . $name);

        $devices = Auth::user()->devices();

        $data = $devices->create([
            'device_name' => $name,
            'token' => $token,
            'category_main' => $req->input('id'),
        ]);
        
        $data->
        categories()->
        sync([
            'category_id' => $req->input('id'),
        ]);
    }

    public function del($device_id)
    {
        Auth::user()->devices()->findOrFail($device_id)->delete();
    }

}
