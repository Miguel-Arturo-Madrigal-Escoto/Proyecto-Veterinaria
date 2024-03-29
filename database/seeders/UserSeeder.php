<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    private array $users;

    public function __construct()
    {
        $this->users = [
            [
                'name'                      => 'Miguel',
                'email'                     => 'miguel@gmail.com',
                'email_verified_at'         => now(),
                'password'                  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'two_factor_secret'         => null,
                'two_factor_recovery_codes' => null,
                'remember_token'            => Str::random(10),
                'profile_photo_path'        => null,
                'lastname'                  => 'Madrigal',
                'gender'                    => 'M',
                'phone'                     => '3390123212',
                'is_admin'                  => true,
                'created_at'                => now(),
                'updated_at'                => now(),
            ],
            [
                'name'                      => 'Arturo',
                'email'                     => 'arturo@gmail.com',
                'email_verified_at'         => now(),
                'password'                  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'two_factor_secret'         => null,
                'two_factor_recovery_codes' => null,
                'remember_token'            => Str::random(10),
                'profile_photo_path'        => null,
                'lastname'                  => 'Madrigal',
                'gender'                    => 'M',
                'phone'                     => '3322113322',
                'is_admin'                  => true,
                'created_at'                => now(),
                'updated_at'                => now(),
            ],
        ];
    }

    public function run(): void
    {
        DB::table('users')->insert($this->users);
    }
}
