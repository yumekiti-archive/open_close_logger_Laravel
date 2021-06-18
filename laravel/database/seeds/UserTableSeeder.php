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
        $user = User::where('id')->get();
        factory(User::class)->create([
            'name' => 'test' . $user,
            'email' => 'test' . $user . '@test.jp',
            'password' => bcrypt('testtest')
        ]);
    }
}
