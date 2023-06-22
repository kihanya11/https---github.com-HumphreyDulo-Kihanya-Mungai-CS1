<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Config\Services;
use CodeIgniter\Security\Security;
use App\Models\Users;
use App\Models\ResetToken;


class PasswordReset extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function forgotPassword()
    {
        return view('forgot_password');
    }

    public function checkEmail()
    {
        return view('check_mail');
    }


    public function resetPassword()
    {
        
        // Get the submitted email
        $email = $this->request->getPost('email');

        // Check if the email exists in the users table
        $userModel = new Users();
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            // Generate a unique token for the password reset link
            $token = bin2hex(random_bytes(9));

            // Store the token and user's email in the reset_tokens table
            $resetTokenModel = new ResetToken();
            $resetTokenData = [
                'email' => $email,
                'token' => $token,
            ];
            $resetTokenModel->insert($resetTokenData);

            // Send the password reset email
            $email = \Config\Services::email();
            $email->setTo($resetTokenData['email']);
            $email->setSubject('Password Reset');
            $htmlContent = 'To reset your password, click on the following link: <a href="' . site_url("reset_form/$token") . '">Reset Password</a>';
            $plainTextContent = 'To reset your password, please copy and paste the following link into your browser: ' . site_url("reset_form/$token");
            $email->setMessage($htmlContent);
            $email->setAltMessage($plainTextContent);
            $email->send();

            $this->session->setFlashdata('reset_link_sent', true);
            $this->session->setFlashdata('reset_token', $token);

            return redirect()->to('/check_email');

            // Redirect to a success page or display a success message
            //return redirect()->to('/password/reset');
        } else {
            // User not found, handle the error accordingly
            // For example, display an error message or redirect back to the form with an error
            return redirect()->back()->with('error', 'Invalid email address');
        }
    }

        public function reset_form($token)
    {
        // Check if the reset link has been sent and retrieve the reset token from the session
        $resetLinkSent = $this->session->getFlashdata('reset_link_sent');
        $sessionToken = $this->session->getFlashdata('reset_token');

        // Redirect the user to the appropriate page if the reset link has not been sent or the token is missing
        //if (!$resetLinkSent || empty($sessionToken) || $sessionToken !== $token) {
          //  return redirect()->to('/password/reset');
          //  }

        return view('password_reset_form', ['token' => $token]);    
    }


    public function save()
    {
    // Retrieve the form data
    $password = $this->request->getPost('password');
    $confirmPassword = $this->request->getPost('confirm_password');
    $resetToken = $this->request->getPost('token');

    // Validate the form data
    $validationRules = [
        'password' => [
                'rules' => 'required|min_length[8]|max_length[255]|regex_match[/^(?=.*[A-Z])(?=.*\d).+$/]',
                'errors' => [
                    'regex_match' => 'The password must contain at least one capital letter and one number.',
                ],
            ],
            'confirm_password' => ['label' => 'confirm password', 'rules' => 'matches[password]']
    ];

    if (!$this->validate($validationRules)) {
        // Validation failed, redirect back to the password reset form with errors
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Load the ResetToken model
    $resetTokenModel = new ResetToken();

    // Retrieve the reset token data from the database
    $tokenData = $resetTokenModel->where('token', $resetToken)->first();

    // Check if the reset token exists and is not expired
   /* if (!$tokenData || time() > $tokenData['expires_at']) {
        // Invalid or expired reset token, handle the error accordingly
        return redirect()->to('/')->with('error', 'Invalid or expired reset token.');
    } */

    // Update the user's password
    $userModel = new Users();
    $user = $userModel->where('email', $tokenData['email'])->first();
    $userModel->update($user['id'], ['password' => password_hash($password, PASSWORD_DEFAULT)]);

    // Delete the used reset token from the database
    $resetTokenModel->where('token', $resetToken)->delete();

    // Redirect the user to a success page or any other desired action
    return redirect()->to('/login')->with('success', 'Password reset successful. You can now log in with your new password.');
}

}

