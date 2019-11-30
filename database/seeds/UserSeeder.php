<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\User::create([
           'name'=>'admin',
           'email' => 'admin@admin.com',
            'role' => 'admin',
            'password'=>\Illuminate\Support\Facades\Hash::make('1234')


        ]);
    }
}
