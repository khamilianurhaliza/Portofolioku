<?php

namespace App\Controllers\Admin;

use App\Models\Certificate;

class CertificateController extends AdminController
{
    private Certificate $certModel;

    public function __construct()
    {
        parent::__construct();
        $this->certModel = new Certificate();
    }

    public function index()
    {
        $certificates = $this->certModel->all();
        $this->view('admin/certificates/index', ['certificates' => $certificates]);
    }

    private function handleImageUpload(): ?string
    {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['image']['tmp_name'];
            $name = basename($_FILES['image']['name']);
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            $newName = uniqid('cert_') . '.' . $ext;
            $uploadDir = BASE_PATH . '/public/uploads/certificates/';
            
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            
            if (move_uploaded_file($tmpName, $uploadDir . $newName)) {
                return '/uploads/certificates/' . $newName;
            }
        }
        return null;
    }

    public function store()
    {
        $imageUrl = $this->handleImageUpload();

        $data = [
            'title' => $_POST['title'] ?? '',
            'issuer' => $_POST['issuer'] ?? '',
            'date_issued' => !empty($_POST['date_issued']) ? $_POST['date_issued'] : null,
            'image_url' => $imageUrl,
            'credential_url' => $_POST['credential_url'] ?? '',
        ];

        $this->certModel->create($data);
        $this->redirect('/admin/certificates');
    }

    public function edit($id)
    {
        $certificate = $this->certModel->find($id);
        if (!$certificate) {
            $this->redirect('/admin/certificates');
        }

        $this->view('admin/certificates/edit', ['certificate' => $certificate]);
    }

    public function update($id)
    {
        $certificate = $this->certModel->find($id);
        if (!$certificate) {
            $this->redirect('/admin/certificates');
        }

        $imageUrl = $this->handleImageUpload() ?? $certificate['image_url'];

        $data = [
            'title' => $_POST['title'] ?? '',
            'issuer' => $_POST['issuer'] ?? '',
            'date_issued' => !empty($_POST['date_issued']) ? $_POST['date_issued'] : null,
            'image_url' => $imageUrl,
            'credential_url' => $_POST['credential_url'] ?? '',
        ];

        $this->certModel->update($id, $data);
        $this->redirect('/admin/certificates');
    }

    public function delete($id)
    {
        $this->certModel->delete($id);
        $this->redirect('/admin/certificates');
    }
}
