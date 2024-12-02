<?php

namespace App\Controllers;

class HomeControleur extends BaseController
{
    public function index(): string
    {
        return view('index');
    }
}