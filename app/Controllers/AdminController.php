<?php

namespace App\Controllers;



class AdminController extends BaseController
{
	protected $session;
	public function __construct() {
		$this->session = session();
	}


	public function index()
	{
		return view('admin');
	}
}