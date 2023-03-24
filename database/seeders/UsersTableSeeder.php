<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// Hash
use Illuminate\Support\Facades\Hash;
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
        //
        DB::table('users')->insert([
            [
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@pcbuild.com',
            'password' => Hash::make('111'),
            'role' => 'admin',
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'name' => 'Vendor 1',
            'username' => 'vendor',
            'email' => 'vendor@pcbuild.com',
            'password' => Hash::make('111'),
            'role' => 'vendor',
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@pcbuild.com',
            'password' => Hash::make('111'),
            'role' => 'user',
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
