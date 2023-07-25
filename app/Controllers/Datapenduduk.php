<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendudukModel;
use CodeIgniter\API\ResponseTrait;

class Datapenduduk extends BaseController
{
    use ResponseTrait;

    var $meta = [
        'url' => 'datapenduduk',
        'title' => 'Data Penduduk',
        'subtitle' => 'Halaman Penduduk'
    ];


    public function __construct()
    {
        $this->pendudukModel = new PendudukModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Data Penduduk',
            'meta'   => $this->meta,
            'meta'  => $this->meta
        ];

        return view('/penduduk/index', $data);
    }

    public function tambah()
    {



        $data = [
            'title' => 'Tambah Data Penduduk',
            'meta'   => $this->meta
        ];

        return view('/penduduk/tambah', $data);
    }

    public function table()
    {
        $data = [
            'title' => 'Data Penduduk',
            'meta'   => $this->meta,
            'dataPenduduk' => $this->pendudukModel->findAll(),
        ];

        return view('/penduduk/table', $data);
    }



    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Penduduk',
            'penduduk'  => $this->pendudukModel->find($id),
            'meta'      => $this->meta
        ];

        return view('/penduduk/edit', $data);
    }



    public function detail($id)
    {
        $data = [
            'title' => 'Detail Data Penduduk',
            'penduduk'  => $this->pendudukModel->find($id),
            'meta'   => $this->meta
        ];

        return $this->respond(view('/penduduk/detail', $data), 200);
    }

    public function store()
    {
        $rules = [
            'no_kk'  => [
                'rules'  => 'required|is_unique[datapenduduk.no_kk]',
                'errors' => [
                    'is_unique' => 'Nomor KK Telah digunakan. Silahkan menggunakan nomor KK yang berbeda!'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return $this->respond([
                'status' => 'error',
                'error' => $this->validation->getErrors()
            ], 400);
        }

        $data = $this->request->getPost();
        $this->pendudukModel->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data Penduduk Berhasil Ditambahkan.',
            // 'data'  => $data
        ];

        return $this->respond($res, 200);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $this->pendudukModel->update($id, $data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data berhasil Diupdate.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }

    public function delete($id)
    {
        $this->pendudukModel->delete($id);

        $res = [
            'status'    => 'success',
            'msg'     => 'Data berhasil dihapus.',
        ];

        return $this->respond($res, 200);
    }


    // upload

    // upload
    public function doupload()
    {

        $rules = [
            'excel_file' => [
                'rules' => [
                    'ext_in[excel_file,excel,xlsx]'
                ],
                'errors' => [
                    'required' => 'File Belum Diupload.',
                    'ext_in' => 'Jenis File tidak Cocok dengan kriteria.'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return $this->respond([
                'status' => 'error',
                'error' => $this->validation->getError("excel_file")
            ], 400);
        }

        $file = $this->request->getFile("excel_file");
        $fileName = $file->getName();
        $file->move(WRITEPATH . 'uploads/penduduk', $fileName, true);
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load(WRITEPATH . 'uploads/penduduk/' . $fileName);
        $dataExcel = $spreadsheet->getSheet(0)->toArray();
        array_shift($dataExcel);

        $data  = array();

        foreach ($dataExcel as $t) {
            $dt["nik"] = $t[0];
            $dt["no_kk"] = $t[1];
            $dt["nama_lengkap"] = $t[2];
            $dt["alamat"] = $t[3];
            $dt["kelurahan"] = $t[4];
            $dt["kecamatan"] = $t[5];
            $dt["kabupaten"] = $t[6];
            $dt["provinsi"] = $t[7];
            array_push($data, $dt);
        }


        foreach ($data as $dt) {
            $this->pendudukModel->save($dt);
        }

        unlink(WRITEPATH . 'uploads/penduduk/' . $fileName);

        $res = [
            'status' => 'success',
            'msg'   => 'Data Excel Berhasil di Import.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }


    public function upload()
    {
        $data = [
            'title' => 'Upload Data Penduduk dari File Excel',
            'meta'   => $this->meta
        ];

        return view('/penduduk/upload', $data);
    }
}
