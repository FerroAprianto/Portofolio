<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProjects  = Project::count();
        $visibleProjects = Project::where('is_visible', true)->count();
        $hiddenProjects  = Project::where('is_visible', false)->count();
        $recentProjects  = Project::latest()->take(4)->get();

        return view('admin.dashboard', compact(
            'totalProjects',
            'visibleProjects',
            'hiddenProjects',
            'recentProjects'
        ));
    }
}