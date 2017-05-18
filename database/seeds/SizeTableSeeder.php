<?php

use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            'size' => 'small',
        ]);

        DB::table('sizes')->insert([
            'size' => 'medium',
        ]);

        DB::table('sizes')->insert([
            'size' => 'large',
        ]);
    }
}
