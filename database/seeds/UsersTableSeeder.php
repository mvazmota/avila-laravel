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
            'name' => 'Carlos Silva',
            'email' => 'carlos@ua.pt',
            'password' => 'eva123',
            'avatar' => 'avatar1.png',
            'score' => '1137',
            'level' => '10',
            'team_id' => '1',
            'title_id' => '1',
        ]);
    }
}
