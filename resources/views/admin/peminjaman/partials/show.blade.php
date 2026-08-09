<div style="position:relative">
  <div style="background:linear-gradient(120deg,var(--blue-900),var(--blue-700));padding:22px 28px;border-radius:var(--radius-lg) var(--radius-lg) 0 0;display:flex;align-items:center;justify-content:space-between">
    <div>
      <h2 style="font-family:Sora,sans-serif;font-size:18px;font-weight:800;color:white;margin-bottom:3px"><i class="fas fa-file-invoice" style="margin-right:8px"></i>Detail Peminjaman</h2>
      <p style="font-size:13px;color:rgba(255,255,255,.7)">Informasi lengkap transaksi peminjaman barang</p>
    </div>
    <button class="modal-close" style="position:static;background:rgba(255,255,255,.15)" onclick="closeModalBtn()"><i class="fas fa-xmark"></i></button>
  </div>
  
  <div style="padding:26px 28px">
    <div style="display:flex;gap:20px;flex-wrap:wrap">
      
      <!-- Peminjam Info -->
      <div style="flex:1;min-width:250px;background:var(--gray-50);padding:16px;border-radius:var(--radius-md);border:1px solid var(--gray-200)">
        <h4 style="font-size:12px;text-transform:uppercase;color:var(--gray-500);letter-spacing:1px;margin-bottom:12px">Informasi Peminjam</h4>
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px">
          <div style="width:48px;height:48px;border-radius:50%;background:var(--green-100);color:var(--green-700);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:20px">
            {{ strtoupper(substr($peminjaman->nama_peminjam, 0, 1)) }}
          </div>
          <div>
            <div style="font-weight:700;color:var(--gray-900)">{{ $peminjaman->nama_peminjam }}</div>
            <div style="font-size:13px;color:var(--gray-500)">{{ $peminjaman->guru_kelas }} &bull; {{ $peminjaman->jabatan }}</div>
          </div>
        </div>
        <div style="font-size:13px;color:var(--gray-700)">
          <div style="margin-bottom:6px"><strong>Lokasi Digunakan:</strong> <br>{{ $peminjaman->lokasi_selama_dipinjam }}</div>
        </div>
      </div>
      
      <!-- Barang Info -->
      <div style="flex:1;min-width:250px;background:var(--gray-50);padding:16px;border-radius:var(--radius-md);border:1px solid var(--gray-200)">
        <h4 style="font-size:12px;text-transform:uppercase;color:var(--gray-500);letter-spacing:1px;margin-bottom:12px">Informasi Barang</h4>
        <div style="font-weight:700;color:var(--gray-900);font-size:16px;margin-bottom:4px">{{ $peminjaman->barang->nama }}</div>
        <div style="font-size:13px;color:var(--gray-500);margin-bottom:12px">{{ $peminjaman->barang->kode_barang ?? $peminjaman->barang->id }}</div>
        
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;font-size:13px">
          <div>
            <div style="color:var(--gray-500);margin-bottom:2px">Kondisi</div>
            <div style="font-weight:600">{{ ucfirst($peminjaman->barang->kondisi) }}</div>
          </div>
          <div>
            <div style="color:var(--gray-500);margin-bottom:2px">Kategori</div>
            <div style="font-weight:600">{{ $peminjaman->barang->kategori ?? '-' }}</div>
          </div>
          <div>
            <div style="color:var(--gray-500);margin-bottom:2px">Jumlah Pinjam</div>
            <div style="font-weight:700;color:var(--green-700)">{{ $peminjaman->jumlah }} Unit</div>
          </div>
        </div>
      </div>

    </div>

    <div style="margin-top:24px;border-top:1px solid var(--gray-200);padding-top:20px">
      <h4 style="font-size:14px;font-weight:700;color:var(--gray-900);margin-bottom:16px">Status Transaksi</h4>
      
      <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(180px, 1fr));gap:16px">
        <div>
          <div style="font-size:12px;color:var(--gray-500);margin-bottom:4px">Status Saat Ini</div>
          @php
            $statusClass = $peminjaman->status === 'disetujui' ? 'badge-dipinjam' : 'badge-selesai';
            $statusIcon = $peminjaman->status === 'disetujui' ? 'fa-right-left' : 'fa-circle-check';
            $statusLabel = $peminjaman->status === 'disetujui' ? 'Dipinjam' : 'Selesai';
          @endphp
          <span class="badge-kondisi {{ $statusClass }}">
            <i class="fas {{ $statusIcon }}"></i> {{ $statusLabel }}
          </span>
        </div>
        
        <div>
          <div style="font-size:12px;color:var(--gray-500);margin-bottom:4px">Tanggal Pinjam</div>
          <div style="font-weight:600;font-size:14px;color:var(--gray-800)">{{ $peminjaman->tanggal_pinjam->format('d/m/Y') }}</div>
        </div>
        
        <div>
          <div style="font-size:12px;color:var(--gray-500);margin-bottom:4px">Rencana Kembali</div>
          <div style="font-weight:600;font-size:14px;color:var(--gray-800)">{{ $peminjaman->tanggal_rencana_kembali->format('d/m/Y') }}</div>
        </div>

        <div>
          <div style="font-size:12px;color:var(--gray-500);margin-bottom:4px">Disetujui Oleh</div>
          <div style="font-weight:600;font-size:14px;color:var(--gray-800)">{{ $peminjaman->penyetuju->name ?? 'Admin' }}</div>
        </div>
      </div>
      
      @if($peminjaman->status === 'selesai')
      <div style="margin-top:20px;background:#f0fdf4;border:1px solid #bbf7d0;padding:16px;border-radius:8px">
        <h4 style="font-size:13px;font-weight:700;color:#166534;margin-bottom:12px"><i class="fas fa-check-circle" style="margin-right:6px"></i>Informasi Pengembalian</h4>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;font-size:13px">
          <div>
            <div style="color:#15803d;margin-bottom:2px">Tanggal Dikembalikan</div>
            <div style="font-weight:600;color:#14532d">{{ $peminjaman->tanggal_dikembalikan ? $peminjaman->tanggal_dikembalikan->format('d/m/Y H:i') : '-' }}</div>
          </div>
          <div>
            <div style="color:#15803d;margin-bottom:2px">Catatan Pengembalian</div>
            <div style="font-weight:600;color:#14532d">{{ $peminjaman->catatan_pengembalian ?: 'Tidak ada catatan.' }}</div>
          </div>
        </div>
        
        @if($peminjaman->foto_bukti_pengembalian)
          <div style="margin-top:12px">
            <div style="color:#15803d;margin-bottom:6px;font-size:13px">Bukti Foto:</div>
            <img src="{{ asset('storage/' . $peminjaman->foto_bukti_pengembalian) }}" alt="Bukti" style="max-width:100%;height:auto;border-radius:4px;border:1px solid #bbf7d0;max-height:200px">
          </div>
        @endif
      </div>
      @endif

    </div>
    
    <div style="display:flex;justify-content:flex-end;margin-top:24px">
      <button class="btn btn-outline" onclick="closeModalBtn()">Tutup</button>
    </div>
  </div>
</div>
