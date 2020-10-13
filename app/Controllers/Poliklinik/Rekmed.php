<?php

namespace App\Controllers\Poliklinik;

use App\Controllers\BaseController;
use App\Models\RekmedModel;
use App\Models\DokterModel;
use App\Models\PasienModel;
use Config\App;

class Rekmed extends BaseController
{

  public function __construct()
  {
    $this->rekmedModel = new RekmedModel;
    $this->dokterModel = new DokterModel;
    $this->pasienModel = new PasienModel;
    helper('form', 'url');
  }

  //----------------------------READ----------------------------------------
  public function index()
  {
    // operasi ternari if untuk halaman pagination
    $curretPage = $this->request->getVar('page_rekmed') ?  $this->request->getVar('page_rekmed') : 1;

    $data = [
      'title'       => 'Poliklinik | Rekmed',
      'judul'       => 'Rekam Medis',
      'methodName'  => '/rekmed',
      //pagination
      'curretPage'  => $curretPage,
      'pager'       => $this->rekmedModel->pager,
      'rekmed'      => $this->rekmedModel->join('dokter', 'dokter.Id_Dokter = rekmed.Id_dokter')->join('pasien', 'Pasien.Id_Pasien = rekmed.Id_Pasien')->paginate(10, 'rekmed'),
      'isi'         => 'Poliklinik/Rekmed/v_index_rekmed'
    ];

    return view('layout/Poliklinik/v_wrapper.php', $data);
  }
  //--------------------------------------------------------------------------

  //----------------------------CREATE----------------------------------------
  public function create()
  {
    $data = [
      'title'      => 'Rekmed | Create',
      'judul'      => 'Tambah data rekmed',
      'methodName' => '/rekmed',
      'validation'   => \Config\Services::validation(),
      'dokter'     => $this->dokterModel->getDokter(),
      'pasien'     => $this->pasienModel->getPasien(),
      'isi'        => 'Poliklinik/Rekmed/v_create_rekmed'
    ];
    return view('layout/Poliklinik/v_wrapper.php', $data);
  }
  function store()
  {
    //validate input data rekmed
    if (!$this->validate([
      'Id_Dokter' => [
        'rules'  => 'required',
        'errors' => [
          'required' => 'Kode Dokter harus di isi !!!',
        ]
      ],
      'Id_Pasien' => [
        'rules'  => 'required',
        'errors' => [
          'required' => 'Kode Pasien harus di isi !!!',
        ]
      ],
      'Tgl_periksa' => [
        'rules'  => 'required',
        'errors' => [
          'required' => 'Tanggal periksa harus di isi !!!',
        ]
      ],
      'Gejala' => [
        'rules'  => 'required',
        'errors' => [
          'required' => 'Gejala harus di isi !!!',
        ]
      ],
      'Diagnosa' => [
        'rules'  => 'required',
        'errors' => [
          'required' => 'Diagnosa harus di isi !!!',
        ]
      ],
      'Terapi' => [
        'rules'  => 'required',
        'errors' => [
          'required' => 'Terapi harus di isi !!!',
        ]
      ],
    ])) {
      $validasi = \Config\Services::validation();
      return redirect()->to('/poliklinik/rekmed/create')->withInput()->with('validation', $validasi);
    }
    // Mengambil value dari form dengan method POST
    $Id_Rekmed    = $this->request->getPost('Id_Rekmed');
    $Id_Dokter    = $this->request->getPost('Id_Dokter');
    $Id_Pasien    = $this->request->getPost('Id_Pasien');
    $Tgl_periksa  = $this->request->getPost('Tgl_periksa');
    $Gejala       = $this->request->getPost('Gejala');
    $Diagnosa     = $this->request->getPost('Diagnosa');
    $Terapi       = $this->request->getPost('Terapi');

    //membuar array yang nantinya untuk insert ke table
    $data = [
      'Id_Rekmed'   => $Id_Rekmed,
      'Id_Dokter'   => $Id_Dokter,
      'Id_Pasien'   => $Id_Pasien,
      'Tgl_periksa'  => $Tgl_periksa,
      'Gejala'      => $Gejala,
      'Diagnosa'    => $Diagnosa,
      'Terapi'      => $Terapi,
    ];
    /* 
    Membuat variabel simpan yang isinya merupakan memanggil function 
    (insert_rekmed dari model) dan membawa parameter data 
    */
    $simpan = $this->rekmedModel->insert_rekmed($data);

    //jika simpan berhasil, maka ... 
    if ($simpan) {
      session()->setFlashdata('message_success', 'Tambah data rekmed berhasil !!!');
      return redirect()->to(base_url('poliklinik/rekmed'));
    }
  }

