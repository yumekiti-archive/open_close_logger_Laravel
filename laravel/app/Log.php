<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //
    protected $fillable = ['state'];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

}
