<?php

namespace App\Controllers;

class Pages extends BaseController
{

  //------------------HOME----------------------------------------------
  public function index()
  {
    $data = [
      'title' => 'Home',
      'methodName' => '/'
    ];
    return view('pages/v_home', $data);
  }
  //--------------------------------------------------------------------

  //-----------------CONTACT--------------------------------------------
  public function contact()
  {
    $data = [
      'title' => 'Contact',
      'methodName' => '/contact'
    ];
    return view('pages/v_contact', $data);
  }
  //--------------------------------------------------------------------

  //------------------ABOUT---------------------------------------------
  public function about()
  {
    $data = [
      'title' => 'About',
      'methodName' => '/about'
    ];
    return view('pages/v_about', $data);
  }
  //--------------------------------------------------------------------

  //-----------------LOGIN----------------------------------------------
  public function login()
  {
    $data = [
      'title' => 'Login',
      'isi'   => '/auth/v_login.php'
    ];
    return view('layout/Poliklinik/v_auth', $data);
  }

  //-----------------REGISTER----------------------------------------------
  public function register()
  {
    $data = [
      'title' => 'Register',
      'isi'   => '/auth/v_register.php',
      'validate' => \Config\Services::validation()
    ];
    return view('layout/Poliklinik/v_auth', $data);
  }
}
