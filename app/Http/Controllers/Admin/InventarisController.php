<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Storage;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Barang::query();
        
        // Search
        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('kategori', 'like', '%' . $request->search . '%');
        }

        // Filter
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }
        if ($request->has('kondisi') && $request->kondisi != '') {
            $query->where('kondisi', $request->kondisi);
        }

        $barangs = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.inventaris.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.inventaris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'nullable|string|max:255|unique:barangs',
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'jenis_barang' => 'required|in:modal,habis_pakai',
            'jumlah' => 'required|integer|min:1',
            'merk' => 'nullable|string|max:255',
            'spesifikasi' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'tahun_perolehan' => 'nullable|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'harga_perolehan' => 'nullable|numeric|min:0',
            'sumber_dana' => 'nullable|string|max:255',
            'kondisi' => 'required|in:baik,perlu_perbaikan,rusak',
            'status' => 'required|in:tersedia,dipinjam,dihapus',
            'lokasi_saat_ini' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('barang', 'public');
            $validated['gambar'] = $path;
        }

        $validated['dibuat_oleh'] = auth()->id();

        $barang = Barang::create($validated);

        // Add initial location history
        $barang->riwayatLokasi()->create([
            'user_id' => auth()->id(),
            'lokasi' => $validated['lokasi_saat_ini'],
            'kondisi' => $validated['kondisi'],
            'tanggal' => now(),
            'catatan' => 'Barang baru ditambahkan ke sistem'
        ]);

        return redirect()->route('admin.inventaris.index')->with('success', 'Data barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $barang = Barang::findOrFail($id);
        if ($request->ajax() || $request->has('ajax')) {
            return view('admin.inventaris.partials.show', compact('barang'));
        }
        return view('admin.inventaris.show', compact('barang'));
    }

    public function printLabel(string $id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.inventaris.label', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $barang = Barang::findOrFail($id);
        if ($request->ajax() || $request->has('ajax')) {
            return view('admin.inventaris.partials.edit', compact('barang'));
        }
        return view('admin.inventaris.create', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barang = Barang::findOrFail($id);

        $validated = $request->validate([
            'kode_barang' => 'nullable|string|max:255|unique:barangs,kode_barang,' . $id,
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'jenis_barang' => 'required|in:modal,habis_pakai',
            'jumlah' => 'required|integer|min:1',
            'merk' => 'nullable|string|max:255',
            'spesifikasi' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'tahun_perolehan' => 'nullable|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'harga_perolehan' => 'nullable|numeric|min:0',
            'sumber_dana' => 'nullable|string|max:255',
            'kondisi' => 'required|in:baik,perlu_perbaikan,rusak',
            'status' => 'required|in:tersedia,dipinjam,dihapus',
            'lokasi_saat_ini' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($barang->gambar) {
                Storage::disk('public')->delete($barang->gambar);
            }
            $path = $request->file('gambar')->store('barang', 'public');
            $validated['gambar'] = $path;
        }

        $oldLokasi = $barang->lokasi_saat_ini;
        
        $barang->update($validated);

        // Add location history if location changed
        if ($oldLokasi !== $validated['lokasi_saat_ini']) {
            $barang->riwayatLokasi()->create([
                'user_id' => auth()->id(),
                'lokasi' => $validated['lokasi_saat_ini'],
                'kondisi' => $validated['kondisi'],
                'tanggal' => now(),
                'catatan' => 'Lokasi barang dipindahkan dari ' . $oldLokasi
            ]);
        }

        return redirect()->route('admin.inventaris.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);
        
        if ($barang->gambar) {
            Storage::disk('public')->delete($barang->gambar);
        }
        
        $barang->delete();

        return redirect()->route('admin.inventaris.index')->with('success', 'Data barang berhasil dihapus.');
    }
}
