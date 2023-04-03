<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            "name" => "Abdullah Riaz",
            "age" => "30",
            "frameworks" => ["Laravel", "Vuejs", "Inertia"],
        ]);
    }
}
