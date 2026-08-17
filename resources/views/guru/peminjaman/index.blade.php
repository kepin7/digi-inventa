@extends('layouts.app')

@section('content')
<div class="panel active" id="panel-peminjaman">
    <div class="page-title-row">
        <div>
            <h1>Daftar Peminjaman</h1>
            <p>Riwayat peminjaman barang inventaris</p>
        </div>
    </div>

    <div class="card">
        <div class="table-toolbar">
            <div class="search-wrap">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari nama barang..." id="searchInput" oninput="filterTable()">
            </div>
            <select class="filter-select" id="filterStatus" onchange="filterTable()">
                <option value="">Semua Status</option>
                <option value="dipinjam">Dipinjam</option>
                <option value="dikembalikan">Dikembalikan</option>
            </select>
        </div>

        <div class="table-wrap">
            <table class="inv-table inv-table-wide" id="dataTable">
                <thead>
                    <tr>
                        <th width="40">No</th>
                        <th>Kode & Nama Barang</th>
                        <th>Nama Peminjam</th>
                        <th>Tgl Peminjaman</th>
                        <th>Estimasi Kembali</th>
                        <th>Tgl Dikembalikan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($peminjaman as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <div style="font-weight: 500; color: var(--gray-800);">{{ $item->barang->nama ?? 'Barang Dihapus' }}</div>
                            <div style="font-size: 13px; color: var(--gray-500); font-family: monospace; margin-top: 2px;">{{ $item->barang->kode_barang ?? '-' }}</div>
                        </td>
                        <td style="font-weight: 500; color: var(--gray-800);">{{ $item->nama_peminjam }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->estimasi_kembali)->format('d M Y') }}</td>
                        <td>
                            @if($item->tanggal_kembali)
                                {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d M Y') }}
                            @else
                                <span style="color: var(--gray-400);">-</span>
                            @endif
                        </td>
                        <td>
                            @if(strtolower($item->status) === 'dipinjam')
                                <span class="badge-status badge-dipinjam"><i class="fas fa-right-left"></i> Dipinjam</span>
                            @else
                                <span class="badge-status badge-tersedia"><i class="fas fa-check-circle"></i> Dikembalikan</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 40px 20px; color: var(--gray-500);">
                            <i class="fas fa-box-open" style="font-size: 32px; color: var(--gray-300); margin-bottom: 12px; display: block;"></i>
                            Belum ada riwayat peminjaman barang.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="table-pagination" style="margin-top: 16px;">
            <div style="font-size: 14px; color: var(--gray-500);">
                Menampilkan total {{ count($peminjaman) }} riwayat peminjaman
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function filterTable() {
    let search = document.getElementById('searchInput').value.toLowerCase();
    let status = document.getElementById('filterStatus').value.toLowerCase();
    
    let table = document.getElementById('dataTable');
    let tr = table.getElementsByTagName('tr');

    for (let i = 1; i < tr.length; i++) {
        // Abaikan tr 'kosong'
        if (tr[i].getElementsByTagName('td').length < 7) continue;

        let tdNamaBarang = tr[i].getElementsByTagName('td')[1];
        let tdNamaPeminjam = tr[i].getElementsByTagName('td')[2];
        let tdStatus = tr[i].getElementsByTagName('td')[6];
        
        let matchSearch = (tdNamaBarang && tdNamaBarang.textContent.toLowerCase().indexOf(search) > -1) || 
                          (tdNamaPeminjam && tdNamaPeminjam.textContent.toLowerCase().indexOf(search) > -1);
        let matchStatus = (status === "" || (tdStatus && tdStatus.textContent.toLowerCase().indexOf(status) > -1));

        if (matchSearch && matchStatus) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}
</script>
@endsection
