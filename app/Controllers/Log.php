<?php

namespace App\Controllers;

use App\Controllers\Auth;
use App\Controllers\BaseController;

use App\Models\Activation;
use App\Models\Users;


class Log extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [];
       helper(['form']);

       

        $rules = [
            'username' => ['rules' => 'required|min_length[1]|max_length[255]'],
            'password' => ['rules' => 'required']
        ];

        if ($this->validate($rules)) {
            $model = new Users();
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            // Check if the user exists in the database
            $user = $model->where('username', $username)->first();

            if ($user) {
                // Verify the password
                if (password_verify($password, $user['password'])) {
                    // Check if the user is active
                    if (isset($user['is_active']) && $user['is_active'] == 1) {
                        // Password is correct, log in the user
                        // You can implement your own login logic here

                        // Set session data
                        $sessionData = [
                            'user_id' => $user['id'],
                            'username' => $user['username'],
                            'isLoggedIn' => true,
                            // Add more session data as needed
                        ];
                        $this->session->set($sessionData);

                        // Pass session data to the view
                        $data['username'] = $user['username'];

                        echo view('templates/header', $data);
                        echo view('dashboard');
                        echo view('templates/footer');
                    } else {
                        // User account is not yet activated
                        $data['activation_error'] = 'Your account is not yet activated. Please activate your account first before logging in.';

                        // Generate activation code
                        $length = 9; // Length of the random string
                        $activationCode = bin2hex(random_bytes($length));

                        // Insert activation data into the database
                        $activationModel = new Activation();
                        $activationData = [
                            'id' => $user['id'],
                            'activation_code' => $activationCode,
                        ];
                        $activationModel->insert($activationData);

                        // Send activation email
                        $email = \Config\Services::email();
                        $email->setTo($user['email']); // Set recipient email from $user array
                        $email->setSubject('Account Activation');
                        $email->setMessage("The activation code is: $activationCode");
                        $email->send();

                        return view('activationform', $data);

                    }
                }
                else{
                    // Invalid username or password
                    $data['login_error'] = 'Incorrect username or password';
                        echo view('templates/header', $data);
                        echo view('customerlogin');
                        echo view('templates/footer');

                }

            } 
            else{
                $data['validation'] = $this->validator;
                $data['login_error'] = 'Invalid username, enter the correct username or register';
                echo view('templates/header', $data);
                echo view('customerlogin');
                echo view('templates/footer');

            }
        }
        else{
            $data['validation'] = $this->validator;
            $data['login_error'] = 'Invalid username or password';
            echo view('templates/header', $data);
            echo view('customerlogin');
            echo view('templates/footer');

        }
    }

    
}