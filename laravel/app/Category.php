<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Device;

class Category extends Model
{
    //
    public $timestamps = false;
    
    protected $fillable = ['category_name', 'open_icon', 'close_icon', 'user_id'];

    public function devices()
    {
        return $this->belongsToMany(Device::class,'device_category_chains','device_id','category_id');
    }
}
