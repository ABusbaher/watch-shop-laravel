<?php

use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'name' => 'casio',
        ]);

        DB::table('brands')->insert([
            'name' => 'citizen',
        ]);

        DB::table('brands')->insert([
            'name' => 'fossil',
        ]);

        DB::table('brands')->insert([
            'name' => 'festina',
        ]);

        DB::table('brands')->insert([
            'name' => 'emporio armani',
        ]);

        DB::table('brands')->insert([
            'name' => 'Hugo Boss',
        ]);

        DB::table('brands')->insert([
            'name' => 'tissot',
        ]);

        DB::table('brands')->insert([
            'name' => 'rotary',
        ]);
    }
}
