<?php

namespace App\Controllers\Web;

use App\Core\Controller;
use App\Models\Message;

class ContactController extends Controller
{
    public function submit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $subject = $_POST['subject'] ?? '';
            $messageContent = $_POST['message'] ?? '';

            if (empty($name) || empty($email) || empty($messageContent)) {
                // In a real app we'd redirect with error messages
                echo "All fields are required.";
                return;
            }

            $messageModel = new Message();
            $messageModel->create([
                'name' => htmlspecialchars($name),
                'email' => htmlspecialchars($email),
                'subject' => htmlspecialchars($subject),
                'message' => htmlspecialchars($messageContent),
            ]);

            // Redirect to home with a success flag
            $this->redirect('/?status=success#contact');
        }
    }
}
