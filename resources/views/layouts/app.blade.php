<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Digi Inventa</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Sora:wght@700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  @yield('styles')
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

    a { text-decoration: none; color: inherit; display: block; }
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
    .header-user i { color: var(--gray-400); font-size: 12px; transition: transform 0.2s; }
    .user-dropdown-wrap { position: relative; }
    .user-dropdown-wrap.open .header-user i { transform: rotate(180deg); }
    .user-dropdown-menu {
      position: absolute;
      top: calc(100% + 8px);
      right: 0;
      background: white;
      border: 1px solid var(--gray-200);
      border-radius: var(--radius-sm);
      box-shadow: var(--shadow-md);
      width: 180px;
      padding: 6px;
      display: none;
      z-index: 100;
    }
    .user-dropdown-wrap.open .user-dropdown-menu { display: block; animation: fadeInUp 0.2s ease; }
    .user-dropdown-item {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px 12px;
      color: var(--gray-700);
      font-size: 13.5px;
      font-weight: 500;
      border-radius: 6px;
      cursor: pointer;
      text-decoration: none;
      transition: background 0.2s;
      border: none;
      width: 100%;
      text-align: left;
      background: none;
    }
    .user-dropdown-item:hover { background: var(--gray-50); }
    .user-dropdown-item.danger { color: #dc2626; }
    .user-dropdown-item.danger:hover { background: #fef2f2; }

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
  
  .page { display: flex !important; }
  .panel { display: block !important; }
  </style>
</head>
<body>
<div id="dashPage" class="page active">
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
      @if(auth()->check() && auth()->user()->role === 'admin')
      <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="fas fa-house"></i> Dashboard
      </a>
      <a href="{{ route('admin.inventaris.index') }}" class="nav-item {{ request()->routeIs('admin.inventaris.index') ? 'active' : '' }}">
        <i class="fas fa-warehouse"></i> Data Inventaris
      </a>
      <a href="{{ route('admin.inventaris.create') }}" class="nav-item {{ request()->routeIs('admin.inventaris.create') ? 'active' : '' }}">
        <i class="fas fa-plus-circle"></i> Tambah Barang
      </a>
      <a href="{{ route('admin.peminjaman.index') }}" class="nav-item {{ request()->routeIs('admin.peminjaman.*') ? 'active' : '' }}">
        <i class="fas fa-right-left"></i> Peminjaman
      </a>
      <a href="{{ route('admin.laporan.index') }}" class="nav-item {{ request()->routeIs('admin.laporan.*') ? 'active' : '' }}">
        <i class="fas fa-chart-bar"></i> Laporan
      </a>
      <a href="{{ route('admin.pengguna.index') }}" class="nav-item {{ request()->routeIs('admin.pengguna.*') ? 'active' : '' }}">
        <i class="fas fa-users"></i> Kelola Pengguna
      </a>
      <a href="{{ route('profil.index') }}" class="nav-item {{ request()->routeIs('profil.*') ? 'active' : '' }}">
        <i class="fas fa-circle-user"></i> Profil
      </a>
      @else
      <a href="{{ route('guru.dashboard') }}" class="nav-item {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
        <i class="fas fa-house"></i> Dashboard
      </a>
      <a href="{{ route('guru.katalog.index') }}" class="nav-item {{ request()->routeIs('guru.katalog.*') ? 'active' : '' }}">
        <i class="fas fa-warehouse"></i> Katalog Inventaris
      </a>
      <a href="{{ route('guru.peminjaman.index') }}" class="nav-item {{ request()->routeIs('guru.peminjaman.*') ? 'active' : '' }}">
        <i class="fas fa-list"></i> Daftar Peminjaman
      </a>
      <a href="{{ route('profil.index') }}" class="nav-item {{ request()->routeIs('profil.*') ? 'active' : '' }}">
        <i class="fas fa-circle-user"></i> Profil
      </a>
      @endif
    </nav>

    <div class="sidebar-footer">
      @if(auth()->check())
      <div class="sidebar-footer-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
      <div class="sidebar-footer-info">
        <strong>{{ auth()->user()->name }}</strong>
        <span>{{ auth()->user()->jabatan ?? 'Petugas' }}</span>
      </div>
      @else
      <div class="sidebar-footer-avatar">G</div>
      <div class="sidebar-footer-info">
        <strong>Akses Publik</strong>
        <span>Tamu</span>
      </div>
      @endif
    </div>
  
  </aside>
  <div class="main-area">
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
        <div id="liveClock" style="font-size:13px;font-weight:600;color:var(--gray-600);background:var(--gray-100);padding:6px 14px;border-radius:99px;border:1px solid var(--gray-200);font-family:'Sora',sans-serif;letter-spacing:.3px;white-space:nowrap">Memuat waktu...</div>
        @php
          $notifPeminjaman = 0;
          $notifRusak = 0;
          if(auth()->check()){
            $notifPeminjaman = \App\Models\Peminjaman::where('status', 'disetujui')->count();
            $notifRusak = \App\Models\Barang::whereIn('kondisi', ['rusak', 'perlu_perbaikan'])->where('status','!=','dihapus')->count();
          }
          $totalNotif = $notifPeminjaman + $notifRusak;
        @endphp
        <div class="user-dropdown-wrap" id="notifDropdownWrap">
          <button class="header-notif" onclick="toggleNotifDropdown(event)">
            <i class="fas fa-bell"></i>
            @if($totalNotif > 0)
            <span class="dot"></span>
            @endif
          </button>
          <div class="user-dropdown-menu" style="width: 280px; padding: 0;">
            <div style="padding: 12px 16px; border-bottom: 1px solid var(--gray-200); font-weight: 600; font-size: 14px;">Notifikasi</div>
            <div style="max-height: 300px; overflow-y: auto; padding: 8px;">
              @if($totalNotif == 0)
                <div style="padding: 20px; text-align: center; color: var(--gray-400); font-size: 13px;">Belum ada notifikasi baru</div>
              @else
                @if($notifPeminjaman > 0)
                <a href="{{ auth()->check() ? route('admin.peminjaman.index') : '#' }}" class="user-dropdown-item" style="align-items: flex-start; padding: 10px;">
                  <div style="width: 32px; height: 32px; border-radius: 50%; background: #dbeafe; color: #1d4ed8; display: flex; align-items: center; justify-content: center; flex-shrink: 0;"><i class="fas fa-right-left"></i></div>
                  <div>
                    <div style="font-size: 13px; font-weight: 600; color: var(--gray-800); margin-bottom: 2px;">Peminjaman Aktif</div>
                    <div style="font-size: 11.5px; color: var(--gray-500); line-height: 1.4;">Terdapat {{ $notifPeminjaman }} barang yang saat ini sedang dipinjam.</div>
                  </div>
                </a>
                @endif
                @if($notifRusak > 0)
                <a href="{{ auth()->check() ? route('admin.inventaris.index') : '#' }}" class="user-dropdown-item" style="align-items: flex-start; padding: 10px;">
                  <div style="width: 32px; height: 32px; border-radius: 50%; background: #fef2f2; color: #dc2626; display: flex; align-items: center; justify-content: center; flex-shrink: 0;"><i class="fas fa-wrench"></i></div>
                  <div>
                    <div style="font-size: 13px; font-weight: 600; color: var(--gray-800); margin-bottom: 2px;">Perhatian Kondisi</div>
                    <div style="font-size: 11.5px; color: var(--gray-500); line-height: 1.4;">Ada {{ $notifRusak }} barang dalam kondisi perlu perbaikan / rusak.</div>
                  </div>
                </a>
                @endif
              @endif
            </div>
          </div>
        </div>
        <div class="user-dropdown-wrap" id="userDropdownWrap">
          <div class="header-user" onclick="toggleUserDropdown(event)">
            @if(auth()->check())
            <div class="header-user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
            <span class="header-user-name">{{ auth()->user()->name }}</span>
            @else
            <div class="header-user-avatar">G</div>
            <span class="header-user-name">Guest</span>
            @endif
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="user-dropdown-menu">
            @auth
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="user-dropdown-item danger">
                <i class="fas fa-sign-out-alt"></i> Keluar
              </button>
            </form>
            @endauth
          </div>
        </div>
      </div>
    
    </header>
    <main class="content">
      @yield('content')
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // Konfigurasi SweetAlert2
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });

  @if(session('success'))
    Toast.fire({
      icon: 'success',
      title: '{{ session('success') }}'
    });
  @endif

  @if(session('error'))
    Toast.fire({
      icon: 'error',
      title: '{{ session('error') }}'
    });
  @endif

  // Realtime Clock
  function updateClock() {
    const now = new Date();
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const dateString = now.toLocaleDateString('id-ID', options);
    const timeString = now.toLocaleTimeString('id-ID', { hour12: false });
    const clockEl = document.getElementById('liveClock');
    if(clockEl) clockEl.innerHTML = `${dateString} &nbsp;|&nbsp; ${timeString} WIB`;
  }
  setInterval(updateClock, 1000);
  updateClock();

  function toggleNotifDropdown(e) {
    e.stopPropagation();
    document.getElementById('notifDropdownWrap').classList.toggle('open');
    const dot = document.querySelector('#notifDropdownWrap .dot');
    if(dot) dot.style.display = 'none'; // Sembunyikan titik merah saat dibuka
  }

  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('open');
  }

  function toggleUserDropdown(e) {
    e.stopPropagation();
    document.getElementById('userDropdownWrap').classList.toggle('open');
  }

  // Tutup dropdown jika klik di luar
  window.addEventListener('click', function(e) {
    const userWrap = document.getElementById('userDropdownWrap');
    if (userWrap && userWrap.classList.contains('open') && !userWrap.contains(e.target)) {
      userWrap.classList.remove('open');
    }
    const notifWrap = document.getElementById('notifDropdownWrap');
    if (notifWrap && notifWrap.classList.contains('open') && !notifWrap.contains(e.target)) {
      notifWrap.classList.remove('open');
    }
  });
</script>

@yield('scripts')

</body>
</html>