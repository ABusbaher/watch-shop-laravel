<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(SizeTableSeeder::class);
        $this->call(BrandTableSeeder::class);
    }
}
