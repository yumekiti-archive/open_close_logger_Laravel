<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Log;
use Faker\Generator as Faker;


$factory->define(Log::class, function (Faker $faker) {
    return [
        //
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        "state" => $this->faker->boolean(),
        "device_id" => 1
    ];
});
