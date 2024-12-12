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
		$this->session->set('page', 'apropos');
		return view('apropos');
	}
}