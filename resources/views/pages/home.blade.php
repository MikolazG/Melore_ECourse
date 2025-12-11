@extends('layouts.main')

@section('title', 'MÉLORÉ — Learn Music Better')

@section('content')
<div class="container py-5">

    <section class="mb-5 pt-4">
        <div class="row justify-content-center">
            <div class="col-lg-9 text-center">

                <span class="badge rounded-pill border border-dark text-dark mb-3 px-3 py-1"
                      style="font-size:.8rem; letter-spacing:.12em; text-transform:uppercase; background-color:#f5f5f5;">
                    PLATFORM • ONLINE MUSIC COURSES
                </span>

                <h1 class="mb-3"
                    style="
                        font-family: 'Playfair Display', 'Times New Roman', serif;
                        font-size: 5rem;
                        line-height: 1.18;
                        letter-spacing: -.02em;
                    ">
                    Learn Music Courses Globally<br>
                    In One Flexible Platform
                </h1>

                <p class="text-muted mb-4"
                   style="max-width: 720px; margin:0 auto; font-size:1.1rem;">
                    Learning platform with diverse courses and expert mentors, accessible anytime, anywhere.
                </p>

                <div class="d-inline-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ route('courses.index') }}"
                       class="btn btn-dark rounded-pill px-4 py-2">
                        Browse music courses
                    </a>
                    <a href="{{ route('courses.index') }}"
                       class="btn btn-outline-dark rounded-pill px-4 py-2">
                        Start learning for free
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section class="mb-5">

        <div class="text-center mb-3">
            <img src="{{ asset('img/LP1.png') }}"
                 alt="MÉLORÉ learning impact overview"
                 class="img-fluid"
                 style="max-width: 520px;">
        </div>

        <div class="text-center text-muted small mb-3">
            Trusted by music communities
        </div>

        <div class="d-flex flex-wrap justify-content-center gap-4"
             style="font-size:1rem; letter-spacing:.08em;">

            <span
                style="
                    font-family:'Playfair Display','Times New Roman',serif;
                    text-transform:uppercase;
                    font-weight:800;
                    letter-spacing:.28em;
                    color:#111;
                ">
                Campus Music Lab
            </span>

            <span
                style="
                    font-family:'Blockat',sans-serif;
                    font-style: italic;
                    font-weight:700;
                    letter-spacing:.04em;
                "
                class="text-dark">
                indoSoundCollective
            </span>

            <span
                style="
                    font-family:'Ogelo',sans-serif;
                    font-weight:900;
                    letter-spacing:.03em;
                "
                class="text-dark">
                Bedroom Producers ID
            </span>

            <span
                style="
                    font-family:'Nurma','Times New Roman',serif;
                    font-weight:700;
                    font-style: italic;
                "
                class="text-dark">
                Choir Society
            </span>

            <span
                style="
                    font-family:'Davigo',sans-serif;
                    font-weight:600;
                    letter-spacing:.05em;
                "
                class="text-dark">
                Jazz Corner
            </span>

            <span
                style="
                    font-family:'Thurkle',sans-serif;
                    font-weight:800;
                "
                class="text-dark">
                StudioNusantara_
            </span>

        </div>
    </section>

    <section class="mb-5">
        <div class="row g-4">

            <div class="col-lg-4">
                <div class="card border-0 rounded-4 shadow-sm h-100" style="background-color:#ECFFD3;">
                    <div class="card-body">
                        <span class="badge bg-success bg-opacity-10 text-success mb-2">
                            Guided Practice
                        </span>
                        <h5 class="fw-bold mb-2">AI-Aided Practice Room</h5>
                        <p class="text-muted small mb-3">
                            Upload rekamanmu, dapatkan feedback otomatis soal timing, pitch,
                            dan dinamika, lalu terima latihan lanjutan.
                        </p>
                        <ul class="small text-muted mb-0 list-unstyled">
                            <li class="mb-1">• Feedback tiap take latihan</li>
                            <li class="mb-1">• Level disesuaikan kemampuanmu</li>
                            <li>• Cocok untuk gitar, piano, dan vokal</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 rounded-4 shadow-sm h-100" style="background-color:#E6E1FF;">
                    <div class="card-body">
                        <span class="badge bg-white text-dark mb-2">Go live everywhere</span>
                        <h5 class="fw-bold mb-2">Live Sessions + Replay</h5>
                        <p class="text-muted small mb-3">
                            Ikuti kelas live dari mentor, lalu tonton ulang rekaman kapan saja.
                        </p>
                        <ul class="small text-muted mb-0 list-unstyled">
                            <li class="mb-1">• Low-latency streaming</li>
                            <li class="mb-1">• Chart & backing track terintegrasi</li>
                            <li>• Replay otomatis tersimpan</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- CARD 3 --}}
            <div class="col-lg-4">
                <div class="card border-0 rounded-4 shadow-sm h-100" style="background-color:#FFE5F5;">
                    <div class="card-body">
                        <span class="badge bg-white text-dark mb-2">Community</span>
                        <h5 class="fw-bold mb-2">Clubs, Challenges & Feedback</h5>
                        <p class="text-muted small mb-3">
                            Ikut challenge bulanan, upload progress, dan dapat feedback mentor.
                        </p>
                        <ul class="small text-muted mb-0 list-unstyled">
                            <li class="mb-1">• Klub berdasarkan genre</li>
                            <li class="mb-1">• Mini-task tiap minggu</li>
                            <li>• Feedback video kamu</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="mb-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-4">
                <small class="text-success fw-semibold text-uppercase d-block mb-2">
                    Learning Impact
                </small>
                <h3 class="fw-bold mb-3">Lihat bagaimana MÉLORÉ<br>mengangkat hasil belajarmu.</h3>
                <p class="text-muted small mb-0">
                    Kelas dibuat pendek dan berurutan supaya kamu konsisten.
                </p>
            </div>

            <div class="col-lg-8">
                <div class="row g-3">

                    <div class="col-6 col-md-3">
                        <div class="card border-0 rounded-4 shadow-sm text-center p-3 h-100">
                            <div class="small text-muted mb-1">Practice increase</div>
                            <div class="fw-bold fs-5 text-success">+392%</div>
                            <small class="text-muted">menit latihan / minggu</small>
                        </div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="card border-0 rounded-4 shadow-sm text-center p-3 h-100">
                            <div class="small text-muted mb-1">Durasi lesson</div>
                            <div class="fw-bold fs-5 text-success">11.7</div>
                            <small class="text-muted">menit / micro-lesson</small>
                        </div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="card border-0 rounded-4 shadow-sm text-center p-3 h-100">
                            <div class="small text-muted mb-1">Completion</div>
                            <div class="fw-bold fs-5 text-success">20x</div>
                            <small class="text-muted">lebih tinggi</small>
                        </div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="card border-0 rounded-4 shadow-sm text-center p-3 h-100">
                            <div class="small text-muted mb-1">Confidence</div>
                            <div class="fw-bold fs-5 text-success">+288%</div>
                            <small class="text-muted">lebih siap tampil</small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- FEATURED COURSES --}}
    <section class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <small class="text-success fw-semibold text-uppercase d-block mb-1">
                    Featured tracks
                </small>
                <h3 class="fw-bold mb-0">Mulai dari jalur belajar pilihan kami</h3>
            </div>
            <a href="{{ route('courses.index') }}" class="btn btn-outline-success rounded-pill btn-sm">
                View all courses
            </a>
        </div>

        @php
            use Illuminate\Support\Str;
            $featuredCourses = $featuredCourses ?? \App\Models\Course::withCount('lessons')->take(3)->get();
        @endphp

        <div class="row g-4">
            @forelse ($featuredCourses as $course)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100">

                        @if($course->thumbnail_url)
                            <div class="ratio ratio-16x9">
                                <img src="{{ $course->thumbnail_url }}"
                                     alt="{{ $course->title }}"
                                     class="w-100 h-100 object-fit-cover rounded-top-4">
                            </div>
                        @endif

                        <div class="card-body">
                            <span class="badge bg-success bg-opacity-10 text-success mb-2">
                                {{ $course->category }} • {{ $course->level }}
                            </span>
                            <h5 class="fw-semibold mb-1">{{ $course->title }}</h5>
                            <p class="text-muted small mb-3">
                                {{ Str::limit($course->description, 90) }}
                            </p>

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="fw-bold text-success mb-0">
                                        Rp{{ number_format($course->price, 2) }}
                                    </div>
                                    <small class="text-muted">
                                        @if($course->lessons_count)
                                            {{ $course->lessons_count }} lessons
                                        @else
                                            Self-paced
                                        @endif
                                    </small>
                                </div>

                                <a href="{{ route('courses.show', $course) }}"
                                   class="btn btn-success btn-sm rounded-pill">
                                    View details
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <p class="text-muted small">
                    No courses yet. Please run seeders or create some courses.
                </p>
            @endforelse
        </div>

    </section>

    {{-- REVIEWS --}}
    <section class="mb-5">
        <div class="row g-4">

            <div class="col-lg-6">
                <small class="text-success fw-semibold text-uppercase d-block mb-2">Reviews</small>
                <h3 class="fw-bold mb-3">What learners are saying</h3>
                <p class="text-muted mb-4">
                    “Platform ini bener-bener berasa kayak Udemy versi musik…”
                </p>

                <div id="reviewsMarquee" class="d-flex gap-3 overflow-hidden">

                    @php
                        $reviews = [
                            ['name'=>'Joko Susanto','role'=>'Guitar Student'],
                            ['name'=>'Stevie Adrian Justien','role'=>'Piano Enthusiast'],
                            ['name'=>'Keane','role'=>'Songwriter'],
                            ['name'=>'Alya Prameswari','role'=>'Vocalist'],
                            ['name'=>'Daniel K.','role'=>'Music Producer'],
                            ['name'=>'Nadya Nabakova','role'=>'Keyboardist'],
                        ];
                    @endphp

                    @foreach ($reviews as $review)
                        <div class="card border-0 shadow-sm rounded-4" style="min-width:260px;">
                            <div class="card-body">
                                <p class="small text-muted mb-3">
                                    “MÉLORÉ bikin latihan gue konsisten…”
                                </p>
                                <div class="fw-semibold mb-0">{{ $review['name'] }}</div>
                                <small class="text-success">{{ $review['role'] }}</small>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="row g-0 h-100">

                        <div class="col-md-6">
                            <img src="https://images.pexels.com/photos/1181396/pexels-photo-1181396.jpeg?auto=compress&cs=tinysrgb&w=800"
                                 class="img-fluid h-100 w-100 object-fit-cover rounded-start-4"
                                 alt="Community">
                        </div>

                        <div class="col-md-6 d-flex flex-column justify-content-center p-4">
                            <h5 class="fw-bold mb-2">Subscribe to learn what we can do for you!</h5>
                            <p class="text-muted small mb-3">
                                Dapatkan info rilis course baru & diskon early-bird.
                            </p>

                            <form>
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Email address">
                                    <button class="btn btn-success text-white" type="button">&rarr;</button>
                                </div>
                            </form>

                        </div>

                    </div>
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

