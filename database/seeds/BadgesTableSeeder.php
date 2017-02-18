<?php

use Illuminate\Database\Seeder;

class BadgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('badges')->insert([
            'name' => 'Big Scorer!',
            'image' => 'badge1.png',
        ]);

        DB::table('badges')->insert([
            'name' => 'First steps...',
            'image' => 'badge2.png',
        ]);
    }
}
