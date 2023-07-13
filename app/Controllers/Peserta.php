<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use App\Models\PesertaModel;
use App\Models\PendudukModel;
use App\Models\SubkriteriaModel;
use CodeIgniter\API\ResponseTrait;

class Peserta extends BaseController
{
    use ResponseTrait;
    var $meta = [
        'url' => 'datapeserta',
        'title' => 'Data Pengajuan',
        'subtitle' => 'Halaman Pengajuan'
    ];


    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
        $this->pendudukModel = new PendudukModel();
        $this->kriteriaModel = new KriteriaModel();
        $this->subKriteriaModel = new SubkriteriaModel();
    }

    public function index()
    {

        $data = [
            'title' => $this->meta["title"],
            'meta'   => $this->meta,
        ];

        return view('/peserta/index', $data);
    }

    public function table()
    {
        $data = [
            'title' => $this->meta["title"],
            'meta'   => $this->meta,
            'dataPeserta' => $this->pesertaModel->findAllPeserta()
        ];

        return view('/peserta/table', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => "Tambah " . $this->meta["title"],
            'meta'   => $this->meta,
            'dataPenduduk' => $this->pendudukModel->findAllNonPeserta(),
            'dataKriteria' => $this->kriteriaModel->findAll(),
            'dataSubkriteria' => $this->subKriteriaModel->findAll(),
            'dataPeserta' => $this->pesertaModel->findAll(),
        ];

        return view('/peserta/tambah', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Penduduk Terdaftar',
            'meta'   => $this->meta,
            'dataPenduduk' => $this->pendudukModel->findAll(),
            'dataKriteria' => $this->kriteriaModel->findAll(),
            'dataSubkriteria' => $this->subKriteriaModel->findAll(),
            'peserta' => $this->pesertaModel->find($id),
        ];

        // dd($data['peserta']);

        return view('/peserta/edit', $data);
    }


    public function detail($id)
    {

        $data = [
            'dataKriteria'  => $this->kriteriaModel->findAll(),
            'dataSubkriteria' => $this->subKriteriaModel->findAll(),
            'dataPenduduk' => $this->pendudukModel->findAll(),
            'peserta' => $this->pesertaModel->findPeserta($id),
            'meta'   => $this->meta
        ];

        // dd($this->pesertaModel->findAllPeserta($id)[0]);

        $data['title'] = 'Detail ' . $data['peserta']['nama_lengkap'];
        return $this->respond(view('/peserta/detail', $data), 200);
    }

    // CRUD


    public function store()
    {
        $data = $this->request->getPost();
        $this->pesertaModel->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data Peserta Berhasil Ditambahkan.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $this->pesertaModel->update($id, $data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data Berhasil Diupdate.',
        ];

        return $this->respond($res, 200);
    }


    public function delete($id)
    {
        $this->pesertaModel->delete($id);
        $res = [
            'status'    => 'success',
            'msg'     => 'Data berhasil dihapus.',
        ];

        return $this->respond($res, 200);
    }
}
