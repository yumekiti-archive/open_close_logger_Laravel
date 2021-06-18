<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function logs()
    {
        return $this->hasMany(DoorLog::class);
    }

}
