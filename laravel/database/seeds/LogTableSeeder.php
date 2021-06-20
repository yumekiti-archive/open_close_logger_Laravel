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
        for($i = 1; $i <= 5; $i++ ){
            factory(Log::class)->create([
                "device_id" => $i
            ]);
        }

    }
}
