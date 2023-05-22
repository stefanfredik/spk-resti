<?= $this->extend('temp/index'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <div class="col-xl-4">
        <!-- Profile picture card-->
        <div class="card mb-4 mb-xl-0">
            <div class="card-header">Foto Profile</div>
            <div class="card-body text-center">
                <!-- <img class="img-account-profile rounded-circle mb-2" src="assets/img/illustrations/profiles/profile-1.png" alt="" /> -->
                <i class="text-primary bi bi-person-circle fa-10x"></i>
                <div class="small font-italic text-muted mb-4"><?= user()->nama_user ?></div>

                <button data-url="<?= '/' . $meta['url'] . '/gantipassword'; ?>" class="my-2 btn btn-primary" onclick="add(this)"><i class="bi bi-plus-circle mx-1"></i>Ganti Password</button>

            </div>
        </div>
    </div>


    <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Detail Profil</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="small mb-1" for="">Nama Lengkap</label>
                    <p class=""><?= user()->nama_user ?></p>
                </div>

                <div class="mb-3">
                    <label class="small mb-1" for="">Username</label>
                    <p class=""><?= user()->username ?></p>
                </div>

                <div class="mb-3">
                    <label class="small mb-1" for="">User Role/ Jabatan</label>
                    <p class=""><?= $user['jabatan'] ?></p>
                </div>

                <div class="mb-3">
                    <label class="small mb-1" for="">User dibuat</label>
                    <p class=""><?= user()->created_at ?></p>
                </div>
            </div>
        </div>
    </div>
    <div id="modalArea">
    </div>
    <?= $this->endSection(); ?>

    <?= $this->section("script") ?>

    <script>
        const formInput = ["password", "password2"];

        function validation(error) {
            resetForm(formInput);
            if (error.password) {
                $("input[name='password']").addClass("is-invalid").next().html(error.password);
            }

            if (error.password2) {
                $("input[name='password2']").addClass("is-invalid").next().html(error.password2);
            }
        }

        function resetForm(arr) {
            arr.forEach((a) => {
                $(`input[name='${a}']`).removeClass("is-invalid").next().html("");
            });
        }

        async function gantiPass(event) {
            event.preventDefault();
            let form = document.querySelector("form");
            let url = form.getAttribute("action");
            const data = new FormData(form);
            const modal = $("#modal");
            axios.post(`/profile/gantipassword`, data).then(res => {
                debug(res);
                if (res.data.status == "success") {
                    Toast.fire({
                        icon: res.data.status,
                        title: res.data.msg
                    });
                    modal.modal("hide");
                }
            }).catch(e => {
                debug(e);
                if (!(typeof e.response.data.error == "undefined")) {
                    return validation(e.response.data.error)
                }
                return Toast.fire({
                    icon: "error",
                    title: "Gagal menambah data!"
                })
            })
        }
    </script>

    <?= $this->endSection(); ?>