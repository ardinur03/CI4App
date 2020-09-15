<?php

namespace App\Controllers\Poliklinik;

use \App\Models\SpesialisModel;
use App\Controllers\BaseController;

class Spesialis extends BaseController
{
  protected $spesialis;
  public function __construct()
  {
    // mendeklarasikan class SpesialisModel
    $this->spesialis = new SpesialisModel();
    /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Spesialis 
    */
  }

  public function index()
  {
    $curretPage = $this->request->getVar('page_spesialis') ?  $this->request->getVar('page_spesialis') : 1;
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $spesialis = $this->spesialis->search($keyword);
    } else {
      $spesialis = $this->spesialis;
    }
    $data = [
      'title' => 'Poliklinik | Spesialis',
      'methodName' => '/spesialis',
      'isi'   => 'Poliklinik/Spesialis/v_index_spesialis',
      'judul' => 'Tabel Spesialis',
      'spesialis' => $spesialis->paginate(5, 'spesialis'),
      'validation'   => \Config\Services::validation(),
      'pager'  => $this->spesialis->pager,
      'currentPage' => $curretPage
    ];
    return view('layout/Poliklinik/v_wrapper', $data);
  }

  //--------------------------------------------------------------------
  public function create_spesialis()
  {
    $data = [
      'title' => 'Spesialis | Create',
      'methodName' => '/spesialis',
      'judul' => 'Tambah Data Spesialis',
      'isi'   => 'Poliklinik/Spesialis/v_create_spesialis'
    ];
    return view('layout/poliklinik/v_wrapper', $data);
  }
  //proses penyimpanan
  public function Store()
  {

    // validasi input spesialis
    if (!$this->validate([
      'Id_Spec' => [
        'rules' => 'required|Is_unique[spesialis.Id_spec]|alpha_space',
        'errors' => [
          'required'  => 'Kode Spesialis harus di isi !!!',
          'Is_unique' => 'Kode Spesialis sudah terdaftar !!!',
          'alpha_space' => 'Inputan tidak boleh berupa angka !!!'
        ]
      ],
      'Spec' => [
        'rules' => 'required|Is_unique[spesialis.Spec]|alpha_space',
        'errors' => [
          'required'  => 'Kode Spesialis harus di isi !!!',
          'Is_unique' => 'Kode Spesialis sudah terdaftar !!!',
          'alpha_space' => 'Inputan tidak boleh berupa angka !!!'
        ]
      ]
    ])) {
      $validasi = \Config\Services::validation();
      return redirect()->to('/Poliklinik/Spesialis')->withInput()->with('validation', $validasi);
    }

    //Mengambil data dari form
    $Id_Spec  = $this->request->getPost('Id_Spec');
    $Spec     = $this->request->getPost('Spec');

    //membuat array collection yang di siapkan untuk insert ke table
    $data = [
      'Id_Spec' => $Id_Spec,
      'Spec'    => $Spec,
    ];

    /* 
    Membuat variabel simpan yang isinya merupakan memanggil function 
    (insert_spesialis dari model) dan membawa parameter data 
    */
    $simpan = $this->spesialis->insert_spesialis($data);

    //jika simpan berhasil maka.. 
    if ($simpan) {
      // deklarasikan session flashdata dengan tipe success
      session()->setFlashdata('success', 'Creates spesialis successfully');
      //redirect halaman ke poliklinik/spesialis

      return redirect()->to(base_url('poliklinik/spesialis'));
    }
  }
  //--------------------------------------------------------------------

  public function delete($Id_Spec)
  {
    // Memanggil function delete_spesialis() dengan parameter $id di dalam Spesialis dan menampungnya di variabel hapus
    $hapus = $this->spesialis->delete_spesialis($Id_Spec);

    // Jika berhasil melakukan hapus
    if ($hapus) {
      // Deklarasikan session flashdata dengan tipe warning
      session()->setFlashdata('warning', 'Deleted Spesialis successfully');
      // Redirect ke halaman product
      return redirect()->to(base_url('Poliklinik/Spesialis'));
    }
  }

  //--------------------------------------------------------------------
  public function update($Id_Spec)
  {
    $data = [
      'title' => 'Spesialis | Update',
      'methodName' => '/spesialis',
      'judul' => 'Update Data Spesialis',
      'spesialis' => $this->spesialis->getSpesialis($Id_Spec),
      'validation'   => \Config\Services::validation(),
      'isi'       => 'Poliklinik/Spesialis/v_update_spesialis'
    ];

    return view('layout/poliklinik/v_wrapper', $data);
  }
  public function proses_update($Id_Spec)
  {

    // validasi update spesialis
    if (!$this->validate([
      // 'Id_Spec' => [
      //   'rules' => 'required|Is_unique[spesialis.Id_spec]',
      //   'errors' => [
      //     'required'  => 'Kode Spesialis harus di isi !!!',
      //     'Is_unique' => 'Kode Spesialis sudah terdaftar !!!'
      //   ]
      // ],
      'Spec' => [
        'rules' => 'required|alpha_space',
        'errors' => [
          'required'  => 'Kode Spesialis harus di isi !!!',
          'alpha_space' => 'Inputan tidak boleh berupa angka !!!'
        ]
      ]
    ])) {
      $validasi = \Config\Services::validation();
      return redirect()->to('/Poliklinik/Spesialis/Update/' . $this->request->getVar('Id_Spec'))->withInput()->with('validation', $validasi);
    }

    // Mengambil value dari form dengan method POST
    $Id_Spec = $this->request->getPost('Id_Spec');
    $Spec    = $this->request->getPost('Spec');

    // Membuat array collection yang disiapkan untuk insert ke table
    $data = [
      'Id_Spec' => $Id_Spec,
      'Spec'    => $Spec
    ];

    /* 
    Membuat variabel ubah yang isinya merupakan memanggil function 
    update_spesialis dan membawa parameter data beserta id
    */
    $ubah = $this->spesialis->update_spesialis($data, $Id_Spec);

    //jika berhasil mengubah
    if ($ubah) {
      // Deklarasikan session flashdata dengan tipe info
      session()->setFlashdata('info', 'Updated spesialis successfully');
      // Redirect ke halaman poliklinik/Spesialis
      return redirect()->to(base_url('Poliklinik/Spesialis'));
    }
  }
}
