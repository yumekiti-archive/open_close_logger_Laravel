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
        for($i = 1; $i <= 10; $i++ ){
            if($i % 2){
                factory(Log::class)->create(["status" => true, "device_id" => 1]);
            }else{
                factory(Log::class)->create(["status" => false, "device_id" => 1]);
            }
        }

    }
}
