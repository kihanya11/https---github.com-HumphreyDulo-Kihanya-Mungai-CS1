<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Activator extends BaseController
{
    public function index()
    {
        return view('activationform');
    }
}
