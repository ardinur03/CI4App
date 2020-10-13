<?php

namespace App\Controllers\Poliklinik;

use App\Controllers\BaseController;
use \App\Models\SpesialisModel;

class Spesialis extends BaseController
{
  protected $spesialis;
  public function __construct()
  {
    // mendeklarasikan class SpesialisModel dengan $his->spesialis
    $this->spesialis = new SpesialisModel();
    /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Spesialis (file ini)
    */
  }

  //----------------------------READ----------------------------------------
  public function index()
  {
    // operasi ternari if untuk halaman pagination
    $curretPage = $this->request->getVar('page_spesialis') ?  $this->request->getVar('page_spesialis') : 1;

    // logika if untuk form search
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $spesialis = $this->spesialis->search($keyword);
    } else {
      $spesialis = $this->spesialis;
    }

    $data = [
      'title'      => 'Poliklinik | Spesialis',
      'methodName' => '/spesialis',
      // Key isi => ini nilai yg isinya link menuju view v_index_spesialis
      'isi'        => 'Poliklinik/Spesialis/v_index_spesialis',
      'judul'      => 'Tabel Spesialis',
      // paginate() => untuk memanggil paginasi bawaan ci
      'spesialis'  => $spesialis->paginate(5, 'spesialis'),
      'validation' => \Config\Services::validation(),
      'pager'      => $this->spesialis->pager,
      'currentPage' => $curretPage
    ];
    /* 
    * kemudian data akan di tembakkan ke v_wrapper yaitu sebagai template poliklinik pembungkus yang dinamis
    */
    return view('layout/poliklinik/v_wrapper', $data);
  }
  //--------------------------------------------------------------------------

  //----------------------------CREATE----------------------------------------
  public function create_spesialis()
  {
    $data = [
      'title' => 'Spesialis | Create',
      'methodName' => '/spesialis',
      'judul' => 'Tambah Data Spesialis',
      // Key isi => ini nilai yg isinya link menuju view v_create_spesialis
      'isi'   => 'Poliklinik/Spesialis/v_create_spesialis'
    ];
    /* 
    * kemudian data akan di tembakkan ke v_wrapper yaitu sebagai template poliklinik pembungkus yang dinamis
    */
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
          'required'  => 'Spesialis harus di isi !!!',
          'Is_unique' => 'Spesialis sudah terdaftar !!!',
          'alpha_space' => 'Inputan tidak boleh berupa angka !!!'
        ]
      ]
    ])) {
      $validasi = \Config\Services::validation();
      return redirect()->to('/poliklinik/spesialis')->withInput()->with('validation', $validasi);
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
      // deklarasikan session flashdata dengan tipe message
      session()->setFlashdata('message_success', 'Data spesialis behasil di tambahkan !!!');
      //redirect halaman ke poliklinik/spesialis

      return redirect()->to(base_url('poliklinik/spesialis'));
    }
  }
  //-------------------------------------------------------------------------

  //-------------------DELETE-------------------------------------------------
  public function delete($Id_Spec)
  {
    // Memanggil function delete_spesialis() dengan parameter $id di dalam Spesialis dan menampungnya di variabel hapus
    $hapus = $this->spesialis->delete_spesialis($Id_Spec);

    // Jika berhasil melakukan hapus
    if ($hapus) {
      // Deklarasikan session flashdata dengan tipe warning
      session()->setFlashdata('message_success', 'Data spesialis berhasisil di hapus !!!');
      // Redirect ke halaman Poliklinik/Spesialis
      return redirect()->to(base_url('poliklinik/spesialis'));
    }
  }
  //-------------------------------------------------------------------------

  //----------------UPDATE---------------------------------------------------
  public function update($Id_Spec)
  {
    $data = [
      'title'       => 'Spesialis | Update',
      'methodName'  => '/spesialis',
      'judul'       => 'Update Data Spesialis',
      'spesialis'   => $this->spesialis->getSpesialis($Id_Spec),
      'validation'  => \Config\Services::validation(),
      // Key isi => ini nilai yg isinya link menuju view v_create_spesialis
      'isi'         => 'Poliklinik/Spesialis/v_update_spesialis'
    ];
    // jika request tidak ada di databse
    if (empty($data['spesialis'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Kode Spesialis ' . $Id_Spec . ' tidak di temukan.');
    }
    /* 
    * kemudian data akan di tembakkan ke v_wrapper yaitu sebagai template poliklinik pembungkus yang dinamis
    */
    return view('layout/poliklinik/v_wrapper', $data);
  }
  public function proses_update($Id_Spec)
  {
    // validasi update spesialis
    if (!$this->validate([
      'Spec' => [
        'rules' => 'required|alpha_space|Is_unique[spesialis.Spec]',
        'errors' => [
          'required'  => 'Kode Spesialis harus di isi !!!',
          'alpha_space' => 'Inputan tidak boleh berupa angka !!!',
          'Is_unique' => 'Spesialis ini sudah terdaftar di database !!!'
        ]
      ]
    ])) {
      $validasi = \Config\Services::validation();
      return redirect()->to('/Poliklinik/Spesialis/update/' . $this->request->getVar('Id_Spec'))->withInput()->with('validation', $validasi);
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
      // Deklarasikan session flashdata dengan tipe message
      session()->setFlashdata('message_success', 'Di ubah !!!');
      // Redirect ke halaman poliklinik/Spesialis
      return redirect()->to(base_url('poliklinik/spesialis'));
    }
  }
  //-------------------------------------------------------------------------

  //------------------------DETAIL------------------------------------------
  // method detail ke v_detail
  public function detail($id)
  {
    $data = [
      'title'   => 'Spesialis | Detail',
      'methodName' => '/spesialis',
      'spesialis'  => $this->spesialis->getSpesialis($id),
      // Key isi => ini nilai yg isinya link menuju view v_index_spesialis
      'isi'     => 'Poliklinik/Spesialis/v_detail_spesialis',
      'judul'   => 'Detail Spesialis'
    ];
    // jika request tidak ada di databse
    if (empty($data['spesialis'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Kode Spesialis ' . $id . ' tidak di temukan.');
    }
    /* 
    * kemudian data akan di tembakkan ke view v_wrapper yaitu sebagai template poliklinik pembungkus yang dinamis
    */
    return view('layout/poliklinik/v_wrapper', $data);
  }
  //--------------------------------------------------------------------------
}
