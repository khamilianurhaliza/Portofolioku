<?php

namespace App\Models;

use App\Core\Model;

class Skill extends Model
{
    protected string $table = 'skills';

    public function create(array $data)
    {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (name, proficiency, icon) VALUES (:name, :proficiency, :icon)");
        return $stmt->execute([
            'name' => $data['name'],
            'proficiency' => $data['proficiency'] ?? 0,
            'icon' => $data['icon'] ?? null,
        ]);
    }

    public function update($id, array $data)
    {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET name = :name, proficiency = :proficiency, icon = :icon WHERE id = :id");
        return $stmt->execute([
            'id' => $id,
            'name' => $data['name'],
            'proficiency' => $data['proficiency'] ?? 0,
            'icon' => $data['icon'] ?? null,
        ]);
    }
}
