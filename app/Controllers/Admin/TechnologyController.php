<?php

namespace App\Controllers\Admin;

use App\Models\Technology;

class TechnologyController extends AdminController
{
    private Technology $techModel;

    public function __construct()
    {
        parent::__construct();
        $this->techModel = new Technology();
    }

    public function index()
    {
        $technologies = $this->techModel->all();
        $this->view('admin/technologies/index', ['technologies' => $technologies]);
    }

    public function store()
    {
        $data = [
            'name' => $_POST['name'] ?? '',
            'color' => $_POST['color'] ?? 'bg-primary',
        ];

        $this->techModel->create($data);
        $this->redirect('/admin/technologies');
    }

    public function delete($id)
    {
        $this->techModel->delete($id);
        $this->redirect('/admin/technologies');
    }

    public function edit($id)
    {
        $technology = $this->techModel->find($id);
        if (!$technology) {
            $this->redirect('/admin/technologies');
        }

        $this->view('admin/technologies/edit', ['technology' => $technology]);
    }

    public function update($id)
    {
        $data = [
            'name' => $_POST['name'] ?? '',
            'color' => $_POST['color'] ?? 'bg-blue-500',
        ];

        $this->techModel->update($id, $data);
        $this->redirect('/admin/technologies');
    }
}
