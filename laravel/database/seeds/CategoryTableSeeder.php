<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $names = ['鍵', 'ドア', '窓', 'hoge', 'piyo'];

        foreach ($names as $i => $name) {
            DB::table('categories')->insert([
                "category_name" => $name,
                "open_icon" => "mdi-lock-open-variant-outline",
                "close_icon" => "mdi-lock-outline",
                "main" => $i % 2,
                "user_id" => 1,
            ]);
        }
        
    }
}
