<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class DashboardController extends Controller 
{
    public function index()
    {
        $session = session();

        // Verificar si el usuario está logueado
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        $role = $session->get('role');
        $model = new UserModel();
        $userId = $session->get('id'); 

        $userData = $model->find($userId);

        $data['userData'] = [
            'username' => $userData['username'],
            'role' => $userData['role'],
            'avatar' => $userData['avatar']
        ];

        // Verificar el rol del usuario
        if ($role == 'admin') {
            $users = $model->findAll();
            $data['users'] = $users;

        
            $file = WRITEPATH . 'landingPage.json';
            
            
            if (!file_exists($file)) {
                die("El archivo landingPage.json no existe en el directorio writable.");
            }

            $landingPageData = json_decode(file_get_contents($file), true);
            if ($landingPageData === null) {
                die("Error al decodificar el archivo JSON.");
            }

            // Pasar datos de la landing page a la vista
            $data['landingPage'] = $landingPageData;

            return view('admin_dashboard', $data);
        } else {
            // Cargar la vista de usuario normal si no es admin
            return view('user_dashboard', $data);
        }
    }

    public function editProfile()
    {
        $session = session();
        
        // Procesar formulario de edición de perfil
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
            $userId = $session->get('id'); 

            // Validación de datos
            if (!$this->validate([
                'username' => 'required|min_length[3]|max_length[20]',
                'password' => 'permit_empty|min_length[8]',
                'avatar' => 'required|valid_url'
            ])) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Actualizar los datos del perfil
            $newData = [
                'username' => $this->request->getPost('username'),
                'avatar' => $this->request->getPost('avatar')
            ];

            $password = $this->request->getPost('password');
            if (!empty($password) && is_string($password)) {
                $newData['password'] = password_hash($password, PASSWORD_DEFAULT);
            }

            // Actualizar los datos en la base de datos
            $model->update($userId, $newData);

            return redirect()->to('/dashboard');
        }
    }

    public function editUser($userId)
    {
        $model = new UserModel();

        // Obtener los datos del usuario a editar
        $userData = $model->find($userId);

        // Procesar formulario de edición de usuario
        if ($this->request->getMethod() === 'post') {
            // Validación de datos
            if (!$this->validate([
                'username' => 'required|min_length[3]|max_length[20]',
                'password' => 'permit_empty|min_length[8]',
                'role' => 'required',
                'avatar' => 'required|valid_url'
            ])) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Actualizar los datos del usuario
            $newData = [
                'username' => $this->request->getPost('username'),
                'role' => $this->request->getPost('role'),
                'avatar' => $this->request->getPost('avatar')
            ];

            $password = $this->request->getPost('password');
            if (!empty($password) && is_string($password)) {
                $newData['password'] = password_hash($password, PASSWORD_DEFAULT);
            }

            // Actualizar los datos en la base de datos
            $model->update($userId, $newData);

            return redirect()->to('/dashboard'); // Redireccionar después de la actualización
        }
    }

    public function editLandingPage()
    {
    
    if ($this->request->getMethod() === 'post') {
        // Obtener datos 
        $landingData = [
            'url' => $this->request->getPost('url'),
            'title' => $this->request->getPost('title'),
            'date' => $this->request->getPost('date')
        ];

        $file = WRITEPATH . 'landingPage.json';

        $result = file_put_contents($file, json_encode($landingData, JSON_PRETTY_PRINT));

        // Verificar el resultado 
        if ($result !== false) {
            session()->setFlashdata('success', 'Landing page actualizada correctamente.');
            echo "Landing page actualizada correctamente.";
        } else {
            session()->setFlashdata('error', 'Error al guardar el archivo JSON.');
            echo "Error al guardar el archivo JSON.";
        }

        return redirect()->to('/landing');

    } else {
        
        $file = WRITEPATH . 'landingPage.json';

        if (!file_exists($file)) {
            die("El archivo landingPage.json no existe en el directorio writable.");
        }

        $landingPageData = json_decode(file_get_contents($file), true);

        // Preparar los datos para la vista
        $data['landingPage'] = $landingPageData;

        return view('landing', $data);
    }
}
}
