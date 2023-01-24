<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $projects = Project::all();
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.home',compact('projects','types','technologies'));
    }
}
