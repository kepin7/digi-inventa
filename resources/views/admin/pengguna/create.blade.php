@extends('layouts.app')
@section('content')
<div class="panel active">
    <div class="page-title-row">
        <div>
            <h1><i class="fas {{ isset($user) ? 'fa-user-pen' : 'fa-user-plus' }}" style="color:var(--green-600);margin-right:8px"></i>{{ isset($user) ? 'Edit Akun Guru' : 'Tambah Akun Guru' }}</h1>
            <p>Lengkapi formulir di bawah ini untuk {{ isset($user) ? 'mengubah data akun guru' : 'membuat akun guru baru' }}</p>
        </div>
        <a href="{{ route('admin.pengguna.index') }}" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    @if($errors->any())
    <div class="alert alert-danger" style="margin-bottom: 20px; background: #fee2e2; color: #dc2626; padding: 12px 16px; border-radius: 6px; border-left: 4px solid #ef4444;">
        <ul style="margin:0; padding-left:20px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ isset($user) ? route('admin.pengguna.update', $user->id) : route('admin.pengguna.store') }}" method="POST">
                @csrf
                @if(isset($user))
                    @method('PUT')
                @endif
                
                <div class="form-grid" style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                    <!-- Informasi Pribadi -->
                    <div style="grid-column: 1 / -1; margin-bottom: -10px;">
                        <h4 style="font-size: 14px; font-weight: 700; color: var(--green-700); border-bottom: 2px solid var(--green-100); padding-bottom: 8px;"><i class="fas fa-id-card" style="margin-right:6px"></i>Informasi Pribadi</h4>
                    </div>

                    <div class="form-field">
                        <label>Nama Lengkap <span style="color:#ef4444">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" placeholder="Contoh: Budi Santoso, S.Pd" required>
                    </div>

                    <div class="form-field">
                        <label>NIP (Opsional)</label>
                        <input type="text" name="nip" value="{{ old('nip', $user->nip ?? '') }}" placeholder="Masukkan NIP guru">
                    </div>

                    <div class="form-field">
                        <label>Jabatan (Opsional)</label>
                        <input type="text" name="jabatan" value="{{ old('jabatan', $user->jabatan ?? '') }}" placeholder="Contoh: Guru Wali Kelas">
                    </div>

                    <div class="form-field">
                        <label>No. Telepon (Opsional)</label>
                        <input type="text" name="no_telepon" value="{{ old('no_telepon', $user->no_telepon ?? '') }}" placeholder="Contoh: 08123456789">
                    </div>

                    <!-- Informasi Akun -->
                    <div style="grid-column: 1 / -1; margin-bottom: -10px; margin-top: 10px;">
                        <h4 style="font-size: 14px; font-weight: 700; color: var(--green-700); border-bottom: 2px solid var(--green-100); padding-bottom: 8px;"><i class="fas fa-key" style="margin-right:6px"></i>Informasi Login</h4>
                    </div>

                    <div class="form-field">
                        <label>Username <span style="color:#ef4444">*</span></label>
                        <input type="text" name="username" value="{{ old('username', $user->username ?? '') }}" placeholder="Contoh: budi.santoso" required>
                    </div>

                    <div class="form-field">
                        <label>Password {!! isset($user) ? '(Kosongkan jika tidak ingin diubah)' : '<span style="color:#ef4444">*</span>' !!}</label>
                        <input type="password" name="password" placeholder="Masukkan password" {{ isset($user) ? '' : 'required' }}>
                        @if(isset($user))
                            <small style="color:var(--gray-500); font-size:11px; margin-top:4px; display:block;">Hanya isi jika ingin mereset/mengganti password guru.</small>
                        @endif
                    </div>
                </div>

                <div style="margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--gray-200); display: flex; justify-content: flex-end; gap: 12px;">
                    <a href="{{ route('admin.pengguna.index') }}" class="btn btn-outline">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> {{ isset($user) ? 'Simpan Perubahan' : 'Buat Akun' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
