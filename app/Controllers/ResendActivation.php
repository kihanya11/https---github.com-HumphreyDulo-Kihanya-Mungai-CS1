<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ResendActivation extends BaseController
{
    public function index()
    {
        {
            // Get the user's email from the form input
            $email = $this->request->getPost('email');
    
            // Load the Users model
            $userModel = new Users();
    
            // Find the user by email
            $user = $userModel->where('email', $email)->first();
    
            if ($user && !$user['is_active']) {
                // Generate a new activation code
                $length = 9; // Length of the random string
                $activationCode = bin2hex(random_bytes($length));
    
                // Update the activation code in the activation table
                $activationModel = new Activation();
                $activationData = [
                    'id' => $user['id'],
                    'activation_code' => $activationCode,
                ];
                $activationModel->update($activationData['id'], $activationData); // Updated: Use update method to save the changes
    
                $model = new Users();
                $data = [
                    'firstname' => $this->request->getPost('firstname'),
                    'lastname' => $this->request->getPost('lastname'),
                    'dob' => $this->request->getPost('dob'),
                    'number' => $this->request->getPost('number'),
                    'username' => $this->request->getPost('username'),
                    'email' => $this->request->getPost('email'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'role' => '2'
                ];
    
                $email = Services::email();
                $email->setTo($data['email']);
                $email->setSubject('Account Activation');
                $email->setMessage("The activation code is: $activationCode");
                $email->send();
    
                // Show a success message or redirect to success page
                return view('resend_activation_success');
            } else {
                // Show an error message or redirect to error page
                return view('resend_activation_error');
            }
        }
    }
}
