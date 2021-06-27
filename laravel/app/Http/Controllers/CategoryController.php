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
        $data[] = null;
        $i = 0;

        $categories = Auth::user()->
        devices()->
        firstOrFail()->
        categories()->
        firstOrFail();

        $pivots = $categories->
        pivot->
        where('device_id', $device_id)->
        get();

        foreach($pivots as $pivot){
            $data[$i] = $categories->where('id', $pivot->category_id)->get()[0];
            $i++;
        }

        return response()->json($data);
    }
}
