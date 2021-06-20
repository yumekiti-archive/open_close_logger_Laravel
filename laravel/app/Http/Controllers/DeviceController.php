<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    //
    public function show()
    {
        
        $devices = Auth::user()->devices()->with('logs', 'type')->get();

        return response()->json($devices);
    }

}
