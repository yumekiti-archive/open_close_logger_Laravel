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

        foreach ($names as $name) {
            DB::table('categories')->insert([
                "category_name" => $name,
                "open_icon" => "mdi-lock-open-variant-outline",
                "close_icon" => "mdi-lock-outline",
                "user_id" => 1,
            ]);
        }

        DB::table('categories')->insert([
            "category_name" => $names[0],
            "open_icon" => "mdi-lock-open-variant-outline",
            "close_icon" => "mdi-lock-outline",
            "user_id" => 2,
        ]);

        DB::table('categories')->insert([
            "category_name" => $names[1],
            "open_icon" => "mdi-lock-open-variant-outline",
            "close_icon" => "mdi-lock-outline",
            "user_id" => 2,
        ]);
        
    }
}
