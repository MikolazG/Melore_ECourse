<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers        = User::where('role', 'user')->count();
        $totalAdmins       = User::where('role', 'admin')->count();
        $totalCourses      = Course::count();
        $totalLessons      = Lesson::count();
        $totalEnrollments  = DB::table('course_user')->count();

        $latestUsers = User::orderByDesc('created_at')
            ->take(5)
            ->get();

        $latestCourses = Course::orderByDesc('created_at')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalAdmins',
            'totalCourses',
            'totalLessons',
            'totalEnrollments',
            'latestUsers',
            'latestCourses'
        ));
    }
}
