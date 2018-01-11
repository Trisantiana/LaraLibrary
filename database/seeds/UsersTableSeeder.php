<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => '1',
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                // 'avatar' => 'images/images2.jpg',
                'password' => bcrypt('123456'),

            ],
        ]);
    }
}
