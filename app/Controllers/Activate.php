<?php

namespace App\Controllers;

use App\Models\Activation;
use App\Controllers\BaseController;
use App\Models\Users;

class Activate extends BaseController
{
    public function index()
    {
        if ($this->request->getMethod() === 'post') {
            $activationCode = $this->request->getPost('activation_code');

            // Find the activation record by activation code
            $activationModel = new Activation();
            $activation = $activationModel->where('activation_code', $activationCode)->first();

            if ($activation) {
                // Find the user by user ID in the activation record
                $userModel = new Users();
                $user = $userModel->find($activation['id']);

                if ($user) {
                    // Set the is_active field to 1 in the user table
                    $user['is_active'] = 1;
                    $userModel->update($user['id'], $user);

                    // Delete the activation record
                    $activationModel->delete($activation['activation_id']);

                    // Show success message or redirect to login page
                    return view('customerlogin');
                } else {
                    // User not found
                    $data['error'] = 'Invalid activation code.';
                    return view('activationform', $data);
                }
            } else {
                // Activation record not found
                $data['error'] = 'Invalid activation code.';
                return view('activationform', $data);
            }
        } else {
            // Display the activation form
            return view('activationform');
        }
    }
}
