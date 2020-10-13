<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'home',
			'methodName' => '/home'
		];
		return view('pages/v_home', $data);
	}

	//--------------------------------------------------------------------

}
