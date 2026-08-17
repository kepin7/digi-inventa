<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Akses Ditolak - Digi Inventa</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Sora:wght@700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      margin: 0; padding: 0;
      font-family: 'DM Sans', sans-serif;
      background: #f8fafc;
      color: #1e293b;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      text-align: center;
    }
    .error-container {
      max-width: 500px;
      padding: 40px;
    }
    .error-icon {
      font-size: 80px;
      color: #ef4444;
      margin-bottom: 24px;
      animation: pulse 2s infinite;
    }
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }
    h1 {
      font-family: 'Sora', sans-serif;
      font-size: 32px;
      font-weight: 800;
      margin-bottom: 16px;
      letter-spacing: -0.5px;
    }
    p {
      color: #64748b;
      font-size: 16px;
      line-height: 1.6;
      margin-bottom: 32px;
    }
    .btn-group {
      display: flex;
      gap: 16px;
      justify-content: center;
    }
    .btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 12px 24px;
      border-radius: 8px;
      font-weight: 600;
      font-size: 14px;
      text-decoration: none;
      transition: all 0.2s;
    }
    .btn-primary {
      background: #1b5e20;
      color: white;
      border: 1px solid #1b5e20;
    }
    .btn-primary:hover {
      background: #154c19;
    }
    .btn-outline {
      background: white;
      color: #475569;
      border: 1px solid #cbd5e1;
    }
    .btn-outline:hover {
      background: #f1f5f9;
    }
  </style>
</head>
<body>

  <div class="error-container">
    <div class="error-icon">
      <i class="fas fa-shield-halved"></i>
    </div>
    <h1>Akses Ditolak (403)</h1>
    <p>Maaf, halaman administrasi ini tidak bisa diakses secara publik. Halaman ini dikhususkan bagi Petugas Sarana & Prasarana.</p>
    
    <div class="btn-group">
      <a href="{{ route('guru.dashboard') }}" class="btn btn-outline">
        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
      </a>
      <a href="{{ route('login') }}" class="btn btn-primary">
        <i class="fas fa-right-to-bracket"></i> Login Admin
      </a>
    </div>
  </div>

</body>
</html>
