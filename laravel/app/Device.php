<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Type;
use App\Log;
use App\User;

class Device extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function type()
    {
        return $this->hasOne(Type::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

}
