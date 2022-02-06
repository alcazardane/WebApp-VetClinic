<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin', 
            'email' => 'admin@example.com', 
            'password' => Hash::make('admin'), 
            'user_type' => 'admin', 
            'profileimage' => 'ClinicLogo.png'
        ]);
    }
}