  //--------------------------------------------------------------------------

  //----------------------------UPDATE----------------------------------------
  public function update($id_rekmed)
  {
    $data = [
      'title'      => 'Rekmed | update',
      'judul'      => 'Edit data rekmed',
      'methodName' => '/rekmed',
      'isi'        => 'Poliklinik/Rekmed/v_update_rekmed',
      'dokter'     => $this->dokterModel->getDokter(),
      'pasien'     => $this->pasienModel->getPasien(),
      'validation' => \config\Services::validation(),
      'rekmed'     => $this->rekmedModel->getRekmed($id_rekmed)
    ];
    return view('layout/Poliklinik/v_wrapper.php', $data);
  }
  function proses_update($id_rekmed)
  {
    //validate input data rekmed
    if (!$this->validate([
      'Id_Dokter' => [
        'rules'  => 'required',
        'errors' => [
          'required' => 'Kode Dokter harus di isi !!!',
        ]
      ],
      'Id_Pasien' => [
        'rules'  => 'required',
        'errors' => [
          'required' => 'Kode Pasien harus di isi !!!',
        ]
      ],
      'Tgl_periksa' => [
        'rules'  => 'required',
        'errors' => [
          'required' => 'Tanggal periksa harus di isi !!!',
        ]
      ],
      'Gejala' => [
        'rules'  => 'required',
        'errors' => [
          'required' => 'Gejala harus di isi !!!',
        ]
      ],
      'Diagnosa' => [
        'rules'  => 'required',
        'errors' => [
          'required' => 'Diagnosa harus di isi !!!',
        ]
      ],
      'Terapi' => [
        'rules'  => 'required',
        'errors' => [
          'required' => 'Terapi harus di isi !!!',
        ]
      ],
    ])) {
      $validasi = \Config\Services::validation();
      return redirect()->to('/poliklinik/rekmed/update')->withInput()->with('validation', $validasi);
    }
    // Mengambil value dari form dengan method POST
    $Id_Rekmed    = $this->request->getPost('Id_Rekmed');
    $Id_Dokter    = $this->request->getPost('Id_Dokter');
    $Id_Pasien    = $this->request->getPost('Id_Pasien');
    $Tgl_periksa  = $this->request->getPost('Tgl_periksa');
    $Gejala       = $this->request->getPost('Gejala');
    $Diagnosa     = $this->request->getPost('Diagnosa');
    $Terapi       = $this->request->getPost('Terapi');

    //membuar array yang nantinya untuk insert ke table
    $data = [
      'Id_Rekmed'   => $Id_Rekmed,
      'Id_Dokter'   => $Id_Dokter,
      'Id_Pasien'   => $Id_Pasien,
      'Tgl_periksa' => $Tgl_periksa,
      'Gejala'      => $Gejala,
      'Diagnosa'    => $Diagnosa,
      'Terapi'      => $Terapi,
    ];
    /* 
     Membuat variabel simpan yang isinya merupakan memanggil function 
     (insert_rekmed dari model) dan membawa parameter data 
     */
    $simpan = $this->rekmedModel->update_rekmed($data, $id_rekmed);

    //jika simpan berhasil, maka ... 
    if ($simpan) {
      session()->setFlashdata('message_success', 'Edit data rekmed berhasil !!!');
      return redirect()->to(base_url('poliklinik/rekmed'));
    }
  }
  //--------------------------------------------------------------------------

  //----------------------------DELETE----------------------------------------
  public function delete($id_rekmed)
  {
    // Memanggil function delete_rekmed() dengan parameter $id di dalam PasienModel dan menampungnya di variabel hapus
    $hapus = $this->rekmedModel->delete_rekmed($id_rekmed);

    // Jika berhasil melakukan hapus
    if ($hapus) {
      // Deklarasikan session flashdata dengan tipe warning
      session()->setFlashdata('message_success', 'Hapus data rekmed berhasil !!!');
      // Redirect ke halaman Poliklinik/Pasien
      return redirect()->to(base_url('poliklinik/rekmed'));
    }
  }
  //--------------------------------------------------------------------------
}
