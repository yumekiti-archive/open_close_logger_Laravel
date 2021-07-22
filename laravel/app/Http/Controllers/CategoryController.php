<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function show()
    {
        $categories = Auth::user()->
        categories()->get();

        return $categories;
    }

    public function device()
    {
        $devices = Auth::user()->
        devices()->get();

        $data[] = null;
        foreach($devices as $i => $device){
            $data[$i] = $device->categories()->get()[0];
        }

        return $data;
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

    public function add(Request $req, $device_id)
    {
        $ids = $req->input('id');

        if($ids){
            $categories = Auth::user()->
            devices()->
            findOrFail($device_id)->
            categories();
            
            foreach($ids as $id){
                $categories->syncWithoutDetaching([
                    'category_id' => $id,
                ]);
            }
        }
    }

    public function create(Request $req){
        
        $category = Auth::user()->
        categories()->
        create([
            'category_name' => $req->input('category_name'),
            'open_icon' => $req->input('open_icon'),
            'close_icon' => $req->input('close_icon'),
            'user_id' => Auth::user()->id,
        ]);
    }

}
