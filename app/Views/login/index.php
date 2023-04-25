<!DOCTYPE html>
<html lang="en">
<?= $this->include("temp/layout/head"); ?>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                            <!-- Social login form-->
                            <div class="card my-5">
                                <div class="card-body p-5 text-center">
                                    <div class="h3 fw-light mb-3">Login</div>
                                    <div>Silahkan login menggunakan akun yang sudah terdaftar.</div>
                                </div>
                                <hr class="my-0" />
                                <div class="card-body p-5">
                                    <div class="text-start">
                                        <?= view('Myth\Auth\Views\_message_block') ?>
                                    </div>
                                    <!-- Login form-->
                                    <form role="form" action="<?= url_to('login') ?>" method="POST">
                                        <?= csrf_field() ?>
                                        <!-- Form Group (email address)-->
                                        <div class="mb-3">
                                            <label class="text-gray-600 small" for="emailExample">Username</label>
                                            <input class="form-control form-control-solid <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" type="text" placeholder="" aria-label="Email Address" aria-describedby="emailExample" />
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="text-gray-600 small" for="passwordExample">Password</label>
                                            <input class="form-control form-control-solid" name="password" type="password" placeholder="" aria-label="Password" aria-describedby="passwordExample" />
                                            <div class="invalid-feedback">
                                                <?= session('errors.password') ?>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mb-0">
                                            <button class="btn btn-primary px-4" type="submit"><?= lang('Auth.loginAction') ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <?= $this->include("temp/layout/footer"); ?>
        </div>
    </div>
    <?= $this->include("/temp/layout/sbscript"); ?>
</body>

</html>