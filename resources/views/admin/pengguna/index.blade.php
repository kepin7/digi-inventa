@extends('layouts.app')
@section('content')
<div class="panel active">
    <div class="page-title-row">
        <div>
            <h1><i class="fas fa-users" style="color:var(--green-600);margin-right:8px"></i>Kelola Pengguna (Guru)</h1>
            <p>Manajemen akun akses untuk Guru</p>
        </div>
        <a href="{{ route('admin.pengguna.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Akun Guru
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success" style="margin-bottom: 20px; background: #dcfce7; color: #15803d; padding: 12px 16px; border-radius: 6px; border-left: 4px solid #16a34a;">
        <i class="fas fa-circle-check"></i> {{ session('success') }}
    </div>
    @endif
    
    @if(session('error'))
    <div class="alert alert-danger" style="margin-bottom: 20px; background: #fee2e2; color: #dc2626; padding: 12px 16px; border-radius: 6px; border-left: 4px solid #ef4444;">
        <i class="fas fa-circle-xmark"></i> {{ session('error') }}
    </div>
    @endif

    <div class="table-container">
        <table class="inv-table">
            <thead>
                <tr>
                    <th>Nama & Username</th>
                    <th>NIP</th>
                    <th>Jabatan</th>
                    <th>No. Telepon</th>
                    <th style="text-align:center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengguna as $user)
                <tr>
                    <td>
                        <div style="display:flex; align-items:center; gap:12px;">
                            <div style="width:36px; height:36px; background:var(--green-100); color:var(--green-700); border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:14px;">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div>
                                <div style="font-weight:700; color:var(--gray-800)">{{ $user->name }}</div>
                                <div style="font-size:11px; color:var(--gray-500)"><i class="fas fa-at"></i> {{ $user->username }}</div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $user->nip ?? '-' }}</td>
                    <td>
                        @if($user->jabatan)
                            <span style="background:var(--gray-100); padding:4px 8px; border-radius:4px; font-size:12px;">{{ $user->jabatan }}</span>
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $user->no_telepon ?? '-' }}</td>
                    <td style="text-align:center">
                        <div style="display:flex; justify-content:center; gap:6px;">
                            <a href="{{ route('admin.pengguna.edit', $user->id) }}" class="btn btn-sm btn-outline" style="padding:4px 8px;">
                                <i class="fas fa-pen"></i> Edit
                            </a>
                            <form id="form-delete-{{ $user->id }}" action="{{ route('admin.pengguna.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete({{ $user->id }})" class="btn btn-sm btn-danger" style="padding:4px 8px;">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center; padding: 40px 0; color: var(--gray-400);">
                        <i class="fas fa-user-slash" style="font-size: 32px; margin-bottom: 12px; display: block;"></i>
                        Belum ada akun guru yang terdaftar.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Akun guru ini akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('form-delete-' + id).submit();
        }
    });
}
</script>
@endsection
