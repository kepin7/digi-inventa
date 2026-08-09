<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\RiwayatLokasi;

class DashboardController extends Controller
{
    public function admin()
    {
        $stats = [
            'total' => Barang::where('status', '!=', 'dihapus')->count(),
            'baik' => Barang::where('kondisi', 'baik')->where('status', '!=', 'dihapus')->count(),
            'rusak' => Barang::where('kondisi', 'rusak')->where('status', '!=', 'dihapus')->count(),
            'perlu_perbaikan' => Barang::where('kondisi', 'perlu_perbaikan')->where('status', '!=', 'dihapus')->count(),
            'dipinjam' => Barang::where('status', 'dipinjam')->count(),
            'dihapus' => Barang::where('status', 'dihapus')->count(),
        ];

        $activities = RiwayatLokasi::with(['barang', 'user'])->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'activities'));
    }
    public function guest()
    {
        $stats = [
            'total' => Barang::where('status', '!=', 'dihapus')->count(),
            'baik' => Barang::where('kondisi', 'baik')->where('status', '!=', 'dihapus')->count(),
            'rusak' => Barang::where('kondisi', 'rusak')->where('status', '!=', 'dihapus')->count(),
            'perlu_perbaikan' => Barang::where('kondisi', 'perlu_perbaikan')->where('status', '!=', 'dihapus')->count(),
            'dipinjam' => Barang::where('status', 'dipinjam')->count(),
            'dihapus' => Barang::where('status', 'dihapus')->count(),
        ];

        $activities = RiwayatLokasi::with(['barang', 'user'])->latest()->take(5)->get();

        return view('guest.dashboard', compact('stats', 'activities'));
    }
}
