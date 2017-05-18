<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'admin',
            'last_name' => 'adminović',
            'phone' => 123456,
            'email' => 'admin@a.com',
            'password' => bcrypt('admin1'),
            'address_id' => 1,
            'role_id' => 1
        ]);

        DB::table('users')->insert([
            'first_name' => 'user1',
            'last_name' => 'user1LastName',
            'phone' => 111222,
            'email' => 'user1@u.com',
            'password' => bcrypt('user1'),
            'address_id' => 2,
            'role_id' => 2
        ]);
    }
}
