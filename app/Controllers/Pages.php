<?php


namespace App\Controllers;

class Pages extends BaseController
{

  public function index()
  {
    $data = ['title' => 'Home'];
    return view('pages/v_home', $data);
  }

  //--------------------------------------------------------------------
  public function about()
  {
    $data = ['title' => 'About'];
    return view('pages/v_about', $data);
  }
  //--------------------------------------------------------------------

  public function contact()
  {
    $data = ['title' => 'Contact'];
    return view('pages/v_contact', $data);
  }

}
