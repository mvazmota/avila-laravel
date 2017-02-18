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
        $this->call(BadgesTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(TitlesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
