<?php

use Illuminate\Database\Seeder;

class DeviceCategoryChainTableSeeder extends Seeder
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
            DB::table('device_category_chains')->insert([
                "category_id" => $i,
                "device_id" => $i,
            ]);
        }
        DB::table('device_category_chains')->insert([
            "category_id" => 2,
            "device_id" => 1,
        ]);
        DB::table('device_category_chains')->insert([
            "category_id" => 1,
            "device_id" => 6,
        ]);
    }
}
