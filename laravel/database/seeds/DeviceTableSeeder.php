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
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            "token" => "asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasda",
            "device_name" => "テストデバイス",
            "user_id" => 1
        ]);
        
        factory(Device::class, 4)->create();
        
        DB::table('devices')->insert([
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            "token" => "asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd",
            "device_name" => "テストデバイス",
            "user_id" => 2
        ]);


    }
}
