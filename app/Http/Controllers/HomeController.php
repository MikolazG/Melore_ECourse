<?php

namespace App\Http\Controllers;

use App\Models\Course;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCourses = Course::withCount('lessons')
            ->latest()
            ->take(3)
            ->get();

        return view('pages.home', compact('featuredCourses'));
    }
}
