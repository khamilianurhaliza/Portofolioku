<?php

namespace App\Controllers\Admin;

use App\Models\Project;
use App\Models\Message;

class DashboardController extends AdminController
{
    public function index()
    {
        $projectModel = new Project();
        $messageModel = new Message();

        $projects = $projectModel->all();
        $messages = $messageModel->all();

        $this->view('admin/dashboard', [
            'projectCount' => count($projects),
            'messageCount' => count($messages),
            'recentMessages' => array_slice($messages, 0, 5) // Just a naive slice for simplicity
        ]);
    }
}
