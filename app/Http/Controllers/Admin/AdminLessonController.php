<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class AdminLessonController extends Controller
{
    public function index(Course $course)
    {
        $lessons = $course->lessons()->orderBy('order')->get();

        return view('admin.lessons.index', compact('course', 'lessons'));
    }

    public function create(Course $course)
    {
        return view('admin.lessons.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'video_url'   => ['nullable', 'string', 'max:255'],
            'order'       => ['required', 'integer', 'min:1'],
        ]);

        $data['course_id'] = $course->id;

        Lesson::create($data);

        return redirect()
            ->route('admin.courses.lessons.index', $course->id)
            ->with('status', 'Lesson created successfully.');
    }

    public function show(Course $course, Lesson $lesson)
    {
        return redirect()->route('admin.courses.lessons.edit', [$course->id, $lesson->id]);
    }

    public function edit(Course $course, Lesson $lesson)
    {
        return view('admin.lessons.edit', compact('course', 'lesson'));
    }

    public function update(Request $request, Course $course, Lesson $lesson)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'video_url'   => ['nullable', 'string', 'max:255'],
            'order'       => ['required', 'integer', 'min:1'],
        ]);

        $lesson->update($data);

        return redirect()
            ->route('admin.courses.lessons.index', $course->id)
            ->with('status', 'Lesson updated successfully.');
    }

    public function destroy(Course $course, Lesson $lesson)
    {
        $lesson->delete();

        return redirect()
            ->route('admin.courses.lessons.index', $course->id)
            ->with('status', 'Lesson deleted successfully.');
    }
}
