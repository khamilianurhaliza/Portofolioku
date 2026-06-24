<?php

namespace App\Controllers\Admin;

use App\Models\Experience;

class ExperienceController extends AdminController
{
    private Experience $experienceModel;

    public function __construct()
    {
        parent::__construct();
        $this->experienceModel = new Experience();
    }

    public function index()
    {
        $experiences = $this->experienceModel->all();
        $this->view('admin/experiences/index', ['experiences' => $experiences]);
    }

    public function store()
    {
        $data = [
            'company' => $_POST['company'] ?? '',
            'position' => $_POST['position'] ?? '',
            'start_date' => $_POST['start_date'] ?? '',
            'end_date' => $_POST['end_date'] ?: null,
            'description' => $_POST['description'] ?? '',
        ];

        $this->experienceModel->create($data);
        $this->redirect('/admin/experiences');
    }

    public function delete($id)
    {
        $this->experienceModel->delete($id);
        $this->redirect('/admin/experiences');
    }

    public function edit($id)
    {
        $experience = $this->experienceModel->find($id);
        if (!$experience) {
            $this->redirect('/admin/experiences');
        }

        $this->view('admin/experiences/edit', ['experience' => $experience]);
    }

    public function update($id)
    {
        $data = [
            'company' => $_POST['company'] ?? '',
            'position' => $_POST['position'] ?? '',
            'start_date' => $_POST['start_date'] ?? '',
            'end_date' => $_POST['end_date'] ?: null,
            'description' => $_POST['description'] ?? '',
        ];

        $this->experienceModel->update($id, $data);
        $this->redirect('/admin/experiences');
    }
}
