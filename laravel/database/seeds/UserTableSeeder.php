<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(User::class)->create([
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'name' => 'test1',
            'email' => 'test1@test.jp',
            'password' => bcrypt('testtest')
        ]);
        factory(User::class)->create([
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'name' => 'test2',
            'email' => 'test2@test.jp',
            'password' => bcrypt('testtest')
        ]);

        factory(User::class, 3)->create();
    }
}
