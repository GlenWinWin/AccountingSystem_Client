<?php

use Illuminate\Database\Seeder;

class UserTAbleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
      	'email' => 'glenwinbernabe@gmail.com',
        'name' => 'Glenwin G. Bernabe',
      	'password' => Hash::make('ggka')
      	]);
    }
}
