<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
DB::table('users')->insert([
'fname'=> 'Ahmed',
'lname'=> Str::random(10),
'email'=> 'ahmeds7010@gmail.com',
'phone'=> '99823428',
'address'=> 'Muscat',
'password'=> Hash::make('password'),
'is_admin'=> 1
        ]);

    }
}
