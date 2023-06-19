<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Logout extends BaseController
{

    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $this->session->destroy(); // Destroy all session data
    
    return redirect()->to('login');
    }
}
