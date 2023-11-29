<?php

namespace App\Http\Controllers;

use App\Models\Ability;
use App\Models\Projects;
use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('index', [
            "user" => User::first(),
            "ability" => Ability::get(),
            "projects" => Projects::get(),
            "testimoni" => Testimoni::get()
        ]);
    }
}
