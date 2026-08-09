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

        // Barang Dummy
        Barang::create([
            'nama' => 'Proyektor Epson EB-X05',
            'kategori' => 'Elektronik',
            'jenis_barang' => 'modal',
            'jumlah' => 2,
            'merk' => 'Epson',
            'spesifikasi' => '3300 Lumens, XGA',
            'deskripsi' => 'Proyektor ruang kelas',
            'tahun_perolehan' => 2023,
            'harga_perolehan' => 5000000,
            'sumber_dana' => 'BOS',
            'kondisi' => 'baik',
            'status' => 'tersedia',
            'lokasi_saat_ini' => 'Ruang Guru',
            'dibuat_oleh' => 1,
        ]);

        Barang::create([
            'nama' => 'Proyektor Epson EB-X05 (Rusak)',
            'kategori' => 'Elektronik',
            'jenis_barang' => 'modal',
            'jumlah' => 1,
            'merk' => 'Epson',
            'spesifikasi' => '3300 Lumens, XGA',
            'deskripsi' => 'Proyektor ruang kelas',
            'tahun_perolehan' => 2023,
            'harga_perolehan' => 5000000,
            'sumber_dana' => 'BOS',
            'kondisi' => 'perlu_perbaikan',
            'status' => 'tersedia',
            'lokasi_saat_ini' => 'Ruang Server',
            'dibuat_oleh' => 1,
        ]);

        Barang::create([
            'nama' => 'Piala OSN Matematika',
            'kategori' => 'Penghargaan',
            'jenis_barang' => 'modal',
            'jumlah' => 1,
            'kondisi' => 'baik',
            'status' => 'tersedia',
            'lokasi_saat_ini' => 'Ruang Kepala Sekolah',
            'dibuat_oleh' => 1,
        ]);
        
        Barang::create([
            'nama' => 'Spidol Snowman Marker Hitam',
            'kategori' => 'Alat Tulis',
            'jenis_barang' => 'habis_pakai',
            'jumlah' => 50,
            'kondisi' => 'baik',
            'status' => 'tersedia',
            'lokasi_saat_ini' => 'Gudang Sarpra',
            'dibuat_oleh' => 1,
        ]);

        Barang::create([
            'nama' => 'Bola Voli Mikasa',
            'kategori' => 'Olahraga',
            'jenis_barang' => 'modal',
            'jumlah' => 12,
            'merk' => 'Mikasa',
            'kondisi' => 'baik',
            'status' => 'tersedia',
            'lokasi_saat_ini' => 'Gudang Olahraga',
            'dibuat_oleh' => 1,
        ]);
    }
}
