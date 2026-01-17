@extends('layouts.main')

@section('title', 'About Us - MÉLORÉ')

@section('content')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap');

  :root{
    --ink:#0b0b0f;
    --muted: rgba(2,6,23,.62);
    --line: rgba(2,6,23,.10);
    --soft: rgba(2,6,23,.04);
  }

  .about-wrap{
    font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
    background:#fff;
  }
  .about-hero{
    padding: 64px 0 34px;
  }
  .pill{
    display:inline-flex; align-items:center; gap:.5rem;
    border:1px solid var(--line);
    background: var(--soft);
    color: rgba(2,6,23,.72);
    border-radius: 999px;
    padding: .45rem .9rem;
    font-size: .8rem;
    font-weight: 600;
    letter-spacing: .08em;
    text-transform: uppercase;
  }
  .hero-title{
    font-family: "Playfair Display", serif;
    font-weight: 700;
    letter-spacing: -.03em;
    font-size: clamp(2.2rem, 4vw, 3.6rem);
    line-height: 1.1;
    color: var(--ink);
    margin: 16px 0 10px;
  }
  .hero-desc{
    color: var(--muted);
    font-size: 1.08rem;
    max-width: 760px;
    margin: 0 auto;
  }

  .section{
    padding: 34px 0;
  }
  .section-title{
    font-family: "Playfair Display", serif;
    font-weight: 700;
    letter-spacing: -.02em;
    color: var(--ink);
  }
  .section-desc{
    color: var(--muted);
  }

  .card-soft{
    border:1px solid var(--line);
    border-radius: 18px;
    background:#fff;
    box-shadow: 0 18px 45px rgba(2,6,23,.08);
  }
  .card-soft .card-body{ padding: 22px; }

  .mini-kicker{
    font-size:.85rem;
    color: rgba(2,6,23,.62);
    font-weight: 600;
    letter-spacing: .06em;
    text-transform: uppercase;
  }

  .feature{
    border:1px solid var(--line);
    border-radius: 18px;
    background:#fff;
    padding: 18px;
    height: 100%;
    box-shadow: 0 12px 30px rgba(2,6,23,.07);
  }
  .feature-icon{
    width:42px;height:42px;border-radius: 12px;
    display:flex;align-items:center;justify-content:center;
    background: rgba(2,6,23,.06);
    border:1px solid rgba(2,6,23,.10);
    font-size: 1.1rem;
    margin-bottom: 12px;
  }
  .feature h5{ margin:0 0 6px; font-weight: 700; color: var(--ink); }
  .feature p{ margin:0; color: var(--muted); font-size: .95rem; }

  .image-card{
    border-radius: 20px;
    overflow:hidden;
    border:1px solid var(--line);
    box-shadow: 0 20px 60px rgba(2,6,23,.10);
    background:#fff;
  }
  .image-card img{ width:100%; height: 420px; object-fit: cover; display:block; }
  @media (max-width: 992px){
    .image-card img{ height: 320px; }
  }

  .stats{
    border-radius: 20px;
    border:1px solid var(--line);
    background:
      radial-gradient(900px 420px at 10% 10%, rgba(0,0,0,.06), transparent 60%),
      radial-gradient(900px 420px at 90% 20%, rgba(0,0,0,.05), transparent 55%),
      #fff;
    box-shadow: 0 18px 55px rgba(2,6,23,.10);
    overflow:hidden;
  }
  .stat-item{
    padding: 22px 18px;
    text-align:center;
  }
  .stat-num{
    font-size: 2rem;
    font-weight: 800;
    letter-spacing: -.02em;
    color: var(--ink);
    margin: 0;
  }
  .stat-label{
    margin: 6px 0 0;
    color: var(--muted);
    font-weight: 500;
  }

  .cta{
    border-radius: 20px;
    border:1px solid var(--line);
    background: #fff;
    box-shadow: 0 18px 55px rgba(2,6,23,.10);
    padding: 28px;
    text-align:center;
  }
  .btn-pill{
    border-radius: 999px;
    padding: .85rem 1.1rem;
    font-weight: 700;
  }
  .btn-dark-pill{
    background: var(--ink);
    border:1px solid var(--ink);
    color:#fff;
  }
  .btn-dark-pill:hover{ background:#000; border-color:#000; color:#fff; }
  .btn-outline-pill{
    border-radius: 999px;
    padding: .85rem 1.1rem;
    font-weight: 700;
    border:1px solid rgba(2,6,23,.22);
  }
</style>

<div class="about-wrap">
  <div class="container">

    {{-- HERO --}}
    <section class="about-hero text-center">
      <span class="pill">ABOUT MÉLORÉ</span>
      <h1 class="hero-title">
        Learn Music With Clarity,<br class="d-none d-md-block">
        Build Confidence With Practice
      </h1>
      <p class="hero-desc">
        MÉLORÉ is a modern music learning platform built to help learners grow steadily—
        through structured lessons, real guidance, and a community that keeps you motivated.
      </p>
    </section>

    {{-- MISSION / VISION --}}
    <section class="section">
      <div class="row g-4">
        <div class="col-lg-6">
          <div class="card-soft h-100">
            <div class="card-body">
              <div class="mini-kicker mb-2">Mission</div>
              <h3 class="section-title h4 mb-2">Make music learning accessible and enjoyable.</h3>
              <p class="section-desc mb-0">
                We help learners progress with clear paths, flexible pacing, and lessons that focus on real skill—not confusion.
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card-soft h-100">
            <div class="card-body">
              <div class="mini-kicker mb-2">Vision</div>
              <h3 class="section-title h4 mb-2">A global home for musicians to grow together.</h3>
              <p class="section-desc mb-0">
                From beginner to advanced, we want every musician to feel supported, inspired, and proud of their progress.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- STORY --}}
    <section class="section">
      <div class="row align-items-center g-4 g-lg-5">
        <div class="col-lg-6">
          <div class="mini-kicker mb-2">Our Story</div>
          <h2 class="section-title mb-3">Why MÉLORÉ exists</h2>
          <p class="section-desc mb-3">
            We started with a simple frustration: learning music online often feels scattered—too many resources, too little direction.
          </p>
          <p class="section-desc mb-3">
            MÉLORÉ was designed to be the opposite: structured courses, practical exercises, and feedback that keeps you moving forward.
          </p>
          <p class="section-desc mb-0">
            Whether you’re learning an instrument, theory, or production, our goal is the same: help you grow with confidence—one lesson at a time.
          </p>
        </div>

        <div class="col-lg-6">
          <div class="image-card">
            <img
              src="https://images.pexels.com/photos/1407322/pexels-photo-1407322.jpeg?auto=compress&cs=tinysrgb&w=1200"
              alt="Music learning"
            >
          </div>
        </div>
      </div>
    </section>

    {{-- VALUES --}}
    <section class="section">
      <div class="text-center mb-4">
        <div class="mini-kicker mb-2">Values</div>
        <h2 class="section-title mb-2">What we stand for</h2>
        <p class="section-desc mb-0">Simple principles that guide every course we build.</p>
      </div>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="feature">
            <div class="feature-icon">1</div>
            <h5>Quality</h5>
            <p>Lessons are structured, practical, and built to make progress feel real.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature">
            <div class="feature-icon">2</div>
            <h5>Access</h5>
            <p>Learn anywhere, anytime—without rigid schedules or complicated setup.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature">
            <div class="feature-icon">3</div>
            <h5>Support</h5>
            <p>A community-driven approach where learners feel encouraged to keep going.</p>
          </div>
        </div>
      </div>
    </section>

    {{-- STATS --}}
    <section class="section">
      <div class="stats">
        <div class="row g-0">
          <div class="col-6 col-md-3"><div class="stat-item">
            <p class="stat-num">10k+</p>
            <p class="stat-label">Learners</p>
          </div></div>
          <div class="col-6 col-md-3"><div class="stat-item">
            <p class="stat-num">500+</p>
            <p class="stat-label">Courses</p>
          </div></div>
          <div class="col-6 col-md-3"><div class="stat-item">
            <p class="stat-num">100+</p>
            <p class="stat-label">Instructors</p>
          </div></div>
          <div class="col-6 col-md-3"><div class="stat-item">
            <p class="stat-num">50+</p>
            <p class="stat-label">Countries</p>
          </div></div>
        </div>
      </div>
    </section>

    {{-- CTA --}}
    <section class="section pb-5">
      <div class="cta">
        <h3 class="section-title mb-2">Ready to start?</h3>
        <p class="section-desc mb-4">Explore courses and begin your journey with MÉLORÉ today.</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
          <a href="{{ route('courses.index') }}" class="btn btn-dark btn-dark-pill btn-pill">
            Browse Courses
          </a>
          <a href="{{ route('contact') }}" class="btn btn-outline-dark btn-outline-pill">
            Contact Us
          </a>
        </div>
      </div>
    </section>

  </div>
</div>
@endsection
