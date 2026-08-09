<div style="position:relative">
  <div style="background:linear-gradient(120deg,var(--green-900),var(--green-700));padding:22px 28px;border-radius:var(--radius-lg) var(--radius-lg) 0 0;display:flex;align-items:center;justify-content:space-between">
    <div>
      <h2 style="font-family:Sora,sans-serif;font-size:18px;font-weight:800;color:white;margin-bottom:3px"><i class="fas fa-check-circle" style="margin-right:8px"></i>Selesaikan Peminjaman</h2>
      <p style="font-size:13px;color:rgba(255,255,255,.7)">Catat pengembalian barang ini ke inventaris</p>
    </div>
    <button class="modal-close" type="button" style="position:static;background:rgba(255,255,255,.15)" onclick="closeSelesaikanModalBtn()"><i class="fas fa-xmark"></i></button>
  </div>
  
  <form action="{{ route('admin.peminjaman.selesaikan', $peminjaman->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="padding:26px 28px">
      
      <!-- Info Singkat -->
      <div style="background:#f8fafc;border:1px solid #e2e8f0;padding:16px;border-radius:8px;margin-bottom:20px;display:flex;align-items:center;gap:16px">
        <div style="width:40px;height:40px;background:#e0f2fe;color:#0284c7;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:18px">
          <i class="fas fa-box"></i>
        </div>
        <div>
          <div style="font-size:13px;color:var(--gray-500);margin-bottom:2px">Barang yang dikembalikan:</div>
          <div style="font-weight:700;color:var(--gray-900)">{{ $peminjaman->barang->nama }}</div>
          <div style="font-size:12px;color:var(--gray-500)">Oleh: {{ $peminjaman->nama_peminjam }}</div>
        </div>
      </div>

      <div class="form-grid">
        <div class="form-field full" style="background:#fff;padding:12px 16px;border:1px solid var(--gray-200);border-radius:6px;display:flex;align-items:center;gap:10px">
          <input type="checkbox" name="kembalikan_stok" id="kembalikan_stok" value="1" checked style="width:18px;height:18px;accent-color:var(--green-600);cursor:pointer">
          <label for="kembalikan_stok" style="margin:0;cursor:pointer;font-weight:600;color:var(--gray-800)">
            Kembalikan <span style="color:var(--green-600)">{{ $peminjaman->jumlah }} unit</span> stok ke inventaris
            <div style="font-size:12px;color:var(--gray-500);font-weight:400;margin-top:2px">Hilangkan centang jika barang ini adalah barang habis pakai yang sudah tidak bisa dikembalikan (misal: kertas/spidol).</div>
          </label>
        </div>

        <div class="form-field full">
          <label>Catatan Pengembalian (Opsional)</label>
          <textarea name="catatan_pengembalian" rows="3" placeholder="Contoh: Barang dikembalikan dalam keadaan baik dan lengkap."></textarea>
        </div>
        
        <div class="form-field full">
          <label>Foto Bukti Pengembalian (Opsional)</label>
          <input type="file" name="foto_bukti_pengembalian" accept="image/*" class="form-control" style="padding:8px;border:1px solid var(--gray-300);border-radius:6px;width:100%">
          <small style="color:var(--gray-500);display:block;margin-top:6px">Format: JPG, PNG, WEBP (Max 2MB). Boleh dikosongkan jika tidak ada foto.</small>
        </div>
      </div>
      
      <div style="display:flex;gap:12px;margin-top:24px;justify-content:flex-end">
        <button type="button" class="btn btn-outline" onclick="closeSelesaikanModalBtn()">Batal</button>
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-check"></i> Konfirmasi Selesai
        </button>
      </div>
    </div>
  </form>
</div>
