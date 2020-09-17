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

}
