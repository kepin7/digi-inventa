@extends('layouts.app')

@section('content')
<div class="panel active" id="panel-tambah-peminjaman">
  <div class="page-title-row">
    <div>
      <h1>Ajukan Peminjaman</h1>
      <p>Isi formulir berikut untuk mencatat peminjaman barang inventaris</p>
    </div>
    <a href="{{ route('admin.peminjaman.index') }}" class="btn btn-outline">
      <i class="fas fa-arrow-left"></i> Kembali
    </a>
  </div>

  <div class="card">
    <div class="card-header">
      <h3><i class="fas fa-right-left" style="color:var(--green-600);margin-right:8px"></i>Formulir Pengajuan Peminjaman</h3>
      <span style="font-size:12px;color:var(--gray-400)">* Wajib diisi</span>
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div style="background: #fee2e2; color: #b91c1c; padding: 16px; border-radius: 8px; margin-bottom: 24px;">
          <ul style="margin: 0; padding-left: 20px;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      
      @if (session('error'))
        <div style="background: #fee2e2; color: #b91c1c; padding: 16px; border-radius: 8px; margin-bottom: 24px;">
          {{ session('error') }}
        </div>
      @endif

      <form action="{{ route('admin.peminjaman.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-grid">
          <div class="form-field">
            <label>Nama Peminjam *</label>
            <input type="text" name="nama_peminjam" value="{{ old('nama_peminjam') }}" placeholder="Contoh: Bpk. Andi Nugroho, S.Pd." required>
          </div>

          <div class="form-field">
            <label>Guru / Kelas *</label>
            <input type="text" name="guru_kelas" value="{{ old('guru_kelas') }}" placeholder="Contoh: Guru Kelas 8B / Guru Matematika" required>
          </div>

          <div class="form-field">
            <label>Jabatan *</label>
            <select name="jabatan" required>
              <option value="">-- Pilih Jabatan --</option>
              <option value="Guru Kelas" {{ old('jabatan') == 'Guru Kelas' ? 'selected' : '' }}>Guru Kelas</option>
              <option value="Guru Mata Pelajaran" {{ old('jabatan') == 'Guru Mata Pelajaran' ? 'selected' : '' }}>Guru Mata Pelajaran</option>
              <option value="Staf Tata Usaha" {{ old('jabatan') == 'Staf Tata Usaha' ? 'selected' : '' }}>Staf Tata Usaha</option>
              <option value="Kepala Sekolah" {{ old('jabatan') == 'Kepala Sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
              <option value="Lainnya" {{ old('jabatan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
          </div>
          
          <div class="form-field">
            <label>Barang yang Dipinjam *</label>
            <select name="barang_id" required>
              <option value="">-- Pilih Barang Tersedia --</option>
              @foreach($barangs as $barang)
                <option value="{{ $barang->id }}" {{ old('barang_id') == $barang->id ? 'selected' : '' }}>{{ $barang->nama }} ({{ $barang->kode_barang }})</option>
              @endforeach
            </select>
          </div>
          
          <div class="form-field">
            <label>Jumlah yang Dipinjam *</label>
            <input type="number" name="jumlah" value="{{ old('jumlah', 1) }}" min="1" required>
          </div>
          
          <div class="form-field">
            <label>Tanggal Pinjam *</label>
            <input type="date" name="tanggal_pinjam" value="{{ old('tanggal_pinjam', date('Y-m-d')) }}" required>
          </div>
          
          <div class="form-field">
            <label>Sampai Kapan (Rencana Kembali) *</label>
            <input type="date" name="tanggal_rencana_kembali" value="{{ old('tanggal_rencana_kembali') }}" required>
          </div>
          
          <div class="form-field full">
            <label>Lokasi Selama Dipinjam *</label>
            <input type="text" name="lokasi_selama_dipinjam" value="{{ old('lokasi_selama_dipinjam') }}" placeholder="Contoh: Ruang Kelas 8B atau Dibawa ke Luar Kota" required>
          </div>
          
          <div class="form-field full">
            <label>Bukti Foto Peminjaman *</label>
            <div class="upload-zone" onclick="document.getElementById('fileInput').click()" style="cursor: pointer;">
                <i class="fas fa-cloud-arrow-up"></i>
                <p>Klik untuk memilih gambar atau drag &amp; drop</p>
                <small>Format: JPG, PNG, WEBP — Maks. 2MB</small>
                <input type="file" name="foto_peminjam" id="fileInput" accept="image/*" required style="display: none;" onchange="previewImage(event)">
            </div>
            <div id="imagePreview" style="margin-top:12px; display:none;">
                <img id="imgPreviewTag" style="max-height:150px; border-radius:8px; border:1px solid var(--gray-200);">
            </div>
          </div>
        </div>
        
        <div style="display:flex;gap:12px;margin-top:24px">
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-floppy-disk"></i> Simpan Peminjaman
          </button>
          <a href="{{ route('admin.peminjaman.index') }}" class="btn btn-outline">Batal</a>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
      const preview = document.getElementById('imagePreview');
      const img = document.getElementById('imgPreviewTag');
      img.src = reader.result;
      preview.style.display = 'block';
    };
    if (event.target.files[0]) {
      reader.readAsDataURL(event.target.files[0]);
    }
  }
</script>

@endsection
