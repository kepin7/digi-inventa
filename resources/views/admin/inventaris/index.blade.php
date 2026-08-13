@extends('layouts.app')
@section('content')
<div class="panel active" id="panel-inventaris">
        <div class="page-title-row">
          <div>
            <h1>Data Inventaris</h1>
            <p>Kelola seluruh data barang inventaris sekolah</p>
          </div>
          <a href="{{ route('admin.inventaris.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Barang
          </a>
        </div>
        


        <div class="card">
          <div class="table-toolbar">
            <div class="search-wrap">
              <i class="fas fa-search"></i>
              <input type="text" placeholder="Cari nama barang, ID, kode, lokasi..." id="searchInput" oninput="filterTable()">
            </div>
            <select class="filter-select" id="filterTahun" onchange="filterTable()">
              <option value="">Semua Tahun</option>
              @php
                $availableYears = \App\Models\Barang::select('tahun_perolehan')
                                    ->whereNotNull('tahun_perolehan')
                                    ->distinct()
                                    ->orderBy('tahun_perolehan', 'desc')
                                    ->pluck('tahun_perolehan');
              @endphp
              @foreach($availableYears as $y)
              <option value="{{ $y }}">{{ $y }}</option>
              @endforeach
            </select>
            <select class="filter-select" id="filterKondisi" onchange="filterTable()">
              <option value="">Semua Kondisi</option>
              <option value="Baik">Baik</option>
              <option value="Perlu Perbaikan">Perlu Perbaikan</option>
              <option value="Rusak">Rusak</option>
            </select>
            <select class="filter-select" id="filterJenisBarang" onchange="filterTable()">
              <option value="">Semua Jenis</option>
              <option value="Barang Modal">Barang Modal</option>
              <option value="Barang Habis Pakai">Barang Habis Pakai</option>
            </select>
            <select class="filter-select" id="filterLokasi" onchange="filterTable()">
              <option value="">Semua Lokasi</option>
              <option value="Ruang Piala / Tata Usaha">Ruang Piala / Tata Usaha</option>
              <option value="Kelas 7A">Kelas 7A</option>
              <option value="Kelas 9B">Kelas 9B</option>
              <option value="Ruang Guru">Ruang Guru</option>
              <option value="Ruang Tata Usaha">Ruang Tata Usaha</option>
              <option value="Ruang Kepala Sekolah">Ruang Kepala Sekolah</option>
              <option value="Lab Komputer">Lab Komputer</option>
              <option value="Lapangan / Gudang Olahraga">Lapangan / Gudang Olahraga</option>
              <option value="Gudang Barang Rusak">Gudang Barang Rusak</option>
            </select>
            <select class="filter-select" id="filterStatus" onchange="filterTable()">
              <option value="">Semua Status</option>
              <option value="Tersedia">Tersedia</option>
              <option value="Dipinjam">Dipinjam</option>
              <option value="Dihapus">Dihapus</option>
            </select>
            <select class="filter-select" id="filterKategori" onchange="filterTable()">
              <option value="">Semua Kategori</option>
              <option value="Elektronik">Elektronik</option>
              <option value="Mebel">Mebel</option>
              <option value="Penghargaan">Penghargaan</option>
              <option value="Olahraga">Olahraga</option>
              <option value="Alat Tulis">Alat Tulis</option>
              <option value="Buku">Buku</option>
            </select>
          </div>

          <div class="table-wrap">
            <table class="inv-table inv-table-wide" id="invTable">
              <thead>
                <tr>
                  <th>ID / Kode</th>
                  <th>Gambar</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Merk</th>
                  <th>Jml</th>
                  <th>Tahun</th>
                  <th>Kondisi</th>
                  <th>Status</th>
                  <th>Lokasi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($barangs as $barang)
                <tr>
                  <td>
                    <div style="font-weight: 700; color: #64748b;">INV-{{ str_pad($barang->id, 3, '0', STR_PAD_LEFT) }}</div>
                    <div style="font-size: 13px; color: #94a3b8; font-family: 'DM Sans', sans-serif; margin-top: 2px;">{{ $barang->kode_barang ?? 'Belum ada kode' }}</div>
                  </td>
                  <td>
                    @if($barang->gambar)
                      <img src="{{ Storage::url($barang->gambar) }}" alt="{{ $barang->nama }}" style="width: 48px; height: 48px; object-fit: cover; border-radius: 6px;">
                    @else
                      <div style="width: 48px; height: 48px; background: #f3f4f6; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #9ca3af;">
                        <i class="fas fa-image"></i>
                      </div>
                    @endif
                  </td>
                  <td>
                    <div style="font-weight: 600; color: #1f2937;">{{ $barang->nama }}</div>
                    <div style="font-size: 11px; color: #6b7280; margin-top: 2px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; max-width: 250px;">{{ $barang->deskripsi ?? '-' }}</div>
                  </td>
                  <td>
                    <div style="font-weight: 500; color: #374151;">{{ $barang->kategori }}</div>
                    <div style="font-size: 11px; color: #94a3b8; margin-top: 2px;">{{ Str::title(str_replace('_', ' ', $barang->jenis_barang)) == 'Modal' ? 'Barang Modal' : 'Barang Habis Pakai' }}</div>
                  </td>
                  <td>{{ $barang->merk ?? '-' }}</td>
                  <td><strong style="color:var(--gray-700)">{{ $barang->jumlah }}</strong></td>
                  <td>{{ $barang->tahun_perolehan ?? '-' }}</td>
                  <td>
                    @php
                      $kondisiClass = $barang->kondisi === 'baik' ? 'badge-baik' : ($barang->kondisi === 'rusak' ? 'badge-rusak' : 'badge-perlu');
                      $kondisiIcon  = $barang->kondisi === 'baik' ? 'fa-circle-check' : ($barang->kondisi === 'rusak' ? 'fa-circle-xmark' : 'fa-wrench');
                      $kondisiText = $barang->kondisi == 'perlu_perbaikan' ? 'Perlu Perbaikan' : ucfirst($barang->kondisi);
                    @endphp
                    <span class="badge-kondisi {{ $kondisiClass }}">
                      <i class="fas {{ $kondisiIcon }}"></i> {{ $kondisiText }}
                    </span>
                  </td>
                  <td>
                    @php
                      $statusClass = $barang->status === 'tersedia' ? 'badge-tersedia' : ($barang->status === 'dipinjam' ? 'badge-dipinjam' : 'badge-dihapus');
                      $statusIcon  = $barang->status === 'tersedia' ? 'fa-circle-check' : ($barang->status === 'dipinjam' ? 'fa-right-left' : 'fa-trash-can');
                    @endphp
                    <span class="badge-kondisi {{ $statusClass }}">
                      <i class="fas {{ $statusIcon }}"></i> {{ ucfirst($barang->status) }}
                    </span>
                  </td>
                  <td>{{ $barang->lokasi_saat_ini }}</td>
                  <td>
                    <div style="display: flex; gap: 6px;">
                      <button type="button" onclick="openDetail('{{ route('admin.inventaris.show', $barang->id) }}')" class="btn btn-sm btn-outline" style="color: #3b82f6; border-color: #bfdbfe; padding: 6px 10px;" title="Detail"><i class="fas fa-eye"></i></button>
                      <button type="button" onclick="openEdit('{{ route('admin.inventaris.edit', $barang->id) }}')" class="btn btn-sm btn-outline" style="color: #f59e0b; border-color: #fde68a; padding: 6px 10px;" title="Edit"><i class="fas fa-pen"></i></button>
                      <form action="{{ route('admin.inventaris.destroy', $barang->id) }}" method="POST" id="form-delete-{{ $barang->id }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete({{ $barang->id }})" class="btn btn-sm btn-outline" style="color: #ef4444; border-color: #fca5a5; padding: 6px 10px;" title="Hapus"><i class="fas fa-trash"></i></button>
                      </form>
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="10" style="text-align: center; padding: 32px 0; color: #6b7280;">
                    Tidak ada data barang ditemukan.
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <div class="table-pagination" style="margin-top: 16px;">
            {{ $barangs->links() }}
          </div>
        </div>
      </div>
  <!-- MODALS -->
  <div class="modal-overlay" id="modalDetail" onclick="closeModal(event)">
    <div class="modal-box" id="modalBox">
      <div style="padding: 40px; text-align: center;"><i class="fas fa-spinner fa-spin fa-2x text-gray-400"></i><p class="mt-2 text-gray-500">Memuat detail...</p></div>
    </div>
  </div>

  <div class="modal-overlay" id="modalEdit" onclick="closeEditModal(event)">
    <div class="modal-box" style="max-width:680px" id="editModalBox">
      <div style="padding: 40px; text-align: center;"><i class="fas fa-spinner fa-spin fa-2x text-gray-400"></i><p class="mt-2 text-gray-500">Memuat form edit...</p></div>
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
    function openEdit(url) {
      document.getElementById('modalEdit').classList.add('open');
      document.getElementById('editModalBox').innerHTML = '<div style="padding: 40px; text-align: center;"><i class="fas fa-spinner fa-spin fa-2x text-gray-400"></i><p style="margin-top: 8px; color: #6b7280;">Memuat form edit...</p></div>';
      fetch(url + (url.includes('?') ? '&' : '?') + 'ajax=1&t=' + new Date().getTime(), {headers: {'X-Requested-With': 'XMLHttpRequest'}})
        .then(r => r.text())
        .then(html => document.getElementById('editModalBox').innerHTML = html);
    }
    function closeModal(e) { if(e.target.id === 'modalDetail') closeModalBtn(); }
    function closeModalBtn() { document.getElementById('modalDetail').classList.remove('open'); }
    function closeEditModal(e) { if(e.target.id === 'modalEdit') closeEditModalBtn(); }
    function closeEditModalBtn() { document.getElementById('modalEdit').classList.remove('open'); }

    function confirmDelete(id) {
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data barang ini akan dihapus permanen!",
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

    function filterTable() {
      let search = document.getElementById('searchInput').value.toLowerCase();
      let tahun = document.getElementById('filterTahun').value;
      let kondisi = document.getElementById('filterKondisi').value.toLowerCase();
      let jenis = document.getElementById('filterJenisBarang').value.toLowerCase();
      let lokasi = document.getElementById('filterLokasi').value.toLowerCase();
      let status = document.getElementById('filterStatus').value.toLowerCase();
      let kategori = document.getElementById('filterKategori').value.toLowerCase();
      
      let table = document.getElementById('invTable');
      let tr = table.getElementsByTagName('tr');

      for (let i = 1; i < tr.length; i++) {
        // Abaikan tr 'kosong'
        if (tr[i].getElementsByTagName('td').length < 10) continue;

        let textContent = tr[i].textContent.toLowerCase();
        let tdKategori = tr[i].getElementsByTagName('td')[3];
        let tdKategoriText = tdKategori ? tdKategori.textContent.toLowerCase() : "";
        
        let tdTahun = tr[i].getElementsByTagName('td')[6];
        let tdTahunText = tdTahun ? tdTahun.textContent : "";
        
        let tdKondisi = tr[i].getElementsByTagName('td')[7];
        let tdKondisiText = tdKondisi ? tdKondisi.textContent.toLowerCase() : "";
        
        let tdStatus = tr[i].getElementsByTagName('td')[8];
        let tdStatusText = tdStatus ? tdStatus.textContent.toLowerCase() : "";
        
        let tdLokasi = tr[i].getElementsByTagName('td')[9];
        let tdLokasiText = tdLokasi ? tdLokasi.textContent.toLowerCase() : "";

        let matchSearch = textContent.indexOf(search) > -1;
        let matchTahun = (tahun === "" || tdTahunText.indexOf(tahun) > -1);
        let matchKondisi = (kondisi === "" || tdKondisiText.indexOf(kondisi) > -1);
        let matchJenis = (jenis === "" || tdKategoriText.indexOf(jenis) > -1); // Jenis ada di kolom kategori
        let matchLokasi = (lokasi === "" || tdLokasiText.indexOf(lokasi) > -1);
        let matchStatus = (status === "" || tdStatusText.indexOf(status) > -1);
        let matchKategori = (kategori === "" || tdKategoriText.indexOf(kategori) > -1);

        if (matchSearch && matchTahun && matchKondisi && matchJenis && matchLokasi && matchStatus && matchKategori) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  </script>
@endsection