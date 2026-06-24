<?php

namespace App\Controllers\Web;

use App\Core\Controller;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $projectModel = new Project();
        $skillModel = new Skill();
        $experienceModel = new Experience();
        $settingModel = new Setting();

        $projects = $projectModel->all();
        $skills = $skillModel->all();
        $experiences = $experienceModel->all();
        $settings = $settingModel->getAllSettings();

        $this->view('web/home', [
            'projects' => $projects,
            'skills' => $skills,
            'experiences' => $experiences,
            'settings' => $settings
        ]);
    }

    public function showProject($slug)
    {
        $projectModel = new Project();
        $project = $projectModel->findBySlug($slug);

        if (!$project) {
            header('Location: /');
            exit;
        }

        $settingModel = new Setting();
        $settings = $settingModel->getAllSettings();

        $this->view('web/project', [
            'project' => $project,
            'settings' => $settings
        ]);
    }

    public function showExperience($id)
    {
        $experienceModel = new Experience();
        $experience = $experienceModel->find($id);

        if (!$experience) {
            header('Location: /');
            exit;
        }

        $settingModel = new Setting();
        $settings = $settingModel->getAllSettings();

        $this->view('web/experience', [
            'experience' => $experience,
            'settings' => $settings
        ]);
    }
}
