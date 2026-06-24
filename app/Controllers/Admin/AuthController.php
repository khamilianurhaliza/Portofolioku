<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['user_id'])) {
            $this->redirect('/admin/dashboard');
        }

        $this->view('admin/login');
    }

    public function login()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        $user = $userModel->findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $this->redirect('/admin/dashboard');
        } else {
            // Invalid login
            $this->view('admin/login', ['error' => 'Invalid username or password']);
        }
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        session_destroy();
        $this->redirect('/admin/login');
    }
}
