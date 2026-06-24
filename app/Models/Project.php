<?php

namespace App\Models;

use App\Core\Model;
use PDO;

class Project extends Model
{
    protected string $table = 'projects';

    public function all(): array
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY id DESC");
        $projects = $stmt->fetchAll();

        // Fetch technologies for each project
        foreach ($projects as &$project) {
            $project['technologies'] = $this->getTechnologies($project['id']);
        }

        return $projects;
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $project = $stmt->fetch();
        
        if ($project) {
            $project['technologies'] = $this->getTechnologies($project['id']);
        }
        
        return $project;
    }

    public function findBySlug($slug)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE slug = :slug");
        $stmt->execute(['slug' => $slug]);
        $project = $stmt->fetch();
        
        if ($project) {
            $project['technologies'] = $this->getTechnologies($project['id']);
        }
        
        return $project;
    }

    public function getTechnologies($projectId)
    {
        $stmt = $this->db->prepare("
            SELECT t.* FROM technologies t
            JOIN project_technology pt ON pt.technology_id = t.id
            WHERE pt.project_id = :project_id
        ");
        $stmt->execute(['project_id' => $projectId]);
        return $stmt->fetchAll();
    }

    public function create(array $data)
    {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (title, slug, description, image_url, repository_url, demo_url) VALUES (:title, :slug, :description, :image_url, :repository_url, :demo_url)");
        $success = $stmt->execute([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'image_url' => $data['image_url'] ?? null,
            'repository_url' => $data['repository_url'] ?? null,
            'demo_url' => $data['demo_url'] ?? null,
        ]);

        if ($success) {
            return $this->db->lastInsertId();
        }
        return false;
    }

    public function update($id, array $data)
    {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET title = :title, slug = :slug, description = :description, image_url = :image_url, repository_url = :repository_url, demo_url = :demo_url WHERE id = :id");
        return $stmt->execute([
            'id' => $id,
            'title' => $data['title'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'image_url' => $data['image_url'] ?? null,
            'repository_url' => $data['repository_url'] ?? null,
            'demo_url' => $data['demo_url'] ?? null,
        ]);
    }

    public function syncTechnologies($projectId, array $technologyIds)
    {
        // Remove old relations
        $stmt = $this->db->prepare("DELETE FROM project_technology WHERE project_id = :project_id");
        $stmt->execute(['project_id' => $projectId]);

        // Add new relations
        if (!empty($technologyIds)) {
            $insertQuery = "INSERT INTO project_technology (project_id, technology_id) VALUES ";
            $values = [];
            $params = [];
            foreach ($technologyIds as $index => $techId) {
                $values[] = "(:project_id_{$index}, :tech_id_{$index})";
                $params["project_id_{$index}"] = $projectId;
                $params["tech_id_{$index}"] = $techId;
            }
            $insertQuery .= implode(', ', $values);
            $stmt = $this->db->prepare($insertQuery);
            $stmt->execute($params);
        }
    }
}
