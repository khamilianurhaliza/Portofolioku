<?php

namespace App\Models;

use App\Core\Model;

class Message extends Model
{
    protected string $table = 'messages';

    public function create(array $data)
    {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
        return $stmt->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'] ?? null,
            'message' => $data['message'],
        ]);
    }

    public function markAsRead($id)
    {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET is_read = TRUE WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
