<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $helpers = ['url'];

    public function index()
    {
        return view('index');
    }
}
