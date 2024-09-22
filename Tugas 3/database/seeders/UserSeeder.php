<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create roles if they don't exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Create admin user
        User::create([
            'name' => 'fairna',
            'email' => 'fairna@admin.com', // Replace with actual email
            'password' => bcrypt('123'), // Hash the password
            'role_id' => $adminRole->id,
        ]);

        // Create user
        User::create([
            'name' => 'aul',
            'email' => 'aul@user.com', // Replace with actual email
            'password' => bcrypt('1234'), // Hash the password
            'role_id' => $userRole->id,
        ]);
    }
}
