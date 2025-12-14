<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index(Request $request)
    {
        $query = Instructor::withCount('courses');

        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('specialization', 'like', '%' . $request->search . '%');
        }

        $instructors = $query->paginate(9);

        return view('instructors.index', compact('instructors')); // Changed from admin.instructors.index
    }

    public function show(Instructor $instructor)
    {
        $courses = $instructor->courses()->withCount('lessons')->get();

        return view('instructors.show', compact('instructor', 'courses')); // Public view
    }
}
