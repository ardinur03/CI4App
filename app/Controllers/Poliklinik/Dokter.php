<?php

namespace App\Controllers\Poliklinik;

use App\Controllers\BaseController;
use App\Models\DokterModel;

class Dokter extends BaseController
{

  protected $dokterModel;
  public function __construct()
  {
    $this->dokterModel = new DokterModel;
  }

  public function index()
  {
    $data = [
      'title'   => 'Poliklinik | Dokter',
      'methodName' => '/dokter',
      'dokter'  => $this->dokterModel->getDokter(),
      'judul'   => 'Tabel Dokter',
      'isi'     => 'Poliklinik/Dokter/v_index_dokter'
    ];

    return view('layout/Poliklinik/v_wrapper', $data);
  }

  public function detail($Id_Dokter)
  {
    $data = [
      'title' => 'Detail Dokter',
      'methodName' => '/dokter',
      'dokter' => $this->dokterModel->firstDokter($Id_Dokter),
      'isi'    => 'Poliklinik/Dokter/v_detail_dokter',
      'judul'  => 'Detail Dokter'
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
      session()->setFlashdata('warning', 'Deleted Dokter successfully');
      // Redirect ke halaman product
      return redirect()->to(base_url('Poliklinik/Dokter'));
    }
  }
}
