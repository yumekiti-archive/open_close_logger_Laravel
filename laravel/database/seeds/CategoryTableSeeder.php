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

        $i = 1;

        foreach ($names as $name) {
            DB::table('categories')->insert([
                "category_name" => $name,
                "open_icon" => "mdi-lock-open-variant-outline",
                "close_icon" => "mdi-lock-outline",
            ]);
        }
        
    }
}
