<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"><?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form data-id="<?= $penduduk['id']; ?>" action="<?= $meta['url']; ?>" method="" id="formTambah" onsubmit="update(event)">
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">NISN</label>
                        </div>
                        <div class="col-md-8">
                            <input value="<?= $penduduk['nik'] ?>" name="nik" type="text" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">No. KK</label>
                        </div>
                        <div class="col-md-8">
                            <input value="<?= $penduduk['no_kk'] ?>" name="no_kk" type="text" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Nama Lengkap</label>
                        </div>
                        <div class="col-md-8">
                            <input value="<?= $penduduk['nama_lengkap'] ?>" name="nama_lengkap" type="text" class="form-control" required>
                        </div>
                    </div>

                    <hr>
                    <h4>Alamat</h4>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Alamat</label>
                        </div>
                        <div class="col-md-8">
                            <input value="<?= $penduduk['alamat'] ?>" name="alamat" type="text" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Desa</label>
                        </div>
                        <div class="col-md-8">
                            <input value="<?= $penduduk['kelurahan'] ?>" name="desa" type="text" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Kecamatan</label>
                        </div>
                        <div class="col-md-8">
                            <input value="<?= $penduduk['kecamatan'] ?>" name="kecamatan" type="text" class="form-control" required>
                        </div>
                    </div>


                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Kabupaten</label>
                        </div>
                        <div class="col-md-8">
                            <input value="<?= $penduduk['kabupaten'] ?>" name="kabupaten" type="text" class="form-control" required>
                        </div>
                    </div>


                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Provinsi</label>
                        </div>
                        <div class="col-md-8">
                            <input value="<?= $penduduk['provinsi'] ?>" name="provinsi" type="text" class="form-control" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>