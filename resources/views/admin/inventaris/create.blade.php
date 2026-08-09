@extends('layouts.app')
@section('content')
<div class="panel active" id="panel-tambah">
        <div class="page-title-row">
          <div>
            <h1>Tambah Barang</h1>
            <p>Isi formulir berikut untuk menambahkan barang baru ke inventaris</p>
          </div>
          <a href="{{ route('admin.inventaris.index') }}" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Kembali
          </a>
        </div>

        <div class="card">
          <div class="card-header">
            <h3><i class="fas fa-file-pen" style="color:var(--green-600);margin-right:8px"></i>Formulir Data Barang</h3>
            <span style="font-size:12px;color:var(--gray-400)">* Wajib diisi</span>
          </div>
          
          @if ($errors->any())
            <div style="background: #fee2e2; color: #b91c1c; padding: 12px 16px; border-radius: 8px; margin: 0 24px 16px;">
              <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          
          <form action="{{ isset($barang) ? route('admin.inventaris.update', $barang->id) : route('admin.inventaris.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($barang))
              @method('PUT')
            @endif
          <div class="card-body">
            <div class="form-grid">
              <div class="form-field">
                <label>Kode Inventaris</label>
                <input type="text" id="tambahKodeInventaris" name="kode_barang" value="{{ old('kode_barang', $barang->kode_barang ?? '') }}" placeholder="Contoh: 3.07.02.01.0013">
              </div>
              <div class="form-field">
                <label>Nama Barang *</label>
                <input type="text" id="tambahNama" name="nama" value="{{ old('nama', $barang->nama ?? '') }}" placeholder="Contoh: Laptop ASUS VivoBook">
              </div>
              <div class="form-field">
                <label>Kategori *</label>
                <select id="tambahKategori" name="kategori">
                  <option value="">-- Pilih Kategori --</option>
                  <option>Elektronik</option>
                  <option>Mebel</option>
                  <option>Penghargaan</option>
                  <option>Olahraga</option>
                  <option>Alat Tulis</option>
                  <option>Buku</option>
                  <option>Lainnya</option>
                </select>
              </div>
              <div class="form-field">
                <label>Jenis Barang *</label>
                <select id="tambahJenisBarang" name="jenis_barang">
                  <option value="">-- Pilih Jenis --</option>
                  <option value="modal" {{ old('jenis_barang', $barang->jenis_barang ?? '') == 'modal' ? 'selected' : '' }}>Barang Modal</option>
                  <option value="habis_pakai" {{ old('jenis_barang', $barang->jenis_barang ?? '') == 'habis_pakai' ? 'selected' : '' }}>Barang Habis Pakai</option>
                </select>
              </div>
              <div class="form-field">
                <label>Jumlah / Stok *</label>
                <input type="number" id="tambahJumlah" name="jumlah" value="{{ old('jumlah', $barang->jumlah ?? 1) }}" min="1" required>
              </div>
              <div class="form-field">
                <label>Merk</label>
                <input type="text" id="tambahMerk" name="merk" value="{{ old('merk', $barang->merk ?? '') }}" placeholder="Contoh: ASUS VivoBook 14">
              </div>
              <div class="form-field">
                <label>Spesifikasi</label>
                <input type="text" id="tambahSpesifikasi" name="spesifikasi" value="{{ old('spesifikasi', $barang->spesifikasi ?? '') }}" placeholder="Spesifikasi singkat barang">
              </div>
              <div class="form-field">
                <label>Tahun Perolehan *</label>
                <input type="number" id="tambahTahun" name="tahun_perolehan" value="{{ old('tahun_perolehan', $barang->tahun_perolehan ?? '') }}" placeholder="2026" min="2000" max="2099">
              </div>
              <div class="form-field">
                <label>Harga Perolehan (Rp)</label>
                <input type="number" id="tambahHarga" name="harga_perolehan" value="{{ old('harga_perolehan', $barang->harga_perolehan ?? '') }}" min="0" placeholder="0">
              </div>
              <div class="form-field">
                <label>Sumber Dana</label>
                <select id="tambahSumberDana" name="sumber_dana">
                  <option value="">-- Pilih Sumber Dana --</option>
                  <option>APBN</option>
                  <option>APBD</option>
                  <option>BOS</option>
                  <option>Non-APBD / Hadiah Lomba</option>
                  <option>Sumbangan</option>
                  <option>Swadaya Sekolah</option>
                </select>
              </div>
              <div class="form-field">
                <label>Kondisi *</label>
                <select id="tambahKondisi" name="kondisi">
                  <option value="">-- Pilih Kondisi --</option>
                  <option value="baik" {{ old('kondisi', $barang->kondisi ?? '') == 'baik' ? 'selected' : '' }}>Baik</option>
                  <option value="perlu_perbaikan" {{ old('kondisi', $barang->kondisi ?? '') == 'perlu_perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
                  <option value="rusak" {{ old('kondisi', $barang->kondisi ?? '') == 'rusak' ? 'selected' : '' }}>Rusak</option>
                </select>
              </div>
              <div class="form-field">
                <label>Status *</label>
                <select id="tambahStatus" name="status">
                  <option value="tersedia" {{ old('status', $barang->status ?? '') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                  <option value="dipinjam" {{ old('status', $barang->status ?? '') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                  <option value="dihapus" {{ old('status', $barang->status ?? '') == 'dihapus' ? 'selected' : '' }}>Dihapus</option>
                </select>
              </div>
              <div class="form-field">
                <label>Tanggal Masuk *</label>
                <input type="date" id="tambahTanggal" name="tanggal_perolehan" value="{{ old('tanggal_perolehan', $barang->tanggal_perolehan ?? '') }}">
              </div>
              <div class="form-field">
                <label>Lokasi Penempatan *</label>
                <input type="text" id="tambahLokasi" name="lokasi_saat_ini" value="{{ old('lokasi_saat_ini', $barang->lokasi_saat_ini ?? '') }}" placeholder="Contoh: Ruang Guru, Lab Komputer">
              </div>

              <div class="form-field full">
                <label>Deskripsi Detail</label>
                <textarea id="tambahDeskripsi" name="deskripsi" placeholder="Tuliskan deskripsi lengkap barang termasuk merek, spesifikasi, asal perolehan, atau catatan penting lainnya...">{{ old('deskripsi', $barang->deskripsi ?? '') }}</textarea>
              </div>
              <div class="form-field full">
                <label>Upload Gambar Barang</label>
                <div class="upload-zone" onclick="alert('Fitur upload gambar aktif pada versi penuh.')">
                  <i class="fas fa-cloud-arrow-up"></i>
                  <p>Klik untuk memilih gambar atau drag &amp; drop</p>
                  <small>Format: JPG, PNG, WEBP — Maks. 2MB</small>
                </div>
              </div>
            </div>

            <div style="display:flex;gap:12px;margin-top:10px">
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-floppy-disk"></i> Simpan Barang
              </button>
              <a href="{{ route('admin.inventaris.index') }}" class="btn btn-outline">Batal</a>
            </div>
          </div>
          </form>
  </div>
</div>
@endsection