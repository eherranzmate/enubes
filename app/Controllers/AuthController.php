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

        // Verificar conexión a la base de datos antes de continuar
        try {
            $db = \Config\Database::connect();
            echo "Connected successfully<br>";
        } catch (\Throwable $e) {
            die('Error: ' . $e->getMessage());
        }

        // Agregar mensajes de depuración
        echo "Username: " . $username . "<br>";
        echo "Password: " . $password . "<br>";

        $data = $model->getUser($username);

        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'role' => $data['role'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username does not exist.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}

