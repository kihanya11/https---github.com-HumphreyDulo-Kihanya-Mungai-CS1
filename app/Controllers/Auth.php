<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Config\Services;
use CodeIgniter\Security\Security;
use App\Models\Activation;
use App\Models\Users;


class Auth extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $rules = [
            'firstname' => ['rules' => 'required|min_length[1]|max_length[255]'],
            'lastname' => ['rules' => 'required|min_length[1]|max_length[255]'],
            'username' => ['rules' => 'required|min_length[1]|max_length[255]|is_unique[tbl_users.username]'],
            'dob' => ['rules' => 'required|min_length[4]|max_length[10]'],
            'number' => ['rules' => 'required|min_length[9]|max_length[10]'],
            'email' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[tbl_users.email]'],
            'password' => ['rules' => 'required|min_length[8]|max_length[255]'],
            'confirm_password' => ['label' => 'confirm password', 'rules' => 'matches[password]']
        ];


        if ($this->validate($rules)) {
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
            $model->save($data);

            // Step 3: Generate activation code and send activation email

            $length = 9; // Length of the random string

            $activationCode = bin2hex(random_bytes($length));

            $activationModel = new Activation();
            $activationData = [
                'id' => $model->insertID(),
                'activation_code' => $activationCode,
            ];


            $activationModel->insert($activationData);

            $email = Services::email();
            $email->setTo($data['email']);
            $email->setSubject('Account Activation');
            $email->setMessage("The activation code is: $activationCode");
            $email->send();

            $username = $this->request->getPost('username');
            $user = $model->where('username', $username)->first();
            $sessionData = [
                'user_id' => $user['id'],
                'username' => $user['username'],
                // Add more session data as needed
            ];
            $this->session->set($sessionData);

            // Pass session data to the view
            $data['username'] = $user['username'];

            return redirect()->to('Activate');
        } else {
            $data['validation'] = $this->validator;
            return view('register', $data);
        }

    }
}