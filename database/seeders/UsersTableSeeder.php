<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@localhost.com',
            'password' => bcrypt('password'),
            'gender' => 'l',
            'birth_place' => 'Jakarta',
            'birth_date' => Carbon::createFromFormat('Y-m-d', '1998-12-08'),
            'role' => 'admin',
        ]);
    }
}
