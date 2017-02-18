<?php

use Illuminate\Database\Seeder;

class Badge_UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('badge_user')->insert([
            'badge_id' => '1',
            'user_id' => '1',
        ]);
        DB::table('badge_user')->insert([
            'badge_id' => '2',
            'user_id' => '1',
        ]);
    }
}
