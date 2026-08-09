<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'barang_id',
        'nama_peminjam',
        'guru_kelas',
        'jabatan',
        'jumlah',
        'tanggal_pinjam',
        'tanggal_rencana_kembali',
        'lokasi_selama_dipinjam',
        'foto_peminjam',
        'status',
        'disetujui_oleh',
        'tanggal_disetujui',
        'catatan_admin',
        'foto_bukti_pengembalian',
        'catatan_pengembalian',
        'tanggal_dikembalikan'
    ];

    protected $casts = [
        'tanggal_pinjam' => 'date',
        'tanggal_rencana_kembali' => 'date',
        'tanggal_disetujui' => 'datetime',
        'tanggal_dikembalikan' => 'datetime',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function penyetuju()
    {
        return $this->belongsTo(User::class, 'disetujui_oleh');
    }
}
