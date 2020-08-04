<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
        	[
                'name'        => 'Administrator',
                'guard_name'    => 'web'
            ],
        	[
                'name'        => 'Admin',
                'guard_name'    => 'web'
            ],
            [
                'name'        => 'Enumerator',
                'guard_name'    => 'web'
            ],
        ]);
    }
}
