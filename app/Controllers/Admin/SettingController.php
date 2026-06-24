<?php

namespace App\Controllers\Admin;

use App\Models\Setting;

class SettingController extends AdminController
{
    private Setting $settingModel;

    public function __construct()
    {
        parent::__construct();
        $this->settingModel = new Setting();
    }

    public function index()
    {
        $settings = $this->settingModel->getAllSettings();
        $this->view('admin/settings/index', ['settings' => $settings]);
    }

    public function update()
    {
        $keys = [
            'site_title', 'site_description', 'author_name', 
            'author_bio', 'contact_email', 'github_url', 'linkedin_url', 'instagram_url'
        ];

        foreach ($keys as $key) {
            if (isset($_POST[$key])) {
                $this->settingModel->set($key, $_POST[$key]);
            }
        }

        $this->redirect('/admin/settings?success=1');
    }
}
