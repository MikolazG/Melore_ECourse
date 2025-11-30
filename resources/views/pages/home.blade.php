@extends('layouts.main')

@section('title', 'Sonaria — Learn Music Better')

@section('content')
<div class="container py-5">

    {{-- ABOUT / STATS SECTION --}}
    <section class="mb-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <small class="text-muted d-block mb-2">About us</small>
                <h2 class="fw-bold mb-3">
                    This platform transforms learning with
                    <span class="text-warning">expert guidance</span>
                    and community support for flexible education.
                </h2>
                <p class="text-muted mb-4">
                    SONARIA is built for flexible music education. Learn at your own pace,
                    follow clear paths, and get practical feedback from mentors who care
                    about your journey.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm overflow-hidden">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="https://images.pexels.com/photos/4144222/pexels-photo-4144222.jpeg?auto=compress&cs=tinysrgb&w=800"
                                 alt="Online learning"
                                 class="img-fluid h-100 w-100 object-fit-cover">
                        </div>
                        <div class="col-md-7">
                            <div class="h-100 d-flex flex-column">
                                <div class="p-3">
                                    <h5 class="mb-1">97%</h5>
                                    <small class="text-muted d-block mb-2">Student satisfaction rate</small>
                                    <p class="small mb-0 text-muted">
                                        Most learners say their experience is more engaging and effective
                                        compared to traditional classes.
                                    </p>
                                </div>
                                <div class="p-3 bg-warning text-white">
                                    <h5 class="mb-1">1,200+</h5>
                                    <small class="d-block mb-2">Courses &amp; programs</small>
                                    <p class="small mb-0">
                                        Our courses blend music skills and personal growth. Practice-focused
                                        lessons help you stay on track.
                                    </p>
                                </div>
                                <div class="p-3 bg-warning-subtle">
                                    <h5 class="mb-1">50+</h5>
                                    <small class="d-block mb-2 text-muted">Global community</small>
                                    <p class="small mb-0 text-muted">
                                        Join learners worldwide to share ideas, collaborate on projects,
                                        and stay inspired together.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- COURSES SECTION --}}
    <section class="mb-5">
        <div class="row g-4 align-items-start">
            <div class="col-lg-5">
                <small class="text-muted d-block mb-2">Courses</small>
                <h3 class="fw-bold mb-3">
                    Courses That<br>Open Your Future
                </h3>
                <p class="text-muted mb-4">
                    Explore skills from technique to stage confidence.
                    Learn step-by-step, from beginner to advanced.
                </p>
                <a href="{{ route('courses.index') }}" class="btn btn-outline-dark rounded-pill px-4">
                    Learn more
                </a>
            </div>
            <div class="col-lg-7">
                @php
                    $featuredCourses = $featuredCourses ?? \App\Models\Course::take(3)->get();
                @endphp

                <div class="card border-0 shadow-sm">
                    <div class="list-group list-group-flush">
                        @forelse ($featuredCourses as $course)
                            <div class="list-group-item d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="mb-1">{{ $course->title }}</h6>
                                    <small class="text-muted d-block">
                                        {{ $course->category }} • {{ $course->level }}
                                    </small>
                                    <small class="text-muted">
                                        @if($course->lessons_count ?? $course->lessons()->count())
                                            {{ $course->lessons_count ?? $course->lessons()->count() }} lessons
                                        @else
                                            Self-paced course
                                        @endif
                                    </small>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold mb-1">${{ number_format($course->price, 2) }}</div>
                                    <a href="{{ route('courses.show', $course) }}"
                                       class="btn btn-warning btn-sm rounded-pill text-white">
                                        Start learning
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="list-group-item text-muted">
                                No courses yet. Please run seeders or create some courses.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- MENTOR SECTION --}}
    <section class="mb-5">
        <small class="text-muted d-block mb-2">Mentor</small>
        <h3 class="fw-bold mb-4">Learn From Experienced Mentors</h3>

        <div class="row g-3 mb-3">
            <div class="col-6 col-lg-3">
                <img src="https://images.pexels.com/photos/1181519/pexels-photo-1181519.jpeg?auto=compress&cs=tinysrgb&w=800"
                     class="img-fluid rounded"
                     alt="Mentor 1">
            </div>
            <div class="col-6 col-lg-3">
                <img src="https://images.pexels.com/photos/1181686/pexels-photo-1181686.jpeg?auto=compress&cs=tinysrgb&w=800"
                     class="img-fluid rounded"
                     alt="Mentor 2">
            </div>
            <div class="col-6 col-lg-3">
                <img src="https://images.pexels.com/photos/1181690/pexels-photo-1181690.jpeg?auto=compress&cs=tinysrgb&w=800"
                     class="img-fluid rounded"
                     alt="Mentor 3">
            </div>
            <div class="col-6 col-lg-3">
                <img src="https://images.pexels.com/photos/1181715/pexels-photo-1181715.jpeg?auto=compress&cs=tinysrgb&w=800"
                     class="img-fluid rounded"
                     alt="Mentor 4">
            </div>
        </div>

        <div class="bg-dark text-white rounded-3 p-4 d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="mb-3 mb-md-0">
                <p class="mb-1 fw-semibold">
                    Interactive lessons and projects build your knowledge and confidence.
                </p>
                <small class="text-white-50">
                    Start small, go at your pace, and watch your progress grow.
                </small>
            </div>
            <a href="{{ route('courses.index') }}" class="btn btn-light rounded-pill px-4">
                Browse
            </a>
        </div>
    </section>

    {{-- HOW YOU'LL LEARN SECTION --}}
    <section class="mb-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6 order-2 order-lg-1">
                <small class="text-muted d-block mb-2">How it works</small>
                <h3 class="fw-bold mb-3">How You’ll Learn With Us</h3>
                <ul class="list-unstyled text-muted small mb-3">
                    <li class="mb-2">Browse our library and choose a course that fits your goals.</li>
                    <li class="mb-2">Access lessons anytime with flexible schedules.</li>
                    <li class="mb-2">Apply what you learn in projects, track progress, and gain real skills.</li>
                </ul>
                <a href="{{ route('courses.index') }}" class="btn btn-warning rounded-pill px-4 text-white">
                    Learn more
                </a>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <img src="https://images.pexels.com/photos/4913800/pexels-photo-4913800.jpeg?auto=compress&cs=tinysrgb&w=800"
                     alt="Student learning"
                     class="img-fluid rounded-3 shadow-sm">
            </div>
        </div>
    </section>

    {{-- REVIEWS SECTION --}}
    <section class="mb-5">
        <small class="text-muted d-block mb-2">Reviews</small>
        <h3 class="fw-bold mb-3">What learners are saying</h3>

        <p class="text-muted mb-4">
            “I never thought online learning could feel this easy. The lessons are clear,
            practical, and fun. I can always come back whenever I need a refresher.”
        </p>

        <div id="reviewsMarquee" class="d-flex gap-3 overflow-hidden">
            @php
                $reviews = [
                    ['name' => 'Joko Susanto', 'role' => 'Guitar Student'],
                    ['name' => 'Stevie Adrian Justien', 'role' => 'Piano Enthusiast'],
                    ['name' => 'Keane', 'role' => 'Songwriter'],
                    ['name' => 'Alya Prameswari', 'role' => 'Vocalist'],
                    ['name' => 'Daniel K.', 'role' => 'Music Producer'],
                    ['name' => 'Nadya Nabakova', 'role' => 'Keyboardist'],
                ];
            @endphp

            @foreach ($reviews as $review)
                <div class="card border-0 shadow-sm rounded-3" style="min-width: 260px;">
                    <div class="card-body">
                        <p class="small text-muted mb-3">
                            “SONARIA keeps my practice consistent. The lessons feel human,
                            and I always know what to do next.”
                        </p>
                        <div class="fw-semibold mb-0">{{ $review['name'] }}</div>
                        <small class="text-muted">{{ $review['role'] }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- SUBSCRIBE SECTION --}}
    <section class="mb-4">
        <div class="card border-0 shadow-sm">
            <div class="row g-0">
                <div class="col-lg-7">
                    <img src="https://images.pexels.com/photos/1181396/pexels-photo-1181396.jpeg?auto=compress&cs=tinysrgb&w=800"
                         class="img-fluid h-100 w-100 object-fit-cover"
                         alt="Community">
                </div>
                <div class="col-lg-5 d-flex flex-column justify-content-center p-4">
                    <h5 class="fw-bold mb-3">
                        Subscribe to learn what we can do for you!
                    </h5>
                    <p class="text-muted small mb-3">
                        Get updates on new music courses, live sessions, and exclusive tips from mentors.
                    </p>
                    <form>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Email address">
                            <button class="btn btn-warning text-white" type="button">
                                &rarr;
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var container = document.getElementById('reviewsMarquee');
        if (!container) return;

        setInterval(function () {
            container.scrollLeft += 1;
            if (container.scrollLeft >= container.scrollWidth - container.clientWidth) {
                container.scrollLeft = 0;
            }
        }, 30);
    });
</script>
@endpush
