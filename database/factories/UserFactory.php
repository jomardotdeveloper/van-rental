<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'role' => 3,
            'firstname' => 'Administrator',
            'lastname' => 'Administrator',
            'middlename' => 'Administrator',
            'gender' => 'Male',
            'age' => 23,
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
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
