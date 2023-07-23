<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Moora;
use App\Models\KriteriaModel;
use App\Models\KuotaModel;
use App\Models\PesertaModel;
use App\Models\SubkriteriaModel;
use Dompdf\Dompdf;

class Laporan extends BaseController
{
    var $meta = [
        'url' => 'laporan',
        'title' => 'Laporan',
        'subtitle' => 'Halaman Laporan'
    ];

    public function __construct()
    {
        $this->kriteriaModel = new KriteriaModel();
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->pesertaModel = new PesertaModel();
        $this->kuotaModel = new KuotaModel();
    }


    public function bantuan()
    {
        $data = $this->data();
        $this->meta['subtitle'] = "Data Dana Bantuan";

        $data["meta"] =  $this->meta;

        // dd($data);

        return view("laporan/databantuan", $data);
    }

    public function penduduk()
    {
        $data = $this->data();
        $this->meta['subtitle'] = "Data Penduduk";

        $data["meta"] =  $this->meta;

        // dd($data);
        return view("laporan/datapenduduk", $data);
    }

    public function cetakBantuan()
    {
        $data = $this->data();
        $data["title"] = 'LAPORAN ' . APP_DESC;
        $this->pdf($data, "laporan/cetakBantuan");
    }


    public function cetakPenduduk()
    {
        $data = $this->data();
        $data["title"] = 'LAPORAN ' . APP_DESC;
        $this->pdf($data, "laporan/cetakPenduduk");
    }

    private function data()
    {
        $peserta = $this->pesertaModel->findAllPeserta();
        $kriteria = $this->kriteriaModel->findAll();
        $subkriteria = $this->subkriteriaModel->findAll();

        $moora = new Moora($peserta, $kriteria, $subkriteria);
        $moora->setRangking();

        $dataPeserta = $moora->getAllPeserta();
        $dataKuota = $this->kuotaModel->findAll();

        $data = [
            'title' => $this->meta['title'],
            'dataKriteria' => $this->kriteriaModel->findAll(),
            'dataSubkriteria' => $this->subkriteriaModel->findAll(),
            'peserta' => $this->statusKeputusan($dataPeserta, $dataKuota)
        ];

        return $data;
    }


    private function statusKeputusan($dataPeserta, $dataKuota)
    {
        // hitung kuota tahunan
        $kuotaTahun = [];
        foreach ($dataKuota as $row) {
            $tahun = $row['tahun'];
            $jumlahKuota = $row['jumlah_kuota'];

            if (isset($kuotaTahun[$tahun])) {
                $kuotaTahun[$tahun] += $jumlahKuota;
            } else {
                $kuotaTahun[$tahun] = $jumlahKuota;
            }
        }


        foreach ($dataPeserta as $key => $ps) {
            $tahun = $ps['tahun'];
            $rangking = $ps['rangking'];
            $kuotaPeriode = 0;

            foreach ($dataKuota as $ku) {
                if ($tahun == $ku['tahun'] && $rangking <= $kuotaTahun[$tahun]) {
                    $kuotaPeriode += $ku['jumlah_kuota'];

                    $dataPeserta[$key]['status'] = 'Mendapatkan Bantuan';
                    if ($rangking <= $kuotaPeriode) {
                        $dataPeserta[$key]['periode'] = $ku['periode'];
                        $dataPeserta[$key]['tanggalTerima'] = $ku['tanggal_terima'];
                        break;
                    }
                } else {
                    $dataPeserta[$key]['periode'] = 'Tidak Tersedia';
                    $dataPeserta[$key]['tanggalTerima'] = 'Tidak Tersedia';
                    $dataPeserta[$key]['status'] = 'Tidak Mendapatkan Bantuan';
                }
            }
        }

        return $dataPeserta;
    }




    private function pdf(array $data, String $view)
    {
        $pdf = new Dompdf(array('DOMPDF_ENABLE_REMOTE' => true));

        $html = view($view, $data);
        $pdf->loadHtml($html);
        $pdf->setPaper('LEGAL', 'landscape');
        $pdf->render();
        return $pdf->stream();
    }
}
