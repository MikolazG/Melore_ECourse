@extends('layouts.main')

@push('styles')
    <link rel="stylesheet" href="/css/landing.css">
@endpush

@section('content')

    {{-- HERO SECTION --}}
    <section id="hero" class="hero-wrapper">
        <div class="hero-card">
            <div class="hero-left">
                <p class="hero-tag">Guided by real musicians.</p>

                <h1 class="hero-title">
                    Discover your potential.<br>
                    Start your musical journey with<br>
                    <span class="hero-title-accent">Méloré.</span>
                </h1>

                <button class="hero-btn">Explore Courses</button>
            </div>

            <div class="hero-right">
                {{-- gambar hero utama --}}
                <img src="/images/landing.png" alt="Guitar player" class="hero-img">
            </div>
        </div>

        {{-- dots slider dummy biar mirip Figma --}}
        <div class="hero-dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>

        <p class="hero-subtext">Trusted by many</p>
    </section>

    {{-- BRAND STRIP – MARQUEE TANPA PUTUS --}}
    <section class="brand-strip">
        <div class="brand-marquee">
            <div class="brand-track">
                <span class="brand brand-anton">Drumeo</span>
                <span class="brand brand-poppins">Lakewood</span>
                <span class="brand brand-anton">Yousician</span>
                <span class="brand brand-poppins">Perfect Piano</span>
                <span class="brand brand-anton">LALALAI</span>

                {{-- duplikasi biar loop terus tanpa putus --}}
                <span class="brand brand-anton">Drumeo</span>
                <span class="brand brand-poppins">Lakewood</span>
                <span class="brand brand-anton">Yousician</span>
                <span class="brand brand-poppins">Perfect Piano</span>
                <span class="brand brand-anton">LALALAI</span>
            </div>
        </div>
    </section>

    {{-- INVEST / FEATURES --}}
    <section id="learning" class="section invest-section">
        <div class="section-inner">
            <h2 class="section-title">Invest in your career</h2>

            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-icon">🎵</div>
                    <h3>Learn from real musicians</h3>
                    <p>Receive authentic lessons from experienced music mentors.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">⏱</div>
                    <h3>Flexible learning, anytime</h3>
                    <p>Self-paced study — learn with structured videos and guided paths.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">⭐</div>
                    <h3>Build practical, real-world skills</h3>
                    <p>Track progress, unlock new skills, and grow your musical journey.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- 77% STATS + IMAGE --}}
    <section class="section stats-section">
        <div class="section-inner stats-inner">
            <div class="stats-text">
                <p class="stats-number">
                    77% of learners experience real musical improvement,
                    from skill growth to stronger performance confidence.
                </p>
            </div>
            <div class="stats-image-wrapper">
                <img src="/images/landing1.png" alt="Learners jamming together" class="stats-img">
            </div>
        </div>
    </section>

    {{-- TESTIMONIALS --}}
    <section id="about" class="section testimonial-section">
        <div class="section-inner">
            <h2 class="section-title center">
                What subscribers are achieving through learning
            </h2>

            <div class="testimonial-grid">
                <article class="testimonial-card">
                    <div class="avatar-circle">S</div>
                    <h3 class="testimonial-name">Stevenson</h3>
                    <p class="testimonial-text">
                        “Méloré helped me train my practice routine and improve my confidence.”
                    </p>
                </article>

                <article class="testimonial-card">
                    <div class="avatar-circle">A</div>
                    <h3 class="testimonial-name">Amelia</h3>
                    <p class="testimonial-text">
                        “The lessons helped me refine my technique and build a powerful sound.”
                    </p>
                </article>

                <article class="testimonial-card">
                    <div class="avatar-circle">J</div>
                    <h3 class="testimonial-name">Jordan</h3>
                    <p class="testimonial-text">
                        “My rhythm & accuracy improved massively thanks to consistent guidance.”
                    </p>
                </article>
            </div>
        </div>
    </section>

    {{-- BIG MÉLORÉ BLOCK (FOOTER STYLE) --}}
    <section class="big-melore-section">
        <div class="big-melore-text">MÉLORÉ</div>

        <div class="big-melore-bottom">
            <p class="big-melore-tagline">
                Guided by real musicians. Start your musical journey and unlock your full potential with Méloré.
            </p>

            <div class="big-melore-links">
                <a href="#hero">Home</a>
                <a href="#learning">Learning</a>
                <a href="#learning">Courses</a>
                <a href="#about">About Us</a>
            </div>
        </div>
    </section>
@endsection
