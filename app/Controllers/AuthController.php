<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        helper(['form']);
        echo view('login');
    }

    public function loginAuth()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');


        $data = $model->where('username', $username)->first();

        if ($data) {
            $hashed_password = $data['password'];
            
            if (password_verify($password, $hashed_password)) {
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'role' => $data['role'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/landing');
            } else {
                $session->setFlashdata('msg', 'Contraseña incorrecta.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Usuario no encontrado.');
            return redirect()->to('/login');
        }
    }

    public function landing()
    {
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
    }
        echo view('landing');
    }


    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}

