<?php

use Illuminate\Database\Seeder;

class TitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('titles')->insert([
            'name' => 'Youngling',
            'image' => 'title1.png',
        ]);

        DB::table('titles')->insert([
            'name' => 'Padawan',
            'image' => 'title2.png',
        ]);

        DB::table('titles')->insert([
            'name' => 'Knight',
            'image' => 'title3.png',
        ]);

        DB::table('titles')->insert([
            'name' => 'Master',
            'image' => 'title4.png',
        ]);

        DB::table('titles')->insert([
            'name' => 'Grand Master',
            'image' => 'title5.png',
        ]);
    }
}
