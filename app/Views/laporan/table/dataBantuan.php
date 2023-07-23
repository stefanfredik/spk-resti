<table class="table table-bordered" id="table" width="100%" colspacing="0">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Tahun</th>
            <th class="text-center">Periode</th>
            <th class="text-center">NIK</th>
            <th class="text-center">No. KK</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Alamat</th>
            <th class="text-center">Kelurahan</th>
            <th class="text-center">Kecamatan</th>
            <th class="text-center">Kabupaten</th>
            <th class="text-center">Nilai</th>
            <th class="text-center">Rangking</th>
            <th class="text-center">Status</th>
            <th class="text-center">Waktu Terima</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0;
        // dd($dataPeserta);
        foreach ($peserta as $dt) :
            if ($dt["status"] == "Mendapatkan Bantuan") : ?>
                <tr>
                    <td class="text-center"><?= ++$no; ?></td>
                    <td><?= $dt['tahun']; ?></td>
                    <td><?= 'Periode ' . $dt['periode']; ?></td>
                    <td><?= $dt['nik']; ?></td>
                    <td><?= $dt['no_kk']; ?></td>
                    <td><?= $dt['nama_lengkap']; ?></td>
                    <td><?= $dt['alamat']; ?></td>
                    <td><?= $dt['kelurahan']; ?></td>
                    <td><?= $dt['kecamatan']; ?></td>
                    <td><?= $dt['kabupaten']; ?></td>
                    <td><?= $dt['kriteria_nilai']; ?></td>
                    <td><?= $no; ?></td>
                    <td><?= $dt['status']; ?></td>
                    <td><?= $dt['tanggalTerima']; ?></td>
                </tr>
        <?php endif;
        endforeach; ?>
    </tbody>
</table>