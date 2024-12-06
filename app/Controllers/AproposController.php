<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AproposController extends Controller
{
	protected $session;
	public function __construct()
	{
		$this->session = session();
	}
	public function index()
	{
		return view('apropos');
	}
}