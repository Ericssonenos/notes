<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'text_name' => 'John Doe',
                'text_email' => 'john@example.com',
                'text_password' => bcrypt('password'),
                'dt_last_login' => now(),
            ],
            [
                'text_name' => 'Jane Smith',
                'text_email' => 'jane@example.com',
                'text_password' => bcrypt('password'),
                'dt_last_login' => now(),
            ],
        ]);
    }
}
