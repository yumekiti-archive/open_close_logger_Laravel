<?php

use Illuminate\Database\Seeder;

use App\Device;

class DeviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('devices')->insert([
            "device_name" => "テストデバイス",
            "token" => "asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasda",
            "user_id" => 1
        ]);
    }
}
