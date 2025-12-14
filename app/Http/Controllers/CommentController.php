<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Course $course)
    {
        $user = auth()->user();

        $isEnrolled = $user->courses()
            ->where('course_id', $course->id)
            ->exists();

        if (!$isEnrolled) { //kalo belom enroll
            abort(403, 'You must enroll to comment');
        }

        $request->validate([
            'content' => 'required|min:3'
        ]);

        Comment::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Comment added');
    }
}
