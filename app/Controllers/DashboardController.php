<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashbordController extends Controller 
{
    public function index()
    {
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        if ($session->get('role') == 'admin') {
            return view ('admin_dashboard');
        } else {
            return view ('user_dashboard');
        }
    }
}