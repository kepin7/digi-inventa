<!DOCTYPE html>
<!-- saved from url=(0054)file:///C:/Users/MSI/Downloads/digi-inventa%20(2).html -->
<html lang="id"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Digi Inventa — Digi Inventa | SMPN 5 Purbalingga</title>

  <!-- Google Fonts: Sora (display) + DM Sans (body) -->
  <link href="./Digi Inventa — Digi Inventa _ SMPN 5 Purbalingga_files/css2" rel="stylesheet">
  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="./Digi Inventa — Digi Inventa _ SMPN 5 Purbalingga_files/all.min.css">

  <style>
    /* ============================================================
       CSS VARIABLES & RESET
    ============================================================ */
    :root {
      --green-900: #1b5e20;
      --green-800: #2e7d32;
      --green-700: #388e3c;
      --green-600: #43a047;
      --green-400: #66bb6a;
      --green-200: #c8e6c9;
      --green-50:  #f1f8e9;

      --white:     #ffffff;
      --gray-50:   #f8fafc;
      --gray-100:  #f1f5f9;
      --gray-200:  #e2e8f0;
      --gray-400:  #94a3b8;
      --gray-600:  #475569;
      --gray-800:  #1e293b;

      --sidebar-w: 260px;
      --header-h:  68px;

      --radius-sm: 8px;
      --radius-md: 14px;
      --radius-lg: 20px;

      --shadow-sm: 0 1px 3px rgba(0,0,0,.08), 0 1px 2px rgba(0,0,0,.06);
      --shadow-md: 0 4px 16px rgba(0,0,0,.10);
      --shadow-lg: 0 8px 32px rgba(0,0,0,.14);

      --trans: .22s cubic-bezier(.4,0,.2,1);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'DM Sans', sans-serif;
      font-size: 15px;
      color: var(--gray-800);
      background: var(--gray-50);
      overflow-x: hidden;
    }

    a { text-decoration: none; color: inherit; }
    img { display: block; max-width: 100%; }
    button { cursor: pointer; font-family: inherit; }

    /* ============================================================
       SCROLLBAR
    ============================================================ */
    ::-webkit-scrollbar { width: 6px; height: 6px; }
    ::-webkit-scrollbar-track { background: transparent; }
    ::-webkit-scrollbar-thumb { background: var(--green-200); border-radius: 99px; }

    /* ============================================================
       PAGE MANAGEMENT — show/hide
       !important needed: ID selectors (#loginPage, #dashPage) have
       higher specificity than class selectors (.page) without it.
    ============================================================ */
    .page { display: none !important; }
    /* Both login and dashboard use flex layout */
    #loginPage.active  { display: flex !important; }
    #dashPage.active   { display: flex !important; }

    /* ============================================================
       ██████  LOGIN PAGE
    ============================================================ */
    #loginPage {
      min-height: 100vh;
      display: flex;
      align-items: stretch;
    }

    /* Left decorative panel */
    .login-panel-left {
      flex: 1;
      background: linear-gradient(145deg, var(--green-900) 0%, var(--green-700) 60%, var(--green-400) 100%);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 60px 40px;
      position: relative;
      overflow: hidden;
    }

    .login-panel-left::before {
      content: '';
      position: absolute;
      width: 400px; height: 400px;
      border-radius: 50%;
      background: rgba(255,255,255,.04);
      top: -80px; left: -80px;
    }
    .login-panel-left::after {
      content: '';
      position: absolute;
      width: 300px; height: 300px;
      border-radius: 50%;
      background: rgba(255,255,255,.06);
      bottom: -60px; right: -60px;
    }

    .login-school-logo {
      width: 90px; height: 90px;
      background: rgba(255,255,255,.15);
      border: 3px solid rgba(255,255,255,.3);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 38px;
      color: white;
      margin-bottom: 28px;
      position: relative; z-index: 1;
      animation: floatLogo 4s ease-in-out infinite;
    }
    @keyframes floatLogo {
      0%,100% { transform: translateY(0); }
      50%      { transform: translateY(-8px); }
    }

    .login-school-name {
      color: white;
      text-align: center;
      position: relative; z-index: 1;
    }
    .login-school-name h1 {
      font-family: 'Sora', sans-serif;
      font-size: 28px;
      font-weight: 800;
      letter-spacing: -.5px;
      margin-bottom: 6px;
    }
    .login-school-name p {
      font-size: 14px;
      opacity: .8;
      line-height: 1.6;
    }

    .login-illustration {
      margin-top: 40px;
      position: relative; z-index: 1;
      width: 260px;
    }
    .login-illustration img {
      border-radius: var(--radius-md);
      box-shadow: var(--shadow-lg);
      width: 100%;
    }

    /* Right form panel */
    .login-panel-right {
      width: 460px;
      min-width: 360px;
      background: white;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 60px 50px;
    }

    .login-form-header {
      text-align: center;
      margin-bottom: 36px;
    }
    .login-form-header .badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: var(--green-50);
      color: var(--green-800);
      font-size: 12px;
      font-weight: 600;
      padding: 5px 14px;
      border-radius: 99px;
      border: 1px solid var(--green-200);
      margin-bottom: 18px;
      letter-spacing: .3px;
    }
    .login-form-header h2 {
      font-family: 'Sora', sans-serif;
      font-size: 26px;
      font-weight: 800;
      color: var(--gray-800);
      margin-bottom: 8px;
    }
    .login-form-header p {
      color: var(--gray-400);
      font-size: 14px;
    }

    .form-group {
      margin-bottom: 20px;
      width: 100%;
    }
    .form-group label {
      display: block;
      font-size: 13px;
      font-weight: 600;
      color: var(--gray-600);
      margin-bottom: 8px;
      letter-spacing: .3px;
    }
    .input-wrap {
      position: relative;
    }
    .input-wrap i {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--gray-400);
      font-size: 15px;
      pointer-events: none;
      transition: color var(--trans);
    }
    .input-wrap input {
      width: 100%;
      padding: 13px 14px 13px 42px;
      border: 1.5px solid var(--gray-200);
      border-radius: var(--radius-sm);
      font-size: 15px;
      font-family: inherit;
      color: var(--gray-800);
      background: var(--gray-50);
      transition: border-color var(--trans), box-shadow var(--trans), background var(--trans);
      outline: none;
    }
    .input-wrap input:focus {
      border-color: var(--green-600);
      background: white;
      box-shadow: 0 0 0 3px rgba(67,160,71,.12);
    }
    .input-wrap input:focus + i,
    .input-wrap:focus-within i { color: var(--green-600); }

    /* eye toggle */
    .eye-btn {
      position: absolute;
      right: 12px; top: 50%;
      transform: translateY(-50%);
      background: none; border: none;
      color: var(--gray-400);
      font-size: 14px;
      padding: 4px;
    }
    .eye-btn:hover { color: var(--green-600); }

    .btn-login {
      width: 100%;
      padding: 14px;
      background: linear-gradient(135deg, var(--green-800), var(--green-600));
      color: white;
      border: none;
      border-radius: var(--radius-sm);
      font-size: 15px;
      font-weight: 700;
      letter-spacing: .4px;
      transition: transform var(--trans), box-shadow var(--trans), filter var(--trans);
      box-shadow: 0 4px 16px rgba(46,125,50,.3);
      margin-top: 8px;
    }
    .btn-login:hover {
      transform: translateY(-1px);
      box-shadow: 0 8px 24px rgba(46,125,50,.4);
      filter: brightness(1.05);
    }
    .btn-login:active { transform: translateY(0); }

    .login-hint {
      margin-top: 22px;
      text-align: center;
      font-size: 12.5px;
      color: var(--gray-400);
    }
    .login-hint strong { color: var(--green-700); }

    .login-error {
      background: #fef2f2;
      border: 1px solid #fecaca;
      color: #dc2626;
      font-size: 13px;
      padding: 10px 14px;
      border-radius: var(--radius-sm);
      margin-bottom: 16px;
      display: none;
    }
    .login-error.show { display: block; animation: shake .4s ease; }
    @keyframes shake {
      0%,100% { transform: translateX(0); }
      20%      { transform: translateX(-6px); }
      40%      { transform: translateX(6px); }
      60%      { transform: translateX(-4px); }
      80%      { transform: translateX(4px); }
    }

    /* ============================================================
       ██████  DASHBOARD SHELL
    ============================================================ */
    #dashPage {
      display: none;
      flex-direction: row;
      min-height: 100vh;
    }
    #dashPage.active {
      display: flex;
    }

    /* -------- SIDEBAR -------- */
    .sidebar {
      width: var(--sidebar-w);
      min-height: 100vh;
      background: linear-gradient(180deg, var(--green-900) 0%, var(--green-800) 100%);
      display: flex;
      flex-direction: column;
      position: fixed;
      top: 0; left: 0; bottom: 0;
      z-index: 100;
      transition: transform var(--trans);
      overflow-y: auto;
    }

    .sidebar-brand {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 22px 22px 18px;
      border-bottom: 1px solid rgba(255,255,255,.1);
    }
    .sidebar-brand-icon {
      width: 42px; height: 42px;
      background: rgba(255,255,255,.15);
      border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      font-size: 20px; color: white;
      flex-shrink: 0;
    }
    .sidebar-brand-text h3 {
      font-family: 'Sora', sans-serif;
      font-size: 15px;
      font-weight: 700;
      color: white;
      line-height: 1.2;
    }
    .sidebar-brand-text span {
      font-size: 11px;
      color: rgba(255,255,255,.55);
    }

    .sidebar-section-label {
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 1px;
      text-transform: uppercase;
      color: rgba(255,255,255,.35);
      padding: 20px 22px 6px;
    }

    .sidebar-nav { flex: 1; padding: 4px 12px; }
    .nav-item {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 11px 14px;
      border-radius: var(--radius-sm);
      color: rgba(255,255,255,.7);
      font-size: 14px;
      font-weight: 500;
      cursor: pointer;
      transition: background var(--trans), color var(--trans), transform var(--trans);
      margin-bottom: 2px;
      position: relative;
    }
    .nav-item i { width: 18px; text-align: center; font-size: 15px; }
    .nav-item:hover {
      background: rgba(255,255,255,.1);
      color: white;
      transform: translateX(3px);
    }
    .nav-item.active {
      background: rgba(255,255,255,.18);
      color: white;
      font-weight: 600;
    }
    .nav-item.active::before {
      content: '';
      position: absolute;
      left: 0; top: 20%; bottom: 20%;
      width: 3px;
      background: var(--green-400);
      border-radius: 0 2px 2px 0;
    }

    .nav-item.logout {
      color: rgba(255,100,100,.75);
      margin-top: 6px;
    }
    .nav-item.logout:hover {
      background: rgba(255,100,100,.12);
      color: #ff8a80;
    }

    .sidebar-footer {
      padding: 18px 20px;
      border-top: 1px solid rgba(255,255,255,.1);
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .sidebar-footer-avatar {
      width: 36px; height: 36px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--green-400), var(--green-600));
      display: flex; align-items: center; justify-content: center;
      font-size: 15px; color: white; font-weight: 700;
      flex-shrink: 0;
    }
    .sidebar-footer-info { overflow: hidden; }
    .sidebar-footer-info strong {
      display: block;
      font-size: 13px;
      color: white;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .sidebar-footer-info span {
      font-size: 11px;
      color: rgba(255,255,255,.5);
    }

    /* -------- MAIN AREA -------- */
    .main-area {
      margin-left: var(--sidebar-w);
      flex: 1;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* -------- TOP HEADER -------- */
    .top-header {
      height: var(--header-h);
      background: white;
      border-bottom: 1px solid var(--gray-200);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 28px;
      position: sticky;
      top: 0;
      z-index: 90;
      box-shadow: var(--shadow-sm);
    }

    .header-left h2 {
      font-family: 'Sora', sans-serif;
      font-size: 18px;
      font-weight: 700;
      color: var(--gray-800);
    }
    .header-left p {
      font-size: 12.5px;
      color: var(--gray-400);
      margin-top: 1px;
    }

    .header-right {
      display: flex;
      align-items: center;
      gap: 14px;
    }
    .header-notif {
      width: 38px; height: 38px;
      border-radius: 50%;
      background: var(--gray-100);
      border: none;
      display: flex; align-items: center; justify-content: center;
      color: var(--gray-600);
      font-size: 16px;
      position: relative;
      transition: background var(--trans);
    }
    .header-notif:hover { background: var(--green-50); color: var(--green-700); }
    .header-notif .dot {
      position: absolute;
      top: 7px; right: 8px;
      width: 7px; height: 7px;
      background: #ef4444;
      border-radius: 50%;
      border: 1.5px solid white;
    }

    .header-user {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 6px 12px 6px 6px;
      border-radius: 99px;
      background: var(--gray-50);
      border: 1px solid var(--gray-200);
      cursor: pointer;
      transition: background var(--trans);
    }
    .header-user:hover { background: var(--green-50); border-color: var(--green-200); }
    .header-user-avatar {
      width: 32px; height: 32px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--green-600), var(--green-800));
      display: flex; align-items: center; justify-content: center;
      font-size: 13px; color: white; font-weight: 700;
    }
    .header-user-name {
      font-size: 13.5px;
      font-weight: 600;
      color: var(--gray-700);
    }
    .header-user i { color: var(--gray-400); font-size: 12px; }

    /* -------- CONTENT AREA -------- */
    .content {
      flex: 1;
      padding: 28px;
    }

    /* Panel visibility */
    .panel { display: none; animation: fadeInUp .35s ease both; }
    .panel.active { display: block; }
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(12px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* ============================================================
       SHARED COMPONENTS
    ============================================================ */

    /* -- Page title row -- */
    .page-title-row {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      margin-bottom: 24px;
      flex-wrap: wrap;
      gap: 12px;
    }
    .page-title-row h1 {
      font-family: 'Sora', sans-serif;
      font-size: 22px;
      font-weight: 800;
      color: var(--gray-800);
      margin-bottom: 4px;
    }
    .page-title-row p {
      font-size: 13.5px;
      color: var(--gray-400);
    }
    .page-title-row .breadcrumb {
      font-size: 12px;
      color: var(--gray-400);
      display: flex;
      align-items: center;
      gap: 6px;
    }
    .page-title-row .breadcrumb span { color: var(--green-700); font-weight: 600; }

    /* -- Card -- */
    .card {
      background: white;
      border-radius: var(--radius-md);
      border: 1px solid var(--gray-200);
      box-shadow: var(--shadow-sm);
      transition: box-shadow var(--trans);
    }
    .card:hover { box-shadow: var(--shadow-md); }
    .card-body { padding: 22px; }
    .card-header {
      padding: 18px 22px 14px;
      border-bottom: 1px solid var(--gray-100);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .card-header h3 {
      font-family: 'Sora', sans-serif;
      font-size: 15px;
      font-weight: 700;
    }

    /* -- Stat card -- */
    .stat-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 18px;
      margin-bottom: 28px;
    }
    .stat-card {
      background: white;
      border-radius: var(--radius-md);
      border: 1px solid var(--gray-200);
      padding: 20px 22px;
      display: flex;
      align-items: center;
      gap: 16px;
      transition: box-shadow var(--trans), transform var(--trans);
      overflow: hidden;
      position: relative;
    }
    .stat-card::after {
      content: '';
      position: absolute;
      bottom: 0; left: 0; right: 0;
      height: 3px;
      background: var(--accent, var(--green-600));
    }
    .stat-card:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }
    .stat-icon {
      width: 52px; height: 52px;
      border-radius: var(--radius-sm);
      display: flex; align-items: center; justify-content: center;
      font-size: 22px;
      background: var(--icon-bg, var(--green-50));
      color: var(--icon-color, var(--green-700));
      flex-shrink: 0;
    }
    .stat-info p {
      font-size: 12px;
      color: var(--gray-400);
      margin-bottom: 4px;
      font-weight: 500;
    }
    .stat-info h3 {
      font-family: 'Sora', sans-serif;
      font-size: 26px;
      font-weight: 800;
      line-height: 1;
    }

    /* -- Button -- */
    .btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 10px 18px;
      border-radius: var(--radius-sm);
      font-size: 13.5px;
      font-weight: 600;
      border: none;
      transition: all var(--trans);
    }
    .btn-primary {
      background: linear-gradient(135deg, var(--green-800), var(--green-600));
      color: white;
      box-shadow: 0 2px 8px rgba(46,125,50,.25);
    }
    .btn-primary:hover {
      transform: translateY(-1px);
      box-shadow: 0 4px 16px rgba(46,125,50,.35);
      filter: brightness(1.04);
    }
    .btn-outline {
      background: white;
      color: var(--green-800);
      border: 1.5px solid var(--green-300, #a5d6a7);
    }
    .btn-outline:hover { background: var(--green-50); }
    .btn-sm { padding: 7px 14px; font-size: 12.5px; }
    .btn-danger { background: #fee2e2; color: #dc2626; border: 1.5px solid #fecaca; }
    .btn-danger:hover { background: #fecaca; }
    .btn-info { background: #dbeafe; color: #1d4ed8; border: 1.5px solid #bfdbfe; }
    .btn-info:hover { background: #bfdbfe; }

    /* -- Badge -- */
    .badge-kondisi {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 4px 10px;
      border-radius: 99px;
      font-size: 11.5px;
      font-weight: 600;
    }
    .badge-baik     { background: #dcfce7; color: #15803d; }
    .badge-rusak    { background: #fee2e2; color: #dc2626; }
    .badge-perlu    { background: #fef9c3; color: #a16207; }
    .badge-dipinjam { background: #dbeafe; color: #1d4ed8; }
    .badge-dihapus  { background: #e5e7eb; color: #4b5563; }
    .badge-tersedia { background: #dcfce7; color: #15803d; }
    .badge-selesai  { background: #dcfce7; color: #15803d; }

    /* ============================================================
       ██████  RIWAYAT LOKASI (TIMELINE)
    ============================================================ */
    .riwayat-select-row {
      display: flex;
      align-items: center;
      gap: 12px;
      flex-wrap: wrap;
      margin-bottom: 22px;
    }
    .riwayat-select-row select {
      flex: 1;
      min-width: 240px;
      padding: 11px 14px;
      border: 1.5px solid var(--gray-200);
      border-radius: var(--radius-sm);
      font-size: 14px;
      font-family: inherit;
      background: white;
      color: var(--gray-800);
    }
    .timeline { list-style: none; padding: 6px 4px; }
    .timeline-item {
      position: relative;
      padding-left: 34px;
      padding-bottom: 26px;
    }
    .timeline-item:last-child { padding-bottom: 4px; }
    .timeline-item::before {
      content: '';
      position: absolute;
      left: 8px; top: 6px; bottom: -6px;
      width: 2px;
      background: var(--green-200);
    }
    .timeline-item:last-child::before { display: none; }
    .timeline-dot {
      position: absolute;
      left: 0; top: 2px;
      width: 18px; height: 18px;
      border-radius: 50%;
      background: var(--green-600);
      border: 3px solid var(--green-50);
      box-shadow: 0 0 0 2px var(--green-200);
    }
    .timeline-item:last-child .timeline-dot {
      background: var(--green-900);
      box-shadow: 0 0 0 2px var(--green-400);
    }
    .timeline-card {
      background: var(--gray-50);
      border: 1px solid var(--gray-100);
      border-radius: var(--radius-sm);
      padding: 12px 16px;
    }
    .timeline-card .loc {
      font-family: 'Sora', sans-serif;
      font-size: 14.5px;
      font-weight: 700;
      color: var(--gray-800);
      margin-bottom: 4px;
    }
    .timeline-card .meta {
      font-size: 12px;
      color: var(--gray-400);
      margin-bottom: 6px;
    }
    .timeline-card .alasan {
      font-size: 13px;
      color: var(--gray-600);
      line-height: 1.5;
    }

    /* ============================================================
       ██████  PEMINJAMAN
    ============================================================ */
    .peminjam-cell { display: flex; align-items: center; gap: 10px; }
    .peminjam-avatar {
      width: 36px; height: 36px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid var(--gray-200);
      flex-shrink: 0;
    }
    .peminjam-name { font-size: 13.5px; font-weight: 700; color: var(--gray-800); }
    .peminjam-jabatan { font-size: 11.5px; color: var(--gray-400); }

    /* ============================================================
       ██████  PANEL: DASHBOARD HOME
    ============================================================ */
    .welcome-banner {
      background: linear-gradient(135deg, var(--green-900) 0%, var(--green-800) 50%, var(--green-700) 100%);
      border-radius: var(--radius-lg);
      padding: 32px 36px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 24px;
      margin-bottom: 26px;
      overflow: hidden;
      position: relative;
      min-height: 130px;
    }
    /* Decorative circles — subtle, tidak menghalangi teks */
    .welcome-banner::before {
      content: '';
      position: absolute;
      width: 260px; height: 260px;
      border-radius: 50%;
      background: rgba(255,255,255,.04);
      top: -80px; right: 240px;
      pointer-events: none;
    }
    .welcome-banner::after {
      content: '';
      position: absolute;
      width: 180px; height: 180px;
      border-radius: 50%;
      background: rgba(255,255,255,.05);
      bottom: -60px; left: 40%;
      pointer-events: none;
    }
    .welcome-banner-text {
      position: relative;
      z-index: 2;
      flex: 1;
      min-width: 0;
    }
    .welcome-banner-text h2 {
      font-family: 'Sora', sans-serif;
      font-size: 23px;
      font-weight: 800;
      color: #ffffff;
      margin-bottom: 8px;
      text-shadow: 0 1px 4px rgba(0,0,0,.25);
      line-height: 1.2;
    }
    .welcome-banner-text p {
      color: rgba(255,255,255,.88);
      font-size: 14px;
      line-height: 1.5;
      text-shadow: 0 1px 3px rgba(0,0,0,.2);
    }
    /* Kotak kanan — dekoratif bergaya badge sekolah */
    .welcome-banner-badge {
      position: relative;
      z-index: 2;
      flex-shrink: 0;
      background: rgba(255,255,255,.12);
      border: 2px solid rgba(255,255,255,.22);
      border-radius: var(--radius-md);
      padding: 16px 22px;
      text-align: center;
      min-width: 130px;
      backdrop-filter: blur(4px);
    }
    .welcome-banner-badge i {
      font-size: 28px;
      color: rgba(255,255,255,.9);
      margin-bottom: 8px;
      display: block;
    }
    .welcome-banner-badge strong {
      display: block;
      font-family: 'Sora', sans-serif;
      font-size: 13px;
      font-weight: 700;
      color: white;
      letter-spacing: .3px;
    }
    .welcome-banner-badge span {
      font-size: 11px;
      color: rgba(255,255,255,.7);
    }

    /* Activity list */
    .activity-list { list-style: none; }
    .activity-item {
      display: flex;
      align-items: flex-start;
      gap: 14px;
      padding: 13px 0;
      border-bottom: 1px dashed var(--gray-100);
    }
    .activity-item:last-child { border-bottom: none; }
    .activity-icon {
      width: 36px; height: 36px;
      border-radius: 50%;
      background: var(--green-50);
      border: 2px solid var(--green-200);
      display: flex; align-items: center; justify-content: center;
      font-size: 14px;
      color: var(--green-700);
      flex-shrink: 0;
    }
    .activity-text p { font-size: 13.5px; font-weight: 500; }
    .activity-text span { font-size: 12px; color: var(--gray-400); }

    /* Quick stats row */
    .dashboard-grid {
      display: grid;
      grid-template-columns: 1fr 320px;
      gap: 22px;
    }

    /* ============================================================
       ██████  PANEL: INVENTARIS TABLE
    ============================================================ */
    .table-toolbar {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 16px 22px;
      border-bottom: 1px solid var(--gray-100);
      flex-wrap: wrap;
    }
    .search-wrap {
      position: relative;
      flex: 1;
      min-width: 180px;
    }
    .search-wrap i {
      position: absolute;
      left: 12px; top: 50%;
      transform: translateY(-50%);
      color: var(--gray-400);
      font-size: 14px;
    }
    .search-wrap input {
      width: 100%;
      padding: 9px 12px 9px 36px;
      border: 1.5px solid var(--gray-200);
      border-radius: var(--radius-sm);
      font-size: 13.5px;
      font-family: inherit;
      outline: none;
      transition: border-color var(--trans);
    }
    .search-wrap input:focus { border-color: var(--green-500); }

    .filter-select {
      padding: 9px 12px;
      border: 1.5px solid var(--gray-200);
      border-radius: var(--radius-sm);
      font-size: 13.5px;
      font-family: inherit;
      color: var(--gray-700);
      background: white;
      outline: none;
    }

    .table-wrap { overflow-x: auto; }
    .inv-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 13.5px;
    }
    .inv-table thead {
      background: var(--gray-50);
      border-bottom: 1.5px solid var(--gray-200);
    }
    .inv-table thead th {
      padding: 12px 16px;
      text-align: left;
      font-size: 11.5px;
      font-weight: 700;
      letter-spacing: .5px;
      text-transform: uppercase;
      color: var(--gray-400);
      white-space: nowrap;
    }
    .inv-table tbody tr {
      border-bottom: 1px solid var(--gray-100);
      transition: background var(--trans);
      cursor: pointer;
    }
    .inv-table tbody tr:hover { background: var(--green-50); }
    .inv-table tbody tr:nth-child(even) { background: #fafafa; }
    .inv-table tbody tr:nth-child(even):hover { background: var(--green-50); }
    .inv-table td {
      padding: 13px 16px;
      vertical-align: middle;
    }

    .item-thumb {
      width: 46px; height: 46px;
      border-radius: var(--radius-sm);
      object-fit: cover;
      border: 1.5px solid var(--gray-200);
    }

    .item-name-cell strong { display: block; font-weight: 600; color: var(--gray-800); }
    .item-name-cell span  { font-size: 12px; color: var(--gray-400); }

    .table-pagination {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 14px 22px;
      border-top: 1px solid var(--gray-100);
      font-size: 13px;
      color: var(--gray-400);
    }
    .pag-btns { display: flex; gap: 6px; }
    .pag-btn {
      width: 30px; height: 30px;
      border: 1.5px solid var(--gray-200);
      background: white;
      border-radius: 6px;
      font-size: 13px;
      font-weight: 600;
      color: var(--gray-600);
      transition: all var(--trans);
    }
    .pag-btn:hover, .pag-btn.active {
      background: var(--green-800);
      color: white;
      border-color: var(--green-800);
    }

    /* ============================================================
       ██████  PANEL: TAMBAH BARANG
    ============================================================ */
    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }
    .form-grid .full { grid-column: 1 / -1; }

    .form-field label {
      display: block;
      font-size: 13px;
      font-weight: 600;
      color: var(--gray-600);
      margin-bottom: 7px;
    }
    .form-field input,
    .form-field select,
    .form-field textarea {
      width: 100%;
      padding: 11px 14px;
      border: 1.5px solid var(--gray-200);
      border-radius: var(--radius-sm);
      font-size: 14px;
      font-family: inherit;
      color: var(--gray-800);
      background: var(--gray-50);
      outline: none;
      transition: border-color var(--trans), background var(--trans), box-shadow var(--trans);
    }
    .form-field input:focus,
    .form-field select:focus,
    .form-field textarea:focus {
      border-color: var(--green-600);
      background: white;
      box-shadow: 0 0 0 3px rgba(67,160,71,.1);
    }
    .form-field textarea { resize: vertical; min-height: 100px; }

    .upload-zone {
      border: 2px dashed var(--green-300, #a5d6a7);
      border-radius: var(--radius-md);
      padding: 36px 20px;
      text-align: center;
      cursor: pointer;
      transition: background var(--trans), border-color var(--trans);
    }
    .upload-zone:hover { background: var(--green-50); border-color: var(--green-600); }
    .upload-zone i { font-size: 36px; color: var(--green-400); margin-bottom: 10px; }
    .upload-zone p { font-size: 14px; color: var(--gray-400); }
    .upload-zone small { font-size: 12px; color: var(--gray-400); }

    /* ============================================================
       ██████  PANEL: DETAIL BARANG
    ============================================================ */
    .detail-hero {
      background: linear-gradient(120deg, var(--green-900), var(--green-700));
      border-radius: var(--radius-lg);
      padding: 28px;
      display: flex;
      gap: 28px;
      margin-bottom: 24px;
      align-items: flex-start;
    }
    .detail-hero-img {
      width: 180px;
      height: 160px;
      border-radius: var(--radius-md);
      object-fit: cover;
      border: 3px solid rgba(255,255,255,.2);
      flex-shrink: 0;
    }
    .detail-hero-info h1 {
      font-family: 'Sora', sans-serif;
      font-size: 22px;
      font-weight: 800;
      color: white;
      margin-bottom: 8px;
    }
    .detail-hero-info p {
      color: rgba(255,255,255,.75);
      font-size: 14px;
      line-height: 1.7;
      margin-bottom: 14px;
    }

    .detail-info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 16px;
    }
    .detail-info-item {
      background: var(--gray-50);
      border: 1px solid var(--gray-100);
      border-radius: var(--radius-sm);
      padding: 14px 16px;
    }
    .detail-info-item .label {
      font-size: 11.5px;
      font-weight: 700;
      letter-spacing: .5px;
      text-transform: uppercase;
      color: var(--gray-400);
      margin-bottom: 6px;
    }
    .detail-info-item .value {
      font-size: 15px;
      font-weight: 600;
      color: var(--gray-800);
    }

    /* ============================================================
       ██████  PANEL: LAPORAN
    ============================================================ */
    .report-banner {
      background: linear-gradient(120deg, var(--green-900), var(--green-700));
      border-radius: var(--radius-lg);
      padding: 26px 30px;
      color: white;
      margin-bottom: 26px;
    }
    .report-banner h2 {
      font-family: 'Sora', sans-serif;
      font-size: 20px;
      font-weight: 800;
      margin-bottom: 4px;
    }
    .report-banner p { font-size: 13.5px; opacity: .75; }

    .report-stat-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 18px;
      margin-bottom: 28px;
    }
    .report-stat {
      background: white;
      border: 1px solid var(--gray-200);
      border-radius: var(--radius-md);
      padding: 22px;
      position: relative;
      overflow: hidden;
      transition: box-shadow var(--trans), transform var(--trans);
    }
    .report-stat:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }
    .report-stat-number {
      font-family: 'Sora', sans-serif;
      font-size: 44px;
      font-weight: 800;
      line-height: 1;
      margin-bottom: 6px;
    }
    .report-stat-label { font-size: 14px; color: var(--gray-400); font-weight: 500; }
    .report-stat-icon {
      position: absolute;
      right: 18px; top: 18px;
      font-size: 30px;
      opacity: .1;
    }

    /* Bar chart visual */
    .chart-bar-row {
      display: flex;
      align-items: center;
      gap: 14px;
      margin-bottom: 14px;
    }
    .chart-bar-label { width: 140px; font-size: 13px; color: var(--gray-600); flex-shrink: 0; text-align: right; }
    .chart-bar-track {
      flex: 1;
      height: 12px;
      background: var(--gray-100);
      border-radius: 99px;
      overflow: hidden;
    }
    .chart-bar-fill {
      height: 100%;
      border-radius: 99px;
      transition: width 1.2s cubic-bezier(.4,0,.2,1);
    }
    .chart-bar-value { font-size: 13px; font-weight: 700; color: var(--gray-700); width: 30px; }

    /* ============================================================
       ██████  PANEL: PROFIL
    ============================================================ */
    .profil-header {
      background: linear-gradient(120deg, var(--green-900), var(--green-700));
      border-radius: var(--radius-lg);
      padding: 32px;
      display: flex;
      align-items: center;
      gap: 24px;
      margin-bottom: 24px;
      color: white;
    }
    .profil-avatar-big {
      width: 80px; height: 80px;
      border-radius: 50%;
      background: rgba(255,255,255,.2);
      border: 3px solid rgba(255,255,255,.4);
      display: flex; align-items: center; justify-content: center;
      font-size: 32px; color: white; font-weight: 700;
      flex-shrink: 0;
    }
    .profil-header h2 {
      font-family: 'Sora', sans-serif;
      font-size: 22px;
      font-weight: 800;
      margin-bottom: 4px;
    }
    .profil-header p { opacity: .75; font-size: 14px; }

    .profil-info-card { padding: 24px; }
    .profil-row {
      display: flex;
      align-items: center;
      padding: 14px 0;
      border-bottom: 1px dashed var(--gray-100);
    }
    .profil-row:last-child { border-bottom: none; }
    .profil-row-label {
      width: 180px;
      font-size: 13px;
      font-weight: 600;
      color: var(--gray-400);
      display: flex; align-items: center; gap: 8px;
    }
    .profil-row-label i { width: 16px; color: var(--green-600); }
    .profil-row-value { font-size: 14.5px; font-weight: 500; }

    /* ============================================================
       MODAL — Detail Barang
    ============================================================ */
    .modal-overlay {
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,.5);
      backdrop-filter: blur(4px);
      z-index: 200;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      opacity: 0;
      pointer-events: none;
      transition: opacity var(--trans);
    }
    .modal-overlay.open { opacity: 1; pointer-events: all; }
    .modal-box {
      background: white;
      border-radius: var(--radius-lg);
      width: 100%;
      max-width: 720px;
      max-height: 90vh;
      overflow-y: auto;
      box-shadow: var(--shadow-lg);
      transform: scale(.95) translateY(20px);
      transition: transform var(--trans);
    }
    .modal-overlay.open .modal-box { transform: scale(1) translateY(0); }

    .modal-close {
      position: absolute;
      top: 16px; right: 16px;
      width: 32px; height: 32px;
      border-radius: 50%;
      background: rgba(0,0,0,.15);
      border: none;
      color: white;
      font-size: 14px;
      display: flex; align-items: center; justify-content: center;
      transition: background var(--trans);
    }
    .modal-close:hover { background: rgba(0,0,0,.3); }

    /* ============================================================
       TOAST
    ============================================================ */
    .toast {
      position: fixed;
      bottom: 28px; right: 28px;
      background: var(--green-800);
      color: white;
      padding: 14px 20px;
      border-radius: var(--radius-md);
      box-shadow: var(--shadow-lg);
      font-size: 14px;
      font-weight: 600;
      display: flex; align-items: center; gap: 10px;
      z-index: 999;
      transform: translateY(80px);
      opacity: 0;
      transition: all .4s cubic-bezier(.34,1.56,.64,1);
    }
    .toast.show { transform: translateY(0); opacity: 1; }

    /* ============================================================
       MOBILE RESPONSIVE
    ============================================================ */
    .hamburger {
      display: none;
      width: 38px; height: 38px;
      border: none; background: none;
      font-size: 20px; color: var(--gray-700);
      align-items: center; justify-content: center;
    }

    @media (max-width: 768px) {
      .login-panel-left { display: none; }
      .login-panel-right { width: 100%; padding: 40px 28px; }

      .sidebar {
        transform: translateX(-100%);
      }
      .sidebar.open { transform: translateX(0); }
      .main-area { margin-left: 0; }

      .hamburger { display: flex; }
      .dashboard-grid { grid-template-columns: 1fr; }
      .form-grid { grid-template-columns: 1fr; }
      .detail-hero { flex-direction: column; }
      .detail-hero-img { width: 100%; height: 200px; }
      /* welcome-banner-badge tetap tampil di mobile */
      .inv-table { min-width: 700px; }
      .inv-table.inv-table-wide { min-width: 1100px; }
    }
  </style>
</head>
<body>

<!-- ============================================================
     █  LOGIN PAGE
============================================================ -->
<div id="loginPage" class="page active">
  <div class="login-panel-left">
    <div class="login-school-logo">
      <i class="fas fa-school"></i>
    </div>
    <div style="font-family:&#39;Sora&#39;,sans-serif;font-size:22px;font-weight:800;color:white;letter-spacing:-0.5px;margin-bottom:6px;position:relative;z-index:1">Digi Inventa</div>
    <div class="login-school-name">
      <h1>SMPN 5 Purbalingga</h1>
      <p>Jl. Letjend. S. Parman No. 1<br>Kabupaten Purbalingga, Jawa Tengah</p>
    </div>
    <div class="login-illustration">
      <!-- Placeholder ilustrasi sekolah -->
      <img src="./Digi Inventa — Digi Inventa _ SMPN 5 Purbalingga_files/ffffff" alt="Ilustrasi Sekolah">
    </div>
  </div>

  <div class="login-panel-right">
    <div class="login-form-header">
      <div class="badge"><i class="fas fa-database"></i> Digi Inventa — Inventaris Sekolah</div>
      <h2>Selamat Datang</h2>
      <p>Masuk sebagai petugas Sarana &amp; Prasarana</p>
    </div>

    <!-- Error message -->
    <div class="login-error" id="loginError">
      <i class="fas fa-triangle-exclamation"></i>
      Username atau password salah. Coba lagi.
    </div>

    <div class="form-group">
      <label>Username</label>
      <div class="input-wrap">
        <input type="text" id="loginUser" placeholder="Masukkan username" autocomplete="username">
        <i class="fas fa-user"></i>
      </div>
    </div>

    <div class="form-group">
      <label>Password</label>
      <div class="input-wrap">
        <input type="password" id="loginPass" placeholder="Masukkan password" autocomplete="current-password">
        <i class="fas fa-lock"></i>
        <button class="eye-btn" onclick="toggleEye()" id="eyeBtn" type="button">
          <i class="fas fa-eye" id="eyeIcon"></i>
        </button>
      </div>
    </div>

    <button class="btn-login" onclick="doLogin()">
      <i class="fas fa-right-to-bracket"></i>&nbsp; Masuk ke Dashboard
    </button>

    <div class="login-hint">
      Demo: username <strong>sarpra</strong> / password <strong>smpn5pbg</strong>
    </div>
  </div>
</div>

<!-- ============================================================
     █  DASHBOARD PAGE
============================================================ -->
<div id="dashPage" class="page">
  <!-- SIDEBAR -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
      <div class="sidebar-brand-icon"><i class="fas fa-boxes-stacked"></i></div>
      <div class="sidebar-brand-text">
        <h3>Digi Inventa</h3>
        <span>Inventaris SMPN 5 Purbalingga</span>
      </div>
    </div>

    <div class="sidebar-section-label">Menu Utama</div>
    <nav class="sidebar-nav">
      <div class="nav-item active" data-panel="dashboard" onclick="showPanel(&#39;dashboard&#39;)">
        <i class="fas fa-house"></i> Dashboard
      </div>
      <div class="nav-item" data-panel="inventaris" onclick="showPanel(&#39;inventaris&#39;)">
        <i class="fas fa-warehouse"></i> Data Inventaris
      </div>
      <div class="nav-item" data-panel="peminjaman" onclick="showPanel(&#39;peminjaman&#39;)">
        <i class="fas fa-right-left"></i> Peminjaman
      </div>
      <div class="nav-item" data-panel="tambah" onclick="showPanel(&#39;tambah&#39;)">
        <i class="fas fa-plus-circle"></i> Tambah Barang
      </div>
      <div class="nav-item" data-panel="laporan" onclick="showPanel(&#39;laporan&#39;)">
        <i class="fas fa-chart-bar"></i> Laporan
      </div>
      <div class="nav-item" data-panel="profil" onclick="showPanel(&#39;profil&#39;)">
        <i class="fas fa-circle-user"></i> Profil
      </div>

      <div style="margin-top:12px; padding-top:12px; border-top:1px solid rgba(255,255,255,.1)">
        <div class="nav-item logout" onclick="doLogout()">
          <i class="fas fa-right-from-bracket"></i> Keluar
        </div>
      </div>
    </nav>

    <div class="sidebar-footer">
      <div class="sidebar-footer-avatar">S</div>
      <div class="sidebar-footer-info">
        <strong>Petugas Sarpra</strong>
        <span>Sarana &amp; Prasarana</span>
      </div>
    </div>
  </aside>

  <!-- MAIN AREA -->
  <div class="main-area">
    <!-- TOP HEADER -->
    <header class="top-header">
      <div style="display:flex;align-items:center;gap:14px">
        <button class="hamburger" id="hamburger" onclick="toggleSidebar()">
          <i class="fas fa-bars"></i>
        </button>
        <div class="header-left">
          <h2 id="headerTitle">Dashboard</h2>
          <p id="headerSub">Selamat datang di Digi Inventa</p>
        </div>
      </div>
      <div class="header-right">
        <div id="liveClock" style="font-size:13px;font-weight:600;color:var(--gray-600);background:var(--gray-100);padding:6px 14px;border-radius:99px;border:1px solid var(--gray-200);font-family:&#39;Sora&#39;,sans-serif;letter-spacing:.3px;white-space:nowrap">Minggu, 7 Juni 2026  |  14:55:54 WIB</div>
        <button class="header-notif">
          <i class="fas fa-bell"></i>
          <span class="dot"></span>
        </button>
        <div class="header-user" onclick="showPanel(&#39;profil&#39;)">
          <div class="header-user-avatar">S</div>
          <span class="header-user-name">Sarpra</span>
          <i class="fas fa-chevron-down"></i>
        </div>
      </div>
    </header>

    <!-- CONTENT PANELS -->
    <main class="content">

      <!-- ======================================================
           PANEL: DASHBOARD
      ====================================================== -->
      <div class="panel active" id="panel-dashboard">
        <div class="welcome-banner">
          <div class="welcome-banner-text">
            <h2>Halo, Petugas Sarpra! 👋</h2>
            <p id="welcomeDate">Minggu, 7 Juni 2026 — Kelola inventaris SMPN 5 Purbalingga dengan mudah.</p>
          </div>
          <div class="welcome-banner-badge">
            <i class="fas fa-school"></i>
            <strong>SMPN 5 Purbalingga</strong>
            <span>Sarana &amp; Prasarana</span>
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
              <h3 style="color:var(--green-800)" id="statTotal">12</h3>
            </div>
          </div>
          <div class="stat-card" style="--accent:#16a34a">
            <div class="stat-icon" style="--icon-bg:#dcfce7;--icon-color:#15803d">
              <i class="fas fa-circle-check"></i>
            </div>
            <div class="stat-info">
              <p>Barang Baik</p>
              <h3 style="color:#15803d" id="statBaik">8</h3>
            </div>
          </div>
          <div class="stat-card" style="--accent:#ef4444">
            <div class="stat-icon" style="--icon-bg:#fee2e2;--icon-color:#dc2626">
              <i class="fas fa-circle-xmark"></i>
            </div>
            <div class="stat-info">
              <p>Barang Rusak</p>
              <h3 style="color:#dc2626" id="statRusak">1</h3>
            </div>
          </div>
          <div class="stat-card" style="--accent:#1d4ed8">
            <div class="stat-icon" style="--icon-bg:#dbeafe;--icon-color:#1d4ed8">
              <i class="fas fa-right-left"></i>
            </div>
            <div class="stat-info">
              <p>Barang Dipinjam</p>
              <h3 style="color:#1d4ed8" id="statDipinjam">0</h3>
            </div>
          </div>
          <div class="stat-card" style="--accent:#6b7280">
            <div class="stat-icon" style="--icon-bg:#e5e7eb;--icon-color:#4b5563">
              <i class="fas fa-trash-can"></i>
            </div>
            <div class="stat-info">
              <p>Barang Dihapus</p>
              <h3 style="color:#4b5563" id="statDihapus">0</h3>
            </div>
          </div>
          <div class="stat-card" style="--accent:#f59e0b">
            <div class="stat-icon" style="--icon-bg:#fef9c3;--icon-color:#a16207">
              <i class="fas fa-wrench"></i>
            </div>
            <div class="stat-info">
              <p>Perlu Perbaikan</p>
              <h3 style="color:#a16207" id="statPerlu">3</h3>
            </div>
          </div>
        </div>

        <div class="dashboard-grid">
          <!-- Aktivitas terbaru -->
          <div class="card">
            <div class="card-header">
              <h3><i class="fas fa-clock-rotate-left" style="color:var(--green-600);margin-right:8px"></i>Aktivitas Terbaru</h3>
              <button class="btn btn-sm btn-outline">Lihat Semua</button>
            </div>
            <div class="card-body">
              <ul class="activity-list">
                <li class="activity-item">
                  <div class="activity-icon"><i class="fas fa-plus"></i></div>
                  <div class="activity-text">
                    <p>Proyektor Epson ditambahkan ke inventaris</p>
                    <span>2 jam yang lalu · Ruang Guru</span>
                  </div>
                </li>
                <li class="activity-item">
                  <div class="activity-icon"><i class="fas fa-pen"></i></div>
                  <div class="activity-text">
                    <p>Status Meja Siswa Kayu diperbarui menjadi Perlu Perbaikan</p>
                    <span>1 hari yang lalu · Kelas 7A</span>
                  </div>
                </li>
                <li class="activity-item">
                  <div class="activity-icon"><i class="fas fa-trophy"></i></div>
                  <div class="activity-text">
                    <p>Piala OSN Matematika berhasil didata</p>
                    <span>3 hari yang lalu · Ruang Piala</span>
                  </div>
                </li>
                <li class="activity-item">
                  <div class="activity-icon"><i class="fas fa-laptop"></i></div>
                  <div class="activity-text">
                    <p>Laptop ASUS Core i5 masuk Lab Komputer</p>
                    <span>5 hari yang lalu · Lab Komputer</span>
                  </div>
                </li>
                <li class="activity-item">
                  <div class="activity-icon"><i class="fas fa-print"></i></div>
                  <div class="activity-text">
                    <p>Laporan inventaris dicetak bulan Mei 2025</p>
                    <span>1 minggu yang lalu</span>
                  </div>
                </li>
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
                <div class="chart-bar-row">
                  <span class="chart-bar-label">Baik</span>
                  <div class="chart-bar-track">
                    <div class="chart-bar-fill" style="width:67%;background:var(--green-600)"></div>
                  </div>
                  <span class="chart-bar-value">8</span>
                </div>
                <div class="chart-bar-row">
                  <span class="chart-bar-label">Perlu Perbaikan</span>
                  <div class="chart-bar-track">
                    <div class="chart-bar-fill" style="width:25%;background:#f59e0b"></div>
                  </div>
                  <span class="chart-bar-value">3</span>
                </div>
                <div class="chart-bar-row">
                  <span class="chart-bar-label">Rusak</span>
                  <div class="chart-bar-track">
                    <div class="chart-bar-fill" style="width:8%;background:#ef4444"></div>
                  </div>
                  <span class="chart-bar-value">1</span>
                </div>
              </div>
              <div style="background:var(--gray-50);border-radius:var(--radius-sm);padding:14px;border:1px solid var(--gray-100)">
                <p style="font-size:12.5px;color:var(--gray-400);margin-bottom:6px">Terakhir diperbarui</p>
                <p style="font-size:14px;font-weight:600" id="lastUpdated">7 Juni 2026 — 14:55:54 WIB</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ======================================================
           PANEL: INVENTARIS
      ====================================================== -->
      <div class="panel" id="panel-inventaris">
        <div class="page-title-row">
          <div>
            <h1>Data Inventaris</h1>
            <p>Kelola seluruh data barang inventaris sekolah</p>
          </div>
          <button class="btn btn-primary" onclick="showPanel(&#39;tambah&#39;)">
            <i class="fas fa-plus"></i> Tambah Barang
          </button>
        </div>

        <div class="card">
          <div class="table-toolbar">
            <div class="search-wrap">
              <i class="fas fa-search"></i>
              <input type="text" placeholder="Cari nama barang, ID, kode, lokasi..." id="searchInput" oninput="filterTable()">
            </div>
            <select class="filter-select" id="filterTahun" onchange="filterTable()">
              <option value="">Semua Tahun</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
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
                  <th>Tahun</th>
                  <th>Kondisi</th>
                  <th>Status</th>
                  <th>Lokasi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="tableBody"></tbody>
            </table>
          </div>

          <div class="table-pagination">
            <span id="paginationInfo">Menampilkan 1–12 dari 12 barang</span>
            <div class="pag-btns">
              <button class="pag-btn active">1</button>
              <button class="pag-btn">2</button>
              <button class="pag-btn"><i class="fas fa-chevron-right"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- ======================================================
           PANEL: PEMINJAMAN
      ====================================================== -->
      <div class="panel" id="panel-peminjaman">
        <div class="page-title-row">
          <div>
            <h1>Peminjaman Barang</h1>
            <p>Kelola pengajuan dan status peminjaman barang inventaris oleh guru dan staf</p>
          </div>
          <button class="btn btn-primary" onclick="openTambahPeminjaman()">
            <i class="fas fa-plus"></i> Ajukan Peminjaman
          </button>
        </div>

        <div class="card">
          <div class="table-wrap">
            <table class="inv-table inv-table-wide">
              <thead>
                <tr>
                  <th>Peminjam</th>
                  <th>Guru / Kelas</th>
                  <th>Jabatan</th>
                  <th>Barang Dipinjam</th>
                  <th>Lokasi Sekarang</th>
                  <th>Tgl Pinjam</th>
                  <th>Sampai Kapan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="peminjamanTableBody"></tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- ======================================================
           PANEL: TAMBAH BARANG
      ====================================================== -->
      <div class="panel" id="panel-tambah">
        <div class="page-title-row">
          <div>
            <h1>Tambah Barang</h1>
            <p>Isi formulir berikut untuk menambahkan barang baru ke inventaris</p>
          </div>
          <button class="btn btn-outline" onclick="showPanel(&#39;inventaris&#39;)">
            <i class="fas fa-arrow-left"></i> Kembali
          </button>
        </div>

        <div class="card">
          <div class="card-header">
            <h3><i class="fas fa-file-pen" style="color:var(--green-600);margin-right:8px"></i>Formulir Data Barang</h3>
            <span style="font-size:12px;color:var(--gray-400)">* Wajib diisi</span>
          </div>
          <div class="card-body">
            <div class="form-grid">
              <div class="form-field">
                <label>Kode Inventaris</label>
                <input type="text" id="tambahKodeInventaris" placeholder="Contoh: 3.07.02.01.0013">
              </div>
              <div class="form-field">
                <label>Nama Barang *</label>
                <input type="text" id="tambahNama" placeholder="Contoh: Laptop ASUS VivoBook">
              </div>
              <div class="form-field">
                <label>Kategori *</label>
                <select id="tambahKategori">
                  <option value="">-- Pilih Kategori --</option>
                  <option>Elektronik</option>
                  <option>Mebel</option>
                  <option>Penghargaan</option>
                  <option>Olahraga</option>
                  <option>Alat Tulis</option>
                  <option>Buku</option>
                  <option>Lainnya</option>
                </select>
              </div>
              <div class="form-field">
                <label>Jenis Barang *</label>
                <select id="tambahJenisBarang">
                  <option value="">-- Pilih Jenis --</option>
                  <option>Barang Modal</option>
                  <option>Barang Habis Pakai</option>
                </select>
              </div>
              <div class="form-field">
                <label>Merk</label>
                <input type="text" id="tambahMerk" placeholder="Contoh: ASUS VivoBook 14">
              </div>
              <div class="form-field">
                <label>Spesifikasi</label>
                <input type="text" id="tambahSpesifikasi" placeholder="Spesifikasi singkat barang">
              </div>
              <div class="form-field">
                <label>Tahun Perolehan *</label>
                <input type="number" id="tambahTahun" placeholder="2026" min="2000" max="2099">
              </div>
              <div class="form-field">
                <label>Harga Perolehan (Rp)</label>
                <input type="number" id="tambahHarga" min="0" placeholder="0">
              </div>
              <div class="form-field">
                <label>Sumber Dana</label>
                <select id="tambahSumberDana">
                  <option value="">-- Pilih Sumber Dana --</option>
                  <option>APBN</option>
                  <option>APBD</option>
                  <option>BOS</option>
                  <option>Non-APBD / Hadiah Lomba</option>
                  <option>Sumbangan</option>
                  <option>Swadaya Sekolah</option>
                </select>
              </div>
              <div class="form-field">
                <label>Kondisi *</label>
                <select id="tambahKondisi">
                  <option value="">-- Pilih Kondisi --</option>
                  <option>Baik</option>
                  <option>Perlu Perbaikan</option>
                  <option>Rusak</option>
                </select>
              </div>
              <div class="form-field">
                <label>Status *</label>
                <select id="tambahStatus">
                  <option value="Tersedia">Tersedia</option>
                  <option>Dipinjam</option>
                  <option>Dihapus</option>
                </select>
              </div>
              <div class="form-field">
                <label>Tanggal Masuk *</label>
                <input type="date" id="tambahTanggal">
              </div>
              <div class="form-field">
                <label>Lokasi Penempatan *</label>
                <input type="text" id="tambahLokasi" placeholder="Contoh: Ruang Guru, Lab Komputer">
              </div>
              <div class="form-field">
                <label>Jumlah Barang *</label>
                <input type="number" id="tambahJumlah" min="1" value="1" placeholder="1">
                <small style="font-size:11.5px;color:var(--gray-400);margin-top:4px;display:block">Isi lebih dari 1 jika barang identik ditambahkan sekaligus (misal 10 kursi sejenis), tanpa perlu input satu per satu.</small>
              </div>
              <div class="form-field full">
                <label>Deskripsi Detail</label>
                <textarea id="tambahDeskripsi" placeholder="Tuliskan deskripsi lengkap barang termasuk merek, spesifikasi, asal perolehan, atau catatan penting lainnya..."></textarea>
              </div>
              <div class="form-field full">
                <label>Upload Gambar Barang</label>
                <div class="upload-zone" onclick="alert(&#39;Fitur upload gambar aktif pada versi penuh.&#39;)">
                  <i class="fas fa-cloud-arrow-up"></i>
                  <p>Klik untuk memilih gambar atau drag &amp; drop</p>
                  <small>Format: JPG, PNG, WEBP — Maks. 2MB</small>
                </div>
              </div>
            </div>

            <div style="display:flex;gap:12px;margin-top:10px">
              <button class="btn btn-primary" onclick="simpanBarang()">
                <i class="fas fa-floppy-disk"></i> Simpan Barang
              </button>
              <button class="btn btn-outline" onclick="showPanel(&#39;inventaris&#39;)">
                Batal
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- ======================================================
           PANEL: LAPORAN
      ====================================================== -->
      <div class="panel" id="panel-laporan">
        <div class="page-title-row">
          <div>
            <h1>Laporan Inventaris</h1>
            <p>Ringkasan dan statistik seluruh barang inventaris sekolah</p>
          </div>
          <button class="btn btn-primary" onclick="alert(&#39;Fitur cetak laporan tersedia pada versi penuh.&#39;)">
            <i class="fas fa-print"></i> Cetak Laporan
          </button>
        </div>

        <div class="report-stat-grid">
          <div class="report-stat">
            <div class="report-stat-icon" style="color:var(--green-600)"><i class="fas fa-boxes-stacked"></i></div>
            <div class="report-stat-number" style="color:var(--green-800)" id="reportTotal">12</div>
            <div class="report-stat-label">Total Barang Terdaftar</div>
          </div>
          <div class="report-stat">
            <div class="report-stat-icon" style="color:#15803d"><i class="fas fa-circle-check"></i></div>
            <div class="report-stat-number" style="color:#15803d" id="reportBaik">8</div>
            <div class="report-stat-label">Kondisi Baik</div>
          </div>
          <div class="report-stat">
            <div class="report-stat-icon" style="color:#a16207"><i class="fas fa-screwdriver-wrench"></i></div>
            <div class="report-stat-number" style="color:#a16207" id="reportPerlu">3</div>
            <div class="report-stat-label">Perlu Perbaikan</div>
          </div>
          <div class="report-stat">
            <div class="report-stat-icon" style="color:#dc2626"><i class="fas fa-triangle-exclamation"></i></div>
            <div class="report-stat-number" style="color:#dc2626" id="reportRusak">1</div>
            <div class="report-stat-label">Rusak Berat</div>
          </div>
        </div>

        <!-- Distribusi per jenis -->
        <div class="card" style="margin-bottom:22px">
          <div class="card-header">
            <h3><i class="fas fa-layer-group" style="color:var(--green-600);margin-right:8px"></i>Distribusi per Jenis Barang</h3>
          </div>
          <div class="card-body">
            <div class="chart-bar-row">
              <span class="chart-bar-label">Elektronik</span>
              <div class="chart-bar-track">
                <div class="chart-bar-fill" style="width:33%;background:var(--green-600)"></div>
              </div>
              <span class="chart-bar-value">4</span>
            </div>
            <div class="chart-bar-row">
              <span class="chart-bar-label">Mebel</span>
              <div class="chart-bar-track">
                <div class="chart-bar-fill" style="width:25%;background:#3b82f6"></div>
              </div>
              <span class="chart-bar-value">3</span>
            </div>
            <div class="chart-bar-row">
              <span class="chart-bar-label">Penghargaan</span>
              <div class="chart-bar-track">
                <div class="chart-bar-fill" style="width:17%;background:#f59e0b"></div>
              </div>
              <span class="chart-bar-value">2</span>
            </div>
            <div class="chart-bar-row">
              <span class="chart-bar-label">Olahraga</span>
              <div class="chart-bar-track">
                <div class="chart-bar-fill" style="width:17%;background:#ec4899"></div>
              </div>
              <span class="chart-bar-value">2</span>
            </div>
            <div class="chart-bar-row">
              <span class="chart-bar-label">Lainnya</span>
              <div class="chart-bar-track">
                <div class="chart-bar-fill" style="width:8%;background:#6b7280"></div>
              </div>
              <span class="chart-bar-value">1</span>
            </div>
          </div>
        </div>

        <!-- Tabel ringkas -->
        <div class="card">
          <div class="card-header">
            <h3><i class="fas fa-table-list" style="color:var(--green-600);margin-right:8px"></i>Ringkasan Per Lokasi</h3>
          </div>
          <div class="table-wrap">
            <table class="inv-table">
              <thead>
                <tr>
                  <th>Lokasi</th>
                  <th>Jumlah Barang</th>
                  <th>Kondisi Baik</th>
                  <th>Kondisi Perlu Perbaikan</th>
                  <th>Rusak</th>
                </tr>
              </thead>
              <tbody id="laporanLokasiBody"></tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- ======================================================
           PANEL: PROFIL
      ====================================================== -->
      <div class="panel" id="panel-profil">
        <div class="page-title-row">
          <div>
            <h1>Profil Pengguna</h1>
            <p>Informasi akun dan petugas yang sedang aktif</p>
          </div>
        </div>

        <div class="profil-header">
          <div class="profil-avatar-big">S</div>
          <div>
            <h2>Sutrisno Hadi, S.Pd.</h2>
            <p>Petugas Sarana &amp; Prasarana · SMPN 5 Purbalingga</p>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <h3><i class="fas fa-id-card" style="color:var(--green-600);margin-right:8px"></i>Data Pengguna</h3>
            <button class="btn btn-sm btn-outline" onclick="alert(&#39;Edit profil tersedia pada versi penuh.&#39;)">
              <i class="fas fa-pen"></i> Edit
            </button>
          </div>
          <div class="profil-info-card">
            <div class="profil-row">
              <span class="profil-row-label"><i class="fas fa-user"></i> Nama Lengkap</span>
              <span class="profil-row-value">Sutrisno Hadi, S.Pd.</span>
            </div>
            <div class="profil-row">
              <span class="profil-row-label"><i class="fas fa-at"></i> Username</span>
              <span class="profil-row-value">sarpra</span>
            </div>
            <div class="profil-row">
              <span class="profil-row-label"><i class="fas fa-id-badge"></i> NIP</span>
              <span class="profil-row-value">19780315 200501 1 003</span>
            </div>
            <div class="profil-row">
              <span class="profil-row-label"><i class="fas fa-briefcase"></i> Jabatan</span>
              <span class="profil-row-value">Staf Sarana &amp; Prasarana</span>
            </div>
            <div class="profil-row">
              <span class="profil-row-label"><i class="fas fa-school"></i> Unit Kerja</span>
              <span class="profil-row-value">SMP Negeri 5 Purbalingga</span>
            </div>
            <div class="profil-row">
              <span class="profil-row-label"><i class="fas fa-phone"></i> No. Telepon</span>
              <span class="profil-row-value">0812-3456-7890</span>
            </div>
            <div class="profil-row">
              <span class="profil-row-label"><i class="fas fa-envelope"></i> Email</span>
              <span class="profil-row-value">sarpra.smpn5pbg@gmail.com</span>
            </div>
            <div class="profil-row">
              <span class="profil-row-label"><i class="fas fa-shield"></i> Role Akses</span>
              <span class="profil-row-value">
                <span class="badge-kondisi badge-baik" style="font-size:13px">
                  <i class="fas fa-check-circle"></i> Sarpra (Admin Inventaris)
                </span>
              </span>
            </div>
          </div>
        </div>
      </div>

    </main><!-- /content -->
  </div><!-- /main-area -->
</div><!-- /dashPage -->

<!-- ============================================================
     █  MODAL DETAIL BARANG
============================================================ -->
<div class="modal-overlay" id="modalDetail" onclick="closeModal(event)">
  <div class="modal-box" id="modalBox">
    <!-- Filled by JS -->
  </div>
</div>


<!-- ============================================================
     █  MODAL EDIT BARANG
============================================================ -->
<div class="modal-overlay" id="modalEdit" onclick="closeEditModal(event)">
  <div class="modal-box" style="max-width:680px" id="editModalBox">
    <div style="position:relative">
      <div style="background:linear-gradient(120deg,var(--green-900),var(--green-700));padding:22px 28px;border-radius:var(--radius-lg) var(--radius-lg) 0 0;display:flex;align-items:center;justify-content:space-between">
        <div>
          <h2 style="font-family:Sora,sans-serif;font-size:18px;font-weight:800;color:white;margin-bottom:3px"><i class="fas fa-pen" style="margin-right:8px"></i>Edit Barang</h2>
          <p style="font-size:13px;color:rgba(255,255,255,.7)" id="editSubtitle">Perbarui informasi barang inventaris</p>
        </div>
        <button class="modal-close" style="position:static;background:rgba(255,255,255,.15)" onclick="closeEditModalBtn()"><i class="fas fa-xmark"></i></button>
      </div>
      <div style="padding:26px 28px">
        <div class="form-grid">
          <div class="form-field">
            <label>Kode Inventaris</label>
            <input type="text" id="editKodeInventaris" placeholder="Contoh: 3.07.02.01.0001">
          </div>
          <div class="form-field">
            <label>Nama Barang *</label>
            <input type="text" id="editNama" placeholder="Nama barang">
          </div>
          <div class="form-field">
            <label>Kategori *</label>
            <select id="editKategori">
              <option value="">-- Pilih Kategori --</option>
              <option>Elektronik</option>
              <option>Mebel</option>
              <option>Penghargaan</option>
              <option>Olahraga</option>
              <option>Alat Tulis</option>
              <option>Buku</option>
              <option>Lainnya</option>
            </select>
          </div>
          <div class="form-field">
            <label>Jenis Barang *</label>
            <select id="editJenisBarang">
              <option value="">-- Pilih Jenis --</option>
              <option>Barang Modal</option>
              <option>Barang Habis Pakai</option>
            </select>
          </div>
          <div class="form-field">
            <label>Merk</label>
            <input type="text" id="editMerk" placeholder="Contoh: ASUS VivoBook">
          </div>
          <div class="form-field">
            <label>Spesifikasi</label>
            <input type="text" id="editSpesifikasi" placeholder="Spesifikasi singkat">
          </div>
          <div class="form-field">
            <label>Tahun Perolehan *</label>
            <input type="number" id="editTahun" min="2000" max="2099">
          </div>
          <div class="form-field">
            <label>Harga Perolehan (Rp)</label>
            <input type="number" id="editHarga" min="0" placeholder="0">
          </div>
          <div class="form-field">
            <label>Sumber Dana</label>
            <select id="editSumberDana">
              <option value="">-- Pilih Sumber Dana --</option>
              <option>APBN</option>
              <option>APBD</option>
              <option>BOS</option>
              <option>Non-APBD / Hadiah Lomba</option>
              <option>Sumbangan</option>
              <option>Swadaya Sekolah</option>
            </select>
          </div>
          <div class="form-field">
            <label>Kondisi *</label>
            <select id="editKondisi">
              <option value="">-- Pilih Kondisi --</option>
              <option>Baik</option>
              <option>Perlu Perbaikan</option>
              <option>Rusak</option>
            </select>
          </div>
          <div class="form-field">
            <label>Status *</label>
            <select id="editStatus">
              <option value="">-- Pilih Status --</option>
              <option>Tersedia</option>
              <option>Dipinjam</option>
              <option>Dihapus</option>
            </select>
          </div>
          <div class="form-field">
            <label>Tanggal Masuk *</label>
            <input type="date" id="editTanggal">
          </div>
          <div class="form-field">
            <label>Lokasi Penempatan *</label>
            <input type="text" id="editLokasi" placeholder="Lokasi barang">
          </div>
          <div class="form-field full">
            <label>Deskripsi Detail</label>
            <textarea id="editDeskripsi" style="min-height:90px" placeholder="Deskripsi lengkap barang..."></textarea>
          </div>
        </div>
        <p style="font-size:12px;color:var(--gray-400);margin-top:4px">Catatan: jika Lokasi Penempatan diubah, sistem otomatis menambahkan satu entri baru ke Riwayat Lokasi barang ini.</p>
        <div style="display:flex;gap:12px;margin-top:8px">
          <button class="btn btn-primary" onclick="simpanEdit()">
            <i class="fas fa-floppy-disk"></i> Simpan Perubahan
          </button>
          <button class="btn btn-outline" onclick="closeEditModalBtn()">Batal</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ============================================================
     █  MODAL AJUKAN PEMINJAMAN
============================================================ -->
<div class="modal-overlay" id="modalPeminjaman" onclick="closePeminjamanModal(event)">
  <div class="modal-box" style="max-width:600px" id="peminjamanModalBox">
    <div style="position:relative">
      <div style="background:linear-gradient(120deg,var(--green-900),var(--green-700));padding:22px 28px;border-radius:var(--radius-lg) var(--radius-lg) 0 0;display:flex;align-items:center;justify-content:space-between">
        <div>
          <h2 style="font-family:Sora,sans-serif;font-size:18px;font-weight:800;color:white;margin-bottom:3px"><i class="fas fa-right-left" style="margin-right:8px"></i>Ajukan Peminjaman Barang</h2>
          <p style="font-size:13px;color:rgba(255,255,255,.7)">Isi data peminjam dan barang yang akan dipinjam</p>
        </div>
        <button class="modal-close" style="position:static;background:rgba(255,255,255,.15)" onclick="closePeminjamanModalBtn()"><i class="fas fa-xmark"></i></button>
      </div>
      <div style="padding:26px 28px">
        <div class="form-grid">
          <div class="form-field">
            <label>Nama Peminjam *</label>
            <input type="text" id="pjmNamaPeminjam" placeholder="Contoh: Bpk. Andi Nugroho, S.Pd.">
          </div>
          <div class="form-field">
            <label>Guru / Kelas *</label>
            <input type="text" id="pjmGuru" placeholder="Contoh: Guru Kelas 8B / Guru Matematika">
          </div>
          <div class="form-field">
            <label>Jabatan *</label>
            <select id="pjmJabatan">
              <option value="">-- Pilih Jabatan --</option>
              <option>Guru Mapel</option>
              <option>Wali Kelas</option>
              <option>Kepala Sekolah</option>
              <option>Wakil Kepala Sekolah</option>
              <option>Staff TU</option>
              <option>Pembina Ekstrakurikuler</option>
            </select>
          </div>
          <div class="form-field">
            <label>Barang yang Dipinjam *</label>
            <select id="pjmBarang"></select>
          </div>
          <div class="form-field">
            <label>Tanggal Pinjam *</label>
            <input type="date" id="pjmTanggalPinjam">
          </div>
          <div class="form-field">
            <label>Sampai Kapan *</label>
            <input type="date" id="pjmSampaiKapan">
          </div>
          <div class="form-field">
            <label>Lokasi Selama Dipinjam *</label>
            <input type="text" id="pjmLokasi" placeholder="Contoh: Ruang Kelas 8B">
          </div>
          <div class="form-field full">
            <label>Foto Peminjam</label>
            <div class="upload-zone" onclick="alert(&#39;Fitur upload foto aktif pada versi penuh.&#39;)">
              <i class="fas fa-camera"></i>
              <p>Klik untuk mengambil / memilih foto peminjam</p>
              <small>Format: JPG, PNG — Maks. 2MB</small>
            </div>
          </div>
        </div>
        <div style="display:flex;gap:12px;margin-top:8px">
          <button class="btn btn-primary" onclick="simpanPeminjaman()">
            <i class="fas fa-floppy-disk"></i> Simpan Peminjaman
          </button>
          <button class="btn btn-outline" onclick="closePeminjamanModalBtn()">Batal</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ============================================================
     █  MODAL KONFIRMASI PENGEMBALIAN (SELESAIKAN PEMINJAMAN)
============================================================ -->
<div class="modal-overlay" id="modalSelesaikan" onclick="closeSelesaikanModal(event)">
  <div class="modal-box" style="max-width:520px" id="selesaikanModalBox">
    <div style="position:relative">
      <div style="background:linear-gradient(120deg,var(--green-900),var(--green-700));padding:22px 28px;border-radius:var(--radius-lg) var(--radius-lg) 0 0;display:flex;align-items:center;justify-content:space-between">
        <div>
          <h2 style="font-family:Sora,sans-serif;font-size:18px;font-weight:800;color:white;margin-bottom:3px"><i class="fas fa-check" style="margin-right:8px"></i>Konfirmasi Pengembalian</h2>
          <p style="font-size:13px;color:rgba(255,255,255,.7)" id="selesaiInfoText">-</p>
        </div>
        <button class="modal-close" style="position:static;background:rgba(255,255,255,.15)" onclick="closeSelesaikanModalBtn()"><i class="fas fa-xmark"></i></button>
      </div>
      <div style="padding:26px 28px">
        <div class="form-grid">
          <div class="form-field full">
            <label>Foto Bukti Pengembalian *</label>
            <div class="upload-zone" onclick="alert(&#39;Fitur upload foto aktif pada versi penuh.&#39;)">
              <i class="fas fa-camera"></i>
              <p>Klik untuk mengambil / memilih foto kondisi barang saat dikembalikan</p>
              <small>Format: JPG, PNG — Maks. 2MB</small>
            </div>
          </div>
          <div class="form-field full">
            <label>Catatan Pengembalian (opsional)</label>
            <textarea id="selesaiCatatan" style="min-height:70px" placeholder="Contoh: Barang dikembalikan dalam kondisi baik, tidak ada kerusakan"></textarea>
          </div>
        </div>
        <p style="font-size:12px;color:var(--gray-400);margin-top:4px">Foto bukti membantu memastikan kondisi barang saat dikembalikan tercatat dengan jelas.</p>
        <div style="display:flex;gap:12px;margin-top:12px">
          <button class="btn btn-primary" onclick="konfirmasiPengembalian()">
            <i class="fas fa-floppy-disk"></i> Konfirmasi Pengembalian
          </button>
          <button class="btn btn-outline" onclick="closeSelesaikanModalBtn()">Batal</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ============================================================
     █  MODAL LIHAT BUKTI PENGEMBALIAN
============================================================ -->
<div class="modal-overlay" id="modalBuktiFoto" onclick="closeBuktiFotoModal(event)">
  <div class="modal-box" style="max-width:440px" id="buktiFotoModalBox">
    <div style="position:relative">
      <div style="background:linear-gradient(120deg,var(--green-900),var(--green-700));padding:18px 22px;border-radius:var(--radius-lg) var(--radius-lg) 0 0;display:flex;align-items:center;justify-content:space-between">
        <h2 style="font-family:Sora,sans-serif;font-size:16px;font-weight:800;color:white"><i class="fas fa-image" style="margin-right:8px"></i>Bukti Foto Pengembalian</h2>
        <button class="modal-close" style="position:static;background:rgba(255,255,255,.15)" onclick="closeBuktiFotoModalBtn()"><i class="fas fa-xmark"></i></button>
      </div>
      <div style="padding:22px">
        <img id="buktiFotoImg" src="" alt="Bukti pengembalian" style="width:100%;border-radius:var(--radius-sm);margin-bottom:12px" />
        <p style="font-size:13px;color:var(--gray-600)" id="buktiFotoInfo"></p>
        <button class="btn btn-outline" style="margin-top:14px;width:100%" onclick="closeBuktiFotoModalBtn()">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- ============================================================
     █  TOAST NOTIFICATION
============================================================ -->
<div class="toast" id="toast">
  <i class="fas fa-circle-check"></i>
  <span id="toastMsg">Login berhasil! Selamat datang, Sarpra.</span>
</div>

<!-- ============================================================
     █  JAVASCRIPT
============================================================ -->
<script>
/* ============================================================
   DATA INVENTARIS (12 barang dummy realistis)
============================================================ */
const inventaris = [
  {
    id: "INV-001",
    kodeInventaris: "3.05.02.06.0001",
    nama: "Piala Juara 1 OSN Matematika Tingkat Kabupaten",
    kategori: "Penghargaan",
    jenisBarang: "Barang Modal",
    merk: "-",
    spesifikasi: "Tinggi 42 cm, logam kuningan berlapis emas",
    deskripsi: "Piala berukuran tinggi 42 cm terbuat dari logam kuningan berlapis emas, diperoleh atas prestasi siswa SMPN 5 Purbalingga pada ajang Olimpiade Sains Nasional (OSN) bidang Matematika tingkat Kabupaten Purbalingga Tahun 2022. Nama siswa: Rizky Ramadhan (Kelas 8A). Diverifikasi oleh Dinas Pendidikan Kabupaten Purbalingga.",
    tahun: 2022,
    harga: 750000,
    sumberDana: "Non-APBD / Hadiah Lomba",
    kondisi: "Baik",
    status: "Tersedia",
    tanggal: "2022-09-15",
    lokasi: "Ruang Piala / Tata Usaha",
    gambar: "https://placehold.co/120x120/fef9c3/a16207?text=Piala+OSN&font=sora",
    riwayatLokasi: [
      { lokasi: "Ruang Piala / Tata Usaha", tanggal: "2022-09-15", petugas: "Bpk. Slamet (Sarpras)", alasan: "Barang diterima dan langsung didata sebagai koleksi penghargaan sekolah" }
    ]
  },
  {
    id: "INV-002",
    kodeInventaris: "3.06.01.02.0002",
    nama: "Meja Siswa Kayu Kelas 7A",
    kategori: "Mebel",
    jenisBarang: "Barang Modal",
    merk: "-",
    spesifikasi: "Kayu jati, finishing melamin, 60x40x75 cm",
    deskripsi: "Meja belajar siswa berbahan kayu jati kelas menengah dengan finishing melamin warna coklat. Dimensi: 60x40x75 cm. Dilengkapi laci di bagian bawah untuk penyimpanan buku. Diperoleh melalui pengadaan tahun ajaran 2020/2021 oleh Dinas Pendidikan. Saat ini digunakan di Kelas 7A, baris 2 urutan ke-3.",
    tahun: 2020,
    harga: 650000,
    sumberDana: "APBD",
    kondisi: "Perlu Perbaikan",
    status: "Tersedia",
    tanggal: "2020-07-10",
    lokasi: "Kelas 7A",
    gambar: "https://placehold.co/120x120/f0fdf4/166534?text=Meja+Kayu&font=sora",
    riwayatLokasi: [
      { lokasi: "Gudang Sarpras", tanggal: "2020-07-10", petugas: "Bpk. Slamet (Sarpras)", alasan: "Barang baru tiba dari pengadaan Dinas Pendidikan, disimpan sementara di gudang" },
      { lokasi: "Kelas 7A", tanggal: "2020-07-20", petugas: "Bpk. Slamet (Sarpras)", alasan: "Didistribusikan ke ruang kelas untuk digunakan siswa" }
    ]
  },
  {
    id: "INV-003",
    kodeInventaris: "3.07.02.01.0003",
    nama: "Laptop ASUS VivoBook Core i5",
    kategori: "Elektronik",
    jenisBarang: "Barang Modal",
    merk: "ASUS VivoBook 14 A416EA",
    spesifikasi: "Core i5-1135G7, RAM 8GB, SSD 512GB, 14\" FHD IPS",
    deskripsi: "Laptop ASUS VivoBook 14 A416EA dengan spesifikasi: Prosesor Intel Core i5-1135G7 (2.4 GHz), RAM 8GB DDR4, Storage 512GB SSD NVMe, layar 14 inci FHD IPS anti-glare. OS: Windows 11 Home. Nomor seri: ASX220043-PBG. Digunakan untuk kegiatan Pelajaran TIK dan kegiatan ekstra komputer. Unit ke-3 dari 10 unit yang diadakan.",
    tahun: 2023,
    harga: 7200000,
    sumberDana: "BOS",
    kondisi: "Baik",
    status: "Dipinjam",
    tanggal: "2023-01-20",
    lokasi: "Ruang Kepala Sekolah",
    gambar: "https://placehold.co/120x120/dbeafe/1d4ed8?text=Laptop+ASUS&font=sora",
    riwayatLokasi: [
      { lokasi: "Lab Komputer", tanggal: "2023-01-20", petugas: "Bpk. Slamet (Sarpras)", alasan: "Barang baru diterima dan ditempatkan di Lab Komputer untuk kegiatan TIK" },
      { lokasi: "Ruang Guru", tanggal: "2024-03-11", petugas: "Ibu Wulan (Sarpras)", alasan: "Dipindahkan sementara untuk digunakan input nilai rapor semester" },
      { lokasi: "Perpustakaan", tanggal: "2025-05-02", petugas: "Bpk. Slamet (Sarpras)", alasan: "Dipindahkan ke perpustakaan untuk mendukung katalog digital" },
      { lokasi: "Ruang Kepala Sekolah", tanggal: "2026-07-15", petugas: "Bpk. Slamet (Sarpras)", alasan: "Dipinjam oleh Kepala Sekolah untuk keperluan rapat dinas luar" }
    ]
  },
  {
    id: "INV-004",
    kodeInventaris: "3.07.02.03.0004",
    nama: "Proyektor Epson EB-X51",
    kategori: "Elektronik",
    jenisBarang: "Barang Modal",
    merk: "Epson EB-X51",
    spesifikasi: "XGA 1024x768, 3800 lumen, HDMI/VGA/USB",
    deskripsi: "Proyektor Epson EB-X51 dengan resolusi XGA (1024x768), kecerahan 3800 lumen, rasio kontras 15.000:1. Dilengkapi koneksi HDMI, VGA, USB. Cocok untuk presentasi di ruang berukuran sedang hingga besar. Nomor seri: EPSX5148-0023. Digunakan secara rutin untuk kegiatan belajar-mengajar dan rapat dinas di Ruang Guru.",
    tahun: 2023,
    harga: 5400000,
    sumberDana: "BOS",
    kondisi: "Baik",
    status: "Tersedia",
    tanggal: "2023-03-05",
    lokasi: "Ruang Guru",
    gambar: "https://placehold.co/120x120/ede9fe/6d28d9?text=Proyektor+Epson&font=sora",
    riwayatLokasi: [
      { lokasi: "Ruang Guru", tanggal: "2023-03-05", petugas: "Bpk. Slamet (Sarpras)", alasan: "Barang baru diterima dan langsung ditempatkan di Ruang Guru" }
    ]
  },
  {
    id: "INV-005",
    kodeInventaris: "3.06.01.03.0005",
    nama: "Kursi Guru Putar Ergonomis",
    kategori: "Mebel",
    jenisBarang: "Barang Modal",
    merk: "Chitose Sena",
    spesifikasi: "Dudukan busa high-density, sandaran mesh, tinggi 43-53 cm",
    deskripsi: "Kursi kerja putar ergonomis bermerk Chitose tipe Sena dengan dudukan berbahan busa high-density, sandaran punggung jaring mesh berwarna hitam, roda plastik keras, penyangga lengan yang dapat dilipat. Tinggi bisa diatur dari 43–53 cm. Dipergunakan oleh wali kelas di Ruang Guru sejak tahun 2021.",
    tahun: 2021,
    harga: 1250000,
    sumberDana: "APBD",
    kondisi: "Baik",
    status: "Tersedia",
    tanggal: "2021-08-18",
    lokasi: "Ruang Guru",
    gambar: "https://placehold.co/120x120/fce7f3/9d174d?text=Kursi+Guru&font=sora",
    riwayatLokasi: [
      { lokasi: "Ruang Guru", tanggal: "2021-08-18", petugas: "Bpk. Slamet (Sarpras)", alasan: "Barang baru diterima dan ditempatkan langsung di Ruang Guru" }
    ]
  },
  {
    id: "INV-006",
    kodeInventaris: "3.09.01.01.0006",
    nama: "Set Alat Olahraga Bola Voli (Net + Bola + Tiang)",
    kategori: "Olahraga",
    jenisBarang: "Barang Habis Pakai",
    merk: "Mikasa MVA200",
    spesifikasi: "Net 9.5x1 m, tiang adjustable 1.8-2.43 m, 2 bola voli",
    deskripsi: "Satu set perlengkapan bola voli terdiri dari: net voli standar ukuran 9.5x1 m berbahan nilon sintetis berwarna merah putih, 1 pasang tiang besi galvanis tinggi adjustable 1.8-2.43 m, dan 2 bola voli merk Mikasa MVA200 ukuran 5. Digunakan untuk kegiatan Penjaskes kelas 7-9 dan latihan rutin ekstra voli tiap Selasa dan Sabtu.",
    tahun: 2022,
    harga: 1800000,
    sumberDana: "BOS",
    kondisi: "Perlu Perbaikan",
    status: "Tersedia",
    tanggal: "2022-04-07",
    lokasi: "Lapangan / Gudang Olahraga",
    gambar: "https://placehold.co/120x120/dcfce7/15803d?text=Alat+Voli&font=sora",
    riwayatLokasi: [
      { lokasi: "Lapangan / Gudang Olahraga", tanggal: "2022-04-07", petugas: "Bpk. Slamet (Sarpras)", alasan: "Barang baru diterima dan disimpan di gudang olahraga" }
    ]
  },
  {
    id: "INV-007",
    kodeInventaris: "3.07.02.01.0007",
    nama: "Komputer PC All-in-One Dell OptiPlex 3000",
    kategori: "Elektronik",
    jenisBarang: "Barang Modal",
    merk: "Dell OptiPlex 3000 AIO",
    spesifikasi: "Core i3-12100T, RAM 8GB, SSD 256GB, 23.8\" FHD",
    deskripsi: "PC All-in-One Dell OptiPlex 3000 AIO dengan spesifikasi: Intel Core i3-12100T, RAM 8GB DDR4, SSD 256GB, layar 23.8 inci FHD. Dilengkapi keyboard dan mouse wireless. Nomor seri: DL30PBG-2024-007. Digunakan di Lab Komputer sebagai komputer demonstrasi guru atau server lokal pembelajaran.",
    tahun: 2024,
    harga: 8500000,
    sumberDana: "APBN",
    kondisi: "Baik",
    status: "Dipinjam",
    tanggal: "2024-02-14",
    lokasi: "Ruang Tata Usaha",
    gambar: "https://placehold.co/120x120/dbeafe/1e40af?text=PC+Dell+AIO&font=sora",
    riwayatLokasi: [
      { lokasi: "Lab Komputer", tanggal: "2024-02-14", petugas: "Bpk. Slamet (Sarpras)", alasan: "Barang baru diterima dan ditempatkan sebagai komputer demonstrasi guru" },
      { lokasi: "Ruang Tata Usaha", tanggal: "2026-07-10", petugas: "Ibu Wulan (Sarpras)", alasan: "Dipinjam staf Tata Usaha untuk keperluan input data ujian" }
    ]
  },
  {
    id: "INV-008",
    kodeInventaris: "3.06.01.04.0008",
    nama: "Lemari Arsip Besi 2 Pintu",
    kategori: "Mebel",
    jenisBarang: "Barang Modal",
    merk: "Lion Star F-207",
    spesifikasi: "90x45x185 cm, kunci ganda, 3 rak internal",
    deskripsi: "Lemari arsip besi 2 pintu merk Lion Star tipe F-207 dengan dimensi 90x45x185 cm berwarna abu-abu. Dilengkapi kunci ganda, 3 rak internal yang dapat dipindah posisinya, dan penahan dokumen tegak. Digunakan untuk menyimpan dokumen administrasi sekolah, arsip nilai, dan surat-surat penting. Kondisi pintu kiri engselnya mulai longgar.",
    tahun: 2019,
    harga: 2100000,
    sumberDana: "APBD",
    kondisi: "Perlu Perbaikan",
    status: "Tersedia",
    tanggal: "2019-07-02",
    lokasi: "Ruang Tata Usaha",
    gambar: "https://placehold.co/120x120/f3f4f6/374151?text=Lemari+Arsip&font=sora",
    riwayatLokasi: [
      { lokasi: "Ruang Tata Usaha", tanggal: "2019-07-02", petugas: "Bpk. Slamet (Sarpras)", alasan: "Barang baru diterima dan ditempatkan di Ruang Tata Usaha" }
    ]
  },
  {
    id: "INV-009",
    kodeInventaris: "3.05.02.06.0009",
    nama: "Piala Juara 2 Lomba Pramuka Tingkat Provinsi",
    kategori: "Penghargaan",
    jenisBarang: "Barang Modal",
    merk: "-",
    spesifikasi: "Tinggi 38 cm, resin berlapis silver",
    deskripsi: "Piala setinggi 38 cm berbahan resin berlapis silver, diperoleh pada Lomba Tingkat III Pramuka Penggalang Tingkat Provinsi Jawa Tengah Tahun 2023 yang diselenggarakan di Kota Semarang. Nama regu: Elang Emas. Pembina Pramuka: Bpk. Darmawan, S.Pd. Disimpan bersama koleksi piala sekolah di lemari kaca Ruang Tata Usaha.",
    tahun: 2023,
    harga: 500000,
    sumberDana: "Non-APBD / Hadiah Lomba",
    kondisi: "Baik",
    status: "Tersedia",
    tanggal: "2023-11-20",
    lokasi: "Ruang Piala / Tata Usaha",
    gambar: "https://placehold.co/120x120/fef9c3/92400e?text=Piala+Pramuka&font=sora",
    riwayatLokasi: [
      { lokasi: "Ruang Piala / Tata Usaha", tanggal: "2023-11-20", petugas: "Bpk. Slamet (Sarpras)", alasan: "Barang diterima dan langsung didata sebagai koleksi penghargaan sekolah" }
    ]
  },
  {
    id: "INV-010",
    kodeInventaris: "3.07.02.05.0010",
    nama: "Whiteboard Magnetik 120x240 cm",
    kategori: "Elektronik",
    jenisBarang: "Barang Modal",
    merk: "Sakana",
    spesifikasi: "120x240 cm, rangka aluminium, permukaan email putih",
    deskripsi: "Papan tulis whiteboard magnetik ukuran 120x240 cm bermerk Sakana dengan permukaan email putih yang halus, rangka aluminium profil tebal 2 cm, dilengkapi rel penjepit peta/dokumen di bagian atas. Cocok untuk spidol whiteboard maupun magnet display materi. Kondisi sudah agak sulit dihapus bersih di area tengah akibat penggunaan spidol permanen.",
    tahun: 2020,
    harga: 950000,
    sumberDana: "APBD",
    kondisi: "Perlu Perbaikan",
    status: "Tersedia",
    tanggal: "2020-07-10",
    lokasi: "Kelas 7A",
    gambar: "https://placehold.co/120x120/e0f2fe/0369a1?text=Whiteboard&font=sora",
    riwayatLokasi: [
      { lokasi: "Kelas 7A", tanggal: "2020-07-10", petugas: "Bpk. Slamet (Sarpras)", alasan: "Barang baru diterima dan dipasang di Kelas 7A" }
    ]
  },
  {
    id: "INV-011",
    kodeInventaris: "3.07.02.04.0011",
    nama: "Printer Canon PIXMA iP2870S",
    kategori: "Elektronik",
    jenisBarang: "Barang Modal",
    merk: "Canon PIXMA iP2870S",
    spesifikasi: "Inkjet warna, 4800x1200 dpi, USB 2.0",
    deskripsi: "Printer inkjet warna Canon PIXMA iP2870S dengan kemampuan cetak hingga 4800x1200 dpi, kecepatan cetak hitam 8 ipm, warna 4 ipm. Koneksi USB 2.0. Nomor seri: CNXPBG-0921-011. Digunakan untuk mencetak soal, lembar kerja siswa, dan surat dinas oleh guru di Ruang Guru. Cartridge sudah diganti dengan sistem infus modifikasi untuk efisiensi tinta. Barang telah dihapus dari daftar aset aktif karena rusak permanen dan tidak ekonomis untuk diperbaiki.",
    tahun: 2021,
    harga: 550000,
    sumberDana: "APBD",
    kondisi: "Rusak",
    status: "Dihapus",
    tanggal: "2021-09-15",
    lokasi: "Gudang Barang Rusak",
    gambar: "https://placehold.co/120x120/fce7f3/831843?text=Printer+Canon&font=sora",
    riwayatLokasi: [
      { lokasi: "Ruang Guru", tanggal: "2021-09-15", petugas: "Bpk. Slamet (Sarpras)", alasan: "Barang baru diterima dan ditempatkan di Ruang Guru" },
      { lokasi: "Gudang Barang Rusak", tanggal: "2026-06-01", petugas: "Bpk. Slamet (Sarpras)", alasan: "Rusak permanen (head printer tidak berfungsi), dipindahkan ke gudang menunggu proses penghapusan aset" }
    ]
  },
  {
    id: "INV-012",
    kodeInventaris: "3.06.01.02.0012",
    nama: "Meja Guru Kayu Jati",
    kategori: "Mebel",
    jenisBarang: "Barang Modal",
    merk: "-",
    spesifikasi: "120x60x75 cm, kayu jati, finishing politur glossy",
    deskripsi: "Meja guru ukuran 120x60x75 cm berbahan kayu jati pilihan dengan finishing politur glossy berwarna coklat mahoni. Dilengkapi laci kanan bawah yang dapat dikunci. Diadakan pada masa rehab sekolah tahun 2018. Saat ini kondisi meja sudah tidak stabil, kaki depan kanan retak, dan permukaan atas banyak goresan dalam. Perlu penggantian atau perbaikan menyeluruh.",
    tahun: 2018,
    harga: 1400000,
    sumberDana: "APBD",
    kondisi: "Rusak",
    status: "Tersedia",
    tanggal: "2018-06-20",
    lokasi: "Kelas 9B",
    gambar: "https://placehold.co/120x120/fee2e2/991b1b?text=Meja+Guru&font=sora",
    riwayatLokasi: [
      { lokasi: "Kelas 9B", tanggal: "2018-06-20", petugas: "Bpk. Slamet (Sarpras)", alasan: "Barang baru diterima dari pengadaan rehab sekolah dan ditempatkan di Kelas 9B" }
    ]
  }
];

/* ============================================================
   DATA PEMINJAMAN BARANG
============================================================ */
const peminjaman = [
  {
    id: "PJM-001",
    namaPeminjam: "Bpk. Drs. Hariyanto, M.Pd.",
    guru: "Guru Kelas 7A",
    jabatan: "Kepala Sekolah",
    foto: "https://placehold.co/80x80/1b5e20/ffffff?text=H&font=sora",
    barangId: "INV-003",
    lokasiSekarang: "Ruang Kepala Sekolah",
    tanggalPinjam: "2026-07-15",
    sampaiKapan: "2026-07-22",
    status: "Dipinjam"
  },
  {
    id: "PJM-002",
    namaPeminjam: "Ibu Wulan Setyaningsih, S.Pd.",
    guru: "Staff Tata Usaha",
    jabatan: "Staff TU",
    foto: "https://placehold.co/80x80/388e3c/ffffff?text=W&font=sora",
    barangId: "INV-007",
    lokasiSekarang: "Ruang Tata Usaha",
    tanggalPinjam: "2026-07-10",
    sampaiKapan: "2026-07-25",
    status: "Dipinjam"
  },
  {
    id: "PJM-003",
    namaPeminjam: "Bpk. Darmawan, S.Pd.",
    guru: "Pembina Pramuka",
    jabatan: "Guru Mapel",
    foto: "https://placehold.co/80x80/2e7d32/ffffff?text=D&font=sora",
    barangId: "INV-004",
    lokasiSekarang: "Aula Sekolah",
    tanggalPinjam: "2026-06-20",
    sampaiKapan: "2026-06-21",
    status: "Selesai"
  }
];


/* ============================================================
   DASHBOARD STATS (dihitung otomatis dari data inventaris)
============================================================ */
function updateDashboardStats() {
  const total    = inventaris.length;
  const baik     = inventaris.filter(i => i.kondisi === 'Baik').length;
  const rusak    = inventaris.filter(i => i.kondisi === 'Rusak').length;
  const perlu    = inventaris.filter(i => i.kondisi === 'Perlu Perbaikan').length;
  const dipinjam = inventaris.filter(i => i.status === 'Dipinjam').length;
  const dihapus  = inventaris.filter(i => i.status === 'Dihapus').length;

  const set = (id, val) => { const el = document.getElementById(id); if (el) el.textContent = val; };
  set('statTotal', total);
  set('statBaik', baik);
  set('statRusak', rusak);
  set('statPerlu', perlu);
  set('statDipinjam', dipinjam);
  set('statDihapus', dihapus);
}

/* ============================================================
   LAPORAN — RINGKASAN PER LOKASI (dinamis mengikuti data)
============================================================ */
function renderLaporanLokasi() {
  const set = (id, val) => { const el = document.getElementById(id); if (el) el.textContent = val; };
  set('reportTotal', inventaris.length);
  set('reportBaik', inventaris.filter(i => i.kondisi === 'Baik').length);
  set('reportPerlu', inventaris.filter(i => i.kondisi === 'Perlu Perbaikan').length);
  set('reportRusak', inventaris.filter(i => i.kondisi === 'Rusak').length);

  const tbody = document.getElementById('laporanLokasiBody');
  if (!tbody) return;

  const perLokasi = {};
  inventaris.forEach(item => {
    if (!perLokasi[item.lokasi]) {
      perLokasi[item.lokasi] = { total: 0, baik: 0, perlu: 0, rusak: 0 };
    }
    perLokasi[item.lokasi].total++;
    if (item.kondisi === 'Baik') perLokasi[item.lokasi].baik++;
    if (item.kondisi === 'Perlu Perbaikan') perLokasi[item.lokasi].perlu++;
    if (item.kondisi === 'Rusak') perLokasi[item.lokasi].rusak++;
  });

  const lokasiTerurut = Object.keys(perLokasi).sort((a, b) => perLokasi[b].total - perLokasi[a].total);

  if (!lokasiTerurut.length) {
    tbody.innerHTML = `<tr><td colspan="5" style="text-align:center;color:var(--gray-400)">Belum ada data lokasi.</td></tr>`;
    return;
  }

  tbody.innerHTML = lokasiTerurut.map(lokasi => {
    const d = perLokasi[lokasi];
    return `<tr><td>${lokasi}</td><td>${d.total}</td><td>${d.baik}</td><td>${d.perlu}</td><td>${d.rusak}</td></tr>`;
  }).join('');
}

/* ============================================================
   HAPUS BARANG
============================================================ */
function hapusBarang(idx) {
  const item = inventaris[idx];
  if (!item) return;
  if (!confirm(`Yakin ingin menghapus barang "${item.nama}" (${item.id})? Tindakan ini tidak dapat dibatalkan.`)) return;

  const idHapus = item.id;
  inventaris.splice(idx, 1);

  // Bersihkan referensi di data peminjaman aktif jika ada
  const idxPeminjaman = peminjaman.findIndex(p => p.barangId === idHapus && p.status === 'Dipinjam');
  if (idxPeminjaman !== -1) peminjaman.splice(idxPeminjaman, 1);

  renderTable(inventaris);
  updateDashboardStats();
  if (document.getElementById('panel-peminjaman').classList.contains('active')) renderPeminjaman();
  showToast('Barang berhasil dihapus dari inventaris.');
}

/* ============================================================
   PEMINJAMAN
============================================================ */
function loanStatusBadge(status) {
  const cls = status === 'Dipinjam' ? 'badge-dipinjam' : 'badge-selesai';
  const icon = status === 'Dipinjam' ? 'fa-right-left' : 'fa-circle-check';
  return `<span class="badge-kondisi ${cls}"><i class="fas ${icon}"></i> ${status}</span>`;
}

function renderPeminjaman() {
  const tbody = document.getElementById('peminjamanTableBody');
  tbody.innerHTML = '';

  peminjaman.forEach((p, idx) => {
    const barang = inventaris.find(i => i.id === p.barangId);
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td>
        <div class="peminjam-cell">
          <img src="${p.foto}" alt="${p.namaPeminjam}" class="peminjam-avatar" />
          <span class="peminjam-name">${p.namaPeminjam}</span>
        </div>
      </td>
      <td>${p.guru}</td>
      <td><span class="peminjam-jabatan">${p.jabatan}</span></td>
      <td>${barang ? barang.nama : p.barangId}<br><span style="font-size:11px;color:var(--gray-400)">${p.barangId}</span></td>
      <td><i class="fas fa-location-dot" style="color:var(--green-500);margin-right:5px;font-size:12px"></i>${p.lokasiSekarang}</td>
      <td>${p.tanggalPinjam}</td>
      <td>${p.sampaiKapan}</td>
      <td>${loanStatusBadge(p.status)}</td>
      <td>
        ${p.status === 'Dipinjam'
          ? `<button class="btn btn-sm btn-primary" onclick="bukaSelesaikanPeminjaman(${idx})" title="Tandai Selesai">
               <i class="fas fa-check"></i> Selesaikan
             </button>`
          : p.fotoPengembalian
            ? `<button class="btn btn-sm btn-outline" onclick="lihatBuktiPengembalian(${idx})" title="Lihat Bukti Pengembalian">
                 <i class="fas fa-image"></i> Lihat Bukti
               </button>`
            : `<span style="font-size:12px;color:var(--gray-400)">—</span>`
        }
      </td>
    `;
    tbody.appendChild(tr);
  });
}

let idxPeminjamanSelesai = null;

function bukaSelesaikanPeminjaman(idx) {
  const p = peminjaman[idx];
  if (!p || p.status !== 'Dipinjam') return;
  idxPeminjamanSelesai = idx;
  document.getElementById('selesaiInfoText').textContent =
    `${p.namaPeminjam} (${p.jabatan}) — mengembalikan ${p.barangId}`;
  document.getElementById('selesaiCatatan').value = '';
  document.getElementById('modalSelesaikan').classList.add('open');
}
function closeSelesaikanModal(e) {
  if (e.target === document.getElementById('modalSelesaikan')) closeSelesaikanModalBtn();
}
function closeSelesaikanModalBtn() {
  document.getElementById('modalSelesaikan').classList.remove('open');
  idxPeminjamanSelesai = null;
}

function konfirmasiPengembalian() {
  const idx = idxPeminjamanSelesai;
  const p = peminjaman[idx];
  if (!p || p.status !== 'Dipinjam') return;

  const catatan = document.getElementById('selesaiCatatan').value.trim();

  p.status = 'Selesai';
  p.fotoPengembalian = `https://placehold.co/360x260/dcfce7/15803d?text=Bukti+Pengembalian&font=sora`;
  p.catatanPengembalian = catatan;

  const item = inventaris.find(i => i.id === p.barangId);
  if (item) {
    item.status = 'Tersedia';
    item.riwayatLokasi = [...(item.riwayatLokasi || []), {
      lokasi: item.lokasi,
      tanggal: new Date().toISOString().slice(0, 10),
      petugas: 'Admin Sarpras',
      alasan: `Peminjaman oleh ${p.namaPeminjam} (${p.jabatan}) telah diselesaikan dan dikembalikan${catatan ? ' — Catatan: ' + catatan : ''}`
    }];
  }

  closeSelesaikanModalBtn();
  renderPeminjaman();
  renderTable(inventaris);
  updateDashboardStats();
  showToast('Peminjaman ditandai selesai. Barang kembali berstatus Tersedia.');
}

function lihatBuktiPengembalian(idx) {
  const p = peminjaman[idx];
  if (!p || !p.fotoPengembalian) return;
  document.getElementById('buktiFotoImg').src = p.fotoPengembalian;
  document.getElementById('buktiFotoInfo').textContent =
    `${p.namaPeminjam} (${p.jabatan}) mengembalikan ${p.barangId} pada ${p.sampaiKapan}` +
    (p.catatanPengembalian ? ` — Catatan: ${p.catatanPengembalian}` : '');
  document.getElementById('modalBuktiFoto').classList.add('open');
}
function closeBuktiFotoModal(e) {
  if (e.target === document.getElementById('modalBuktiFoto')) closeBuktiFotoModalBtn();
}
function closeBuktiFotoModalBtn() {
  document.getElementById('modalBuktiFoto').classList.remove('open');
}

function openTambahPeminjaman() {
  const barangSelect = document.getElementById('pjmBarang');
  const tersedia = inventaris.filter(i => (i.status || 'Tersedia') === 'Tersedia');
  barangSelect.innerHTML = tersedia.length
    ? tersedia.map(i => `<option value="${i.id}">${i.id} — ${i.nama}</option>`).join('')
    : `<option value="">Tidak ada barang tersedia untuk dipinjam</option>`;

  document.getElementById('pjmNamaPeminjam').value = '';
  document.getElementById('pjmGuru').value = '';
  document.getElementById('pjmJabatan').value = '';
  document.getElementById('pjmTanggalPinjam').value = new Date().toISOString().slice(0, 10);
  document.getElementById('pjmSampaiKapan').value = '';
  document.getElementById('pjmLokasi').value = '';
  document.getElementById('modalPeminjaman').classList.add('open');
}
function closePeminjamanModal(e) {
  if (e.target === document.getElementById('modalPeminjaman')) closePeminjamanModalBtn();
}
function closePeminjamanModalBtn() {
  document.getElementById('modalPeminjaman').classList.remove('open');
}
function simpanPeminjaman() {
  const namaPeminjam  = document.getElementById('pjmNamaPeminjam').value.trim();
  const guru          = document.getElementById('pjmGuru').value.trim();
  const jabatan        = document.getElementById('pjmJabatan').value;
  const barangId       = document.getElementById('pjmBarang').value;
  const tanggalPinjam  = document.getElementById('pjmTanggalPinjam').value;
  const sampaiKapan    = document.getElementById('pjmSampaiKapan').value;
  const lokasiSekarang = document.getElementById('pjmLokasi').value.trim();

  if (!namaPeminjam || !guru || !jabatan || !barangId || !tanggalPinjam || !sampaiKapan || !lokasiSekarang) {
    alert('Harap lengkapi semua field yang wajib diisi (*).');
    return;
  }

  const nomorUrut = peminjaman.length + 1;
  peminjaman.push({
    id: 'PJM-' + String(nomorUrut).padStart(3, '0'),
    namaPeminjam,
    guru,
    jabatan,
    foto: `https://placehold.co/80x80/2e7d32/ffffff?text=${encodeURIComponent(namaPeminjam.charAt(0))}&font=sora`,
    barangId,
    lokasiSekarang,
    tanggalPinjam,
    sampaiKapan,
    status: 'Dipinjam'
  });

  const item = inventaris.find(i => i.id === barangId);
  if (item) {
    const lokasiLama = item.lokasi;
    item.status = 'Dipinjam';
    item.lokasi = lokasiSekarang;
    item.riwayatLokasi = [...(item.riwayatLokasi || []), {
      lokasi: lokasiSekarang,
      tanggal: tanggalPinjam,
      petugas: 'Admin Sarpras',
      alasan: `Dipinjam oleh ${namaPeminjam} (${jabatan}), sebelumnya di ${lokasiLama}`
    }];
  }

  closePeminjamanModalBtn();
  renderPeminjaman();
  renderTable(inventaris);
  updateDashboardStats();
  showToast('Peminjaman berhasil diajukan dan tercatat!');
}

/* ============================================================
   LOGIN LOGIC
============================================================ */
function doLogin() {
  const user = document.getElementById('loginUser').value.trim();
  const pass = document.getElementById('loginPass').value.trim();
  const err  = document.getElementById('loginError');

  // Validasi hardcoded (demo)
  if (user === 'sarpra' && pass === 'smpn5pbg') {
    err.classList.remove('show');
    // Sembunyikan login, tampilkan dashboard
    document.getElementById('loginPage').classList.remove('active');
    document.getElementById('dashPage').classList.add('active');
    renderTable(inventaris);
    updateDashboardStats();
    showToast('Login berhasil! Selamat datang, Sarpra.');
  } else {
    err.classList.remove('show');
    // Force reflow untuk re-trigger animasi
    void err.offsetWidth;
    err.classList.add('show');
  }
}

// Login dengan tombol Enter
document.addEventListener('keydown', (e) => {
  if (e.key === 'Enter' && document.getElementById('loginPage').classList.contains('active')) {
    doLogin();
  }
});

function toggleEye() {
  const inp  = document.getElementById('loginPass');
  const icon = document.getElementById('eyeIcon');
  if (inp.type === 'password') {
    inp.type = 'text';
    icon.className = 'fas fa-eye-slash';
  } else {
    inp.type = 'password';
    icon.className = 'fas fa-eye';
  }
}

/* ============================================================
   LOGOUT
============================================================ */
function doLogout() {
  if (!confirm('Yakin ingin keluar dari sistem?')) return;
  document.getElementById('dashPage').classList.remove('active');
  document.getElementById('loginPage').classList.add('active');
  document.getElementById('loginUser').value = '';
  document.getElementById('loginPass').value = '';
}

/* ============================================================
   PANEL NAVIGATION
============================================================ */
const panelTitles = {
  dashboard:   ['Dashboard', 'Selamat datang di Digi Inventa'],
  inventaris:  ['Data Inventaris', 'Kelola seluruh data barang inventaris sekolah'],
  peminjaman:  ['Peminjaman', 'Kelola peminjaman barang oleh guru dan staf'],
  tambah:      ['Tambah Barang', 'Formulir penambahan barang baru ke inventaris'],
  laporan:     ['Laporan', 'Ringkasan dan statistik inventaris'],
  profil:      ['Profil', 'Informasi akun pengguna aktif'],
};

function showPanel(name) {
  // Update panel visibility
  document.querySelectorAll('.panel').forEach(p => p.classList.remove('active'));
  const target = document.getElementById('panel-' + name);
  if (target) target.classList.add('active');

  // Update sidebar nav active state
  document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
  document.querySelectorAll('.nav-item[data-panel]').forEach(n => {
    if (n.dataset.panel === name) n.classList.add('active');
  });

  // Update header
  const info = panelTitles[name] || ['Dashboard', ''];
  document.getElementById('headerTitle').textContent = info[0];
  document.getElementById('headerSub').textContent   = info[1];

  // Render panel-specific content
  if (name === 'peminjaman') renderPeminjaman();
  if (name === 'dashboard') updateDashboardStats();
  if (name === 'laporan') renderLaporanLokasi();

  // Close sidebar on mobile
  document.getElementById('sidebar').classList.remove('open');
}

/* ============================================================
   SIDEBAR TOGGLE (mobile)
============================================================ */
function toggleSidebar() {
  document.getElementById('sidebar').classList.toggle('open');
}


/* ============================================================
   MODAL EDIT BARANG
============================================================ */
let editingIdx = null;

function openEdit(idx) {
  editingIdx = idx;
  const item = inventaris[idx];
  document.getElementById('editSubtitle').textContent = item.id + ' — ' + item.nama;
  document.getElementById('editKodeInventaris').value = item.kodeInventaris || '';
  document.getElementById('editNama').value     = item.nama;
  document.getElementById('editKategori').value = item.kategori;
  document.getElementById('editJenisBarang').value = item.jenisBarang || '';
  document.getElementById('editMerk').value     = item.merk || '';
  document.getElementById('editSpesifikasi').value = item.spesifikasi || '';
  document.getElementById('editTahun').value    = item.tahun;
  document.getElementById('editHarga').value    = item.harga || '';
  document.getElementById('editSumberDana').value = item.sumberDana || '';
  document.getElementById('editKondisi').value  = item.kondisi;
  document.getElementById('editStatus').value   = item.status || 'Tersedia';
  document.getElementById('editTanggal').value  = item.tanggal;
  document.getElementById('editLokasi').value   = item.lokasi;
  document.getElementById('editDeskripsi').value = item.deskripsi;
  document.getElementById('modalEdit').classList.add('open');
}

function closeEditModal(e) {
  if (e.target === document.getElementById('modalEdit')) closeEditModalBtn();
}
function closeEditModalBtn() {
  document.getElementById('modalEdit').classList.remove('open');
  editingIdx = null;
}

function simpanEdit() {
  if (editingIdx === null) return;
  const kodeInventaris = document.getElementById('editKodeInventaris').value.trim();
  const nama       = document.getElementById('editNama').value.trim();
  const kategori   = document.getElementById('editKategori').value;
  const jenisBarang = document.getElementById('editJenisBarang').value;
  const merk       = document.getElementById('editMerk').value.trim();
  const spesifikasi = document.getElementById('editSpesifikasi').value.trim();
  const tahun      = parseInt(document.getElementById('editTahun').value);
  const harga      = parseInt(document.getElementById('editHarga').value) || 0;
  const sumberDana = document.getElementById('editSumberDana').value;
  const kondisi    = document.getElementById('editKondisi').value;
  const status     = document.getElementById('editStatus').value;
  const tanggal    = document.getElementById('editTanggal').value;
  const lokasi     = document.getElementById('editLokasi').value.trim();
  const deskripsi  = document.getElementById('editDeskripsi').value.trim();

  if (!nama || !kategori || !kondisi || !status || !lokasi) {
    alert('Harap lengkapi semua field yang wajib diisi (*).');
    return;
  }

  const itemLama = inventaris[editingIdx];
  const lokasiBerubah = itemLama.lokasi !== lokasi;

  // Update data in memory
  inventaris[editingIdx] = {
    ...itemLama,
    kodeInventaris, nama, kategori, jenisBarang, merk, spesifikasi,
    tahun, harga, sumberDana, kondisi, status, tanggal, lokasi, deskripsi
  };

  // Catat otomatis ke riwayat lokasi jika lokasi berubah
  if (lokasiBerubah) {
    inventaris[editingIdx].riwayatLokasi = [
      ...(itemLama.riwayatLokasi || []),
      {
        lokasi,
        tanggal: new Date().toISOString().slice(0, 10),
        petugas: 'Petugas Sarpras',
        alasan: `Lokasi diperbarui melalui menu Edit Barang (sebelumnya: ${itemLama.lokasi})`
      }
    ];
  }

  closeEditModalBtn();
  renderTable(inventaris);
  updateDashboardStats();
  showToast('Data barang berhasil diperbarui!');
}

/* ============================================================
   RENDER TABLE
============================================================ */
function kondisiBadge(kondisi) {
  const cls = kondisi === 'Baik' ? 'badge-baik' : kondisi === 'Rusak' ? 'badge-rusak' : 'badge-perlu';
  const icon = kondisi === 'Baik' ? 'fa-circle-check' : kondisi === 'Rusak' ? 'fa-circle-xmark' : 'fa-wrench';
  return `<span class="badge-kondisi ${cls}"><i class="fas ${icon}"></i> ${kondisi}</span>`;
}
function statusBadge(status) {
  const cls  = status === 'Dipinjam' ? 'badge-dipinjam' : status === 'Dihapus' ? 'badge-dihapus' : 'badge-tersedia';
  const icon = status === 'Dipinjam' ? 'fa-right-left'  : status === 'Dihapus' ? 'fa-trash-can'   : 'fa-circle-check';
  return `<span class="badge-kondisi ${cls}"><i class="fas ${icon}"></i> ${status}</span>`;
}

function renderTable(data) {
  const tbody = document.getElementById('tableBody');
  tbody.innerHTML = '';

  data.forEach((item) => {
    const idx = inventaris.indexOf(item); // index asli, aman meski data sudah difilter

    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td>
        <span style="font-size:12px;font-weight:700;color:var(--gray-400)">${item.id}</span><br>
        <span style="font-size:11px;color:var(--gray-400)">${item.kodeInventaris || '-'}</span>
      </td>
      <td>
        <img src="${item.gambar}" alt="${item.nama}" class="item-thumb" />
      </td>
      <td>
        <div class="item-name-cell">
          <strong>${item.nama}</strong>
          <span>${item.deskripsi.substring(0,55)}…</span>
        </div>
      </td>
      <td>${item.kategori}<br><span style="font-size:11px;color:var(--gray-400)">${item.jenisBarang || ''}</span></td>
      <td>${item.merk || '-'}</td>
      <td>${item.tahun}</td>
      <td>${kondisiBadge(item.kondisi)}</td>
      <td>${statusBadge(item.status || 'Tersedia')}</td>
      <td><i class="fas fa-location-dot" style="color:var(--green-500);margin-right:5px;font-size:12px"></i>${item.lokasi}</td>
      <td>
        <div style="display:flex;gap:6px">
          <button class="btn btn-sm btn-info" onclick="openDetail(${idx})" title="Lihat Detail">
            <i class="fas fa-eye"></i>
          </button>
          <button class="btn btn-sm btn-outline" onclick="openEdit(${idx})" title="Edit Barang">
            <i class="fas fa-pen"></i>
          </button>
          <button class="btn btn-sm btn-danger" onclick="hapusBarang(${idx})" title="Hapus Barang">
            <i class="fas fa-trash"></i>
          </button>
        </div>
      </td>
    `;
    tbody.appendChild(tr);
  });

  document.getElementById('paginationInfo').textContent =
    `Menampilkan 1–${data.length} dari ${data.length} barang`;
}

/* ============================================================
   FILTER TABLE
============================================================ */
function filterTable() {
  const search      = document.getElementById('searchInput').value.toLowerCase();
  const tahun       = document.getElementById('filterTahun').value;
  const kondisi     = document.getElementById('filterKondisi').value;
  const jenisBarang = document.getElementById('filterJenisBarang').value;
  const lokasi      = document.getElementById('filterLokasi').value;
  const status      = document.getElementById('filterStatus').value;
  const kategori    = document.getElementById('filterKategori').value;

  const filtered = inventaris.filter(item => {
    const matchSearch  = !search  || item.nama.toLowerCase().includes(search) ||
                         item.id.toLowerCase().includes(search) ||
                         (item.kodeInventaris && item.kodeInventaris.toLowerCase().includes(search)) ||
                         item.lokasi.toLowerCase().includes(search);
    const matchTahun   = !tahun   || String(item.tahun) === tahun;
    const matchKondisi = !kondisi || item.kondisi === kondisi;
    const matchJenis   = !jenisBarang || item.jenisBarang === jenisBarang;
    const matchLokasi  = !lokasi  || item.lokasi === lokasi;
    const matchStatus  = !status  || (item.status || 'Tersedia') === status;
    const matchKategori = !kategori || item.kategori === kategori;
    return matchSearch && matchTahun && matchKondisi && matchJenis && matchLokasi && matchStatus && matchKategori;
  });

  renderTable(filtered);
}

/* ============================================================
   MODAL DETAIL
============================================================ */
let currentDetailIdx = 0;
function openDetail(idx) {
  currentDetailIdx = idx;
  const item = inventaris[idx];
  const kondisiClass = item.kondisi === 'Baik' ? 'badge-baik' :
                       item.kondisi === 'Rusak' ? 'badge-rusak' : 'badge-perlu';
  const kondisiIcon  = item.kondisi === 'Baik' ? 'fa-circle-check' :
                       item.kondisi === 'Rusak' ? 'fa-circle-xmark' : 'fa-wrench';
  const riwayat = item.riwayatLokasi || [];
  const riwayatHTML = riwayat.length ? `
    <ul class="timeline" style="margin-top:6px">
      ${riwayat.map(r => `
        <li class="timeline-item">
          <span class="timeline-dot"></span>
          <div class="timeline-card">
            <div class="loc"><i class="fas fa-location-dot" style="color:var(--green-600);margin-right:6px"></i>${r.lokasi}</div>
            <div class="meta">${r.tanggal} · ${r.petugas}</div>
            <div class="alasan">${r.alasan}</div>
          </div>
        </li>
      `).join('')}
    </ul>
  ` : `<p style="font-size:13px;color:var(--gray-400)">Belum ada riwayat lokasi tercatat.</p>`;

  document.getElementById('modalBox').innerHTML = `
    <div style="position:relative">
      <!-- Hero area -->
      <div class="detail-hero">
        <img src="${item.gambar}" alt="${item.nama}" class="detail-hero-img" />
        <div class="detail-hero-info">
          <span style="display:inline-block;font-size:11px;font-weight:700;letter-spacing:1px;text-transform:uppercase;background:rgba(255,255,255,.15);color:rgba(255,255,255,.85);padding:3px 10px;border-radius:99px;margin-bottom:10px">
            ${item.kategori} · ${item.jenisBarang || ''}
          </span>
          <h1>${item.nama}</h1>
          <p>${item.deskripsi}</p>
          <span class="badge-kondisi ${kondisiClass}">
            <i class="fas ${kondisiIcon}"></i> ${item.kondisi}
          </span>
          ${statusBadge(item.status || 'Tersedia')}
        </div>
        <button class="modal-close" onclick="closeModalBtn()"><i class="fas fa-xmark"></i></button>
      </div>

      <!-- Info grid -->
      <div style="padding:22px">
        <h3 style="font-family:Sora,sans-serif;font-size:15px;font-weight:700;margin-bottom:16px">
          <i class="fas fa-circle-info" style="color:var(--green-600);margin-right:8px"></i>Informasi Detail
        </h3>
        <div class="detail-info-grid">
          <div class="detail-info-item">
            <div class="label">ID Barang</div>
            <div class="value">${item.id}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Kode Inventaris</div>
            <div class="value">${item.kodeInventaris || '-'}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Kategori</div>
            <div class="value">${item.kategori}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Jenis Barang</div>
            <div class="value">${item.jenisBarang || '-'}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Merk</div>
            <div class="value">${item.merk || '-'}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Spesifikasi</div>
            <div class="value">${item.spesifikasi || '-'}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Tahun Perolehan</div>
            <div class="value">${item.tahun}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Harga Perolehan</div>
            <div class="value">${item.harga ? 'Rp ' + item.harga.toLocaleString('id-ID') : '-'}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Sumber Dana</div>
            <div class="value">${item.sumberDana || '-'}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Tanggal Masuk</div>
            <div class="value">${item.tanggal}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Kondisi</div>
            <div class="value">
              <span class="badge-kondisi ${kondisiClass}">
                <i class="fas ${kondisiIcon}"></i> ${item.kondisi}
              </span>
            </div>
          </div>
          <div class="detail-info-item">
            <div class="label">Status</div>
            <div class="value">${statusBadge(item.status || 'Tersedia')}</div>
          </div>
          <div class="detail-info-item">
            <div class="label">Lokasi Saat Ini</div>
            <div class="value"><i class="fas fa-location-dot" style="color:var(--green-500);margin-right:5px"></i>${item.lokasi}</div>
          </div>
        </div>

        <h3 style="font-family:Sora,sans-serif;font-size:15px;font-weight:700;margin:24px 0 4px">
          <i class="fas fa-route" style="color:var(--green-600);margin-right:8px"></i>Riwayat Lokasi
        </h3>
        ${riwayatHTML}

        <div style="display:flex;gap:10px;margin-top:22px;flex-wrap:wrap">
          <button class="btn btn-primary" onclick="alert('Cetak label tersedia pada versi penuh.')">
            <i class="fas fa-print"></i> Cetak Label
          </button>
          <button class="btn btn-outline" onclick="closeModalBtn();openEdit(currentDetailIdx)">
            <i class="fas fa-pen"></i> Edit Barang
          </button>
          <button class="btn btn-danger" onclick="closeModalBtn()">
            <i class="fas fa-xmark"></i> Tutup
          </button>
        </div>
      </div>
    </div>
  `;

  document.getElementById('modalDetail').classList.add('open');
}

function closeModal(e) {
  if (e.target === document.getElementById('modalDetail')) closeModalBtn();
}
function closeModalBtn() {
  document.getElementById('modalDetail').classList.remove('open');
}

/* ============================================================
   SIMPAN BARANG
============================================================ */
function simpanBarang() {
  const nama       = document.getElementById('tambahNama').value.trim();
  const kategori   = document.getElementById('tambahKategori').value;
  const jenisBarang = document.getElementById('tambahJenisBarang').value;
  const kondisi    = document.getElementById('tambahKondisi').value;
  const tanggal    = document.getElementById('tambahTanggal').value;
  const lokasi     = document.getElementById('tambahLokasi').value.trim();
  const jumlah     = parseInt(document.getElementById('tambahJumlah').value) || 1;

  if (!nama || !kategori || !jenisBarang || !kondisi || !tanggal || !lokasi || jumlah < 1) {
    alert('Harap lengkapi semua field yang wajib diisi (*).');
    return;
  }

  const kodeInventarisBase = document.getElementById('tambahKodeInventaris').value.trim();
  const merk        = document.getElementById('tambahMerk').value.trim();
  const spesifikasi = document.getElementById('tambahSpesifikasi').value.trim();
  const tahun       = parseInt(document.getElementById('tambahTahun').value) || new Date().getFullYear();
  const harga       = parseInt(document.getElementById('tambahHarga').value) || 0;
  const sumberDana  = document.getElementById('tambahSumberDana').value;
  const status      = document.getElementById('tambahStatus').value || 'Tersedia';
  const deskripsi   = document.getElementById('tambahDeskripsi').value.trim();

  for (let i = 0; i < jumlah; i++) {
    const nomorUrut = inventaris.length + 1;
    const idBaru = 'INV-' + String(nomorUrut).padStart(3, '0');
    const kodeInventaris = kodeInventarisBase && jumlah > 1
      ? `${kodeInventarisBase}-${i + 1}`
      : kodeInventarisBase;

    inventaris.push({
      id: idBaru,
      kodeInventaris,
      nama,
      kategori,
      jenisBarang,
      merk,
      spesifikasi,
      deskripsi,
      tahun,
      harga,
      sumberDana,
      kondisi,
      status,
      tanggal,
      lokasi,
      gambar: `https://placehold.co/120x120/dcfce7/15803d?text=${encodeURIComponent(nama.slice(0,12))}&font=sora`,
      riwayatLokasi: [
        { lokasi, tanggal, petugas: 'Petugas Sarpras', alasan: 'Barang baru didata dan ditempatkan pertama kali di lokasi ini' }
      ]
    });
  }

  // Reset form
  ['tambahKodeInventaris','tambahNama','tambahKategori','tambahJenisBarang','tambahMerk','tambahSpesifikasi',
   'tambahTahun','tambahHarga','tambahSumberDana','tambahKondisi','tambahTanggal','tambahLokasi','tambahDeskripsi']
   .forEach(id => { const el = document.getElementById(id); if (el) el.value = ''; });
  document.getElementById('tambahStatus').value = 'Tersedia';
  document.getElementById('tambahJumlah').value = '1';

  renderTable(inventaris);
  updateDashboardStats();
  showToast(jumlah > 1 ? `${jumlah} barang berhasil disimpan ke inventaris!` : 'Barang berhasil disimpan ke inventaris!');
  setTimeout(() => showPanel('inventaris'), 1200);
}

/* ============================================================
   TOAST
============================================================ */
function showToast(msg) {
  const t = document.getElementById('toast');
  document.getElementById('toastMsg').textContent = msg;
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 3200);
}


/* ============================================================
   LIVE DATE & TIME — sinkron dengan sistem
============================================================ */
const HARI = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
const BULAN = ['Januari','Februari','Maret','April','Mei','Juni',
               'Juli','Agustus','September','Oktober','November','Desember'];

function formatTanggal(d) {
  return HARI[d.getDay()] + ', ' +
         d.getDate() + ' ' + BULAN[d.getMonth()] + ' ' + d.getFullYear();
}
function formatWaktu(d) {
  const hh = String(d.getHours()).padStart(2,'0');
  const mm = String(d.getMinutes()).padStart(2,'0');
  const ss = String(d.getSeconds()).padStart(2,'0');
  return hh + ':' + mm + ':' + ss + ' WIB';
}
function formatTanggalPendek(d) {
  return d.getDate() + ' ' + BULAN[d.getMonth()] + ' ' + d.getFullYear();
}

function updateClock() {
  const now = new Date();

  // Live clock di header
  const clockEl = document.getElementById('liveClock');
  if (clockEl) {
    clockEl.textContent = formatTanggal(now) + '  |  ' + formatWaktu(now);
  }

  // Welcome banner date
  const wdEl = document.getElementById('welcomeDate');
  if (wdEl) {
    wdEl.textContent = formatTanggal(now) +
      ' — Kelola inventaris SMPN 5 Purbalingga dengan mudah.';
  }

  // Terakhir diperbarui
  const luEl = document.getElementById('lastUpdated');
  if (luEl) {
    luEl.textContent = formatTanggalPendek(now) + ' — ' + formatWaktu(now);
  }

  // Report date
  const rdEl = document.getElementById('reportDate');
  if (rdEl) rdEl.textContent = formatTanggalPendek(now);

  // Report year
  const ryEl = document.getElementById('reportYear');
  if (ryEl) ryEl.textContent = now.getFullYear();
}

// Jalankan langsung + update setiap detik
updateClock();
setInterval(updateClock, 1000);

/* ============================================================
   INIT: render tabel saat halaman load (antisipasi jika
   langsung langsung jump ke dashboard via dev)
============================================================ */
renderTable(inventaris);
updateDashboardStats();
</script>


</body></html>