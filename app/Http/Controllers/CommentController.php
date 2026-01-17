<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Course $course)
    {
        // ✅ pastikan login (aman walau route belum dipasang middleware auth)
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        // ✅ pastikan enrolled baru boleh comment
        $isEnrolled = $user->courses()
            ->where('course_id', $course->id)
            ->exists();

        if (!$isEnrolled) {
            return back()->with('error', 'You must enroll (paid) to comment.');
        }

        $validated = $request->validate([
            'content' => ['required', 'string', 'min:3', 'max:1000'],
        ]);

        Comment::create([
            'user_id'   => $user->id,
            'course_id' => $course->id,
            'content'   => $validated['content'],
        ]);

        return back()->with('success', 'Comment added');
    }
}
