@extends('layouts.main')

@section('title', $course->title . ' | MÉLORÉ')

@section('content')
<div class="container py-5">
    <div class="row g-5">

        {{-- MAIN COLUMN --}}
        <div class="col-lg-8">

            {{-- Title & Info --}}
            <h1 class="fw-bold mb-2">{{ $course->title }}</h1>
            <p class="text-muted mb-3">
                {{ $course->category }} • Level {{ $course->level }}
            </p>

            <p class="text-secondary mb-4">
                {{ $course->description }}
            </p>

            {{-- VIDEO SECTION --}}
            @if ($course->video_url)
                @php
                    $originalUrl = $course->video_url;
                    $videoUrl = $originalUrl;

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

                <div class="ratio ratio-16x9 rounded-4 overflow-hidden mb-3 shadow-sm">
                    <iframe
                        src="{{ $videoUrl }}"
                        class="rounded-4"
                        allowfullscreen
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share">
                    </iframe>
                </div>

                <p class="small text-muted mb-4">
                    If the video cannot be played, you may
                    <a href="{{ $originalUrl }}" target="_blank">watch it on YouTube</a>.
                </p>
            @endif

            {{-- LESSONS --}}
            <h4 class="fw-semibold mt-4 mb-3">Lessons</h4>

            @if ($lessons->isEmpty())
                <div class="alert alert-dark rounded-4 p-3">
                    This course doesn’t have any lessons yet.
                </div>
            @else
                <div class="list-group rounded-4 shadow-sm">
                    @foreach ($lessons as $lesson)
                        <div class="list-group-item py-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="mb-1 fw-semibold">
                                        {{ $loop->iteration }}. {{ $lesson->title }}
                                    </h5>

                                    @if ($lesson->description)
                                        <p class="text-muted small mb-1">
                                            {{ $lesson->description }}
                                        </p>
                                    @endif
                                </div>

                                @if ($lesson->video_url)
                                    <span class="badge bg-primary rounded-pill align-self-start">
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
            <div class="card shadow-sm border border-2 border-dark-subtle rounded-4 mb-4">

                @if ($course->thumbnail_url)
                    <img src="{{ $course->thumbnail_url }}"
                         class="card-img-top rounded-top-4"
                         style="height: 200px; object-fit: cover;"
                    >
                @endif

                <div class="card-body">

                    <h3 class="fw-bold mb-2">
                        Rp{{ number_format($course->price, 2) }}
                    </h3>

                    <p class="text-muted mb-3">
                        {{ $lessons->count() }}
                        {{ \Illuminate\Support\Str::plural('lesson', $lessons->count()) }}
                    </p>

                    @guest
                        <p class="small text-muted mb-3">
                            Please login to enroll.
                        </p>

                        <div class="d-grid gap-2">
                            <a href="{{ route('login') }}" class="btn btn-primary rounded-pill">
                                Login
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-secondary rounded-pill">
                                Register
                            </a>
                        </div>

                    @else
                        @if ($isEnrolled)
                            <div class="d-grid gap-2">
                                <button class="btn btn-success rounded-pill" disabled>
                                    Enrolled
                                </button>
                                <a href="{{ route('profile.my-courses') }}" class="btn btn-outline-primary rounded-pill">
                                    Go to lessons
                                </a>
                            </div>
                        @else
                            <div class="d-grid gap-2">
                                <a href="{{ route('payments.checkout', $course) }}"
                                    class="btn btn-dark rounded-pill">
                                    Enroll now
                                </a>
                            </div>
                        @endif
                    @endguest

                </div>
            </div>

            {{-- COMMENTS CARD --}}
            <div class="card shadow-sm border border-2 border-secondary-subtle rounded-4">
                    <div class="card-body">

                        <h5 class="fw-semibold mb-3">Comments</h5>

                        @auth
                        @if($isEnrolled)
                            {{-- COMMENT FORM --}}
                            <form action="{{ route('comments.store', $course) }}" method="POST" class="mb-3">
                                @csrf
                                <textarea 
                                    name="content"
                                    class="form-control rounded-3 mb-2"
                                    rows="3"
                                    placeholder="Write your comment..."
                                    required
                                ></textarea>

                            <button class="btn btn-dark btn-sm rounded-pill w-100">Post</button>
                            </form>

                        @else
                        <p class="small text-muted">
                            Enroll this course to write a comment.
                        </p>
                        @endif
                    @else
                    <p class="small text-muted">
                        Login to see and write comments.
                    </p>
                    @endauth

                    {{-- COMMENTS LIST --}}
                    @forelse($comments as $comment)
                        <div class="border-top pt-3 mt-3">
                            <strong class="small">{{ $comment->user->name }}</strong>

                            <p class="small text-muted mb-1">
                                {{ $comment->created_at->diffForHumans() }}
                            </p>

                            <p class="mb-0">
                                {{ $comment->content }}
                            </p>
                        </div>
                    @empty
                        <p class="small text-muted mt-3">No comments yet.</p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>
@endsection