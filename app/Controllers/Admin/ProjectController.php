<?php

namespace App\Controllers\Admin;

use App\Models\Project;
use App\Models\Technology;

class ProjectController extends AdminController
{
    private Project $projectModel;

    public function __construct()
    {
        parent::__construct();
        $this->projectModel = new Project();
    }

    public function index()
    {
        $projects = $this->projectModel->all();
        $techModel = new Technology();
        $technologies = $techModel->all();
        $this->view('admin/projects/index', ['projects' => $projects, 'technologies' => $technologies]);
    }

    private function handleImageUpload(): ?string
    {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['image']['tmp_name'];
            $name = basename($_FILES['image']['name']);
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            $newName = uniqid('proj_') . '.' . $ext;
            $uploadDir = BASE_PATH . '/public/uploads/projects/';
            
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            
            if (move_uploaded_file($tmpName, $uploadDir . $newName)) {
                return '/uploads/projects/' . $newName;
            }
        }
        return null;
    }

    public function store()
    {
        $imageUrl = $this->handleImageUpload();

        $data = [
            'title' => $_POST['title'] ?? '',
            'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title']))),
            'description' => $_POST['description'] ?? '',
            'image_url' => $imageUrl,
            'repository_url' => $_POST['repository_url'] ?? '',
            'demo_url' => $_POST['demo_url'] ?? '',
        ];

        $projectId = $this->projectModel->create($data);
        
        if ($projectId && isset($_POST['technologies']) && is_array($_POST['technologies'])) {
            $this->projectModel->syncTechnologies($projectId, $_POST['technologies']);
        }

        $this->redirect('/admin/projects');
    }

    public function edit($id)
    {
        $project = $this->projectModel->find($id);
        if (!$project) {
            $this->redirect('/admin/projects');
        }

        $technologyModel = new \App\Models\Technology();
        $technologies = $technologyModel->all();

        $this->view('admin/projects/edit', [
            'project' => $project,
            'technologies' => $technologies
        ]);
    }

    public function update($id)
    {
        $project = $this->projectModel->find($id);
        $imageUrl = $this->handleImageUpload() ?? $project['image_url'];

        $data = [
            'title' => $_POST['title'] ?? '',
            'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title']))),
            'description' => $_POST['description'] ?? '',
            'image_url' => $imageUrl,
            'repository_url' => $_POST['repository_url'] ?? '',
            'demo_url' => $_POST['demo_url'] ?? '',
        ];

        $this->projectModel->update($id, $data);
        
        if (isset($_POST['technologies']) && is_array($_POST['technologies'])) {
            $this->projectModel->syncTechnologies($id, $_POST['technologies']);
        } else {
            $this->projectModel->syncTechnologies($id, []);
        }

        $this->redirect('/admin/projects');
    }

    public function delete($id)
    {
        $this->projectModel->delete($id);
        $this->redirect('/admin/projects');
    }
}
