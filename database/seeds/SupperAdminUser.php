<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SupperAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'supper@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'email_verified_at' => \Illuminate\Support\Carbon::now(),
            'created_at' => \Illuminate\Support\Carbon::now(),
            'updated_at' => \Illuminate\Support\Carbon::now()
        ]);
    }
}
