<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    protected $session;
    public function __construct() {
        $this->session = session();
    }

    public function index(): string
    {
        return view('index');
    }
}