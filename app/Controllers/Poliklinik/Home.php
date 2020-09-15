<?php

namespace App\Controllers\Poliklinik;

use App\Controllers\BaseController;

class Home extends BaseController
{
  //tembak ke view poliklinik index
  public function index()
  {

    $data = [
      'title' => 'Dashboard | Poliklinik',
      'methodName' => '/dashboard',
      'isi' => 'Poliklinik/v_home_Poliklinik',
      'judul' => 'Tugas Crud DataBase Poliklinik'
    ];

    return view('layout/Poliklinik/v_wrapper', $data);
  }

  //--------------------------------------------------------------------

}
