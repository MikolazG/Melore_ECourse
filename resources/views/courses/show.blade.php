{{-- resources/views/courses/show.blade.php --}}
@extends('layouts.main')

@section('title', $course->title . ' | MÉLORÉ')

@section('content')
<div class="container py-5">
    <div class="row g-4">
        {{-- MAIN COLUMN --}}
        <div class="col-lg-8">

            {{-- Title & basic info --}}
            <h1 class="h2 mb-1">{{ $course->title }}</h1>
            <p class="text-muted mb-3">
                {{ $course->category }} • {{ $course->level }}
            </p>

            <p class="mb-4">
                {{ $course->description }}
            </p>

            {{-- VIDEO SECTION --}}
            @if ($course->video_url)
                @php
                    $originalUrl = $course->video_url;
                    $videoUrl = $originalUrl;

                    // Convert YouTube watch URL to embed
                    if (str_contains($videoUrl, 'youtube.com/watch')) {
                        $videoUrl = preg_replace(
                            '#https?://(www\.)?youtube\.com/watch\?v=([^&]+).*#',
                            'https://www.youtube.com/embed/$2',
                            $videoUrl
                        );
                    } elseif (str_contains($videoUrl, 'youtu.be/')) {
                        $videoUrl = preg_replace(
                            '#https?://(www\.)?youtu\.be/([^?]+).*#',
                            'https://www.youtube.com/embed/$2',
                            $videoUrl
                        );
                    }
                @endphp

                <div class="ratio ratio-16x9 mb-2">
                    <iframe
                        src="{{ $videoUrl }}"
                        title="{{ $course->title }}"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen
                    ></iframe>
                </div>

                <p class="small text-muted mb-4">
                    If the video cannot be played, you can
                    <a href="{{ $originalUrl }}" target="_blank" rel="noopener">
                        watch it directly on YouTube
                    </a>.
                </p>
            @endif

            {{-- LESSONS --}}
            <h2 class="h4 mb-3">Lessons</h2>

            @if ($lessons->isEmpty())
                <div class="alert alert-info">
                    This course doesn’t have any lessons yet.
                </div>
            @else
                <div class="list-group">
                    @foreach ($lessons as $lesson)
                        <div class="list-group-item">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="me-3">
                                    <h5 class="mb-1">
                                        {{ $loop->iteration }}. {{ $lesson->title }}
                                    </h5>
                                    @if ($lesson->description)
                                        <p class="mb-1 text-muted">
                                            {{ $lesson->description }}
                                        </p>
                                    @endif
                                </div>

                                @if ($lesson->video_url)
                                    <span class="badge bg-primary rounded-pill mt-1">
                                        Video
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>

        {{-- SIDEBAR --}}
        <div class="col-lg-4">
            <div class="card shadow-sm">
                @if ($course->thumbnail_url)
                    <img src="{{ $course->thumbnail_url }}" class="card-img-top" alt="{{ $course->title }}">
                @endif

                <div class="card-body">
                    <h3 class="h4 mb-2">
                        ${{ number_format($course->price, 2) }}
                    </h3>

                    <p class="text-muted mb-3">
                        {{ $lessons->count() }}
                        {{ \Illuminate\Support\Str::plural('lesson', $lessons->count()) }}
                    </p>

                    @guest
                        <p class="small text-muted mb-3">
                            Please login to enroll in this course.
                        </p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('login') }}" class="btn btn-primary">
                                Login
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-secondary">
                                Register
                            </a>
                        </div>
                    @else
                        @if ($isEnrolled)
                            <div class="d-grid gap-2">
                                <button class="btn btn-success" disabled>
                                    Enrolled
                                </button>
                                <a href="{{ route('profile.my-courses') }}" class="btn btn-outline-primary">
                                    Go to lessons
                                </a>
                            </div>
                        @else
                            <div class="d-grid gap-2">
                                <a href="{{ route('payments.checkout', $course) }}" class="btn btn-primary">
                                    Enroll now
                                </a>
                            </div>
                        @endif
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
