<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'role' => 3,
        //     'firstname' => 'Administrator',
        //     'lastname' => 'Administrator',
        //     'middlename' => 'Administrator',
        //     'gender' => 'Male',
        //     // 'age' => 23,
        //     'birthplace' => 'Balanga Bataan',
        //     'nationality' => 'Filipino',
        //     'contact'=> 1234567898,
        //     'email' => 'administrator@email.com',
        //     'birthdate'=> '2023-01-01',
        //     'municipality'=> 'Balanga',
        //     'zipcode'=> '2100',
        //     'barangay'=> 'San Jose',
        //     'street'=> 'Quezon',
        //     'password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',// password
        //     'idno'=> 2023,
        //     'orcr'=> 2023,
        //     'platenumber'=> '2023',
        //     'approved' => 1,
        //     'email_verified_at' => now(),
        //     'remember_token' => Str::random(10),
        // ]);
        User::create([
            'role' => 3,
            'firstname' => 'Administrator',
            'lastname' => 'Administrator',
            'middlename' => 'Administrator',
            'gender' => 'Male',
            // 'age' => 23,
            'birthplace' => 'Balanga Bataan',
            'nationality' => 'Filipino',
            'contact'=> 1234567898,
            'email' => 'administrator@email.com',
            'birthdate'=> '2023-01-01',
            'municipality'=> 'Balanga',
            'zipcode'=> '2100',
            'barangay'=> 'San Jose',
            'street'=> 'Quezon',
            'password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',// password
            'idno'=> 2023,
            'orcr'=> 2023,
            'platenumber'=> '2023',
            'approved' => 1,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

    }
}
