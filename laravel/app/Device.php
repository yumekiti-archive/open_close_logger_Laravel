<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Category;
use App\Log;
use App\User;
use App\DeviceCategoryChain;

class Device extends Model
{
    protected $fillable = ['device_name','token','category_main'];
    
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'device_category_chains','device_id','category_id');
    }

    public function open()
    {
        return $this->logs()->create(['state' => true]);
    }

    public function close()
    {
        return $this->logs()->create(['state' => false]);
    }

}
