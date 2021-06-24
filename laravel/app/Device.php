<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Category;
use App\Log;
use App\User;

class Device extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function categories()
    {
        return $this->hasOne(Category::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

}
