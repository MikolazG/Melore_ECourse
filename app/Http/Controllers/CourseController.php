<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::withCount('lessons');

        //SEARCH
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'LIKE', '%' . $request->search . '%')
                ->orWhere('description', 'LIKE', '%' . $request->search . '%');
            });
        }

        //FILTER CATEGORY
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        //FILTER PRICE
        if ($request->filled('price')) {
            if ($request->price === '200+') {
                $query->where('price', '>=', 200);
            } else {
                [$min, $max] = explode('-', $request->price);
                $query->whereBetween('price', [(int)$min, (int)$max]);
            }
        }

        $courses = $query
            ->paginate(9)
            ->withQueryString();

        return view('courses.index', compact('courses'));
    }


    public function show(Course $course)
    {
        $course->load(['lessons']);
        $lessons = $course->lessons()->orderBy('order')->get();

        $comments = $course->comments()
        ->latest()
        ->get();

        $isEnrolled = false;

        if (auth()->check()) {
            $isEnrolled = auth()->user()
                ->courses()
                ->where('course_id', $course->id)
                ->exists();
        }

        return view('courses.show', compact('course', 'lessons', 'comments', 'isEnrolled'));
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
