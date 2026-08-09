<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'nama',
        'kategori',
        'jenis_barang',
        'jumlah',
        'merk',
        'spesifikasi',
        'deskripsi',
        'tahun_perolehan',
        'harga_perolehan',
        'sumber_dana',
        'kondisi',
        'status',
        'lokasi_saat_ini',
        'gambar',
        'dibuat_oleh'
    ];

    public function pembuat()
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function riwayatLokasi()
    {
        return $this->hasMany(RiwayatLokasi::class);
    }
}
