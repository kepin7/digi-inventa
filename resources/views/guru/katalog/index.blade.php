@extends('layouts.app')

@section('content')
<div class="panel active" id="panel-katalog">
    <div class="page-title-row">
        <div>
            <h1>Katalog Inventaris</h1>
            <p>Lihat daftar inventaris barang sekolah</p>
        </div>
    </div>

    <div class="card">
        <div class="table-toolbar">
            <div class="search-wrap">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari nama barang, ID, kode, lokasi..." id="searchInput" oninput="filterTable()">
            </div>
            <select class="filter-select" id="filterKondisi" onchange="filterTable()">
                <option value="">Semua Kondisi</option>
                <option value="Baik">Baik</option>
                <option value="Perlu Perbaikan">Perlu Perbaikan</option>
                <option value="Rusak">Rusak</option>
            </select>
            <select class="filter-select" id="filterStatus" onchange="filterTable()">
                <option value="">Semua Status</option>
                <option value="Tersedia">Tersedia</option>
                <option value="Dipinjam">Dipinjam</option>
            </select>
        </div>

        <div class="table-wrap">
            <table class="inv-table inv-table-wide" id="dataTable">
                <thead>
                    <tr>
                        <th width="40">ID</th>
                        <th width="150">Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Kondisi</th>
                        <th width="80" style="text-align:center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td style="font-family: monospace; color: var(--gray-500);">{{ $item->kode_barang ?? '-' }}</td>
                        <td style="font-weight: 500; color: var(--gray-800);">{{ $item->nama }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->lokasi_saat_ini }}</td>
                        <td>
                            @if(strtolower($item->status) === 'tersedia')
                                <span class="badge-status badge-tersedia"><i class="fas fa-check-circle"></i> Tersedia</span>
                            @elseif(strtolower($item->status) === 'dipinjam')
                                <span class="badge-status badge-dipinjam"><i class="fas fa-right-left"></i> Dipinjam</span>
                            @else
                                <span class="badge-status" style="background:#f3f4f6; color:#6b7280"><i class="fas fa-times-circle"></i> {{ ucfirst($item->status) }}</span>
                            @endif
                        </td>
                        <td>
                            @if(strtolower($item->kondisi) === 'baik')
                                <span class="badge-kondisi badge-baik">Baik</span>
                            @elseif(strtolower($item->kondisi) === 'perlu perbaikan' || strtolower($item->kondisi) === 'perlu_perbaikan')
                                <span class="badge-kondisi badge-perbaikan">Perlu Perbaikan</span>
                            @else
                                <span class="badge-kondisi badge-rusak">Rusak</span>
                            @endif
                        </td>
                        <td style="text-align:center">
                            <a href="{{ route('guru.katalog.show', $item->id) }}" class="action-btn action-view" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="table-pagination" style="margin-top: 16px;">
            <div style="font-size: 14px; color: var(--gray-500);">
                Menampilkan total {{ count($barangs) }} barang
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function filterTable() {
    let search = document.getElementById('searchInput').value.toLowerCase();
    let kondisi = document.getElementById('filterKondisi').value.toLowerCase();
    let status = document.getElementById('filterStatus').value.toLowerCase();
    
    let table = document.getElementById('dataTable');
    let tr = table.getElementsByTagName('tr');

    for (let i = 1; i < tr.length; i++) {
        let tdKondisi = tr[i].getElementsByTagName('td')[6];
        let tdStatus = tr[i].getElementsByTagName('td')[5];
        let textContent = tr[i].textContent.toLowerCase();
        
        let matchSearch = textContent.indexOf(search) > -1;
        let matchKondisi = (kondisi === "" || (tdKondisi && tdKondisi.textContent.toLowerCase().indexOf(kondisi) > -1));
        let matchStatus = (status === "" || (tdStatus && tdStatus.textContent.toLowerCase().indexOf(status) > -1));

        if (matchSearch && matchKondisi && matchStatus) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}
</script>
@endsection
