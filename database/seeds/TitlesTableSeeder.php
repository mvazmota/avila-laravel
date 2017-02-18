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
            'name' => 'PHP Warlord',
            'image' => 'title1.png',
        ]);

        DB::table('titles')->insert([
            'name' => 'Apache Knight',
            'image' => 'title2.png',
        ]);
    }
}
