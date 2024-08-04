<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $jasper = User::create([
            'name' => 'Jasper',
            'email' => 'jasper@openaed.eu',
            'password' => Hash::make('tijdelijk-' . date('d-m')),
        ]);

        // $jasper->assignRole('super-admin'); // Implement laravel-permission package
    }
}