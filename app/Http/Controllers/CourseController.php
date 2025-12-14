<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::withCount('lessons');

        if ($request->has('search') && $request->search !== '') {
            $query->where('title', 'LIKE', '%' . $request->search . '%')
            ->orWhere('description', 'LIKE', '%' . $request->search . '%');
        }

        $courses = $query->paginate(9);

        return view('courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $course->load(['lessons']);
        $lessons = $course->lessons()->orderBy('order')->get();

        $isEnrolled = false;

        if (Auth::check()) {
            $isEnrolled = Auth::user()
                ->courses()
                ->where('course_id', $course->id)
                ->exists();
        }

        return view('courses.show', compact('course', 'lessons', 'isEnrolled'));
    }

    public function enroll(Course $course)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        if (!$user->courses()->where('course_id', $course->id)->exists()) {
            $user->courses()->attach($course->id);
        }

        return redirect()
            ->route('profile.my-courses')
            ->with('status', 'You have successfully enrolled in this course.');
    }
}
