@extends('layouts.main')

@section('title', $instructor->name . ' | MÉLORÉ Instructor')

@section('content')
<div class="container py-5">
    <div class="row g-5">

        {{-- MAIN COLUMN --}}
        <div class="col-lg-8">

            {{-- Instructor Info --}}
            <h1 class="fw-bold mb-2">{{ $instructor->name }}</h1>
            <p class="text-success mb-3 fs-5">
                {{ $instructor->specialization ?? 'Music Instructor' }}
            </p>

            {{-- Bio --}}
            <h4 class="fw-semibold mt-4 mb-3">About</h4>
            <p class="text-secondary mb-4">
                {{ $instructor->bio ?? 'No bio available.' }}
            </p>

            {{-- Courses by this instructor --}}
            <h4 class="fw-semibold mt-5 mb-3">Courses by {{ $instructor->name }}</h4>

            @if ($courses->isEmpty())
                <div class="alert alert-info rounded-4 p-3">
                    This instructor doesn't have any courses yet.
                </div>
            @else
                <div class="row g-4">
                    @foreach ($courses as $course)
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 rounded-3 h-100">
                                @if ($course->thumbnail_url)
                                    <img src="{{ $course->thumbnail_url }}"
                                         class="card-img-top rounded-top-3"
                                         style="height: 150px; object-fit: cover;"
                                         alt="{{ $course->title }}">
                                @endif

                                <div class="card-body">
                                    <h6 class="fw-semibold mb-2">{{ $course->title }}</h6>
                                    <p class="text-muted small mb-2">
                                        {{ $course->category }} • {{ $course->level }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-success">${{ number_format($course->price, 2) }}</span>
                                        <a href="{{ route('courses.show', $course->id) }}"
                                           class="btn btn-sm btn-primary rounded-pill">
                                            View Course
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>

        {{-- SIDEBAR --}}
        <div class="col-lg-4">
            <div class="card shadow-lg border-0 rounded-4">

                @if ($instructor->image_url)
                    <img src="{{ $instructor->image_url }}"
                         class="card-img-top rounded-top-4"
                         style="height: 400px; object-fit: cover;"
                         alt="{{ $instructor->name }}">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded-top-4"
                         style="height: 400px;">
                        <i class="bi bi-person-circle text-muted" style="font-size: 150px;"></i>
                    </div>
                @endif

                <div class="card-body">
                    <h4 class="fw-bold mb-2">{{ $instructor->name }}</h4>
                    <p class="text-success mb-3">{{ $instructor->specialization ?? 'Music Instructor' }}</p>

                    <div class="mb-3">
                        <small class="text-muted d-block mb-1">Total Courses</small>
                        <h5 class="fw-bold mb-0">{{ $courses->count() }}</h5>
                    </div>

                    @if ($instructor->email)
                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">Contact</small>
                            <a href="mailto:{{ $instructor->email }}" class="text-decoration-none">
                                {{ $instructor->email }}
                            </a>
                        </div>
                    @endif

                    @if ($instructor->social_links)
                        <div class="mt-3">
                            <small class="text-muted d-block mb-2">Connect</small>
                            <div class="d-flex gap-2">
                                {{-- Add social media links here --}}
                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle">
                                    <i class="bi bi-instagram"></i>
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle">
                                    <i class="bi bi-youtube"></i>
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
