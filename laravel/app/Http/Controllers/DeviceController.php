<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    //
    public function create(Request $request)
    {
        $device = Auth::user()->devices();

        $device->create([
            $request->only([
                'device_name',
            ]),
            'user_id' => Auth::id(),
        ]);

        return $device;
    }

}
