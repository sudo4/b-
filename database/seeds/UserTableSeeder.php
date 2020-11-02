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
        $user = \App\Models\User::create([
        	'name' => 'superadmin',
        	'email' => 'superadmin@panitia.id',
        	'password' => bcrypt('secret')
        ]);

        $user->attachRole('superadministrator');

        $user = \App\Models\User::create([
            'name' => 'administrator',
            'email' => 'admin@panitia.id',
            'password' => bcrypt('secret')
        ]);

        $user->attachRole('administrator');
    }
}
