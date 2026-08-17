<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjamans = Peminjaman::with(['barang', 'penyetuju'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::where('status', 'tersedia')->get();
        return view('admin.peminjaman.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'nama_peminjam' => 'required|string|max:255',
            'guru_kelas' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'tanggal_rencana_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'lokasi_selama_dipinjam' => 'required|string|max:255',
        ]);

        $barang = Barang::findOrFail($request->barang_id);
        
        // Ensure barang has enough stock
        if ($barang->status !== 'tersedia' || $barang->jumlah < $request->jumlah) {
            return redirect()->back()->with('error', 'Stok barang tidak mencukupi atau barang tidak tersedia.');
        }

        $fotoPath = '';
        if ($request->hasFile('foto_peminjam')) {
            $fotoPath = $request->file('foto_peminjam')->store('peminjaman', 'public');
        }

        // Create loan record
        Peminjaman::create([
            'barang_id' => $request->barang_id,
            'nama_peminjam' => $request->nama_peminjam,
            'guru_kelas' => $request->guru_kelas,
            'jabatan' => $request->jabatan,
            'jumlah' => $request->jumlah,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_rencana_kembali' => $request->tanggal_rencana_kembali,
            'lokasi_selama_dipinjam' => $request->lokasi_selama_dipinjam,
            'foto_peminjam' => $fotoPath, 
            'status' => 'disetujui',
            'disetujui_oleh' => Auth::id(),
            'tanggal_disetujui' => now(),
        ]);

        // Deduct stock and update status if empty
        $sisaStok = $barang->jumlah - $request->jumlah;
        $barang->update([
            'jumlah' => $sisaStok,
            'status' => $sisaStok > 0 ? 'tersedia' : 'dipinjam'
        ]);

        // Optional: Add to RiwayatLokasi
        $barang->riwayatLokasi()->create([
            'lokasi' => $request->lokasi_selama_dipinjam,
            'user_id' => Auth::id(),
            'tanggal' => now(),
            'catatan' => 'Dipinjam oleh ' . $request->nama_peminjam
        ]);

        return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman berhasil dicatat dan disetujui.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $peminjaman = Peminjaman::with(['barang', 'penyetuju'])->findOrFail($id);
        if ($request->ajax() || $request->has('ajax')) {
            return view('admin.peminjaman.partials.show', compact('peminjaman'));
        }
        return redirect()->route('admin.peminjaman.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        if ($request->ajax() || $request->has('ajax')) {
            return view('admin.peminjaman.partials.selesaikan', compact('peminjaman'));
        }
        return redirect()->route('admin.peminjaman.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // We will use a separate selesaikan method for returns
        return redirect()->route('admin.peminjaman.index');
    }
    
    /**
     * Selesaikan peminjaman (pengembalian barang)
     */
    public function selesaikan(Request $request, string $id)
    {
        $request->validate([
            'foto_bukti_pengembalian' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'catatan_pengembalian' => 'nullable|string'
        ]);

        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->status === 'selesai') {
            return redirect()->back()->with('error', 'Peminjaman ini sudah diselesaikan.');
        }

        $fotoPath = null;
        if ($request->hasFile('foto_bukti_pengembalian')) {
            $fotoPath = $request->file('foto_bukti_pengembalian')->store('peminjaman/bukti', 'public');
        }

        $peminjaman->update([
            'status' => 'selesai',
            'foto_bukti_pengembalian' => $fotoPath ?? '',
            'catatan_pengembalian' => $request->catatan_pengembalian,
            'tanggal_dikembalikan' => now(),
        ]);

        $barang = $peminjaman->barang;
        
        // Return stock ONLY IF the user checked the box (kembalikan_stok)
        if ($request->has('kembalikan_stok')) {
            $barang->update([
                'jumlah' => $barang->jumlah + $peminjaman->jumlah,
                'status' => 'tersedia'
            ]);
        }
        
        $barang->riwayatLokasi()->create([
            'lokasi' => $barang->lokasi_saat_ini, // Kembalikan ke tempat awal
            'user_id' => Auth::id(),
            'tanggal' => now(),
            'catatan' => 'Dikembalikan ke ' . $barang->lokasi_saat_ini . ' oleh ' . $peminjaman->nama_peminjam
        ]);

        return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman berhasil diselesaikan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        
        // If it was still active, revert the barang stock
        if ($peminjaman->status === 'disetujui') {
            $barang = $peminjaman->barang;
            $barang->update([
                'jumlah' => $barang->jumlah + $peminjaman->jumlah,
                'status' => 'tersedia'
            ]);
        }
        
        $peminjaman->delete();
        
        return redirect()->route('admin.peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
