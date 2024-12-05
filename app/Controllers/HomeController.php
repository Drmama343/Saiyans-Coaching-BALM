<?php

namespace App\Controllers;

use App\Models\AchatModel;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class HomeController extends BaseController
{
	protected $session;
	public function __construct() {
		$this->session = session();
	}

	public function index(): string
	{
		$achatModel = new AchatModel();

		$achats = $achatModel->findAll();
		$data['achats'] = $achats;

		return view('index', $data);
	}
}