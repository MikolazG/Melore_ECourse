@extends('layouts.main')

@section('title', 'MÉLORÉ — Learn Music Better')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');

    body {
        font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }

    /* HERO */
    .hero-section {
        background: #ffffff;
    }

    .hero-badge {
        font-size: 0.75rem;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        font-weight: 600;
        padding: 0.5rem 1.3rem;
        border-radius: 999px;
        background: #f3f4f6;
        color: #111827;
        border: 1.5px solid #111827;
    }

    .hero-title {
        font-family: 'Playfair Display', 'Times New Roman', serif;
        font-weight: 400;
        letter-spacing: -0.03em;
        line-height: 1.1;
        font-size: clamp(3rem, 4.6vw, 4rem);
    }

    .hero-subtitle {
        max-width: 640px;
        margin: 0 auto;
        font-size: 1.05rem;
        color: #6b7280;
    }

    .btn-hero-primary {
        background: #000000;
        color: #ffffff;
        border-radius: 999px;
        padding: 0.9rem 2.8rem;
        font-weight: 600;
        border: none;
    }

    .btn-hero-primary:hover {
        background: #111827;
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.25);
        transform: translateY(-1px);
    }

    .btn-hero-outline {
        background: #ffffff;
        color: #000000;
        border-radius: 999px;
        padding: 0.9rem 2.8rem;
        font-weight: 600;
        border: 2px solid #000000;
    }

    .btn-hero-outline:hover {
        background: #000000;
        color: #ffffff;
        transform: translateY(-1px);
    }

    .hero-actions {
        margin-top: 1.8rem;
        margin-bottom: 2.5rem;
    }

    /* VIDEO HERO */
    .hero-video-shell {
        max-width: 960px;
        margin: 0 auto 3.5rem;
        border-radius: 1.8rem;
        overflow: hidden;
        border: 1.5px solid #111827;
        box-shadow: 0 28px 80px rgba(15, 23, 42, 0.22);
    }

    .hero-video {
        width: 100%;
        height: auto;
        display: block;
    }

    /* GRID CARD KECIL DI HERO */
    .hero-grid-wrapper {
        max-width: 980px;
        margin: 0 auto 0;
    }

    .hero-video-card {
        position: relative;
        border-radius: 1.9rem;
        overflow: hidden;
        min-height: 200px;
        display: flex;
        align-items: flex-end;
        color: #fff;
        background-size: cover;
        background-position: center;
    }

    .hero-video-card::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.05) 0%, rgba(0, 0, 0, 0.75) 100%);
    }

    .hero-middle-row {
        position: absolute;
        top: 50%;
        left: 1.25rem;
        transform: translateY(-50%);
        z-index: 2;
    }

    .hero-video-content {
        position: relative;
        z-index: 2;
        padding: 1rem 1.25rem 1.2rem;
        width: 100%;
    }

    .hero-meta {
        font-size: 0.8rem;
        opacity: 0.9;
    }

    .hero-small-label {
        font-size: 0.75rem;
        padding: 0.25rem 0.7rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.85);
        color: #111827;
        font-weight: 600;
        display: inline-block;
    }

    /* KNOW MORE ABOUT US – SLIDER */
    .info-section {
        padding: 4rem 0 5rem;
        background: radial-gradient(circle at top, #eef2ff 0, #ffffff 55%);
    }

    .info-label {
        font-size: 0.68rem;
        letter-spacing: 0.22em;
        text-transform: uppercase;
        color: #9ca3af;
        font-weight: 600;
        text-align: center;
        margin-bottom: 2rem;
    }

    .info-slider {
        position: relative;
        max-width: 1100px;
        margin: 0 auto;
    }

    .info-slide {
        display: none;
    }

    .info-slide.active {
        display: block;
    }

    .info-card {
        border-radius: 2.2rem;
        padding: 2.8rem 3rem;
        background: #f9fafb;
        border: 1.5px solid #111827;
        box-shadow: 0 30px 90px rgba(15, 23, 42, 0.18);
    }

    .step-label-pill {
        font-size: 0.7rem;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        font-weight: 600;
        padding: 0.35rem 1.4rem;
        border-radius: 999px;
        border: 1.5px solid #111827;
        background: #ffffff;
        color: #111827;
        display: inline-block;
        margin-bottom: 0.9rem;
    }

    .step-title {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .step-text {
        color: #111827;
        opacity: 0.9;
        max-width: 420px;
    }

    .live-mockup {
        background: #020617;
        border-radius: 1.75rem;
        padding: 1.9rem 2.1rem;
        box-shadow: 0 24px 70px rgba(15, 23, 42, 0.7);
        max-width: 430px;
        width: 100%;
        color: #e5e7eb;
    }

    .live-window-dots span {
        display: inline-block;
        width: 8px;
        height: 8px;
        border-radius: 999px;
        margin-right: 4px;
        background: #4b5563;
    }

    .live-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.14em;
        color: #9ca3af;
        margin-bottom: 0.4rem;
    }

    .live-title {
        font-weight: 600;
        margin-bottom: 0.7rem;
    }

    .live-platform-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.45rem 0.65rem;
        border-radius: 0.8rem;
        margin-bottom: 0.35rem;
        background: #020617;
        border: 1px solid #111827;
    }

    .live-platform-row.active {
        border-color: #16a34a;
    }

    .live-platform-row span {
        font-size: 0.85rem;
        font-weight: 500;
        color: #e5e7eb;
    }

    .live-dot {
        width: 14px;
        height: 14px;
        border-radius: 999px;
        border: 2px solid #6b7280;
        background: #020617;
    }

    .live-dot.active {
        background: #22c55e;
        border-color: #22c55e;
    }

    .info-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 32px;
        height: 32px;
        border-radius: 999px;
        border: 1.5px solid #111827;
        background: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        cursor: pointer;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.25);
    }

    .info-arrow-left {
        left: 12px;
        transform: translate(-50%, -50%);
    }

    .info-arrow-right {
        right: 12px;
        transform: translate(50%, -50%);
    }

    /* PARTNERS */
    .partners-section {
        padding: 3.5rem 0 4rem;
        background: #ffffff;
    }

    .partners-label {
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.18em;
        color: #9ca3af;
        font-weight: 600;
        text-align: center;
        margin-bottom: 1.2rem;
    }

    .partners-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 1.75rem 3.5rem;
    }

    .partner-logo-text {
        font-weight: 700;
        font-size: 0.98rem;
        color: #111827;
        text-transform: uppercase;
        letter-spacing: 0.12em;
    }

    .logo-1 { font-family: 'Playfair Display', serif; font-style: italic; }
    .logo-2 { font-family: 'Poppins', sans-serif; }
    .logo-3 { font-family: 'Courier New', monospace; text-transform: none; }
    .logo-4 { font-family: 'Georgia', serif; letter-spacing: 0.18em; }
    .logo-5 { font-family: 'Poppins', sans-serif; font-weight: 600; }

    /* MENTORS */
    .mentors-section {
        padding: 3.5rem 0 4rem;
        background: #f9fafb;
    }

    .mentors-label {
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.18em;
        color: #9ca3af;
        font-weight: 600;
        text-align: center;
        margin-bottom: 0.6rem;
    }

    .mentors-title {
        text-align: center;
        font-weight: 600;
        margin-bottom: 2.5rem;
        color: #111827;
    }

    .mentors-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 1.75rem;
    }

    .mentor-card {
        border-radius: 1.6rem;
        overflow: hidden;
        background: #ffffff;
        box-shadow: 0 22px 60px rgba(15, 23, 42, 0.15);
        text-align: center;
    }

    .mentor-photo {
        width: 100%;
        height: 240px;
        object-fit: cover;
        display: block;
    }

    .mentor-name {
        padding: 0.9rem 1.2rem 1.2rem;
        font-weight: 600;
        color: #111827;
    }

    /* JOIN COMMUNITY */
    .community-section {
        padding: 3.5rem 0 4rem;
        background: radial-gradient(circle at top, #ede9fe 0, #ffffff 55%);
        text-align: center;
    }

    .community-title {
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        color: #111827;
    }

    .community-icons {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 2.5rem;
    }

    .community-icon {
        width: 44px;
        height: 44px;
        border-radius: 999px;
        background: #020617;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.5);
    }

    .community-icon img {
        width: 22px;
        height: 22px;
        object-fit: contain;
    }

    .community-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1.4fr 1.6fr 1.2fr 1.6fr 1.4fr;
        grid-auto-rows: 220px;
        gap: 1.25rem;
    }

    .community-card {
        border-radius: 1.8rem;
        overflow: hidden;
        background: #ffffff;
        box-shadow: 0 18px 48px rgba(15, 23, 42, 0.18);
    }

    .community-photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .community-card.stat {
        background: #e5deff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
        text-align: center;
    }

    .community-card.stat h3 {
        font-size: 2rem;
        margin-bottom: 0.4rem;
        font-weight: 700;
    }

    .community-card.stat p {
        margin: 0;
        font-size: 0.95rem;
        color: #4b5563;
    }

    .community-card.stat.orange {
        background: #f97353;
        color: #111827;
    }

    .community-card.stat.orange h3 {
        font-size: 2.1rem;
    }

    /* specific layout */
    .community-card.left-stat {
        grid-column: 1 / 2;
        grid-row: 1 / 3;
    }

    .community-card.right-stat {
        grid-column: 5 / 6;
        grid-row: 1 / 3;
    }

    .community-card.mid-photo-top {
        grid-column: 2 / 3;
        grid-row: 1 / 2;
    }

    .community-card.mid-photo-top2 {
        grid-column: 3 / 4;
        grid-row: 1 / 2;
    }

    .community-card.mid-photo-top3 {
        grid-column: 4 / 5;
        grid-row: 1 / 2;
    }

    .community-card.mid-photo-bottom-left {
        grid-column: 2 / 3;
        grid-row: 2 / 3;
    }

    .community-card.mid-stat-center {
        grid-column: 3 / 4;
        grid-row: 2 / 3;
    }

    .community-card.mid-photo-bottom-right {
        grid-column: 4 / 5;
        grid-row: 2 / 3;
    }

    @media (max-width: 1199.98px) {
        .community-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
            grid-auto-rows: 220px;
        }

        .community-card.left-stat {
            grid-column: 1 / 2;
            grid-row: 1 / 3;
        }
        .community-card.right-stat {
            grid-column: 3 / 4;
            grid-row: 1 / 3;
        }
        .community-card.mid-photo-top {
            grid-column: 2 / 3;
            grid-row: 1 / 2;
        }
        .community-card.mid-photo-top2 {
            grid-column: 2 / 3;
            grid-row: 2 / 3;
        }
        .community-card.mid-photo-top3 {
            grid-column: 1 / 2;
            grid-row: 3 / 4;
        }
        .community-card.mid-photo-bottom-left {
            grid-column: 2 / 3;
            grid-row: 3 / 4;
        }
        .community-card.mid-stat-center {
            grid-column: 3 / 4;
            grid-row: 3 / 4;
        }
        .community-card.mid-photo-bottom-right {
            grid-column: 2 / 3;
            grid-row: 4 / 5;
        }
    }

    @media (max-width: 991.98px) {
        .info-card {
            padding: 2.4rem 2rem;
        }

        .step-text {
            max-width: 100%;
            margin: 0 auto;
        }

        .live-mockup {
            margin-bottom: 1.5rem;
        }

        .mentors-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .community-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            grid-auto-rows: 200px;
        }
    }

    @media (max-width: 767.98px) {
        .hero-video-card {
            min-height: 170px;
        }

        .hero-grid-wrapper {
            margin-top: 2.2rem;
        }

        .info-arrow-left {
            left: 6px;
        }

        .info-arrow-right {
            right: 6px;
        }

        .mentors-grid {
            grid-template-columns: 1fr;
        }

        .community-grid {
            grid-template-columns: 1fr;
            grid-auto-rows: 210px;
        }

        .community-card.left-stat,
        .community-card.right-stat,
        .community-card.mid-photo-top,
        .community-card.mid-photo-top2,
        .community-card.mid-photo-top3,
        .community-card.mid-photo-bottom-left,
        .community-card.mid-stat-center,
        .community-card.mid-photo-bottom-right {
            grid-column: auto;
            grid-row: auto;
        }
    }
