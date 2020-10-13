<?php

namespace App\Controllers\Poliklinik;

use App\Controllers\BaseController;
use App\Models\DokterModel;
use App\Models\SpesialisModel;

class Dokter extends BaseController
{

  public function __construct()
  {
    $this->dokterModel = new DokterModel;
    $this->spesialisModel = new SpesialisModel;
    helper('form');
  }

  public function index()
  {
    // operasi ternari if untuk halaman pagination
    $curretPage = $this->request->getVar('page_dokter') ?  $this->request->getVar('page_dokter') : 1;

    // logika if untuk form search
    $keyword = $this->request->getPost('keyword');
    if ($keyword) {
      $dokter = $this->dokterModel->search($keyword);
    } else {
      $dokter = $this->dokterModel;
    }

    $data = [
      'title'      => 'Poliklinik | Dokter',
      'methodName' => '/dokter',
      'dokter'     => $dokter->join('spesialis', 'spesialis.Id_Spec=dokter.Id_Spec')->paginate(5, 'dokter'),
      // 'dokter' => $this->dokterModel->getDokter(),
      'judul'      => 'Tabel Dokter',
      'pager'  => $this->dokterModel->pager,
      'currentPage' =>  $curretPage,
      'isi'        => 'Poliklinik/Dokter/v_index_dokter'
    ];

    return view('layout/Poliklinik/v_wrapper', $data);
  }

  public function detail($Id_Dokter)
  {
    $data = [
      'title'      => 'Detail Dokter',
      'methodName' => '/dokter',
      'dokter'     => $this->dokterModel->getDokter($Id_Dokter),
      'spesialis'  => $this->spesialisModel->getSpesialis($Id_Dokter),
      'isi'        => 'Poliklinik/Dokter/v_detail_dokter',
      'judul'      => 'Detail Dokter'
    ];
    // jika request tidak ada di databse
    if (empty($data['dokter'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Id Dokter ' . $Id_Dokter . ' tidak di temukan.');
    }

    return view('layout/poliklinik/v_wrapper', $data);
  }

  public function delete($Id_Dokter)
  {
    // Memanggil function delete_dokter() dengan parameter $id di dalam DokterModel dan menampungnya di variabel hapus
    $hapus = $this->dokterModel->delete_dokter($Id_Dokter);

    // Jika berhasil melakukan hapus
    if ($hapus) {
      // Deklarasikan session flashdata dengan tipe warning
      session()->setFlashdata('message', 'Dihapus !!!');
      // Redirect ke halaman product
      return redirect()->to(base_url('poliklinik/dokter'));
    }
  }

  public function create()
  {
    $data = [
      'title'      => 'Dokter | Tambah',
      'methodName' => '/dokter',
      'judul'      => 'Tambah data dokter',
      'spesialis'  => $this->spesialisModel->getSpesialis(),
      'isi'        => 'Poliklinik/Dokter/v_create_dokter'
    ];

    return view('layout/poliklinik/v_wrapper', $data);
  }

  public function store()
  {
    // Mengambil value dari form dengan method POST
    $Id_Dokter   = $this->request->getPost('Id_Dokter');
    $Id_Spec     = $this->request->getPost('Id_Spec');
    $Nama_Dokter = $this->request->getPost('Nama_Dokter');
    $Gender      = $this->request->getPost('Gender');
    $Kontak      = $this->request->getPost('Kontak');

    //buat array
    $data = [
      'Id_Dokter'   => $Id_Dokter,
      'Id_Spec'     => $Id_Spec,
      'Nama_Dokter' => $Nama_Dokter,
      'Gender'      => $Gender,
      'Kontak'      => $Kontak,
    ];

    //buat simpan langsung ke database
    $simpan = $this->dokterModel->insert_dokter($data);

    if ($simpan) {
      session()->setFlashdata('message', 'Ditambahkan !!!');
      return redirect()->to(base_url('/poliklinik/dokter'));
    }
  }

  public function Update($id_dokter)
  {
    $data = [
      'title' => 'Dokter | Update',
      'judul' => 'Edit Data Dokter',
      'methodName' => '/dokter',
      'dokter'     => $this->dokterModel->getDokter($id_dokter),
      'spesialis'  => $this->spesialisModel->getSpesialis(),
      'isi'        => 'Poliklinik/Dokter/v_update_dokter'
    ];

    return view('layout/poliklinik/v_wrapper', $data);
  }

  public function proses_update($id_dokter)
  {
    // Mengambil value dari form dengan method POST
    $Id_Dokter   = $this->request->getPost('Id_Dokter');
    $Id_Spec     = $this->request->getPost('Id_Spec');
    $Nama_Dokter = $this->request->getPost('Nama_Dokter');
    $Gender      = $this->request->getPost('Gender');
    $Kontak      = $this->request->getPost('Kontak');

    //buat array
    $data = [
      'Id_Dokter'   => $Id_Dokter,
      'Id_Spec'     => $Id_Spec,
      'Nama_Dokter' => $Nama_Dokter,
      'Gender'      => $Gender,
      'Kontak'      => $Kontak,
    ];

    $ubah = $this->dokterModel->update_dokter($data, $id_dokter);

    if ($ubah) {
      session()->setFlashdata('message', 'Diubah !!!');
      return redirect()->to(base_url('/poliklinik/dokter'));
    }
  }
}
