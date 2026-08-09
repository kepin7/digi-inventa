<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatLokasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'lokasi',
        'kondisi',
        'tanggal',
        'user_id',
        'catatan'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
