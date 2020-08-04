<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	[
                'first_name'  => 'Taiwo',
                'last_name'   => 'Olajide',
                'phone_number' => '08138139333',
                'email' => 'tolajide74@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'Administrator',
                'status' => 1,
            ],

            [
                'first_name'  => 'Adesina',
                'last_name'   => 'Kehinde',
                'phone_number' => '09072812042',
                'email' => 'tolajide75@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'Admin',
                'status' => 1,
            ],

            [
                'first_name'  => 'Abidemi',
                'last_name'   => 'Sunday',
                'phone_number' => '09012344343',
                'email' => 'abidemi@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'Enumerator',
                'status' => 1,

            ],

        ]);
    }

}
