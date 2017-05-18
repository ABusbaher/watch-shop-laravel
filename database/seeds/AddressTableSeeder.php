<?php

use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            'state' => 'Serbia',
            'city' => 'Novi Sad',
            'address' => 'Skojevska 4',
            'postal_code' => 11000,
        ]);

        DB::table('addresses')->insert([
            'state' => 'Serbia',
            'city' => 'Novi Sad',
            'address' => 'B.Berića 7',
            'postal_code' => 11000,
        ]);
    }
}
