@extends('layouts.main')

@section('title', 'About Us - MÉLORÉ')

@section('content')
<div class="container py-5">

    {{-- Hero Section --}}
    <section class="text-center mb-5">
        <span class="badge rounded-pill border border-dark text-dark mb-3 px-3 py-1"
              style="font-size:.8rem; letter-spacing:.12em; text-transform:uppercase; background-color:#f5f5f5;">
            ABOUT MÉLORÉ
        </span>

        <h1 class="mb-3"
            style="
                font-family: 'Playfair Display', 'Times New Roman', serif;
                font-size: 3.5rem;
                line-height: 1.2;
                letter-spacing: -.02em;
            ">
            Empowering Musicians<br>
            Around The World
        </h1>

        <p class="text-muted mb-4" style="max-width: 720px; margin:0 auto; font-size:1.1rem;">
            MÉLORÉ is a modern music learning platform that connects passionate learners
            with expert instructors from around the globe.
        </p>
    </section>

    {{-- Mission & Vision --}}
    <section class="mb-5">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card border-0 rounded-4 shadow-sm h-100" style="background-color:#E6E1FF;">
                    <div class="card-body p-4">
                        <h3 class="fw-bold mb-3">Our Mission</h3>
                        <p class="text-secondary mb-0">
                            To make high-quality music education accessible to everyone, anywhere,
                            anytime. We believe that learning music should be flexible, affordable,
                            and inspiring.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-0 rounded-4 shadow-sm h-100" style="background-color:#ECFFD3;">
                    <div class="card-body p-4">
                        <h3 class="fw-bold mb-3">Our Vision</h3>
                        <p class="text-secondary mb-0">
                            To become the world's leading online music learning platform,
                            fostering a global community of musicians who inspire and support
                            each other's creative journeys.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Our Story --}}
    <section class="mb-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-3">Our Story</h2>
                <p class="text-secondary mb-3">
                    Founded in 2025, MÉLORÉ was born from a simple idea: music education
                    should be accessible to everyone, regardless of location or schedule.
                </p>
                <p class="text-secondary mb-3">
                    Our founders, experienced musicians and educators, noticed that traditional
                    music schools often had rigid schedules, high costs, and limited course offerings.
                    They envisioned a platform where students could learn at their own pace,
                    from world-class instructors, with the flexibility that modern life demands.
                </p>
                <p class="text-secondary mb-0">
                    Today, MÉLORÉ serves thousands of students worldwide, offering courses in
                    various instruments, music theory, production, and more.
                </p>
            </div>

            <div class="col-lg-6">
                <img src="https://images.pexels.com/photos/1407322/pexels-photo-1407322.jpeg?auto=compress&cs=tinysrgb&w=800"
                     alt="Music students learning"
                     class="img-fluid rounded-4 shadow">
            </div>
        </div>
    </section>

    {{-- Values --}}
    <section class="mb-5">
        <h2 class="fw-bold text-center mb-4">Our Values</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="text-center p-4">
                    <div class="mb-3">
                        <span class="badge bg-success rounded-circle p-3" style="font-size: 2rem;">🎵</span>
                    </div>
                    <h5 class="fw-bold mb-2">Excellence</h5>
                    <p class="text-muted small">
                        We maintain the highest standards in course quality and instructor expertise.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="text-center p-4">
                    <div class="mb-3">
                        <span class="badge bg-success rounded-circle p-3" style="font-size: 2rem;">🌍</span>
                    </div>
                    <h5 class="fw-bold mb-2">Accessibility</h5>
                    <p class="text-muted small">
                        Music education should be available to everyone, everywhere.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="text-center p-4">
                    <div class="mb-3">
                        <span class="badge bg-success rounded-circle p-3" style="font-size: 2rem;">🤝</span>
                    </div>
                    <h5 class="fw-bold mb-2">Community</h5>
                    <p class="text-muted small">
                        We foster a supportive environment where musicians grow together.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Statistics --}}
    <section class="mb-5">
        <div class="card border-0 rounded-4 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="card-body p-5">
                <div class="row text-center text-white">
                    <div class="col-md-3">
                        <h2 class="fw-bold mb-2">10,000+</h2>
                        <p class="mb-0">Active Students</p>
                    </div>
                    <div class="col-md-3">
                        <h2 class="fw-bold mb-2">500+</h2>
                        <p class="mb-0">Courses Available</p>
                    </div>
                    <div class="col-md-3">
                        <h2 class="fw-bold mb-2">100+</h2>
                        <p class="mb-0">Expert Instructors</p>
                    </div>
                    <div class="col-md-3">
                        <h2 class="fw-bold mb-2">50+</h2>
                        <p class="mb-0">Countries Reached</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="text-center mb-5">
        <h3 class="fw-bold mb-3">Ready to Start Your Musical Journey?</h3>
        <p class="text-muted mb-4">Join thousands of students learning with MÉLORÉ today.</p>
        <div class="d-inline-flex gap-3">
            <a href="{{ route('courses.index') }}" class="btn btn-success rounded-pill px-4 py-2">
                Browse Courses
            </a>
            <a href="{{ route('contact') }}" class="btn btn-outline-dark rounded-pill px-4 py-2">
                Contact Us
            </a>
        </div>
    </section>

</div>
@endsection
