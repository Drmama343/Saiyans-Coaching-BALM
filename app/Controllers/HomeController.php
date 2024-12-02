<?php

namespace App\Controllers;

class HomeControleur extends BaseController
{
    protected $session;
    public function __construct() {
        helper('form');
        $this->session = session();
    }

    public function index(): string
    {
        return view('index');
    }
}