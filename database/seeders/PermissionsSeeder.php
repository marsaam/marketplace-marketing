<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles
        $roles = ['merchant', 'customer'];

        foreach ($roles as $role) {
            Role::create(['name' => $role, 'guard_name' => 'web']);
        }

        // Assign users to roles based on the role column in the users table
        $users = User::all(); // Retrieve all users

        foreach ($users as $user) {
            if ($user->role === 'merchant') {
                $user->assignRole('merchant');
            } elseif ($user->role === 'customer') {
                $user->assignRole('customer');
            }
        }
    }
}
