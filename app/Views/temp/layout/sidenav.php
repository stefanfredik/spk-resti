<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="text-center my-2">
            <img width="80" class="img-fluid my-2" src="/assets/img/logo.png" alt="">
            <p class="fw-bold"><?= "SPK DESA WEWO" ?></p>
        </div>
        <hr class="mx-3">
        <?php
        if (logged_in()) {
            if (in_groups('admin')) echo view("/temp/layout/sidenav/admin");
            if (in_groups('kepala-desa') || in_groups('pendamping'))  echo view("/temp/layout/sidenav/kepaladesa");
            if (in_groups('masyarakat')) echo view("/temp/layout/sidenav/masyarakat");
        }
        ?>
    </div>
    <!-- Sidenav Footer-->
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Logged in as:</div>
            <div class="sidenav-footer-title"><?= user()->nama_user ?></div>
        </div>
    </div>
</nav>