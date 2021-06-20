<?php

use Illuminate\Database\Seeder;

use App\Log;

class LogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Log::class, 3)->create();

        factory(Log::class, 3)->create([
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            "status" => false,
            "device_id" => 2
        ]);

    }
}
