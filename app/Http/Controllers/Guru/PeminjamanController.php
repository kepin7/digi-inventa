<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        // For guest, fetch all peminjaman (read-only)
        $peminjaman = Peminjaman::with('barang')
                        ->orderBy('created_at', 'desc')
                        ->get();
                        
        return view('guru.peminjaman.index', compact('peminjaman'));
    }
}
