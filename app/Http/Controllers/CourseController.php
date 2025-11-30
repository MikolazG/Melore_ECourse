<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::withCount('lessons')->paginate(9);

        return view('courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $course->load(['lessons']);
        $lessons = $course->lessons()->orderBy('order')->get();

        $isEnrolled = false;

        if (auth()->check()) {
            $isEnrolled = auth()->user()
                ->courses()
                ->where('course_id', $course->id)
                ->exists();
        }

        return view('courses.show', compact('course', 'lessons', 'isEnrolled'));
    }

    public function enroll(Course $course)
    {
        $user = auth()->user();

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
