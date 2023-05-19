<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Appointment;
use App\Models\Pet;
use App\Models\User;
use App\Models\Vaccine;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* Seeders */
        $this->call([
            UserSeeder::class,
            VaccineSeeder::class
        ]);

        /* Factories */
        User::factory(20)->create();
        Pet::factory(20)->create();
        Appointment::factory(20)->create();
        Vaccine::factory(10)->create();
    }
}
