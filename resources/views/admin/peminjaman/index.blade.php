@extends('layouts.app')

@section('content')
<div class="panel active" id="panel-peminjaman">
  <div class="page-title-row">
    <div>
      <h1>Peminjaman Barang</h1>
      <p>Kelola pengajuan dan status peminjaman barang inventaris oleh guru dan staf</p>
    </div>
    <a href="{{ route('admin.peminjaman.create') }}" class="btn btn-primary">
      <i class="fas fa-plus"></i> Ajukan Peminjaman
    </a>
  </div>

  <div class="card">
    <div class="table-wrap">
      <table class="inv-table inv-table-wide">
        <thead>
          <tr>
            <th>Peminjam</th>
            <th>Jabatan</th>
            <th>Barang Dipinjam</th>
            <th>Jml</th>
            <th>Lokasi Selama Pinjam</th>
            <th>Tgl Pinjam</th>
            <th>Sampai Kapan</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($peminjamans as $peminjaman)
            <tr>
              <td>
                <div style="display:flex;align-items:center;gap:12px">
                  <div style="width:36px;height:36px;border-radius:50%;background:var(--green-100);color:var(--green-700);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px">
                    {{ strtoupper(substr($peminjaman->nama_peminjam, 0, 1)) }}
                  </div>
                  <div style="display:flex;flex-direction:column;gap:2px">
                    <span class="peminjam-name" style="font-weight:600;color:var(--gray-800)">{{ $peminjaman->nama_peminjam }}</span>
                    <span style="font-size:12px;color:var(--gray-500)">{{ $peminjaman->guru_kelas }}</span>
                  </div>
                </div>
              </td>
              <td><span class="peminjam-jabatan" style="font-size:12px;padding:3px 8px;background:var(--gray-100);border:1px solid var(--gray-200);border-radius:4px;color:var(--gray-600)">{{ $peminjaman->jabatan }}</span></td>
              <td>
                {{ $peminjaman->barang->nama }}<br>
                <span style="font-size:11px;color:var(--gray-400)">{{ $peminjaman->barang->kode_barang ?? $peminjaman->barang->id }}</span>
              </td>
              <td><strong style="color:var(--green-700)">{{ $peminjaman->jumlah }}</strong></td>
              <td><i class="fas fa-location-dot" style="color:var(--green-500);margin-right:5px;font-size:12px"></i>{{ $peminjaman->lokasi_selama_dipinjam }}</td>
              <td>{{ $peminjaman->tanggal_pinjam->format('d/m/Y') }}</td>
              <td>{{ $peminjaman->tanggal_rencana_kembali->format('d/m/Y') }}</td>
              <td>
                @php
                  $statusClass = $peminjaman->status === 'disetujui' ? 'badge-dipinjam' : 'badge-selesai';
                  $statusIcon = $peminjaman->status === 'disetujui' ? 'fa-right-left' : 'fa-circle-check';
                  $statusLabel = $peminjaman->status === 'disetujui' ? 'Dipinjam' : 'Selesai';
                @endphp
                <span class="badge-kondisi {{ $statusClass }}">
                  <i class="fas {{ $statusIcon }}"></i> {{ $statusLabel }}
                </span>
              </td>
              <td>
                <div style="display:flex; gap:6px;">
                  <!-- Detail Button -->
                  <button type="button" onclick="openDetail('{{ route('admin.peminjaman.show', $peminjaman->id) }}')" class="btn btn-sm btn-outline" style="color: #3b82f6; border-color: #bfdbfe; padding: 6px 10px;" title="Detail">
                    <i class="fas fa-eye"></i>
                  </button>

                  <!-- Selesaikan Button -->
                  @if($peminjaman->status === 'disetujui')
                  <button type="button" onclick="openSelesaikan('{{ route('admin.peminjaman.edit', $peminjaman->id) }}')" class="btn btn-sm btn-primary" title="Tandai Selesai">
                    <i class="fas fa-check"></i> Selesaikan
                  </button>
                  @endif

                  <!-- Delete Button -->
                  <form action="{{ route('admin.peminjaman.destroy', $peminjaman->id) }}" method="POST" id="form-delete-{{ $peminjaman->id }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete({{ $peminjaman->id }})" class="btn btn-sm btn-outline" style="color: #ef4444; border-color: #fca5a5; padding: 6px 10px;" title="Hapus">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="8" style="text-align:center;padding:24px;color:var(--gray-500)">Belum ada data peminjaman.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- MODALS -->
<div class="modal-overlay" id="modalDetail" onclick="closeModal(event)">
  <div class="modal-box" id="modalBox">
    <div style="padding: 40px; text-align: center;"><i class="fas fa-spinner fa-spin fa-2x text-gray-400"></i><p class="mt-2 text-gray-500">Memuat detail...</p></div>
  </div>
</div>

<div class="modal-overlay" id="modalSelesaikan" onclick="closeSelesaikanModal(event)">
  <div class="modal-box" style="max-width:520px" id="selesaikanModalBox">
    <div style="padding: 40px; text-align: center;"><i class="fas fa-spinner fa-spin fa-2x text-gray-400"></i><p class="mt-2 text-gray-500">Memuat form pengembalian...</p></div>
  </div>
</div>

<script>
    function openDetail(url) {
      document.getElementById('modalDetail').classList.add('open');
      document.getElementById('modalBox').innerHTML = '<div style="padding: 40px; text-align: center;"><i class="fas fa-spinner fa-spin fa-2x text-gray-400"></i><p style="margin-top: 8px; color: #6b7280;">Memuat detail...</p></div>';
      fetch(url + (url.includes('?') ? '&' : '?') + 'ajax=1&t=' + new Date().getTime(), {headers: {'X-Requested-With': 'XMLHttpRequest'}})
        .then(r => r.text())
        .then(html => document.getElementById('modalBox').innerHTML = html);
    }
    function closeModal(e) { if(e.target.id === 'modalDetail') closeModalBtn(); }
    function closeModalBtn() { document.getElementById('modalDetail').classList.remove('open'); }

    function openSelesaikan(url) {
      document.getElementById('modalSelesaikan').classList.add('open');
      document.getElementById('selesaikanModalBox').innerHTML = '<div style="padding: 40px; text-align: center;"><i class="fas fa-spinner fa-spin fa-2x text-gray-400"></i><p style="margin-top: 8px; color: #6b7280;">Memuat form pengembalian...</p></div>';
      fetch(url + (url.includes('?') ? '&' : '?') + 'ajax=1&t=' + new Date().getTime(), {headers: {'X-Requested-With': 'XMLHttpRequest'}})
        .then(r => r.text())
        .then(html => document.getElementById('selesaikanModalBox').innerHTML = html);
    }
  function closeSelesaikanModal(e) { if(e.target.id === 'modalSelesaikan') closeSelesaikanModalBtn(); }
  function closeSelesaikanModalBtn() { document.getElementById('modalSelesaikan').classList.remove('open'); }

  function confirmDelete(id) {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Data peminjaman ini akan dihapus permanen!",
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
