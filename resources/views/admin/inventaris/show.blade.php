@if(!request()->ajax() && !request()->has('ajax'))
@extends('layouts.app')
@section('content')
<div class="panel active">
<div class="card">
@endif

    <div style="position:relative">
      <!-- Hero area -->
      <div class="detail-hero">
        <img src="{{ Storage::url($barang->gambar) }}" alt="{{ $barang->nama }}" class="detail-hero-img" />
        <div class="detail-hero-info">
          <span style="display:inline-block;font-size:11px;font-weight:700;letter-spacing:1px;text-transform:uppercase;background:rgba(255,255,255,.15);color:rgba(255,255,255,.85);padding:3px 10px;border-radius:99px;margin-bottom:10px">
            {{ $barang->kategori }} · {{ ucfirst(str_replace('_', ' ', $barang->jenis_barang)) }}
          </span>
          <h1>{{ $barang->nama }}</h1>
          <p>{{ $barang->deskripsi ?? '-' }}</p>
          <span class="badge-kondisi {{ $barang->kondisi == 'baik' ? 'bg-green-100 text-green-800' : ($barang->kondisi == 'rusak' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
            <i class="fas {{ $barang->kondisi == 'baik' ? 'fa-circle-check' : ($barang->kondisi == 'rusak' ? 'fa-circle-xmark' : 'fa-wrench') }}"></i> {{ $barang->kondisi == 'perlu_perbaikan' ? 'Perlu Perbaikan' : ucfirst($barang->kondisi) }}
          </span>
          <span class="badge {{ $barang->status == 'tersedia' ? 'bg-green-100 text-green-800' : ($barang->status == 'dipinjam' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">{{ ucfirst($barang->status) }}</span>
        </div>
        <button class="modal-close" onclick="closeModalBtn()"><i class="fas fa-xmark"></i></button>
      </div>

      <!-- Info grid -->
      <div style="padding:22px">
        <h3 style="font-family:Sora,sans-serif;font-size:15px;font-weight:700;margin-bottom:16px">
          <i class="fas fa-circle-info" style="color:var(--green-600);margin-right:8px"></i>Informasi Detail
        </h3>
        <div class="detail-info-grid">
          <div class="detail-info-item">
            <div class="label">ID Barang</div>
            <div class="value">{{ str_pad($barang->id, 3, '0', STR_PAD_LEFT) }}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Kode Inventaris</div>
            <div class="value">{{ $barang->kode_barang ?? '-' }}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Kategori</div>
            <div class="value">{{ $barang->kategori }}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Jenis Barang</div>
            <div class="value">{{ ucfirst(str_replace('_', ' ', $barang->jenis_barang)) }}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Merk</div>
            <div class="value">{{ $barang->merk ?? '-' }}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Spesifikasi</div>
            <div class="value">{{ $barang->spesifikasi ?? '-' }}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Tahun Perolehan</div>
            <div class="value">{{ $barang->tahun_perolehan ?? '-' }}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Harga Perolehan</div>
            <div class="value">{{ $barang->harga_perolehan ? 'Rp ' . number_format($barang->harga_perolehan, 0, ',', '.') : '-' }}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Sumber Dana</div>
            <div class="value">{{ $barang->sumber_dana ?? '-' }}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Tanggal Masuk</div>
            <div class="value">{{ $barang->tanggal_perolehan ? \Carbon\Carbon::parse($barang->tanggal_perolehan)->translatedFormat('d F Y') : '-' }}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Kondisi</div>
            <div class="value">
              <span class="badge-kondisi {{ $barang->kondisi == 'baik' ? 'bg-green-100 text-green-800' : ($barang->kondisi == 'rusak' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                <i class="fas {{ $barang->kondisi == 'baik' ? 'fa-circle-check' : ($barang->kondisi == 'rusak' ? 'fa-circle-xmark' : 'fa-wrench') }}"></i> {{ $barang->kondisi == 'perlu_perbaikan' ? 'Perlu Perbaikan' : ucfirst($barang->kondisi) }}
              </span>
            </div>
          </div>
          <div class="detail-info-item">
            <div class="label">Status</div>
            <div class="value"><span class="badge {{ $barang->status == 'tersedia' ? 'bg-green-100 text-green-800' : ($barang->status == 'dipinjam' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">{{ ucfirst($barang->status) }}</span></div>
          </div>
          <div class="detail-info-item">
            <div class="label">Lokasi Saat Ini</div>
            <div class="value"><i class="fas fa-location-dot" style="color:var(--green-500);margin-right:5px"></i>{{ $barang->lokasi_saat_ini ?? '-' }}</div>
          </div>
        </div>

        <h3 style="font-family:Sora,sans-serif;font-size:15px;font-weight:700;margin:24px 0 4px">
          <i class="fas fa-route" style="color:var(--green-600);margin-right:8px"></i>Riwayat Lokasi
        </h3>
        <p style="font-size:13px;color:var(--gray-400)">Belum ada riwayat lokasi tercatat.</p>

        <div style="display:flex;gap:10px;margin-top:22px;flex-wrap:wrap">
          <button class="btn btn-primary" onclick="alert('Cetak label tersedia pada versi penuh.')">
            <i class="fas fa-print"></i> Cetak Label
          </button>
          <button class="btn btn-outline" onclick="closeModalBtn();openEdit('{{ route('admin.inventaris.edit', $barang->id) }}')">
            <i class="fas fa-pen"></i> Edit Barang
          </button>
          <button class="btn btn-danger" onclick="closeModalBtn()">
            <i class="fas fa-xmark"></i> Tutup
          </button>
        </div>
      </div>
    </div>
  
@if(!request()->ajax() && !request()->has('ajax'))
</div>
</div>
@endsection
@endif