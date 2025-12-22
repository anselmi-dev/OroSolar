<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FilamentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'name' => 'Administrador',
                'email' => 'admin@orosolar.com',
                'password' => 'totalsystems', // Cambiar en producción
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Gabriel',
                'email' => 'gabriel@totalsystems.cl',
                'password' => 'totalsystems',
                'email_verified_at' => now(),
            ]
        ])->each(function ($userData) {
            User::firstOrCreate(
                ['email' => $userData['email']],
                $userData
            );
        });
    }
}
