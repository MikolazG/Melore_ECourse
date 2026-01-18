@php
    $isHome    = request()->routeIs('home');
    $isCourses = request()->routeIs('courses.*');
    $isProfile = request()->routeIs('profile.*')
        || request()->routeIs('login')
        || request()->routeIs('register');

    // current language (default EN)
    $lang = session('lang', 'en');

    // label dictionary
    $t = [
        'en' => [
            'badge' => 'Platform • Online Music Courses',
            'title' => 'Learn Music Smarter, With Mentors Who Actually Guide You',
            'subtitle' => 'One platform for structured music learning — tracks, mentors, and a community that keeps you consistent.',
            'get_started' => 'Get Started',
            'contact' => 'Contact Us',
            'featured' => 'Featured • Student Journey',
            'videotag' => 'Your browser does not support the video tag.',
            'practice' => 'Practice that feels directed.',
            'follow' => 'Follow a track, watch lessons, get feedback, repeat.',
            'mentor' => 'Mentor breakdown • Ask anything in the comments',

        ],
        'id' => [
            'badge' => 'Platform • Kursus Musik Online',
            'title' => 'Belajar Musik Lebih Cerdas, Dengan Mentor yang Benar-Benar Membimbing',
            'subtitle' => 'Satu platform untuk pembelajaran musik terstruktur — jalur belajar, mentor, dan komunitas yang menjaga konsistensi Anda.',
            'get_started' => 'Mulai Sekarang',
            'contact' => 'Hubungi Kami',
            'featured' => 'Unggulan • Perjalanan Murid',
            'videotag' => 'Browser Anda tidak mendukung tag video.',
            'practice' => 'Latihan yang terasa terarah.',
            'follow' => 'Ikuti sebuah trek, tonton pelajaran, dapatkan umpan balik, ulangi.',
            'mentor' => 'Penjelasan mentor • Tanyakan apa saja di kolom komentar',
        ],
    ];

    $L = $t[$lang] ?? $t['en'];
@endphp

<section class="hero">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 text-center">
        <div class="d-inline-block">
          <span class="badge-pill"><span class="badge-dot"></span> {{ $L['badge'] }}</span>
        </div>

        <h1 class="hero-title">
          <!-- {{ __('landing.title') }} -->
          {{ $L['title'] }}
        </h1>

        <p class="hero-sub">
          {{ $L['subtitle'] }}
        </p>

        <div class="d-flex flex-wrap justify-content-center gap-3 hero-actions">
          <a href="{{ route('courses.index') }}" class="btn btn-pill btn-primary-modern">
            {{ $L['get_started'] }}
          </a>
          <a href="{{ route('contact') }}" class="btn btn-pill btn-outline-modern">
            {{ $L['contact'] }}
          </a>
        </div>

        <div class="video-wrap">
          <div class="video-topbar">
            <div class="win-dots"><span></span><span></span><span></span></div>
            <span class="video-chip">{{ $L['featured'] }}</span>
          </div>

          <video class="hero-video" autoplay muted loop playsinline controls>
            <source src="{{ asset('vids/LA1.mp4') }}" type="video/mp4">
            {{ $L['videotag'] }}
          </video>

          <div class="video-cta">
            <h5 class="mb-1">{{ $L['practice'] }}</h5>
            <p>{{ $L['follow'] }}</p>
          </div>
        </div>

        <div class="hero-cards">
          <div class="row g-3">
            <div class="col-6 col-md-3">
              <div class="hcard" style="background-image:url('https://www.nordangliaeducation.com/sta-bangkok/-/media/sta-bangkok/freya-and-matt.jpg?h=668&w=1195&rev=33bc54f98f7644f09ee4aadf8897b044&hash=63E6470647FB7D4809D5D14311FD35D4');">
                <div class="hcard-body">
                  <span class="hpill">Best Mentor</span>
                  <div class="htitle">Awarded Mentors</div>
                  <div class="hmeta">Curated guidance • Weekly focus</div>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-3">
              <div class="hcard" style="background-image:url('https://pax.org/images/newsletter/October_2023/Umar-Indonesia-800x450-WA-talent_contest-photo.jpg');">
                <div class="hcard-body">
                  <span class="hpill success">Tutorials</span>
                  <div class="htitle">Guitar Riffs</div>
                  <div class="hmeta">Pop &amp; R&amp;B • New weekly</div>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-3">
              <div class="hcard" style="background-image:url('https://images.pexels.com/photos/8101502/pexels-photo-8101502.jpeg?auto=compress&cs=tinysrgb&w=800');">
                <div class="hcard-body">
                  <span class="hpill danger">24/7 Answer</span>
                  <div class="htitle">Q&amp;A Session</div>
                  <div class="hmeta">{{ $L['mentor'] }}</div>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-3">
              <div class="hcard" style="background-image:url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfY7TpTPKXlMlnFhsRDkkhnCPq1zd4krYU5g&s');">
                <div class="hcard-body">
                  <span class="hpill">Vocal</span>
                  <div class="htitle">Warm-Ups</div>
                  <div class="hmeta">5 minutes • Daily routine</div>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4">
              <div class="hcard" style="min-height:180px;background-image:url('https://www.image-line.com/static/assets/fl-studio-og-image.eab349c.jpg');">
                <div class="hcard-body">
                  <span class="hpill warning">New</span>
                  <div class="htitle">Beat Making</div>
                  <div class="hmeta">FL Studio • Ableton</div>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4">
              <div class="hcard" style="min-height:180px;background-image:url('https://img.freepik.com/premium-photo/african-black-children-playing-piano-music-instrument-happy-smiling_43300-4085.jpg?semt=ais_hybrid&w=740&q=80');">
                <div class="hcard-body">
                  <span class="hpill">Community</span>
                  <div class="htitle">Project Lab</div>
                  <div class="hmeta">Build songs • Get feedback</div>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4">
              <div class="hcard" style="min-height:180px;background-image:url('https://img.freepik.com/free-photo/smiling-teacher-classroom_23-2151983449.jpg?semt=ais_hybrid&w=740&q=80');">
                <div class="hcard-body">
                  <span class="hpill">Mentors</span>
                  <div class="htitle">Spotlight</div>
                  <div class="hmeta">Meet the instructors</div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>