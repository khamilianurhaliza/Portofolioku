<?php

namespace App\Models;

use App\Core\Model;

class Experience extends Model
{
    protected string $table = 'experiences';

    public function create(array $data)
    {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (company, position, start_date, end_date, description) VALUES (:company, :position, :start_date, :end_date, :description)");
        return $stmt->execute([
            'company' => $data['company'],
            'position' => $data['position'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'] ?: null,
            'description' => $data['description'] ?? null,
        ]);
    }

    public function update($id, array $data)
    {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET company = :company, position = :position, start_date = :start_date, end_date = :end_date, description = :description WHERE id = :id");
        return $stmt->execute([
            'id' => $id,
            'company' => $data['company'],
            'position' => $data['position'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'] ?: null,
            'description' => $data['description'] ?? null,
        ]);
    }
}
