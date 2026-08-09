@extends('layouts.app')

@section('content')
<div class="panel active">
    <div class="page-title-row">
        <div>
            <h1>Detail Barang: {{ $barang->nama }}</h1>
            <p>Rincian informasi inventaris</p>
        </div>
        <a href="{{ route('guest.katalog.index') }}" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Kembali ke Katalog
        </a>
    </div>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px; margin-top: 24px;">
        <!-- Card Kiri: Detail Informasi -->
        <div class="card">
            <div class="card-header">
                <h2>Informasi Utama</h2>
            </div>
            <div class="card-body">
                <table style="width: 100%; border-collapse: collapse;">
                    <tbody>
                        <tr style="border-bottom: 1px solid var(--gray-200);">
                            <td style="padding: 16px 0; color: var(--gray-500); width: 200px;">Kode Inventaris</td>
                            <td style="padding: 16px 0; font-weight: 500; font-family: monospace;">{{ $barang->kode_barang ?? '-' }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--gray-200);">
                            <td style="padding: 16px 0; color: var(--gray-500);">Nama Barang</td>
                            <td style="padding: 16px 0; font-weight: 500;">{{ $barang->nama }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--gray-200);">
                            <td style="padding: 16px 0; color: var(--gray-500);">Kategori</td>
                            <td style="padding: 16px 0;">{{ $barang->kategori }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--gray-200);">
                            <td style="padding: 16px 0; color: var(--gray-500);">Merk / Brand</td>
                            <td style="padding: 16px 0;">{{ $barang->merk ?? '-' }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--gray-200);">
                            <td style="padding: 16px 0; color: var(--gray-500);">Tahun Perolehan</td>
                            <td style="padding: 16px 0;">{{ $barang->tahun_perolehan ?? '-' }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--gray-200);">
                            <td style="padding: 16px 0; color: var(--gray-500);">Spesifikasi</td>
                            <td style="padding: 16px 0; line-height: 1.5;">{{ $barang->spesifikasi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 16px 0; color: var(--gray-500);">Deskripsi Tambahan</td>
                            <td style="padding: 16px 0; line-height: 1.5;">{{ $barang->deskripsi ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Card Kanan: Status & Lokasi -->
        <div>
            <div class="card" style="margin-bottom: 24px;">
                <div class="card-header">
                    <h2>Status Terkini</h2>
                </div>
                <div class="card-body">
                    <div style="margin-bottom: 20px;">
                        <span style="display: block; font-size: 13px; color: var(--gray-500); margin-bottom: 8px;">Kondisi Barang</span>
                        @if(strtolower($barang->kondisi) === 'baik')
                            <span class="badge-kondisi badge-baik" style="font-size: 14px; padding: 6px 12px;"><i class="fas fa-check-circle"></i> Baik</span>
                        @elseif(strtolower($barang->kondisi) === 'perlu perbaikan' || strtolower($barang->kondisi) === 'perlu_perbaikan')
                            <span class="badge-kondisi badge-perbaikan" style="font-size: 14px; padding: 6px 12px;"><i class="fas fa-wrench"></i> Perlu Perbaikan</span>
                        @else
                            <span class="badge-kondisi badge-rusak" style="font-size: 14px; padding: 6px 12px;"><i class="fas fa-times-circle"></i> Rusak</span>
                        @endif
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <span style="display: block; font-size: 13px; color: var(--gray-500); margin-bottom: 8px;">Ketersediaan</span>
                        @if(strtolower($barang->status) === 'tersedia')
                            <span class="badge-status badge-tersedia" style="font-size: 14px; padding: 6px 12px;"><i class="fas fa-check-circle"></i> Tersedia</span>
                        @elseif(strtolower($barang->status) === 'dipinjam')
                            <span class="badge-status badge-dipinjam" style="font-size: 14px; padding: 6px 12px;"><i class="fas fa-right-left"></i> Sedang Dipinjam</span>
                        @else
                            <span class="badge-status" style="background:#f3f4f6; color:#6b7280; font-size: 14px; padding: 6px 12px;"><i class="fas fa-ban"></i> {{ ucfirst($barang->status) }}</span>
                        @endif
                    </div>

                    <div>
                        <span style="display: block; font-size: 13px; color: var(--gray-500); margin-bottom: 8px;">Lokasi Saat Ini</span>
                        <div style="padding: 12px; background: var(--gray-50); border: 1px solid var(--gray-200); border-radius: var(--radius-md); font-weight: 500;">
                            <i class="fas fa-map-marker-alt" style="color: var(--primary); margin-right: 8px;"></i> {{ $barang->lokasi_saat_ini ?? 'Belum ditentukan' }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Foto Barang -->
            <div class="card">
                <div class="card-header">
                    <h2>Foto Barang</h2>
                </div>
                <div class="card-body" style="text-align: center; padding: 32px 24px;">
                    @if($barang->foto)
                        <img src="{{ asset('storage/' . $barang->foto) }}" alt="{{ $barang->nama }}" style="max-width: 100%; border-radius: var(--radius-md); box-shadow: var(--shadow-sm);">
                    @else
                        <div style="width: 120px; height: 120px; border-radius: 50%; background: var(--gray-100); display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                            <i class="fas fa-image" style="font-size: 48px; color: var(--gray-300);"></i>
                        </div>
                        <p style="color: var(--gray-500); margin: 0;">Tidak ada foto</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
