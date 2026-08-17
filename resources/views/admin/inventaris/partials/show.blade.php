@php
    $statusClass = $barang->status === 'tersedia' ? 'badge-tersedia' : ($barang->status === 'dipinjam' ? 'badge-dipinjam' : 'badge-dihapus');
    $statusIcon  = $barang->status === 'tersedia' ? 'fa-circle-check' : ($barang->status === 'dipinjam' ? 'fa-right-left' : 'fa-trash-can');
    $statusLabel = ucfirst($barang->status);
    $kondisiClass = $barang->kondisi === 'baik' ? 'badge-baik' : ($barang->kondisi === 'rusak' ? 'badge-rusak' : 'badge-perlu');
    $kondisiIcon  = $barang->kondisi === 'baik' ? 'fa-circle-check' : ($barang->kondisi === 'rusak' ? 'fa-circle-xmark' : 'fa-wrench');
    $kondisiLabel = $barang->kondisi === 'perlu_perbaikan' ? 'Perlu Perbaikan' : ucfirst($barang->kondisi);
@endphp

<div style="position:relative">
  <!-- Hero area -->
  <div class="detail-hero">
    @if($barang->gambar)
      <img src="{{ Storage::url($barang->gambar) }}" alt="{{ $barang->nama }}" class="detail-hero-img" />
    @else
      <div class="detail-hero-img" style="display:flex;align-items:center;justify-content:center;font-size:52px;color:rgba(255,255,255,.25);background:rgba(0,0,0,.12);border-radius:var(--radius-md);border:3px solid rgba(255,255,255,.2);flex-shrink:0">
        <i class="fas fa-box-open"></i>
      </div>
    @endif
    <div class="detail-hero-info">
      <span style="display:inline-block;font-size:11px;font-weight:700;letter-spacing:1px;text-transform:uppercase;background:rgba(255,255,255,.15);color:rgba(255,255,255,.85);padding:3px 10px;border-radius:99px;margin-bottom:10px">
        {{ $barang->kategori }} · {{ ucfirst(str_replace('_', ' ', $barang->jenis_barang)) }}
      </span>
      <h1>{{ $barang->nama }}</h1>
      <p>{{ $barang->deskripsi ?? '-' }}</p>
      <span class="badge-kondisi {{ $kondisiClass }}">
        <i class="fas {{ $kondisiIcon }}"></i> {{ $kondisiLabel }}
      </span>
      <span class="badge-kondisi {{ $statusClass }}" style="margin-left:6px">
        <i class="fas {{ $statusIcon }}"></i> {{ $statusLabel }}
      </span>
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
        <div class="label">Jumlah / Stok</div>
        <div class="value" style="font-weight:700;color:var(--green-700)">{{ $barang->jumlah }}</div>
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
          <span class="badge-kondisi {{ $kondisiClass }}">
            <i class="fas {{ $kondisiIcon }}"></i> {{ $kondisiLabel }}
          </span>
        </div>
      </div>
      <div class="detail-info-item">
        <div class="label">Status</div>
        <div class="value">
          <span class="badge-kondisi {{ $statusClass }}">
            <i class="fas {{ $statusIcon }}"></i> {{ $statusLabel }}
          </span>
        </div>
      </div>
      <div class="detail-info-item">
        <div class="label">Lokasi Saat Ini</div>
        <div class="value"><i class="fas fa-location-dot" style="color:var(--green-500);margin-right:5px"></i>{{ $barang->lokasi_saat_ini ?? '-' }}</div>
      </div>
    </div>
    
    @php
      $activeLoans = $barang->peminjaman()->where('status', 'disetujui')->get();
    @endphp
    
    @if($activeLoans->count() > 0)
    <div style="margin-top: 24px; padding: 16px; background: #fffbeb; border: 1px solid #fde68a; border-radius: 8px;">
      <h4 style="font-size: 13px; font-weight: 700; color: #b45309; margin-bottom: 10px; display: flex; align-items: center;">
        <i class="fas fa-boxes-stacked" style="margin-right: 6px;"></i> Barang Sedang Dipinjam
      </h4>
      <div style="display: flex; flex-direction: column; gap: 8px;">
        @foreach($activeLoans as $loan)
        <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 8px; border-bottom: 1px solid #fef3c7;">
          <div>
            <div style="font-weight: 600; font-size: 13px; color: #92400e;">{{ $loan->lokasi_selama_dipinjam }}</div>
            <div style="font-size: 11px; color: #b45309;">Oleh: {{ $loan->nama_peminjam }} (Pinjam: {{ $loan->tanggal_pinjam->format('d/m/Y') }})</div>
          </div>
          <div style="font-weight: 700; color: #b45309; background: #fef3c7; padding: 4px 8px; border-radius: 4px; font-size: 12px;">
            {{ $loan->jumlah }} unit
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @endif


    <h3 style="font-family:Sora,sans-serif;font-size:15px;font-weight:700;margin:24px 0 12px">
      <i class="fas fa-route" style="color:var(--green-600);margin-right:8px"></i>Riwayat Lokasi
    </h3>
    
    @if($barang->riwayatLokasi && $barang->riwayatLokasi->count() > 0)
      <div style="border-left: 2px solid var(--gray-200); padding-left: 16px; margin-left: 8px;">
        @foreach($barang->riwayatLokasi()->latest('tanggal')->get() as $riwayat)
          <div style="position: relative; margin-bottom: 16px;">
            <div style="position: absolute; left: -25px; top: 2px; width: 16px; height: 16px; border-radius: 50%; background: var(--white); border: 4px solid var(--green-500);"></div>
            <div style="font-weight: 700; font-size: 13px; color: var(--gray-800);">{{ $riwayat->lokasi }}</div>
            <div style="font-size: 11px; color: var(--gray-500); margin-bottom: 4px;">{{ \Carbon\Carbon::parse($riwayat->tanggal)->translatedFormat('d F Y') }} &bull; {{ $riwayat->user->name ?? 'Sistem' }}</div>
            <div style="font-size: 12px; color: var(--gray-600);">{{ $riwayat->catatan ?? '-' }}</div>
          </div>
        @endforeach
      </div>
    @else
      <p style="font-size:13px;color:var(--gray-400)">Belum ada riwayat lokasi tercatat.</p>
    @endif

    <div style="display:flex;gap:10px;margin-top:22px;flex-wrap:wrap">
      <button class="btn btn-primary" onclick="window.open('{{ route('admin.inventaris.printLabel', $barang->id) }}', '_blank')">
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
