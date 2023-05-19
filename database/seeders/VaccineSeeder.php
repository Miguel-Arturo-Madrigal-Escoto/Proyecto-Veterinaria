<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaccineSeeder extends Seeder
{
    private array $vaccines;

    public function __construct()
    {
        $this->vaccines = [
            [
                'title'       => 'Parmovirus',
                'description' => fake()->paragraph(),
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'title'       => 'Rabia',
                'description' => fake()->paragraph(),
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'title'       => 'Hepatitis infecciosa',
                'description' => fake()->paragraph(),
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'title'       => 'Leptospirosis',
                'description' => fake()->paragraph(),
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'title'       => 'Moquillo',
                'description' => fake()->paragraph(),
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

        ];
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vaccines')->insert($this->vaccines);
    }
}
