<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;
use CodeIgniter\API\ResponseTrait;
use Myth\Auth\Password;

class Profile extends BaseController
{
    use ResponseTrait;
    var $meta = [
        'title'     => 'Profile',
        'subtitle'  => 'Halaman Profile',
        'url'       => 'profile',
    ];

    public function __construct()
    {
        $this->userModel = new Users();
    }

    public function index()
    {
        $data = [
            'meta' => $this->meta,
            "title" => 'Halaman Profile',
            'user' => $this->userModel->find(user_id())
        ];

        return view("profile/index", $data);
    }

    public function gantipassword()
    {
        $data = [
            'meta' => $this->meta,
            "title" => 'Ganti Password'
        ];

        return view("profile/gantipassword", $data);
    }

    public function doGantiPassword()
    {
        $rules = [
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'min_length' => 'Password minimal 8 Digit.'
                ]
            ],
            'password2' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'matches' => 'Password tidak sama.'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return $this->respond([
                'status' => 'error',
                'error' => $this->validation->getErrors()
            ], 400);
        }

        $password = $this->request->getPost('password');

        $data = [
            'password_hash' => Password::hash($password)
        ];
        $this->userModel->update(user_id(), $data);

        $res = [
            'status' => 'success',
            'msg'   => 'Password Berhasil diubah.'
        ];

        return $this->respond($res, 200);
    }
}
