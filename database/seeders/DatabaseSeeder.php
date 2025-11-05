<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Dosen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        $admin = User::create([
            'username' => 'admin',
            'email' => 'admin@sirekap.ac.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => 1,
            'ls_lock' => 0
        ]);

        // Create sample dosen
        Dosen::create([
            'id_dosen' => 'DSN001',
            'nidn' => '1234567890',
            'nama_dosen' => 'Dr. Ahmad S.Kom., M.Kom.',
            'gelar' => 'S.Kom., M.Kom.',
            'no_hp' => '081234567890',
            'email' => 'ahmad@sirekap.ac.id',
            'id_user' => $admin->id_user
        ]);

        $this->call([
            // Add other seeders here if needed
        ]);
    }
}
