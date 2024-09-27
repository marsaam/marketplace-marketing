<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create merchant users
        $merchantUser1 = User::create([
            'email' => 'merchant1@example.com',
            'company_name' => 'Merchant Company 1',
            'company_address' => '123 Merchant St',
            'company_contact' => '123-456-7890',
            'company_desc' => 'Description for Merchant Company 1',
            'role' => 'merchant', // Default role
            'password' => Hash::make('password123'), // Hashing the password
        ]);
        $merchantUser1->assignRole('merchant'); // Assign specific merchant role

        $merchantUser2 = User::create([
            'email' => 'merchant2@example.com',
            'company_name' => 'Merchant Company 2',
            'company_address' => '456 Merchant Ave',
            'company_contact' => '234-567-8901',
            'company_desc' => 'Description for Merchant Company 2',
            'role' => 'merchant', // Default role
            'password' => Hash::make('password123'), // Hashing the password
        ]);
        $merchantUser2->assignRole('merchant'); // Assign specific merchant role

        // Create customer users
        $customerUser1 = User::create([
            'email' => 'customer1@example.com',
            'company_name' => 'Customer Company 1',
            'company_address' => '789 Customer Rd',
            'company_contact' => '345-678-9012',
            'company_desc' => 'Description for Customer Company 1',
            'role' => 'customer', // Default role
            'password' => Hash::make('password123'), // Hashing the password
        ]);
        $customerUser1->assignRole('customer'); // Assign specific customer role

        $customerUser2 = User::create([
            'email' => 'customer2@example.com',
            'company_name' => 'Customer Company 2',
            'company_address' => '101 Customer Blvd',
            'company_contact' => '456-789-0123',
            'company_desc' => 'Description for Customer Company 2',
            'role' => 'customer', // Default role
            'password' => Hash::make('password123'), // Hashing the password
        ]);
        $customerUser2->assignRole('customer'); // Assign specific customer role
    }
}
