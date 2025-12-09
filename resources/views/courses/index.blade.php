@extends('layouts.main')

@section('title', 'All Courses - MÉLORÉ')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold h3 mb-0">All Courses</h1>

    {{-- SEARCH BAR --}}
    <form action="{{ route('courses.index') }}" method="GET" class="d-flex">
        <input type="text"
               name="search"
               class="form-control rounded-pill me-2"
               placeholder="Search courses..."
               value="{{ request('search') }}">
        <button class="btn btn-primary rounded-pill px-4">Search</button>
    </form>
</div>

@if ($courses->isEmpty())
    <p class="text-muted">No courses available yet.</p>
@else
    <div class="row g-4">
        @foreach ($courses as $course)
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-3 h-100 hover-shadow transition">

                    {{-- Thumbnail --}}
                    @if ($course->thumbnail_url)
                        <img src="{{ $course->thumbnail_url }}"
                             class="card-img-top rounded-top-3"
                             style="height: 200px; object-fit: cover;"
                             alt="{{ $course->title }}">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center rounded-top-3"
                             style="height: 200px;">
                            <span class="text-muted">No image</span>
                        </div>
                    @endif

                    <div class="card-body d-flex flex-column">

                        <h5 class="fw-semibold mb-1">{{ $course->title }}</h5>

                        <p class="text-muted small mb-2">
                            {{ $course->category ?? 'General' }} • Level {{ $course->level }}
                        </p>

                        <p class="text-secondary mb-3 flex-grow-1">
                            {{ \Illuminate\Support\Str::limit($course->description, 80) }}
                        </p>

                        <div class="d-flex align-items-center justify-content-between mt-auto">
                            <span class="fw-bold text-dark fs-5">${{ number_format($course->price, 2) }}</span>
                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary px-3 rounded-pill">
                                View
                            </a>
                        </div>

                    </div>

                    <div class="card-footer bg-white border-0 text-muted small pt-0">
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

{{-- Hover effect --}}
<style>
    .hover-shadow:hover {
        transform: translateY(-3px);
        box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.15) !important;
    }
    .transition {
        transition: all 0.2s ease-in-out;
    }
</style>
@endsection
