<?php

namespace App\Controllers\Admin;

use App\Models\Skill;

class SkillController extends AdminController
{
    private Skill $skillModel;

    public function __construct()
    {
        parent::__construct();
        $this->skillModel = new Skill();
    }

    public function index()
    {
        $skills = $this->skillModel->all();
        $this->view('admin/skills/index', ['skills' => $skills]);
    }

    public function store()
    {
        $data = [
            'name' => $_POST['name'] ?? '',
            'proficiency' => (int)($_POST['proficiency'] ?? 0),
            'icon' => $_POST['icon'] ?? '',
        ];

        $this->skillModel->create($data);
        $this->redirect('/admin/skills');
    }

    public function delete($id)
    {
        $this->skillModel->delete($id);
        $this->redirect('/admin/skills');
    }

    public function edit($id)
    {
        $skill = $this->skillModel->find($id);
        if (!$skill) {
            $this->redirect('/admin/skills');
        }

        $this->view('admin/skills/edit', ['skill' => $skill]);
    }

    public function update($id)
    {
        $data = [
            'name' => $_POST['name'] ?? '',
            'proficiency' => $_POST['proficiency'] ?? 0,
            'icon' => $_POST['icon'] ?? '',
        ];

        $this->skillModel->update($id, $data);
        $this->redirect('/admin/skills');
    }
}
