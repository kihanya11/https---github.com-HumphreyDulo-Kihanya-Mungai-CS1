<?php

namespace App\Controllers;

use App\Models\NotificationModel;
use App\Models\VendorModel;

class VendorController extends BaseController
{
    public function register()
    {
        // Load the necessary models and libraries
        $vendorModel = new VendorModel();
        $notificationModel = new NotificationModel();
    
        // Set the validation rules
        $rules = [
            'vendor_id' => 'required|is_unique[tbl_vendor.vendor_id]',
            'number' => 'required',
            'address' => 'required',
            'email' => 'required',
           

        
        ];
    
        // Validate the form data
        if (!$this->validate($rules)) {
            // Validation failed
            $errors = $this->validator->getErrors();
    
            // Return a JSON response with the validation errors
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $errors
            ]);
        }
    
        // If validation passed, proceed with saving the vendor registration to the database
        $data = [
            'vendor_id' => $this->request->getPost('vendor_id'),
            'number' => $this->request->getPost('number'),
            'address' => $this->request->getPost('address'),
            'email' => $this->request->getPost('email'),
            'status' => 'pending'
          
        ];
    
        // Save the vendor registration to the database
        $vendorId = $vendorModel->insert($data);
    
        // Create a notification for the admin
        $notificationData = [
            'vendor_id' => $vendorId,
            'message' => 'New vendor application received',
            'status' => 'pending'
        ];
        $notificationModel->insert($notificationData);
    
        // Return a JSON response for successful registration
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Vendor registration successful',
            'vendor_id' => $vendorId
        ]);
        
    }
    
    public function index()
    {

return view('vendor_registration');


    }
}
