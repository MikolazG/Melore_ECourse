@extends('layouts.main')

@section('title', 'All Courses - MÉLORÉ')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">All courses</h1>
</div>

@if ($courses->isEmpty())
    <p class="text-muted">No courses available yet.</p>
@else
    <div class="row">
        @foreach ($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if ($course->thumbnail_url)
                        <img src="{{ $course->thumbnail_url }}" class="card-img-top" alt="{{ $course->title }}">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text text-muted mb-2">
                            {{ $course->category ?? 'General' }} • {{ $course->level }}
                        </p>
                        <p class="card-text flex-grow-1">
                            {{ \Illuminate\Support\Str::limit($course->description, 100) }}
                        </p>
                        <p class="fw-bold mb-3">${{ number_format($course->price, 2) }}</p>
                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-outline-primary mt-auto">
                            View details
                        </a>
                    </div>
                    <div class="card-footer text-muted small">
                        {{ $course->lessons_count }} lessons
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $courses->links() }}
    </div>
@endif
@endsection
