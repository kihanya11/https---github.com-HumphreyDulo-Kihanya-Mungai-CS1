<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NotificationModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $data=[];
        helper(['form']);
        echo view('templates/header', $data);
         echo view('dashboard');
         echo view('templates/footer');
    }

    public function dashboard()
    {
        // Load the necessary models and retrieve the notification count
        $notificationModel = new NotificationModel();
        $notificationCount = $notificationModel->countAll();

             // Count the number of pending notifications
             $notificationCount = $notificationModel->where('status','pending')->countAllResults();
    
        
        // Pass the notification count to the view
        return view('admin_dashboard', ['notificationCount' => $notificationCount]);
    }
}
