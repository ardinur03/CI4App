<?php


namespace App\Controllers;

class Pages extends BaseController
{

  public function index()
  {
    $data = [
      'title' => 'Home',
      'methodName' => '/'
    ];
    return view('pages/v_home', $data);
  }

  //--------------------------------------------------------------------
  public function about()
  {
    $data = [
      'title' => 'About', 
      'methodName' => '/about'
    ];
    return view('pages/v_about', $data);
  }
  //--------------------------------------------------------------------

  public function contact()
  {
    $data = [
      'title' =>'Contact',
      'methodName' => '/contact'];
    return view('pages/v_contact', $data);
  }

}
