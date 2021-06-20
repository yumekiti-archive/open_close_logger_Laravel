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
        for($i = 1; $i <= 5; $i++ ){
            DB::table('types')->insert([
                "type_name" => "鍵",
                "open_icon" => "mdi-lock-open-variant-outline",
                "close_icon" => "mdi-lock-outline",
                "cmd" => "ls -a",
                "device_id" => $i,
            ]);
        }
        
    }
}
