<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function menu() {
        return view('partials/menu');
    }
}
