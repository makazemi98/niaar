<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $demoUser = User::create([
            'email'             => 'demo@demo.com',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
            'abbreviation' => 'AH',
            'gender' => \App\Enums\GenderEnum::MALE,
            'role' => \App\Enums\RolesEnum::MANAGER,
        ]);
    }
}
