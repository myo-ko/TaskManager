<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', [ 'projects' => $projects, ]);
    }

    public function Login()
    {
        return view('user.login');
    }

    public function CheckLogin()
    {

    }
}
