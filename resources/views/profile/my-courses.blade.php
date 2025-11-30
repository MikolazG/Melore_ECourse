@extends('layouts.main')

@section('title', 'My Courses - MÉLORÉ')

@section('content')
<h1 class="h3 mb-4">My courses</h1>

@if ($courses->isEmpty())
    <div class="alert alert-info">
        You have not enrolled in any courses yet.
        <a href="{{ route('courses.index') }}" class="alert-link">Browse courses</a>.
    </div>
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
                            {{ \Illuminate\Support\Str::limit($course->description, 90) }}
                        </p>
                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-outline-primary mt-auto">
                            Go to course
                        </a>
                    </div>
                    <div class="card-footer text-muted small">
                        {{ $course->lessons_count ?? $course->lessons()->count() }} lessons
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
