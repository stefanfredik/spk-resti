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
    <!-- <a class="nav-link <?= url_is('/datapenduduk') ? 'active' : '' ?>" href="/datapenduduk">
        <div class="nav-link-icon"><i data-feather="layers"></i></div>
        Data Penduduk
    </a> -->

    <a class="nav-link collapsed <?= url_is("/laporan*") ? 'active' : '' ?>" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#laporan" aria-expanded="false" aria-controls="collapseDashboards">
        <div class="nav-link-icon"><i data-feather="activity"></i></div>
        Laporan
        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
    <div class="collapse" id="laporan" data-bs-parent="#accordionSidenav">
        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
            <a class="nav-link <?= url_is("/laporan/bantuan") ? 'active' : '' ?>" href="/laporan/bantuan">Data Bantuan</a>
            <a class="nav-link <?= url_is("/laporan/penduduk") ? 'active' : '' ?>" href="/laporan/penduduk">Penduduk</a>
        </nav>
    </div>
</div>