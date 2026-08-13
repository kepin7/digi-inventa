<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Barang;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User Admin
        User::create([
            'name' => 'Petugas Sarpra',
            'username' => 'sarpra',
            'password' => Hash::make('smpn5pbg'),
            'role' => 'admin',
            'jabatan' => 'Sarana & Prasarana',
        ]);
    }
}
