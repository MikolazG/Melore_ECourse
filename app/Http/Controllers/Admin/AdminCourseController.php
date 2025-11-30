<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('id', 'desc')->paginate(10);

        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'         => ['required', 'string', 'max:255'],
            'slug'          => ['required', 'string', 'max:255', 'unique:courses,slug'],
            'category'      => ['nullable', 'string', 'max:255'],
            'level'         => ['required', 'string', 'max:255'],
            'description'   => ['required', 'string'],
            'price'         => ['required', 'numeric', 'min:0'],
            'thumbnail_url' => ['nullable', 'string', 'max:255'],
            'video_url'     => ['nullable', 'string', 'max:255'],
        ]);

        Course::create($data);

        return redirect()
            ->route('admin.courses.index')
            ->with('status', 'Course created successfully.');
    }

    public function show(Course $course)
    {
        return redirect()->route('admin.courses.edit', $course->id);
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'title'         => ['required', 'string', 'max:255'],
            'slug'          => ['required', 'string', 'max:255', 'unique:courses,slug,' . $course->id],
            'category'      => ['nullable', 'string', 'max:255'],
            'level'         => ['required', 'string', 'max:255'],
            'description'   => ['required', 'string'],
            'price'         => ['required', 'numeric', 'min:0'],
            'thumbnail_url' => ['nullable', 'string', 'max:255'],
            'video_url'     => ['nullable', 'string', 'max:255'],
        ]);

        $course->update($data);

        return redirect()
            ->route('admin.courses.index')
            ->with('status', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->lessons()->delete();
        $course->users()->detach();
        $course->delete();

        return redirect()
            ->route('admin.courses.index')
            ->with('status', 'Course deleted successfully.');
    }
}
