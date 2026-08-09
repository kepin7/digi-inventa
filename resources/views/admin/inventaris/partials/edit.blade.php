<div style="position:relative">
  <div style="background:linear-gradient(120deg,var(--green-900),var(--green-700));padding:22px 28px;border-radius:var(--radius-lg) var(--radius-lg) 0 0;display:flex;align-items:center;justify-content:space-between">
    <div>
      <h2 style="font-family:Sora,sans-serif;font-size:18px;font-weight:800;color:white;margin-bottom:3px"><i class="fas fa-pen" style="margin-right:8px"></i>Edit Barang</h2>
      <p style="font-size:13px;color:rgba(255,255,255,.7)">Perbarui informasi barang inventaris</p>
    </div>
    <button class="modal-close" style="position:static;background:rgba(255,255,255,.15)" onclick="closeEditModalBtn()"><i class="fas fa-xmark"></i></button>
  </div>
  <div style="padding:26px 28px; max-height:70vh; overflow-y:auto;">
    <form action="{{ route('admin.inventaris.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-grid">
        <div class="form-field">
          <label>Kode Inventaris</label>
          <input type="text" name="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}" placeholder="Contoh: 3.07.02.01.0001">
        </div>
        <div class="form-field">
          <label>Nama Barang *</label>
          <input type="text" name="nama" value="{{ old('nama', $barang->nama) }}" placeholder="Nama barang">
        </div>
        <div class="form-field">
          <label>Kategori *</label>
          <select name="kategori">
            <option value="">-- Pilih Kategori --</option>
            @foreach(['Elektronik','Mebel','Penghargaan','Olahraga','Alat Tulis','Buku','Lainnya'] as $kat)
            <option value="{{ $kat }}" {{ old('kategori', $barang->kategori) == $kat ? 'selected' : '' }}>{{ $kat }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-field">
          <label>Jenis Barang *</label>
          <select name="jenis_barang">
            <option value="">-- Pilih Jenis --</option>
            <option value="modal" {{ old('jenis_barang', $barang->jenis_barang) == 'modal' ? 'selected' : '' }}>Barang Modal</option>
            <option value="habis_pakai" {{ old('jenis_barang', $barang->jenis_barang) == 'habis_pakai' ? 'selected' : '' }}>Barang Habis Pakai</option>
          </select>
        </div>
        <div class="form-field">
          <label>Jumlah / Stok *</label>
          <input type="number" name="jumlah" value="{{ old('jumlah', $barang->jumlah ?? 1) }}" min="1" required>
        </div>
        <div class="form-field">
          <label>Merk</label>
          <input type="text" name="merk" value="{{ old('merk', $barang->merk) }}" placeholder="Contoh: ASUS VivoBook">
        </div>
        <div class="form-field">
          <label>Spesifikasi</label>
          <input type="text" name="spesifikasi" value="{{ old('spesifikasi', $barang->spesifikasi) }}" placeholder="Spesifikasi singkat">
        </div>
        <div class="form-field">
          <label>Tahun Perolehan *</label>
          <input type="number" name="tahun_perolehan" value="{{ old('tahun_perolehan', $barang->tahun_perolehan) }}" min="2000" max="2099">
        </div>
        <div class="form-field">
          <label>Harga Perolehan (Rp)</label>
          <input type="number" name="harga_perolehan" value="{{ old('harga_perolehan', $barang->harga_perolehan) }}" min="0" placeholder="0">
        </div>
        <div class="form-field">
          <label>Sumber Dana</label>
          <select name="sumber_dana">
            <option value="">-- Pilih Sumber Dana --</option>
            @foreach(['APBN','APBD','BOS','Non-APBD / Hadiah Lomba','Sumbangan','Swadaya Sekolah'] as $sd)
            <option value="{{ $sd }}" {{ old('sumber_dana', $barang->sumber_dana) == $sd ? 'selected' : '' }}>{{ $sd }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-field">
          <label>Kondisi *</label>
          <select name="kondisi">
            <option value="">-- Pilih Kondisi --</option>
            <option value="baik" {{ old('kondisi', $barang->kondisi) == 'baik' ? 'selected' : '' }}>Baik</option>
            <option value="perlu_perbaikan" {{ old('kondisi', $barang->kondisi) == 'perlu_perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
            <option value="rusak" {{ old('kondisi', $barang->kondisi) == 'rusak' ? 'selected' : '' }}>Rusak</option>
          </select>
        </div>
        <div class="form-field">
          <label>Status *</label>
          <select name="status">
            <option value="">-- Pilih Status --</option>
            <option value="tersedia" {{ old('status', $barang->status) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="dipinjam" {{ old('status', $barang->status) == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
            <option value="dihapus" {{ old('status', $barang->status) == 'dihapus' ? 'selected' : '' }}>Dihapus</option>
          </select>
        </div>
        <div class="form-field">
          <label>Tanggal Masuk *</label>
          <input type="date" name="tanggal_perolehan" value="{{ old('tanggal_perolehan', $barang->tanggal_perolehan) }}">
        </div>
        <div class="form-field">
          <label>Lokasi Penempatan *</label>
          <input type="text" name="lokasi_saat_ini" value="{{ old('lokasi_saat_ini', $barang->lokasi_saat_ini) }}" placeholder="Lokasi barang">
        </div>
        <div class="form-field full">
          <label>Deskripsi Detail</label>
          <textarea name="deskripsi" style="min-height:90px" placeholder="Deskripsi lengkap barang...">{{ old('deskripsi', $barang->deskripsi) }}</textarea>
        </div>
      </div>
      <p style="font-size:12px;color:var(--gray-400);margin-top:4px">Catatan: jika Lokasi Penempatan diubah, sistem otomatis menambahkan satu entri baru ke Riwayat Lokasi barang ini.</p>
      <div style="display:flex;gap:12px;margin-top:8px">
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-floppy-disk"></i> Simpan Perubahan
        </button>
        <button type="button" class="btn btn-outline" onclick="closeEditModalBtn()">Batal</button>
      </div>
    </form>
  </div>
</div>
