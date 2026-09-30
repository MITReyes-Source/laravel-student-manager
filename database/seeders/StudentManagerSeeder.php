<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentManagerSeeder extends Seeder
{
    public function run(): void
    {
        // --- Users to log in and test with ---
        // Password for all three is "password" — change before anything real.
        $owner = User::create([
            'name' => 'Jamie dela Cruz',
            'email' => 'jamie@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);

        $stranger = User::create([
            'name' => 'Sam Rivera',
            'email' => 'sam@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);

        $admin = User::create([
            'name' => 'Admin Reyes',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        // --- Sample students, all owned by Jamie ---
        // Log in as Jamie -> can edit/delete these.
        // Log in as Sam -> should get a 403 on edit/delete.
        // Log in as Admin -> can edit/delete anything.
        $students = [
            ['first_name' => 'Ana', 'last_name' => 'Santos', 'email' => 'ana.santos@example.com', 'course' => 'BS Computer Science', 'year_level' => 2],
            ['first_name' => 'Miguel', 'last_name' => 'Torres', 'email' => 'miguel.torres@example.com', 'course' => 'BS Information Technology', 'year_level' => 3],
            ['first_name' => 'Grace', 'last_name' => 'Lim', 'email' => 'grace.lim@example.com', 'course' => 'BS Nursing', 'year_level' => 1],
            ['first_name' => 'Paolo', 'last_name' => 'Cruz', 'email' => 'paolo.cruz@example.com', 'course' => 'BS Accountancy', 'year_level' => 4],
        ];

        foreach ($students as $student) {
            Student::create($student + ['owner_id' => $owner->id]);
        }
    }
}
