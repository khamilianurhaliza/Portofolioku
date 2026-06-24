<?php

namespace App\Models;

use App\Core\Model;

class Technology extends Model
{
    protected string $table = 'technologies';

    public function create(array $data)
    {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (name, color) VALUES (:name, :color)");
        return $stmt->execute([
            'name' => $data['name'],
            'color' => $data['color'] ?? 'bg-primary',
        ]);
    }

    public function update($id, array $data)
    {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET name = :name, color = :color WHERE id = :id");
        return $stmt->execute([
            'id' => $id,
            'name' => $data['name'],
            'color' => $data['color'] ?? 'bg-primary',
        ]);
    }
}
