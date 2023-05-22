<div class="nav accordion" id="accordionSidenav">

    <div class="sidenav-menu-heading d-sm-none">Account</div>

    <a class="nav-link d-sm-none" href="#!">
        <div class="nav-link-icon"><i data-feather="bell"></i></div>
        Alerts
        <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
    </a>

    <div class="sidenav-menu-heading">Menu Utama</div>

    <a class="nav-link <?= url_is("/dashboard") ? 'active' : '' ?>" href="/dashboard">
        <div class="nav-link-icon"><i data-feather="home"></i></div>
        Dashboard
    </a>

    <a class="nav-link <?= url_is("/profile") ? 'active' : '' ?>" href="/profile">
        <div class="nav-link-icon"><i data-feather="user"></i></div>
        Profile
    </a>

    <div class="sidenav-menu-heading">Data</div>
    <a class="nav-link <?= url_is("/user") ? 'active' : '' ?>" href="/user">
        <div class="nav-link-icon"><i data-feather="users"></i></div>
        Data User
    </a>


    <a class="nav-link <?= url_is("/datapenduduk") ? 'active' : '' ?>" href="/datapenduduk">
        <div class="nav-link-icon"><i data-feather="layers"></i></div>
        Data Penduduk
    </a>
    <hr class="hr">

    <a class="nav-link <?= url_is("/kriteria") ? 'active' : '' ?>" href="/kriteria">
        <div class="nav-link-icon"><i data-feather="layers"></i></div>
        Data Kriteria
    </a>

    <a class="nav-link <?= url_is("/subkriteria") ? 'active' : '' ?>" href="/subkriteria">
        <div class="nav-link-icon"><i data-feather="list"></i></div>
        Data Sub Kriteria
    </a>

    <a class="nav-link <?= url_is("/datapeserta") ? 'active' : '' ?>" href="/datapeserta">
        <div class="nav-link-icon"><i data-feather="file-text"></i></div>
        Data Pengajuan
    </a>

    <div class="sidenav-menu-heading">Pengelolahan</div>
    <a class="nav-link <?= url_is("/kuota") ? 'active' : '' ?>" href="/kuota">
        <div class="nav-link-icon"><i data-feather="percent"></i></div>
        Data Kuota dan Periode
    </a>

    <a class="nav-link <?= url_is("/perhitungan") ? 'active' : '' ?>" href="/perhitungan">
        <div class="nav-link-icon"><i data-feather="percent"></i></div>
        Data Moora
    </a>

    <a class="nav-link <?= url_is("/keputusan") ? 'active' : '' ?>" href="/keputusan">
        <div class="nav-link-icon"><i data-feather="percent"></i></div>
        Data Keputusan
    </a>

    <div class="sidenav-menu-heading">Laporan</div>
    <!-- <a class="nav-link" href="/laporan">
        <div class="nav-link-icon"><i data-feather="hard-drive"></i></div>
        Data Laporan
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