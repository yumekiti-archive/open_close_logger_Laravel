<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Category;
use App\Log;
use App\User;

class Device extends Model
{
    protected $fillable = ['device_name','token'];
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

}
