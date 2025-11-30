<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function home()
    {
        $user = auth()->user();
        $enrolledCoursesCount = $user->courses()->count();

        return view('profile.home', compact('user', 'enrolledCoursesCount'));
    }

    public function myCourses()
    {
        $user = auth()->user();
        $courses = $user->courses()->withCount('lessons')->get();

        return view('profile.my-courses', compact('courses'));
    }
}
