<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TblUsers;
use App\Models\Users;

class Login extends BaseController
{
    public function index()
    {
        
        $data = [];
		helper(['form']);

        echo view('templates/header', $data);
		echo view('customerlogin');
		echo view('templates/footer');

    }
}