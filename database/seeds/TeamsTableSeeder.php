<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'name' => 'Awesome',
            'image' => 'team1.png'
        ]);

        DB::table('teams')->insert([
            'name' => 'Fantastic',
            'image' => 'team2.png'
        ]);
    }
}
