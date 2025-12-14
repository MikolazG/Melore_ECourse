<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $enrolledCoursesCount = $user->courses()->count();

        return view('profile.home', compact('user', 'enrolledCoursesCount'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id)
            ],
        ]);

        $user->update($validated);

        return redirect()->route('profile.home')->with('success', 'Profile updated successfully!');
    }

    public function myCourses()
    {
        $user = Auth::user();
        $courses = $user->courses()->withCount('lessons')->get();

        return view('profile.my-courses', compact('courses'));
    }
}
