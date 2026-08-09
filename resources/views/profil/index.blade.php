@extends('layouts.app')

@section('content')
<div class="panel" id="panel-profil" style="display: block;">
  <div class="page-title-row">
    <div>
      <h1>Profil Pengguna</h1>
      <p>Informasi akun dan petugas yang sedang aktif</p>
    </div>
  </div>

  <div class="profil-header">
    <div class="profil-avatar-big">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
    <div>
      <h2>{{ $user->name }}</h2>
      <p>{{ $user->jabatan ?? 'Petugas' }} &middot; {{ $user->unit_kerja ?? 'SMPN 5 Purbalingga' }}</p>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h3><i class="fas fa-id-card" style="color:var(--green-600);margin-right:8px"></i>Data Pengguna</h3>
      <button class="btn btn-sm btn-outline" onclick="openEditModal()">
        <i class="fas fa-pen"></i> Edit
      </button>
    </div>
    <div class="profil-info-card">
      <div class="profil-row">
        <span class="profil-row-label"><i class="fas fa-user"></i> Nama Lengkap</span>
        <span class="profil-row-value">{{ $user->name }}</span>
      </div>
      <div class="profil-row">
        <span class="profil-row-label"><i class="fas fa-at"></i> Username</span>
        <span class="profil-row-value">{{ $user->username }}</span>
      </div>
      <div class="profil-row">
        <span class="profil-row-label"><i class="fas fa-id-badge"></i> NIP</span>
        <span class="profil-row-value">{{ $user->nip ?? '-' }}</span>
      </div>
      <div class="profil-row">
        <span class="profil-row-label"><i class="fas fa-briefcase"></i> Jabatan</span>
        <span class="profil-row-value">{{ $user->jabatan ?? '-' }}</span>
      </div>
      <div class="profil-row">
        <span class="profil-row-label"><i class="fas fa-school"></i> Unit Kerja</span>
        <span class="profil-row-value">{{ $user->unit_kerja ?? '-' }}</span>
      </div>
      <div class="profil-row">
        <span class="profil-row-label"><i class="fas fa-phone"></i> No. Telepon</span>
        <span class="profil-row-value">{{ $user->no_telepon ?? '-' }}</span>
      </div>
      <div class="profil-row">
        <span class="profil-row-label"><i class="fas fa-shield"></i> Role Akses</span>
        <span class="profil-row-value">
          <span class="badge-kondisi badge-baik" style="font-size:13px">
            <i class="fas fa-check-circle"></i> {{ ucfirst($user->role) }}
          </span>
        </span>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Profil -->
<div id="modalEditProfil" class="modal-overlay">
  <div class="modal-box" style="max-width: 600px; padding: 20px; position:relative;">
    <button type="button" class="modal-close" style="background:#ef4444; color:white; z-index:10" onclick="closeEditModal()">&times;</button>
    <div class="modal-header" style="margin-bottom: 20px;">
      <h2>Edit Profil Pengguna</h2>
    </div>
    
    <!-- Tampilkan Error Validasi Jika Ada -->
    @if ($errors->any())
        <div style="background-color: #fee2e2; color: #b91c1c; padding: 12px; border-radius: 6px; margin-bottom: 16px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('profil.update') }}">
      @csrf
      @method('PUT')
      <div class="modal-body">
        
        <div style="display: grid; grid-template-columns: 1fr; gap: 16px; margin-bottom: 16px;">
          <div class="form-field">
            <label>Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
          </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
          <div class="form-field">
            <label>NIP</label>
            <input type="text" name="nip" value="{{ old('nip', $user->nip) }}">
          </div>
          <div class="form-field">
            <label>Jabatan</label>
            <input type="text" name="jabatan" value="{{ old('jabatan', $user->jabatan) }}">
          </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 24px;">
          <div class="form-field">
            <label>Unit Kerja</label>
            <input type="text" name="unit_kerja" value="{{ old('unit_kerja', $user->unit_kerja) }}">
          </div>
          <div class="form-field">
            <label>No. Telepon</label>
            <input type="text" name="no_telepon" value="{{ old('no_telepon', $user->no_telepon) }}">
          </div>
        </div>

        <hr style="border: 0; border-top: 1px solid var(--gray-200); margin-bottom: 20px;">
        <h4 style="margin-bottom: 16px; color: var(--gray-700);">Ubah Password (Opsional)</h4>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
          <div class="form-field">
            <label>Password Baru</label>
            <input type="password" name="password" placeholder="Biarkan kosong jika tidak diubah">
          </div>
          <div class="form-field">
            <label>Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" placeholder="Ulangi password baru">
          </div>
        </div>
        
      </div>
      <div class="modal-footer" style="display:flex; justify-content:flex-end; gap:12px; margin-top:24px;">
        <button type="button" class="btn btn-outline" onclick="closeEditModal()">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </div>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script>
  function openEditModal() {
    document.getElementById('modalEditProfil').classList.add('open');
  }
  function closeEditModal() {
    document.getElementById('modalEditProfil').classList.remove('open');
  }

  // Jika ada error validasi, otomatis buka modal
  @if ($errors->any())
    document.addEventListener("DOMContentLoaded", function() {
        openEditModal();
    });
  @endif
</script>
@endsection