</style>

<div class="container-fluid px-0">

    {{-- HERO --}}
    <section class="hero-section py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-9 text-center">

                    <div class="mb-4">
                        <span class="hero-badge">PLATFORM • ONLINE MUSIC COURSES</span>
                    </div>

                    <h1 class="hero-title mb-3">
                        Most Powerful Way To<br>
                        Learn Music From Every Mentor
                    </h1>

                    <p class="hero-subtitle">
                        Learn music courses globally in one flexible platform.
                    </p>

                    <div class="d-flex flex-wrap justify-content-center gap-3 hero-actions">
                        <a href="{{ route('courses.index') }}" class="btn btn-hero-primary">
                            Get Started
                        </a>
<<<<<<< HEAD
                        <a href="{{ route('contact') }}" class="btn btn-hero-outline">
=======
                        <a href="#step1" class="btn btn-hero-outline">
>>>>>>> ceaf9126595c83da507aaa6485195545493131c2
                            Contact Us
                        </a>
                    </div>

                    {{-- VIDEO --}}
                    <div class="hero-video-shell mb-5">
                        <video class="hero-video" autoplay muted loop playsinline controls>
                            <source src="{{ asset('vids/LA1.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>

                    {{-- GRID CARD --}}
                    <div class="hero-grid-wrapper">
                        <div class="row g-3 mb-3">
                            <div class="col-6 col-md-3">
                                <div class="hero-video-card"
                                     style="background-image:url('https://www.nordangliaeducation.com/sta-bangkok/-/media/sta-bangkok/freya-and-matt.jpg?h=668&w=1195&rev=33bc54f98f7644f09ee4aadf8897b044&hash=63E6470647FB7D4809D5D14311FD35D4');">
                                    <div class="hero-middle-row">
                                        <span class="hero-small-label">Best Mentor</span>
                                    </div>
                                    <div class="hero-video-content">
                                        <p class="mb-1 fw-semibold">Awarded Best Mentor</p>
                                        <div class="hero-meta">12 lessons • Guided practice</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-3">
                                <div class="hero-video-card"
                                     style="background-image:url('https://images.pexels.com/photos/797796/pexels-photo-797796.jpeg?auto=compress&cs=tinysrgb&w=800');">
                                    <div class="hero-middle-row">
                                        <span class="hero-small-label bg-success text-white">Tutorials</span>
                                    </div>
                                    <div class="hero-video-content">
                                        <p class="mb-1 fw-semibold">Groovy Guitar Riffs</p>
                                        <div class="hero-meta">New • Pop &amp; R&amp;B styles</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-3">
                                <div class="hero-video-card"
                                     style="background-image:url('https://images.pexels.com/photos/8101502/pexels-photo-8101502.jpeg?auto=compress&cs=tinysrgb&w=800');">
                                    <div class="hero-middle-row">
                                        <span class="hero-small-label bg-danger text-white">Live</span>
                                    </div>
                                    <div class="hero-video-content">
                                        <p class="mb-1 fw-semibold">Band Rehearsal Session</p>
                                        <div class="hero-meta">Streaming now • Q&amp;A</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-3">
                                <div class="hero-video-card"
                                     style="background-image:url('https://images.pexels.com/photos/1047442/pexels-photo-1047442.jpeg?auto=compress&cs=tinysrgb&w=800');">
                                    <div class="hero-middle-row">
                                        <span class="hero-small-label">Vocal</span>
                                    </div>
                                    <div class="hero-video-content">
                                        <p class="mb-1 fw-semibold">Vocal Warm-Ups</p>
                                        <div class="hero-meta">5-minute daily routine</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 justify-content-center">
                            <div class="col-6 col-md-3">
                                <div class="hero-video-card"
                                     style="background-image:url('https://images.pexels.com/photos/6898859/pexels-photo-6898859.jpeg?auto=compress&cs=tinysrgb&w=800');">
                                    <div class="hero-middle-row">
                                        <span class="hero-small-label bg-warning text-dark">New</span>
                                    </div>
                                    <div class="hero-video-content">
                                        <p class="mb-1 fw-semibold">Lo-Fi Beat Making</p>
                                        <div class="hero-meta">Ableton &amp; FL Studio</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-3">
                                <div class="hero-video-card"
                                     style="background-image:url('https://images.pexels.com/photos/1647161/pexels-photo-1647161.jpeg?auto=compress&cs=tinysrgb&w=800');">
                                    <div class="hero-middle-row">
                                        <span class="hero-small-label bg-light text-dark">
                                            20+ Happy Learners
                                        </span>
                                    </div>
                                    <div class="hero-video-content">
                                        <p class="mb-1 fw-semibold">Indie Songwriting Lab</p>
                                        <div class="hero-meta">Project-based learning</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-3">
                                <div class="hero-video-card"
                                     style="background-image:url('https://images.pexels.com/photos/3587478/pexels-photo-3587478.jpeg?auto=compress&cs=tinysrgb&w=800');">
                                    <div class="hero-middle-row">
                                        <span class="hero-small-label">Recruitment</span>
                                    </div>
                                    <div class="hero-video-content">
                                        <p class="mb-1 fw-semibold">Mentor Spotlight</p>
                                        <div class="hero-meta">Meet our instructors</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> {{-- hero-grid-wrapper --}}
                </div>
            </div>
        </div>
    </section>

    {{-- KNOW MORE ABOUT US – SLIDER --}}
    <section class="info-section" id="step1">
        <div class="container">
            <div class="info-label">KNOW MORE ABOUT US</div>

            <div class="info-slider">
                <button type="button" class="info-arrow info-arrow-left" data-info-prev>‹</button>
                <button type="button" class="info-arrow info-arrow-right" data-info-next>›</button>

                {{-- SLIDE 1 --}}
                <div class="info-slide active">
                    <div class="info-card">
                        <div class="row align-items-center g-4">
                            <div class="col-lg-5 d-flex justify-content-center justify-content-lg-start">
                                <div class="live-mockup">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="live-window-dots">
                                            <span></span><span></span><span></span>
                                        </div>
                                        <small class="text-muted" style="font-size:0.75rem;">Track Setup</small>
                                    </div>

                                    <div class="mb-3">
                                        <div class="live-label">Choose focus</div>
                                        <div class="live-title">Build your first<br>learning track.</div>
                                    </div>

                                    <div class="live-platform-row active">
                                        <span>Piano Fundamentals</span>
                                        <div class="live-dot active"></div>
                                    </div>
                                    <div class="live-platform-row active">
                                        <span>Guitar Essentials</span>
                                        <div class="live-dot active"></div>
                                    </div>
                                    <div class="live-platform-row">
                                        <span>Vocal Warm-Ups</span>
                                        <div class="live-dot"></div>
                                    </div>
                                    <div class="live-platform-row">
                                        <span>Music Production</span>
                                        <div class="live-dot"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <span class="step-label-pill">TRACK SETUP</span>
                                <h2 class="step-title">Pick Your Learning Path</h2>
                                <p class="step-text mb-3">
                                    Mulai dengan fokus yang jelas. Pilih instrumen, level, dan gaya musik yang ingin kamu
                                    dalami, lalu MÉLORÉ akan menyusun modul menjadi satu jalur belajar yang runtut.
                                </p>
                                <p class="step-text mb-0">
                                    Kamu bisa menggabungkan piano, gitar, vokal, dan produksi musik dalam satu track sehingga
                                    latihan terasa terarah, bukan random lagi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SLIDE 2 --}}
                <div class="info-slide">
                    <div class="info-card">
                        <div class="row align-items-center g-4">
                            <div class="col-lg-5 d-flex justify-content-center justify-content-lg-start">
                                <div class="live-mockup">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="live-window-dots">
                                            <span></span><span></span><span></span>
                                        </div>
                                        <small class="text-muted" style="font-size:0.75rem;">Private Session</small>
                                    </div>

                                    <div class="mb-3">
                                        <div class="live-label">Contact options</div>
                                        <div class="live-title">Book private<br>learning with mentors.</div>
                                    </div>

                                    <div class="live-platform-row active">
                                        <span>1-on-1 Online Session</span>
                                        <div class="live-dot active"></div>
                                    </div>
                                    <div class="live-platform-row active">
                                        <span>Small Group Coaching</span>
                                        <div class="live-dot active"></div>
                                    </div>
                                    <div class="live-platform-row">
                                        <span>Band / Ensemble Clinic</span>
                                        <div class="live-dot"></div>
                                    </div>
                                    <div class="live-platform-row">
                                        <span>Custom Curriculum</span>
                                        <div class="live-dot"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <span class="step-label-pill">PRIVATE LEARNING</span>
                                <h2 class="step-title">Upgrade to Private Mentoring</h2>
                                <p class="step-text mb-3">
                                    Kalau kamu butuh perhatian ekstra, kamu bisa mengajukan sesi private dengan mentor pilihan.
                                    Cocok untuk persiapan ujian, audisi, atau project musik pribadi.
                                </p>
                                <p class="step-text mb-0">
                                    Hubungi tim MÉLORÉ untuk rekomendasi mentor, paket sesi, dan jadwal yang fleksibel
                                    mengikuti waktu kamu – semua tetap terhubung dengan progress di dalam platform.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div> {{-- .info-slider --}}
        </div>
    </section>

    {{-- PARTNERS --}}
    <section class="partners-section">
        <div class="container">
            <div class="partners-label">COMMUNITY &amp; PARTNERS</div>

            <div class="partners-row">
                <div class="partner-logo-text logo-1">CampusLab</div>
                <div class="partner-logo-text logo-2">Indosound_</div>
                <div class="partner-logo-text logo-3">MusicCorner</div>
                <div class="partner-logo-text logo-4">Choir Society</div>
                <div class="partner-logo-text logo-5">StudioNusantara</div>
            </div>
        </div>
    </section>

    {{-- MENTORS --}}
    <section class="mentors-section">
        <div class="container">
            <div class="mentors-label">LEARN WITH EXPERT</div>
            <h2 class="mentors-title">Meet the mentors guiding your journey</h2>

            <div class="mentors-grid">
                <div class="mentor-card">
                    <img class="mentor-photo" src="https://images.pexels.com/photos/1181519/pexels-photo-1181519.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Daniel Rafiq">
                    <div class="mentor-name">Daniel Rafiq</div>
                </div>
                <div class="mentor-card">
                    <img class="mentor-photo" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Aiko Tan">
                    <div class="mentor-name">Aiko Tan</div>
                </div>
                <div class="mentor-card">
                    <img class="mentor-photo" src="https://images.pexels.com/photos/8195301/pexels-photo-8195301.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Raka Pratama">
                    <div class="mentor-name">Raka Pratama</div>
                </div>
                <div class="mentor-card">
                    <img class="mentor-photo" src="https://images.pexels.com/photos/3824771/pexels-photo-3824771.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Maya Collins">
                    <div class="mentor-name">Maya Collins</div>
                </div>
            </div>
        </div>
    </section>

    {{-- JOIN THE COMMUNITY – COLLAGE --}}
    <section class="community-section">
        <div class="container">
            <h2 class="community-title">Join the community</h2>

            <div class="community-icons">
                <div class="community-icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/5968/5968756.png" alt="Discord">
                </div>
                <div class="community-icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp">
                </div>
                <div class="community-icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png" alt="YouTube">
                </div>
                <div class="community-icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/2111/2111646.png" alt="Telegram">
                </div>
            </div>

            <div class="community-grid">
                <div class="community-card stat left-stat">
                    <h3>700K+</h3>
                    <p>community members</p>
                </div>

                <div class="community-card mid-photo-top">
                    <img class="community-photo" src="https://images.pexels.com/photos/1181400/pexels-photo-1181400.jpeg?auto=compress&cs=tinysrgb&w=800" alt="">
                </div>

                <div class="community-card mid-photo-top2">
                    <img class="community-photo" src="https://images.pexels.com/photos/1181396/pexels-photo-1181396.jpeg?auto=compress&cs=tinysrgb&w=800" alt="">
                </div>

                <div class="community-card mid-photo-top3">
                    <img class="community-photo" src="https://images.pexels.com/photos/3861964/pexels-photo-3861964.jpeg?auto=compress&cs=tinysrgb&w=800" alt="">
                </div>

                <div class="community-card stat right-stat">
                    <h3>700K+</h3>
                    <p>community members</p>
                </div>

                <div class="community-card mid-photo-bottom-left">
                    <img class="community-photo" src="https://images.pexels.com/photos/1181414/pexels-photo-1181414.jpeg?auto=compress&cs=tinysrgb&w=800" alt="">
                </div>

                <div class="community-card stat orange mid-stat-center">
                    <h3>112</h3>
                    <p>Active music fellows</p>
                </div>

                <div class="community-card mid-photo-bottom-right">
                    <img class="community-photo" src="https://images.pexels.com/photos/1181370/pexels-photo-1181370.jpeg?auto=compress&cs=tinysrgb&w=800" alt="">
                </div>
            </div>
        </div>
    </section>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slides = document.querySelectorAll('.info-slide');
        let current = 0;

        function showSlide(index) {
            slides[current].classList.remove('active');
            current = (index + slides.length) % slides.length;
            slides[current].classList.add('active');
        }

        document.querySelectorAll('[data-info-prev]').forEach(btn => {
            btn.addEventListener('click', () => showSlide(current - 1));
        });

        document.querySelectorAll('[data-info-next]').forEach(btn => {
            btn.addEventListener('click', () => showSlide(current + 1));
        });
    });
</script>
@endsection
