<?php

namespace App\Models;

use App\Core\Model;

class Setting extends Model
{
    protected string $table = 'settings';

    public function get(string $key_name)
    {
        $stmt = $this->db->prepare("SELECT value FROM {$this->table} WHERE key_name = :key_name");
        $stmt->execute(['key_name' => $key_name]);
        $result = $stmt->fetch();
        return $result ? $result['value'] : null;
    }

    public function getAllSettings(): array
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table}");
        $results = $stmt->fetchAll();
        
        $settings = [];
        foreach ($results as $row) {
            $settings[$row['key_name']] = $row['value'];
        }
        return $settings;
    }

    public function set(string $key_name, string $value)
    {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (key_name, value) VALUES (:key_name, :value) ON DUPLICATE KEY UPDATE value = VALUES(value)");
        return $stmt->execute([
            'key_name' => $key_name,
            'value' => $value
        ]);
    }
}
