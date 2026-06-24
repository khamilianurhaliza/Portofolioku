<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/admin/login');
        }
    }
}
