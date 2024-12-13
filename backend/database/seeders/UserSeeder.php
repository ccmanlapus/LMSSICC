<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define default users with associated roles
        $users = [
        
            [
                'name' => 'Program Head',
                'email' => 'programhead@example.com',
                'password' => Hash::make('sicc1'), // Replace with a secure password
                'role' => 'program head',
            ],
            [
                'name' => 'Instructor',
                'email' => 'instructor@example.com',
                'password' => Hash::make('sicc2'), // Replace with a secure password
                'role' => 'instructor',
            ],
            [
                'name' => 'Student',
                'email' => 'student@example.com',
                'password' => Hash::make('sicc3'), // Replace with a secure password
                'role' => 'student',
            ],
        ];

        // Create users and assign roles
        foreach ($users as $userData) {
            // Retrieve the role by name
            $role = Role::where('name', $userData['role'])->first();

            // Create the user
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
                'role_id' => $role->id, // Assign role ID directly
            ]);

            // Assign role to the user (assuming many-to-many relationship)
            $user->roles()->attach($role);
        }
    }
    }
