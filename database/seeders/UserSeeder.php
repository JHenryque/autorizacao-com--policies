<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'user', 'visitor'];
        $users = [];

        foreach ($roles as $role) {
            $users[] = [
                'name' => $role,
                'email' => $role . '@example.com',
                'password' => bcrypt('Aa123456'),
                'role' => $role,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        DB::table('users')->insert($users);
    }
}
