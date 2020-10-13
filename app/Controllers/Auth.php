<?php

namespace App\Controllers;

use Codeigniter\Controller;
use App\Models\UsersModel;
use App\Models\AuthModel;
use phpDocumentor\Reflection\Types\Null_;

class Auth extends BaseController
{
  public function register()
  {
    //validasi
    if (!$this->validate([
      'name' => [
        'rules'  => 'required|alpha_space',
        'errors' => [
          'required'    => 'Nama harus di isi !!!',
          'alpha_space' => 'Inputan tidak boleh berupa angka !!!'
        ]
      ],
      'username' => [
        'rules'  => 'required|Is_unique[users.username]',
        'errors' => [
          'required'    => 'Username harus di isi !!!',
          'Is_unique'   => 'Username anda sudah terdaftar !!!',
        ]
      ],
      'password' => [
        'rules'  => 'required|Is_unique[users.password]|min_length[8]',
        'errors' => [
          'required'    => 'Password harus di isi !!!',
          'Is_unique'   => 'Password sudah terdaftar i user lain !!!',
          'min_length'  => 'Inputan Password minimal 8 !!!'
        ]
      ],
      'email' => [
        'rules'  => 'required',
        'errors' => [
          'required' => 'Email harus di isi !!!'
        ]
      ]
    ])) {
      $validasi = \Config\Services::validation();
      return redirect()->to('/registrasi')->withInput()->with('validate', $validasi);
    }

    $data = array(
      'name'      => $this->request->getPost('name'),
      'username'  => $this->request->getPost('username'),
      'email'  => $this->request->getPost('email'),
      'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
      'level'     => $this->request->getPost('level'),
    );
    $model = new UsersModel();
    $model->insert($data);
    session()->setFlashdata('message', 'Anda berhasil registrasi akun !!!');
    return redirect()->to('/login');
  }

  public function login()
  {
    $model = new AuthModel;
    $table = 'users';
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    $row      = $model->get_data_login($username, $table);
    if ($row == Null) {
      session()->setFlashdata('message_error', 'Username atau Password tidak terisi !!!');
      return redirect()->to('/login');
    }
    if (password_verify($password, $row->password)) {
      $data = array(
        'login'      => TRUE,
        'name'     => $row->name,
        'username' => $row->username,
        'level'    => $row->level,
      );
      session()->set($data);
      session()->setFlashdata('message', 'Berhasil login !!!');
      return redirect()->to('/poliklinik');
    }
    session()->setFlashdata('message_error', 'Username atau Password salah !!!');
    return redirect()->to('/login');
  }

  public function logout()
  {
    session()->remove('username');
    session()->remove('password');
    session()->remove('level');
    session()->setFlashdata('message', 'Anda berhasil logout !!!');
    return redirect()->to('/login');
  }
}
