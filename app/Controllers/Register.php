<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;

class Register extends BaseController
{
    public function index()
    {
        $data = [];
		helper(['form']);

        echo view('templates/header', $data);
		echo view('register');
		echo view('templates/footer');
    
    }
   
             
}




