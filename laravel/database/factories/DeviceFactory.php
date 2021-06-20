<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Device;
use Faker\Generator as Faker;

use Illuminate\Support\Str;

$factory->define(Device::class, function (Faker $faker) {
    return [
        //
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        "token" => Str::random(100),
        "device_name" => Str::random(10),
        "user_id" => 1
    ];
});
