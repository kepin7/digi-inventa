@extends('layouts.app')

@section('content')
<div class="panel" id="panel-laporan" style="display: block;">
  <div class="page-title-row">
    <div>
      <h1>Laporan Sistem</h1>
      <p>Pusat laporan ringkasan, inventaris, dan histori peminjaman</p>
    </div>
    <div style="display:flex; gap:10px;" class="no-print">
      <a href="{{ route('admin.laporan.excel') }}" class="btn btn-success" style="background:#16a34a;border:none">
        <i class="fas fa-file-excel"></i> Laporan Excel
      </a>
      <button class="btn btn-primary" onclick="printLaporan()">
        <i class="fas fa-print"></i> Cetak Semua (PDF)
      </button>
    </div>
  </div>

  <!-- Tabs Navigation -->
  <div style="display:flex;gap:12px;border-bottom:1px solid var(--gray-200);margin-bottom:24px" class="no-print">
    <a href="{{ route('admin.laporan.index', ['tab' => 'ringkasan']) }}" style="padding:12px 16px;text-decoration:none;color:{{ $tab == 'ringkasan' ? 'var(--green-700)' : 'var(--gray-500)' }};border-bottom:2px solid {{ $tab == 'ringkasan' ? 'var(--green-600)' : 'transparent' }};font-weight:600">
      <i class="fas fa-chart-pie"></i> Ringkasan Eksekutif
    </a>
    <a href="{{ route('admin.laporan.index', ['tab' => 'inventaris']) }}" style="padding:12px 16px;text-decoration:none;color:{{ $tab == 'inventaris' ? 'var(--green-700)' : 'var(--gray-500)' }};border-bottom:2px solid {{ $tab == 'inventaris' ? 'var(--green-600)' : 'transparent' }};font-weight:600">
      <i class="fas fa-boxes-stacked"></i> Detail Inventaris
    </a>
    <a href="{{ route('admin.laporan.index', ['tab' => 'peminjaman']) }}" style="padding:12px 16px;text-decoration:none;color:{{ $tab == 'peminjaman' ? 'var(--green-700)' : 'var(--gray-500)' }};border-bottom:2px solid {{ $tab == 'peminjaman' ? 'var(--green-600)' : 'transparent' }};font-weight:600">
      <i class="fas fa-right-left"></i> Histori Peminjaman
    </a>
  </div>

  <!-- TAB 1: RINGKASAN EKSEKUTIF -->
  <div class="tab-content {{ $tab == 'ringkasan' ? 'active-tab' : 'hidden-screen' }}">
    <h3 class="print-only" style="margin-bottom: 20px; color: #111;">Ringkasan Eksekutif Laporan Inventaris</h3>
    <div class="report-stat-grid">
      <div class="report-stat">
        <div class="report-stat-icon" style="color:var(--green-600)"><i class="fas fa-boxes-stacked"></i></div>
        <div class="report-stat-number" style="color:var(--green-800)">{{ $totalBarang }}</div>
        <div class="report-stat-label">Total Barang Terdaftar</div>
      </div>
      <div class="report-stat">
        <div class="report-stat-icon" style="color:#15803d"><i class="fas fa-circle-check"></i></div>
        <div class="report-stat-number" style="color:#15803d">{{ $kondisiBaik }}</div>
        <div class="report-stat-label">Kondisi Baik</div>
      </div>
      <div class="report-stat">
        <div class="report-stat-icon" style="color:#a16207"><i class="fas fa-screwdriver-wrench"></i></div>
        <div class="report-stat-number" style="color:#a16207">{{ $perluPerbaikan }}</div>
        <div class="report-stat-label">Perlu Perbaikan</div>
      </div>
      <div class="report-stat">
        <div class="report-stat-icon" style="color:#dc2626"><i class="fas fa-triangle-exclamation"></i></div>
        <div class="report-stat-number" style="color:#dc2626">{{ $rusakBerat }}</div>
        <div class="report-stat-label">Rusak Berat</div>
      </div>
    </div>

    <!-- Distribusi per jenis -->
    <div class="card" style="margin-bottom:22px">
      <div class="card-header">
        <h3><i class="fas fa-layer-group" style="color:var(--green-600);margin-right:8px"></i>Distribusi per Jenis Barang</h3>
      </div>
      <div class="card-body">
        @php
            $colors = [
                'Elektronik' => 'var(--green-600)', 'Mebel' => '#3b82f6',
                'Alat Tulis' => '#f59e0b', 'Buku/Modul' => '#ec4899',
                'Peralatan Olahraga' => '#8b5cf6', 'Peralatan Laboratorium' => '#14b8a6',
                'Aset Tetap' => '#f43f5e', 'Lainnya' => '#6b7280'
            ];
        @endphp
        @forelse($distribusiKategori as $dist)
          @php
              $percentage = $totalBarang > 0 ? ($dist->total / $totalBarang) * 100 : 0;
              $color = $colors[$dist->kategori] ?? '#6b7280';
          @endphp
          <div class="chart-bar-row">
            <span class="chart-bar-label">{{ $dist->kategori }}</span>
            <div class="chart-bar-track">
              <div class="chart-bar-fill" style="width:{{ $percentage }}%;background:{{ $color }}"></div>
            </div>
            <span class="chart-bar-value">{{ $dist->total }}</span>
          </div>
        @empty
          <div style="text-align:center;color:var(--gray-500);padding:20px 0;">Belum ada data.</div>
        @endforelse
      </div>
    </div>

    <!-- Tabel ringkas -->
    <div class="card print-avoid-break">
      <div class="card-header">
        <h3><i class="fas fa-table-list" style="color:var(--green-600);margin-right:8px"></i>Ringkasan Per Lokasi</h3>
      </div>
      <div class="table-wrap">
        <table class="inv-table">
          <thead>
            <tr>
              <th>Lokasi</th>
              <th>Jumlah Barang</th>
              <th>Kondisi Baik</th>
              <th>Kondisi Perlu Perbaikan</th>
              <th>Rusak</th>
            </tr>
          </thead>
          <tbody>
            @forelse($ringkasanLokasi as $lokasi)
              <tr>
                <td style="font-weight:600">{{ $lokasi->lokasi }}</td>
                <td>{{ $lokasi->total }}</td>
                <td style="color:#15803d;font-weight:500">{{ $lokasi->baik }}</td>
                <td style="color:#a16207;font-weight:500">{{ $lokasi->perlu_perbaikan }}</td>
                <td style="color:#dc2626;font-weight:500">{{ $lokasi->rusak }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="5" style="text-align:center;color:var(--gray-500)">Belum ada data.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- TAB 2: DETAIL INVENTARIS -->
  <div class="tab-content {{ $tab == 'inventaris' ? 'active-tab' : 'hidden-screen' }} print-avoid-break" style="margin-top:40px">
    <h3 class="print-only" style="margin-bottom: 20px; color: #111;">Laporan Detail Inventaris Barang</h3>
    
    @if($tab == 'inventaris')
    <form class="no-print" method="GET" action="{{ route('admin.laporan.index') }}" style="display:flex;gap:12px;margin-bottom:20px;background:#f9fafb;padding:16px;border-radius:8px;border:1px solid #e5e7eb;align-items:flex-end">
      <input type="hidden" name="tab" value="inventaris">
      
      <div style="flex:1">
        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:6px;color:#374151">Kategori</label>
        <select name="kategori" style="width:100%;padding:8px 12px;border:1px solid #d1d5db;border-radius:6px">
          <option value="">Semua Kategori</option>
          <option value="Elektronik" {{ request('kategori') == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
          <option value="Mebel" {{ request('kategori') == 'Mebel' ? 'selected' : '' }}>Mebel</option>
          <option value="Alat Tulis" {{ request('kategori') == 'Alat Tulis' ? 'selected' : '' }}>Alat Tulis</option>
          <option value="Peralatan Olahraga" {{ request('kategori') == 'Peralatan Olahraga' ? 'selected' : '' }}>Peralatan Olahraga</option>
          <option value="Lainnya" {{ request('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
        </select>
      </div>
      <div style="flex:1">
        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:6px;color:#374151">Kondisi</label>
        <select name="kondisi" style="width:100%;padding:8px 12px;border:1px solid #d1d5db;border-radius:6px">
          <option value="">Semua Kondisi</option>
          <option value="baik" {{ request('kondisi') == 'baik' ? 'selected' : '' }}>Baik</option>
          <option value="perlu_perbaikan" {{ request('kondisi') == 'perlu_perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
          <option value="rusak" {{ request('kondisi') == 'rusak' ? 'selected' : '' }}>Rusak Berat</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" style="padding:9px 16px"><i class="fas fa-filter"></i> Terapkan</button>
      <a href="{{ route('admin.laporan.index', ['tab'=>'inventaris']) }}" class="btn btn-outline" style="padding:9px 16px"><i class="fas fa-undo"></i> Reset</a>
    </form>
    @endif

    <div class="card">
      <div class="card-header no-print">
        <h3><i class="fas fa-boxes-stacked" style="color:var(--green-600);margin-right:8px"></i>Detail Seluruh Barang</h3>
      </div>
      <div class="table-wrap">
        <table class="inv-table">
          <thead>
            <tr>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Kategori</th>
              <th>Jumlah Stok</th>
              <th>Lokasi</th>
              <th>Kondisi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($detailInventaris as $item)
              <tr>
                <td style="font-family:monospace;font-size:12px">{{ $item->kode_barang ?? '-' }}</td>
                <td style="font-weight:600">{{ $item->nama }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->lokasi_saat_ini }}</td>
                <td>
                  @if($item->kondisi == 'baik') <span style="color:#15803d">Baik</span>
                  @elseif($item->kondisi == 'perlu_perbaikan') <span style="color:#a16207">Perlu Perbaikan</span>
                  @else <span style="color:#dc2626">Rusak</span> @endif
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" style="text-align:center;color:var(--gray-500)">Tidak ada barang yang cocok dengan filter.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- TAB 3: DETAIL PEMINJAMAN -->
  <div class="tab-content {{ $tab == 'peminjaman' ? 'active-tab' : 'hidden-screen' }} print-avoid-break" style="margin-top:40px">
    <h3 class="print-only" style="margin-bottom: 20px; color: #111;">Laporan Histori Peminjaman Barang</h3>
    
    @if($tab == 'peminjaman')
    <form class="no-print" method="GET" action="{{ route('admin.laporan.index') }}" style="display:flex;gap:12px;margin-bottom:20px;background:#f9fafb;padding:16px;border-radius:8px;border:1px solid #e5e7eb;align-items:flex-end">
      <input type="hidden" name="tab" value="peminjaman">
      
      <div style="flex:1">
        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:6px;color:#374151">Bulan Peminjaman</label>
        <input type="month" name="bulan" value="{{ request('bulan') }}" style="width:100%;padding:8px 12px;border:1px solid #d1d5db;border-radius:6px">
      </div>
      <div style="flex:1">
        <label style="display:block;font-size:12px;font-weight:600;margin-bottom:6px;color:#374151">Status Pinjam</label>
        <select name="status_pinjam" style="width:100%;padding:8px 12px;border:1px solid #d1d5db;border-radius:6px">
          <option value="">Semua Status</option>
          <option value="disetujui" {{ request('status_pinjam') == 'disetujui' ? 'selected' : '' }}>Sedang Dipinjam (Disetujui)</option>
          <option value="selesai" {{ request('status_pinjam') == 'selesai' ? 'selected' : '' }}>Selesai (Dikembalikan)</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" style="padding:9px 16px"><i class="fas fa-filter"></i> Terapkan</button>
      <a href="{{ route('admin.laporan.index', ['tab'=>'peminjaman']) }}" class="btn btn-outline" style="padding:9px 16px"><i class="fas fa-undo"></i> Reset</a>
    </form>
    @endif

    <div class="card">
      <div class="card-header no-print">
        <h3><i class="fas fa-right-left" style="color:var(--green-600);margin-right:8px"></i>Log Seluruh Peminjaman</h3>
      </div>
      <div class="table-wrap">
        <table class="inv-table">
          <thead>
            <tr>
              <th>Tgl Pinjam</th>
              <th>Peminjam (Jabatan)</th>
              <th>Barang yang Dipinjam</th>
              <th>Lokasi Penggunaan</th>
              <th>Status</th>
              <th>Tgl Kembali</th>
            </tr>
          </thead>
          <tbody>
            @forelse($detailPeminjaman as $pinjam)
              <tr>
                <td style="white-space:nowrap">{{ $pinjam->tanggal_pinjam->format('d/m/Y') }}</td>
                <td>
                  <div style="font-weight:600">{{ $pinjam->nama_peminjam }}</div>
                  <div style="font-size:11px;color:var(--gray-500)">{{ $pinjam->jabatan }}</div>
                </td>
                <td>
                  <div style="font-weight:600">{{ $pinjam->barang->nama }} ({{ $pinjam->jumlah }} unit)</div>
                  <div style="font-size:11px;color:var(--gray-500)">{{ $pinjam->barang->kode_barang ?? '-' }}</div>
                </td>
                <td>{{ $pinjam->lokasi_selama_dipinjam }}</td>
                <td>
                  @if($pinjam->status == 'selesai')
                    <span style="color:#15803d;background:#dcfce7;padding:3px 8px;border-radius:4px;font-size:11px">Selesai</span>
                  @else
                    <span style="color:#b45309;background:#fef3c7;padding:3px 8px;border-radius:4px;font-size:11px">Dipinjam</span>
                  @endif
                </td>
                <td style="white-space:nowrap">
                  @if($pinjam->tanggal_dikembalikan)
                    {{ $pinjam->tanggal_dikembalikan->format('d/m/Y') }}
                  @else
                    <span style="color:var(--gray-400)">-</span>
                  @endif
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" style="text-align:center;color:var(--gray-500)">Tidak ada riwayat peminjaman.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
@endsection

@section('scripts')
<script>
  function printLaporan() {
    var originalTitle = document.title;
    document.title = 'Laporan_Inventaris_SMPN5_' + new Date().toISOString().slice(0,10);
    window.print();
    // Kembalikan title asli setelah print dialog tertutup/muncul
    setTimeout(function() {
      document.title = originalTitle;
    }, 1000);
  }
</script>
<style>
  .print-only { display: none; }
  .hidden-screen { display: none; }
  
  /* Styling khusus cetak */
  @media print {
    body { background: #fff !important; }
    .sidebar, .top-header, .no-print { display: none !important; }
    
    /* Show ALL tabs in print */
    .tab-content { display: block !important; margin-bottom: 50px !important; }
    .print-avoid-break { page-break-inside: avoid; }
    
    .print-only { display: block !important; }
    .main-content { margin-left: 0 !important; width: 100% !important; padding: 0 !important; margin-top: 0 !important; }
    .card { border: none !important; box-shadow: none !important; margin-top:10px !important;}
    .table-wrap { overflow: visible !important; }
    .inv-table { width: 100% !important; border-collapse: collapse !important; }
    .inv-table th, .inv-table td { border: 1px solid #000 !important; padding: 8px !important; color: #000 !important; }
    
    /* Paksa browser mencetak warna background */
    * {
      -webkit-print-color-adjust: exact !important;
      print-color-adjust: exact !important;
      color-adjust: exact !important;
    }
    .chart-bar-track { border: 1px solid #ccc !important; background: #e5e7eb !important; }
    .report-stat { border: 1px solid #000 !important; color: #000 !important; }
  }
</style>
@endsection
