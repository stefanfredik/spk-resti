<div class="nav accordion" id="accordionSidenav">
    <div class="sidenav-menu-heading d-sm-none">Account</div>

    <div class="sidenav-menu-heading">Menu Utama</div>

    <a class="nav-link <?= url_is('/dashboard') ? 'active' : '' ?>" href=" /dashboard">
        <div class="nav-link-icon"><i data-feather="home"></i></div>
        Dashboard
    </a>

    <a class="nav-link <?= url_is('/profile') ? 'active' : '' ?>" href="/profile">
        <div class="nav-link-icon"><i data-feather="user"></i></div>
        Profile
    </a>

    <div class="sidenav-menu-heading">Data</div>
    <a class="nav-link <?= url_is('/datapenduduk') ? 'active' : '' ?>" href="/datapenduduk">
        <div class="nav-link-icon"><i data-feather="layers"></i></div>
        Data Penduduk
    </a>

    <a class="nav-link <?= url_is('/laporan') ? 'active' : '' ?>" href="/laporan">
        <div class="nav-link-icon"><i data-feather="hard-drive"></i></div>
        Data Laporan
    </a>
</div>