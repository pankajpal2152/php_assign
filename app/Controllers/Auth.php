<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/employees');
        }

        return view('auth/login');
    }

    public function doLogin()
    {
        $session = session();
        $model   = new LoginModel();

        $username = $this->request->getPost('user_name');
        $password = $this->request->getPost('password');

        $user = $model->getUserByUsername($username);

        // For assignment: plain text password check
        if ($user && $user['password'] === $password) {
            $sessionData = [
                'user_id'    => $user['id'],
                'user_name'  => $user['user_name'],
                'name'       => $user['name'],
                'isLoggedIn' => true,
            ];
            $session->set($sessionData);

            return redirect()->to('/employees');
        }

        $session->setFlashdata('error', 'Invalid username or password');
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
