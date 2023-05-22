<div class="nav accordion" id="accordionSidenav">


    <div class="sidenav-menu-heading">Menu Utama</div>

    <a class="nav-link" href="/dashboard">
        <div class="nav-link-icon"><i data-feather="home"></i></div>
        Dashboard
    </a>

    <a class="nav-link" href="/profile">
        <div class="nav-link-icon"><i data-feather="user"></i></div>
        Profile
    </a>

    <div class="sidenav-menu-heading">Data</div>

    <a class="nav-link <?= url_is("/kriteria") ? 'active' : '' ?>" href="/kriteria">
        <div class="nav-link-icon"><i data-feather="layers"></i></div>
        Data Kriteria
    </a>
</div>