@extends('layouts.app')
@section('content')
<div class="panel active" id="panel-dashboard">
        <div class="welcome-banner">
          <div class="welcome-banner-text">
            <h2>Halo, {{ explode(' ', Auth::user()->name)[0] }}! 👋</h2>
            <p id="welcomeDate">Minggu, 7 Juni 2026 — Pantau inventaris SMPN 5 Purbalingga secara terbuka.</p>
          </div>
          <div class="welcome-banner-badge">
            <i class="fas fa-school"></i>
            <strong>SMPN 5 Purbalingga</strong>
            <span>Portal Guru</span>
          </div>
        </div>

        <!-- Stat cards -->
        <div class="stat-grid">
          <div class="stat-card" style="--accent:var(--green-600)">
            <div class="stat-icon" style="--icon-bg:#f0fdf4;--icon-color:var(--green-700)">
              <i class="fas fa-box"></i>
            </div>
            <div class="stat-info">
              <p>Total Inventaris</p>
              <h3 style="color:var(--green-800)" id="statTotal">{{ $stats['total'] }}</h3>
            </div>
          </div>
          <div class="stat-card" style="--accent:#16a34a">
            <div class="stat-icon" style="--icon-bg:#dcfce7;--icon-color:#15803d">
              <i class="fas fa-circle-check"></i>
            </div>
            <div class="stat-info">
              <p>Barang Baik</p>
              <h3 style="color:#15803d" id="statBaik">{{ $stats['baik'] }}</h3>
            </div>
          </div>
          <div class="stat-card" style="--accent:#ef4444">
            <div class="stat-icon" style="--icon-bg:#fee2e2;--icon-color:#dc2626">
              <i class="fas fa-circle-xmark"></i>
            </div>
            <div class="stat-info">
              <p>Barang Rusak</p>
              <h3 style="color:#dc2626" id="statRusak">{{ $stats['rusak'] }}</h3>
            </div>
          </div>
          <div class="stat-card" style="--accent:#1d4ed8">
            <div class="stat-icon" style="--icon-bg:#dbeafe;--icon-color:#1d4ed8">
              <i class="fas fa-right-left"></i>
            </div>
            <div class="stat-info">
              <p>Barang Dipinjam</p>
              <h3 style="color:#1d4ed8" id="statDipinjam">{{ $stats['dipinjam'] }}</h3>
            </div>
          </div>
          <div class="stat-card" style="--accent:#6b7280">
            <div class="stat-icon" style="--icon-bg:#e5e7eb;--icon-color:#4b5563">
              <i class="fas fa-trash-can"></i>
            </div>
            <div class="stat-info">
              <p>Barang Dihapus</p>
              <h3 style="color:#4b5563" id="statDihapus">{{ $stats['dihapus'] }}</h3>
            </div>
          </div>
          <div class="stat-card" style="--accent:#f59e0b">
            <div class="stat-icon" style="--icon-bg:#fef9c3;--icon-color:#a16207">
              <i class="fas fa-wrench"></i>
            </div>
            <div class="stat-info">
              <p>Perlu Perbaikan</p>
              <h3 style="color:#a16207" id="statPerlu">{{ $stats['perlu_perbaikan'] }}</h3>
            </div>
          </div>
        </div>

        <div class="dashboard-grid">
          <!-- Aktivitas terbaru -->
          <div class="card">
            <div class="card-header">
              <h3><i class="fas fa-clock-rotate-left" style="color:var(--green-600);margin-right:8px"></i>Aktivitas Terbaru</h3>
              <a href="{{ route('guru.katalog.index') }}" class="btn btn-sm btn-outline">Lihat Semua</a>
            </div>
            <div class="card-body">
              <ul class="activity-list">
                <li class="activity-item">
                @forelse($activities as $activity)
                <li class="activity-item">
                  <div class="activity-icon"><i class="fas fa-box"></i></div>
                  <div class="activity-text">
                    <p>{{ $activity->catatan }}</p>
                    <span>{{ $activity->created_at->diffForHumans() }} · {{ $activity->lokasi }}</span>
                  </div>
                </li>
                @empty
                <li class="activity-item">
                  <div class="activity-text">
                    <p>Belum ada aktifitas terbaru.</p>
                  </div>
                </li>
                @endforelse
              </ul>
            </div>
          </div>

          <!-- Kondisi singkat -->
          <div class="card">
            <div class="card-header">
              <h3><i class="fas fa-chart-pie" style="color:var(--green-600);margin-right:8px"></i>Rekap Kondisi</h3>
            </div>
            <div class="card-body">
              <div style="margin-bottom:24px">
                @php
                  $total = max(1, $stats['total']);
                  $pctBaik = round(($stats['baik'] / $total) * 100);
                  $pctPerlu = round(($stats['perlu_perbaikan'] / $total) * 100);
                  $pctRusak = round(($stats['rusak'] / $total) * 100);
                @endphp
                <div class="chart-bar-row">
                  <span class="chart-bar-label">Baik</span>
                  <div class="chart-bar-track">
                    <div class="chart-bar-fill" style="width:{{ $pctBaik }}%;background:var(--green-600)"></div>
                  </div>
                  <span class="chart-bar-value">{{ $stats['baik'] }}</span>
                </div>
                <div class="chart-bar-row">
                  <span class="chart-bar-label">Perlu Perbaikan</span>
                  <div class="chart-bar-track">
                    <div class="chart-bar-fill" style="width:{{ $pctPerlu }}%;background:#f59e0b"></div>
                  </div>
                  <span class="chart-bar-value">{{ $stats['perlu_perbaikan'] }}</span>
                </div>
                <div class="chart-bar-row">
                  <span class="chart-bar-label">Rusak</span>
                  <div class="chart-bar-track">
                    <div class="chart-bar-fill" style="width:{{ $pctRusak }}%;background:#ef4444"></div>
                  </div>
                  <span class="chart-bar-value">{{ $stats['rusak'] }}</span>
                </div>
              </div>
              <div style="background:var(--gray-50);border-radius:var(--radius-sm);padding:14px;border:1px solid var(--gray-100)">
                <p style="font-size:12.5px;color:var(--gray-400);margin-bottom:6px">Terakhir diperbarui</p>
                <p style="font-size:14px;font-weight:600" id="lastUpdated">{{ now()->translatedFormat('d F Y — H:i:s') }} WIB</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      
@endsection
