<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Parameter tab aktif (default 'ringkasan')
        $tab = $request->input('tab', 'ringkasan');

        // 1. DATA RINGKASAN
        $totalBarang = Barang::where('status', '!=', 'dihapus')->count();
        $kondisiBaik = Barang::where('kondisi', 'baik')->where('status', '!=', 'dihapus')->count();
        $perluPerbaikan = Barang::where('kondisi', 'perlu_perbaikan')->where('status', '!=', 'dihapus')->count();
        $rusakBerat = Barang::where('kondisi', 'rusak')->where('status', '!=', 'dihapus')->count();

        $distribusiKategori = Barang::where('status', '!=', 'dihapus')
            ->select('kategori', DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->get();

        $ringkasanLokasi = Barang::where('status', '!=', 'dihapus')
            ->select(
                'lokasi_saat_ini as lokasi',
                DB::raw('count(*) as total'),
                DB::raw('SUM(CASE WHEN kondisi = "baik" THEN 1 ELSE 0 END) as baik'),
                DB::raw('SUM(CASE WHEN kondisi = "perlu_perbaikan" THEN 1 ELSE 0 END) as perlu_perbaikan'),
                DB::raw('SUM(CASE WHEN kondisi = "rusak" THEN 1 ELSE 0 END) as rusak')
            )
            ->groupBy('lokasi_saat_ini')
            ->get();

        // 2. DATA DETAIL INVENTARIS
        $queryInventaris = Barang::where('status', '!=', 'dihapus');
        if ($request->filled('kategori')) {
            $queryInventaris->where('kategori', $request->kategori);
        }
        if ($request->filled('kondisi')) {
            $queryInventaris->where('kondisi', $request->kondisi);
        }
        if ($request->filled('jenis_barang')) {
            $queryInventaris->where('jenis_barang', $request->jenis_barang);
        }
        $detailInventaris = $queryInventaris->orderBy('nama', 'asc')->get();

        // 3. DATA PEMINJAMAN
        $queryPeminjaman = Peminjaman::with(['barang', 'penyetuju']);
        if ($request->filled('status_pinjam')) {
            $queryPeminjaman->where('status', $request->status_pinjam);
        }
        if ($request->filled('bulan')) {
            $bulan = date('m', strtotime($request->bulan));
            $tahun = date('Y', strtotime($request->bulan));
            $queryPeminjaman->whereMonth('tanggal_pinjam', $bulan)
                            ->whereYear('tanggal_pinjam', $tahun);
        }
        $detailPeminjaman = $queryPeminjaman->orderBy('tanggal_pinjam', 'desc')->get();

        return view('admin.laporan.index', compact(
            'tab',
            'totalBarang', 
            'kondisiBaik', 
            'perluPerbaikan', 
            'rusakBerat', 
            'distribusiKategori', 
            'ringkasanLokasi',
            'detailInventaris',
            'detailPeminjaman'
        ));
    }

    public function excel()
    {
        $fileName = 'Laporan_Inventaris_SMPN5_' . date('Y-m-d') . '.xls';

        $barangs = Barang::where('status', '!=', 'dihapus')->orderBy('kategori', 'asc')->get();

        $html = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
        $html .= '<head><meta charset="UTF-8"></head><body>';
        $html .= '<h2 style="text-align:center;">LAPORAN INVENTARIS BARANG</h2>';
        $html .= '<h3 style="text-align:center;">SMP NEGERI 5 PURBALINGGA</h3>';
        $html .= '<p style="text-align:center;">Tanggal Cetak: ' . date('d-m-Y') . '</p>';
        $html .= '<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">';
        $html .= '<thead style="background-color: #16a34a; color: white;">';
        $html .= '<tr>';
        $html .= '<th>No</th>';
        $html .= '<th>Kode Barang</th>';
        $html .= '<th>Nama Barang</th>';
        $html .= '<th>Kategori</th>';
        $html .= '<th>Sifat Barang</th>';
        $html .= '<th>Jumlah Stok</th>';
        $html .= '<th>Kondisi</th>';
        $html .= '<th>Lokasi Saat Ini</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';

        $no = 1;
        foreach ($barangs as $item) {
            $kondisi = ucfirst(str_replace('_', ' ', $item->kondisi));
            $jenis = $item->jenis_barang == 'modal' ? 'Barang Modal' : 'Habis Pakai';
            
            $html .= '<tr>';
            $html .= '<td style="text-align:center;">' . $no++ . '</td>';
            $html .= '<td style="text-align:center; mso-number-format:\'@\';">' . ($item->kode_barang ?? '-') . '</td>';
            $html .= '<td>' . $item->nama . '</td>';
            $html .= '<td>' . $item->kategori . '</td>';
            $html .= '<td>' . $jenis . '</td>';
            $html .= '<td style="text-align:center;">' . $item->jumlah . '</td>';
            $html .= '<td>' . $kondisi . '</td>';
            $html .= '<td>' . $item->lokasi_saat_ini . '</td>';
            $html .= '</tr>';
        }

        $html .= '</tbody></table></body></html>';

        $headers = array(
            "Content-type"        => "application/vnd.ms-excel",
            "Content-Disposition" => "attachment; filename=\"$fileName\"",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        return response($html, 200, $headers);
    }
}
