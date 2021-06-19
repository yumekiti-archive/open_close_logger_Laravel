<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('types')->insert([
            "type_name" => "鍵",
            "type_icon" => "mdi-lock-open-variant-outline",
            "device_id" => 1,
        ]);
    }
}
