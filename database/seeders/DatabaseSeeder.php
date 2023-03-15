<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
            UserSeeder::class
        ]);

        /* Factories */
        User::factory(10)->create();
    }
}
