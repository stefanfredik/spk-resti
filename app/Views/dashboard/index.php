<?= $this->extend("temp/index"); ?>
<?= $this->section("content"); ?>

<div class="row text-center rounded">
    <div class="col-xl mb-5">
        <div class="card justify-content-center p-3">
            <h2 class="">Halo Admin</h2>
            <h4 class="">Selamat datang di <?= APP_DESC; ?></h4>
            <div>
                <img width="100" class="img-fluid text-center" src="/assets/img/logo.png" alt="">
            </div>
        </div>
    </div>
</div>

<?php
if (in_groups('admin')) echo view("/dashboard/dashboard/admin");
if (in_groups('kepala-desa')) echo view("/dashboard/dashboard/kepaladesa");
?>

<?= $this->endSection(); ?>