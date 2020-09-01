<?php

namespace App\Controllers;

use \App\Models\PasienModel;
use CodeIgniter\HTTP\Request;

class Poliklinik extends BaseController
{

  protected $poliklinik;
  public function __construct() {
  // Mendeklarasikan class PasienModel menggunakan $this->poliklinik
    $this->poliklinik = new PasienModel();
    /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class pasien 
    */
  }

  public function index()
  {
    $data = [
      'title' => 'Poliklinik',
      'methodName' => '/poliklinik',
      'pasien' => $this->poliklinik->getPasien()
  ];
    return view('pages/poliklinik/v_poliklinik', $data);
  }

  // method detail ke v_detail
  public function detail($id)
  {
    $data = [
      'title' => 'Detail Pasien',
      'methodName' => '/poliklinik',
      'pasien' => $this->poliklinik->getPasien($id)
    ];

    // jika request tidak ada di databse
    if (empty($data['pasien'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Id Pasien '. $id . ' tidak di temukan.');
    }

    return view('pages/poliklinik/v_detail_pasien', $data);
  }

  //-----------------DELETE---------------------------------------------------
  public function delete($id)
  {
    // Memanggil function delete_pasien() dengan parameter $id di dalam PasienModel dan menampungnya di variabel hapus
    $hapus = $this->poliklinik->delete_pasien($id);

    // Jika berhasil melakukan hapus
    if ($hapus) {
      // Deklarasikan session flashdata dengan tipe warning
      session()->setFlashdata('warning', 'Deleted Pasien successfully');
      // Redirect ke halaman product
      return redirect()->to(base_url('poliklinik'));
    }
  } 
  //--------------------------------------------------------------------

  //----------------------CREATE----------------------------------------------
  public function create() {
    // session(); ==>Bisa langsung disini atau bisa juga di basecontrollernya
    $data = [
      'title'=>'Create Pasien',
      'methodName' => '/poliklinik',
      'validation' => \Config\Services::validation()
    ];

    return view ('pages/poliklinik/v_create_pasien', $data);
  }

  public function store() {

    // validasi input pasien
    if(!$this->validate([
      'Id_Pasien' => [
        'rules' => 'required|Is_unique[pasien.Id_Pasien]',
        'errors' => [
          'required'  => 'Kode Pasien harus di isi !!!',
          'Is_unique' => 'Kode Pasien sudah terdaftar !!!'
        ]
        ],
      'Nama_Pasien' => [
        'rules' => 'required|min_length[10]|alpha_space',
        'errors' => [
          'required' => 'Nama Pasien harus di isi !!!',
          'min_length' => 'Minimal inputan 10 karakter !!!',
          'alpha_space' => 'Inputan tidak boleh berupa angka !!!'
        ]
        ],
      'Gender' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Jenis Kelamin harus di isi !!!'
        ]
        ],
      'Alamat_Detail' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Alamat Detail harus di isi !!!'
        ]
        ],
      'Alamat_Kelurahan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Alamat Kelurahan harus di isi !!!'
        ]
        ],
      'Alamat_Kecamatan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Kecamatan harus di isi !!!'
        ]
        ],
      'Alamat_KotaKab' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Kota/Kabupaten harus di isi !!!'
        ]
        ],
      'Tmp_Lahir' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tempat Lahir harus di isi !!!'
        ]
        ],
      'Tgl_Lahir' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal Lahir harus di isi !!!'
        ]
        ]
    ])) {
      $validasi = \Config\Services::validation();
      return redirect()->to('/poliklinik/create')->withInput()->with('validation', $validasi);
    }

    // Mengambil value dari form dengan method POST
    $Id_Pasien        = $this->request->getPost('Id_Pasien');
    $Nama_Pasien      = $this->request->getPost('Nama_Pasien');
    $Gender           = $this->request->getPost('Gender');
    $Alamat_Detail    = $this->request->getPost('Alamat_Detail');
    $Alamat_Kelurahan = $this->request->getPost('Alamat_Kelurahan');
    $Alamat_Kecamatan = $this->request->getPost('Alamat_Kecamatan');
    $Alamat_KotaKab   = $this->request->getPost('Alamat_KotaKab');
    $Tmp_Lahir        = $this->request->getPost('Tmp_Lahir');
    $Tgl_Lahir        = $this->request->getPost('Tgl_Lahir');

    // Membuat array collection yang disiapkan untuk insert ke table
    $data = [
      'Id_Pasien'   => $Id_Pasien,
      'Nama_Pasien' => $Nama_Pasien,
      'Gender'      => $Gender,
      'Alamat_Detail'    => $Alamat_Detail,
      'Alamat_Kelurahan' => $Alamat_Kelurahan,
      'Alamat_Kecamatan' => $Alamat_Kecamatan,
      'Alamat_KotaKab' => $Alamat_KotaKab,
      'Tmp_Lahir' => $Tmp_Lahir,
      'Tgl_Lahir' => $Tgl_Lahir,
    ];

    /* 
    Membuat variabel simpan yang isinya merupakan memanggil function 
    (insert_pasien dari model) dan membawa parameter data 
    */
    $simpan = $this->poliklinik->insert_pasien($data);

    // Jika simpan berhasil, maka ...
    if ($simpan) {
      // Deklarasikan session flashdata dengan tipe success
      session()->setFlashdata('success', 'Created pasien successfully');
      // Redirect halaman ke pasien
      return redirect()->to(base_url('poliklinik'));
    }
  }
  //--------------------------------------------------------------------

  //-------------UPDATE-------------------------------------------------------
  public function update($id)
  {
    // Memanggil function getPasien($id) dengan parameter $id di dalam PasienModel dan menampungnya di variabel array pasien
    // $data['pasien'] = $this->poliklinik ->getPasien($id);
    // $data = ['title' => 'Create Pasien'];
    $data = [
      'title' => 'Update Pasien',
      'pasien' => $this->poliklinik->getPasien($id),
      'methodName' => '/poliklinik',
      'validation' => \Config\Services::validation()
    ];
    // Mengirim data ke dalam view
    return view('pages/poliklinik/v_update_pasien', $data);
  }

  public function proses_update($id)
  { // validasi input pasien
    if (!$this->validate([
      'Id_Pasien' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Kode Pasien harus di isi !!!'
        ]
      ],
      'Nama_Pasien' => [
        'rules' => 'required|min_length[10]|alpha_space',
        'errors' => [
          'required' => 'Nama Pasien harus di isi !!!',
          'min_length' => 'Minimal inputan 10 karakter !!!',
          'alpha_space' => 'Inputan tidak boleh berupa angka !!!'
        ]
      ],
      'Gender' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Jenis Kelamin harus di isi !!!'
        ]
      ],
      'Alamat_Detail' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Alamat Detail harus di isi !!!'
        ]
      ],
      'Alamat_Kelurahan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Alamat Kelurahan harus di isi !!!'
        ]
      ],
      'Alamat_Kecamatan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Kecamatan harus di isi !!!'
        ]
      ],
      'Alamat_KotaKab' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Kota/Kabupaten harus di isi !!!'
        ]
      ],
      'Tmp_Lahir' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tempat Lahir harus di isi !!!'
        ]
      ],
      'Tgl_Lahir' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal Lahir harus di isi !!!'
        ]
      ]
    ])) {
      $validasi = \Config\Services::validation();
      return redirect()->to('/poliklinik/update/'. $this->request->getVar('Id_Pasien'))->withInput()->with('validation', $validasi);
    }

    // Mengambil value dari form dengan method POST
    $Id_Pasien        = $this->request->getPost('Id_Pasien');
    $Nama_Pasien      = $this->request->getPost('Nama_Pasien');
    $Gender           = $this->request->getPost('Gender');
    $Alamat_Detail    = $this->request->getPost('Alamat_Detail');
    $Alamat_Kelurahan = $this->request->getPost('Alamat_Kelurahan');
    $Alamat_Kecamatan = $this->request->getPost('Alamat_Kecamatan');
    $Alamat_KotaKab   = $this->request->getPost('Alamat_KotaKab');
    $Tmp_Lahir        = $this->request->getPost('Tmp_Lahir');
    $Tgl_Lahir        = $this->request->getPost('Tgl_Lahir');

    // Membuat array collection yang disiapkan untuk insert ke table
    $data = [
      'Id_Pasien'   => $Id_Pasien,
      'Nama_Pasien' => $Nama_Pasien,
      'Gender'      => $Gender,
      'Alamat_Detail'    => $Alamat_Detail,
      'Alamat_Kelurahan' => $Alamat_Kelurahan,
      'Alamat_Kecamatan' => $Alamat_Kecamatan,
      'Alamat_KotaKab' => $Alamat_KotaKab,
      'Tmp_Lahir' => $Tmp_Lahir,
      'Tgl_Lahir' => $Tgl_Lahir
    ];

    /* 
    Membuat variabel ubah yang isinya merupakan memanggil function 
    update_pasien dan membawa parameter data beserta id
    */
    $ubah = $this->poliklinik->update_pasien($data, $id);

    // Jika berhasil melakukan ubah
    if ($ubah) {
      // Deklarasikan session flashdata dengan tipe info
      session()->setFlashdata('info', 'Updated pasien successfully');
      // Redirect ke halaman poliklinik
      return redirect()->to(base_url('poliklinik'));
    }
  } 
  //--------------------------------------------------------------------------


}
