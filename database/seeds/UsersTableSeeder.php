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
            'firstName' => 'Sanket',
            'lastName' => 'Adhvaryu',
            'email' => 'sanket.adhvaryu@gmail.com',
            'type' => 0,
            'status' => 1,
            'password' => bcrypt('[8jd93j]Hk]'),
        ]);
    }
}
