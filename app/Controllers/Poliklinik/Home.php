<?php

namespace App\Controllers\Poliklinik;

use App\Controllers\BaseController;

class Home extends BaseController
{

  public function index()
  {

    $data = [
      'title'      => 'Poliklinik | Dashboard',
      'methodName' => '/dashboard',
      // Key isi ini merupakan link menuju view v_home_Poliklinik
      'isi'        => 'Poliklinik/v_home_Poliklinik',
      // key judul ini merupakan judul di halaman 
      'judul'      => ' '
    ];
    /* 
    * kemudian data akan di tembakkan ke v_wrapper yaitu sebagai template poliklinik pembungkus yang dinamis
    */
    return view('layout/Poliklinik/v_wrapper', $data);
  }

  //--------------------------------------------------------------------

}
