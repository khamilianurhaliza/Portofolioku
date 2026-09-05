<?php

namespace App\Models;

use App\Core\Model;

class Certificate extends Model
{
    protected string $table = 'certificates';

    public function create(array $data)
    {
        $stmt = $this->db->prepare("
            INSERT INTO {$this->table} (title, issuer, date_issued, image_url, credential_url) 
            VALUES (:title, :issuer, :date_issued, :image_url, :credential_url)
        ");
        
        $stmt->execute([
            'title' => $data['title'],
            'issuer' => $data['issuer'],
            'date_issued' => $data['date_issued'] ?: null,
            'image_url' => $data['image_url'],
            'credential_url' => $data['credential_url'],
        ]);
        
        return $this->db->lastInsertId();
    }

    public function update($id, array $data)
    {
        $stmt = $this->db->prepare("
            UPDATE {$this->table} 
            SET title = :title, 
                issuer = :issuer, 
                date_issued = :date_issued, 
                image_url = :image_url, 
                credential_url = :credential_url 
            WHERE id = :id
        ");
        
        return $stmt->execute([
            'id' => $id,
            'title' => $data['title'],
            'issuer' => $data['issuer'],
            'date_issued' => $data['date_issued'] ?: null,
            'image_url' => $data['image_url'],
            'credential_url' => $data['credential_url'],
        ]);
    }
}
