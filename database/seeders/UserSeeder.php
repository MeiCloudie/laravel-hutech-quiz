<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $password = 'P@ssw0rd';
        User::create([
            'id' => 1,
            'first_name' => 'Thái',
            'last_name' => 'Nguyễn Hồng',
            'username' => '2080600914',
            'email' => 'thai@gmail.com',
            'password' => Hash::make($password),

            'faculty_id' => 1
        ]);
        User::create([
            'id' => 2,
            'first_name' => 'Vân',
            'last_name' => 'Trương Thục',
            'username' => '2080600803',
            'email' => 'mei@gmail.com',
            'password' => Hash::make($password),

            'faculty_id' => 1
        ]);
    }
}
