<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::withCount('lessons');

        if ($request->filled('search')) {
            $search = trim((string) $request->search);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', '%' . $search . '%')
                  ->orWhere('description', 'LIKE', '%' . $search . '%');
            });
        }

        if ($request->filled('category')) {
            $category = trim((string) $request->category);
            $query->where('category', $category);
        }

        if ($request->filled('price')) {
            $raw = trim((string) $request->price);

            if ($raw !== '' && strtolower($raw) !== 'all' && strtolower($raw) !== 'all prices') {
                $raw = str_replace(["–", "—"], "-", $raw);

                if (str_contains($raw, '+')) {
                    $min = $this->extractFirstNumber($raw);
                    if ($min !== null) $query->where('price', '>=', $min);
                } elseif (str_contains($raw, '-')) {
                    [$left, $right] = array_map('trim', explode('-', $raw, 2));
                    $min = $this->extractFirstNumber($left);
                    $max = $this->extractFirstNumber($right);

                    if ($min !== null && $max !== null) {
                        if ($min > $max) [$min, $max] = [$max, $min];
                        $query->whereBetween('price', [$min, $max]);
                    }
                } else {
                    $min = $this->extractFirstNumber($raw);
                    if ($min !== null) $query->where('price', '>=', $min);
                }
            }
        }

        $courses = $query->paginate(9)->withQueryString();
        return view('courses.index', compact('courses'));
    }

    private function extractFirstNumber(string $text): ?int
    {
        if (!preg_match('/(\d[\d\.\,]*)/', $text, $m)) return null;

        $num = str_replace(['.', ','], '', $m[1]);
        if ($num === '' || !ctype_digit($num)) return null;

        return (int) $num;
    }

    public function show(Course $course)
    {
        $course->load(['lessons']);

        $lessons = $course->lessons()->orderBy('order')->get();
        $comments = $course->comments()->with('user')->latest()->get();

        $isEnrolled = false;
        if (Auth::check()) {
            $isEnrolled = Auth::user()
                ->courses()
                ->where('course_id', $course->id)
                ->exists();
        }

        $courseEmbed    = $this->normalizeToEmbed($course->video_url);
        $courseOriginal = $course->video_url;

        $defaultLesson = $lessons->first(function ($l) {
            return !empty($l->video_url) || !empty($l->video_path);
        });

        $defaultLessonId = $defaultLesson?->id;

        $defaultEmbed = $courseEmbed;
        $defaultOriginal = $courseOriginal;
        $defaultLocal = null;

        if (!$defaultEmbed && $defaultLesson) {
            if (!empty($defaultLesson->video_path)) {
                $defaultLocal = Storage::url($defaultLesson->video_path);
            } else {
                $defaultEmbed = $this->normalizeToEmbed($defaultLesson->video_url);
                $defaultOriginal = $defaultLesson->video_url;
            }
        }

        return view('courses.show', compact(
            'course',
            'lessons',
            'comments',
            'isEnrolled',
            'courseEmbed',
            'defaultLessonId',
            'defaultEmbed',
            'defaultOriginal',
            'defaultLocal'
        ));
    }

    private function normalizeToEmbed(?string $url): ?string
    {
        if (!$url) return null;

        $v = $url;

        if (str_contains($v, 'youtube.com/watch')) {
            $v = preg_replace(
                '#https?://(www\.)?youtube\.com/watch\?v=([^&]+).*#',
                'https://www.youtube.com/embed/$2',
                $v
            );
        } elseif (str_contains($v, 'youtu.be/')) {
            $v = preg_replace(
                '#https?://(www\.)?youtu\.be/([^?]+).*#',
                'https://www.youtube.com/embed/$2',
                $v
            );
        }

        return $v;
    }

    public function enroll(Course $course)
    {
        $user = Auth::user();
        if (!$user) return redirect()->route('login');

        if (!$user->courses()->where('course_id', $course->id)->exists()) {
            $user->courses()->attach($course->id);
        }

        return redirect()
            ->route('courses.show', $course->id)
            ->with('status', 'You have successfully enrolled in this course.');
    }
}
