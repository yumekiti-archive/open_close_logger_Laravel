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
            'name' => 'test1',
            'email' => 'test1@test.jp',
            'password' => bcrypt('testtest')
        ]);
        factory(User::class)->create([
            'name' => 'test2',
            'email' => 'test2@test.jp',
            'password' => bcrypt('testtest')
        ]);

        factory(User::class, 3);
    }
}
