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
            'know' => 'KNOW MORE ABOUT US',
            'design' => 'Designed for real progress, not random learning',

            'track' => 'Track Setup',
            'focus' => 'Choose focus',
            'build' => 'Build your first learning track.',
            'piano' => 'Piano Fundamentals',
            'guitar' => 'Guitar Essentials',
            'vocal' => 'Vocal Warm-Ups',
            'music' => 'Music Production',
            'setup' => 'TRACK SETUP',
            'pick' => 'Pick Your Learning Path',
            'start' => 'Start with a clear focus. Choose the instrument, level, and music style you want to explore,then MÉLORÉ will arrange the modules into a structured learning path.',
            'you' => 'You can combine piano, guitar, vocals, and even music production in a single track.',

            'private' => 'Private Session',
            'contact' => 'Contact options',
            'book' => 'Book mentoring with mentors.',
            'oneone' => '1-on-1 Online Session',
            'small' => 'Small Group Coaching',
            'band' => 'Band / Ensemble Clinic',
            'custom' => 'Custom Curriculum',

            'plearning' => 'PRIVATE LEARNING',
            'upgradeto' => 'Upgrade to Private Mentoring',
            'ifyou' => 'If you need extra attention, you can request a private session with your preferred mentor. Ideal for exam preparation, auditions, or personal music projects.',
            'all' => 'Everything stays connected to your learning progress on the platform, so your practice remains structured.',
            
        ],
        'id' => [
            'know' => 'KENALI LEBIH LANJUT TENTANG KAMI',
            'design' => 'Dirancang untuk kemajuan nyata, bukan pembelajaran acak',

            'track' => 'Pengaturan Track',
            'focus' => 'Pilih fokus',
            'build' => 'Bangun track pembelajaran pertamamu.',
            'piano' => 'Dasar-Dasar Piano',
            'guitar' => 'Dasar-Dasar Gitar',
            'vocal' => 'Pemanasan Vokal',
            'music' => 'Produksi Musik',
            'setup' => 'PENGATURAN TRACK',
            'pick' => 'Pilih Jalur Belajarmu',
            'start' => 'Mulai dengan fokus yang jelas. Pilih instrumen, level, dan gaya musik yang ingin kamu dalami, lalu MÉLORÉ menyusun modul jadi jalur belajar yang runtut.',
            'you' => 'Kamu bisa gabungkan piano, gitar, vokal, sampai produksi musik dalam satu track.',

            'private' => 'Sesi Privat',
            'contact' => 'Opsi Kontak',
            'book' => 'Pesan sesi mentoring dengan mentor.',
            'oneone' => 'Sesi Online 1-on-1',
            'small' => 'Coaching Kelompok Kecil',
            'band' => 'Klinik Band / Ansambel',
            'custom' => 'Kurikulum Kustom',

            'plearning' => 'PEMBELAJARAN PRIVAT',
            'upgradeto' => 'Upgrade ke Mentoring Privat',
            'ifyou' => 'Jika membutuhkan perhatian ekstra, kamu dapat mengajukan sesi privat dengan mentor pilihan. Cocok untuk persiapan ujian, audisi, atau proyek musik pribadi.',
            'all' => 'Semua tetap terintegrasi dengan progres belajarmu di platform, sehingga latihan tetap terarah.',

        ],
    ];

    $L = $t[$lang] ?? $t['en'];
@endphp

<section class="section info-area" id="step1">
  <div class="container">
    <div class="section-label">{{ $L['know'] }}</div>
    <h2 class="section-title">{{ $L['design'] }}</h2>

    <div class="slider-shell">
      <button type="button" class="arrow left" data-info-prev>‹</button>
      <button type="button" class="arrow right" data-info-next>›</button>

      <div class="info-slide active">
        <div class="info-card">
          <div class="row align-items-center g-4">
            <div class="col-lg-5">
              <div class="live">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <div class="win-dots"><span></span><span></span><span></span></div>
                  <small class="text-muted" style="font-size:.8rem;">{{ $L['track'] }}</small>
                </div>

                <div class="mb-3">
                  <div style="font-size:.78rem; letter-spacing:.16em; text-transform:uppercase; color:rgba(255,255,255,.7);">{{ $L['focus'] }}</div>
                  <div style="font-weight:800; font-size:1.1rem;">{{ $L['build'] }}</div>
                </div>

                <div class="live-row active">
                  <span>{{ $L['piano'] }}</span>
                  <div class="live-dot active"></div>
                </div>
                <div class="live-row active">
                  <span>{{ $L['guitar'] }}</span>
                  <div class="live-dot active"></div>
                </div>
                <div class="live-row">
                  <span>{{ $L['vocal'] }}</span>
                  <div class="live-dot"></div>
                </div>
                <div class="live-row">
                  <span>{{ $L['music'] }}</span>
                  <div class="live-dot"></div>
                </div>
              </div>
            </div>

            <div class="col-lg-7">
              <span class="step-pill">{{ $L['setup'] }}</span>
              <h3 class="step-h">{{ $L['pick'] }}</h3>
              <p class="step-p mb-3">
               {{ $L['start'] }}
              </p>
              <p class="step-p mb-0">
                {{ $L['you'] }}
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="info-slide">
        <div class="info-card">
          <div class="row align-items-center g-4">
            <div class="col-lg-5">
              <div class="live">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <div class="win-dots"><span></span><span></span><span></span></div>
                  <small class="text-muted" style="font-size:.8rem;">{{ $L['private'] }}</small>
                </div>

                <div class="mb-3">
                  <div style="font-size:.78rem; letter-spacing:.16em; text-transform:uppercase; color:rgba(255,255,255,.7);">{{ $L['contact'] }}</div>
                  <div style="font-weight:800; font-size:1.1rem;">{{ $L['book'] }}</div>
                </div>

                <div class="live-row active">
                  <span>{{ $L['oneone'] }}</span>
                  <div class="live-dot active"></div>
                </div>
                <div class="live-row active">
                  <span>{{ $L['small'] }}</span>
                  <div class="live-dot active"></div>
                </div>
                <div class="live-row">
                  <span>{{ $L['band'] }}</span>
                  <div class="live-dot"></div>
                </div>
                <div class="live-row">
                  <span>{{ $L['custom'] }}</span>
                  <div class="live-dot"></div>
                </div>
              </div>
            </div>

            <div class="col-lg-7">
              <span class="step-pill">{{ $L['plearning'] }}</span>
              <h3 class="step-h">{{ $L['upgradeto'] }}</h3>
              <p class="step-p mb-3">
                {{ $L['ifyou'] }}
              </p>
              <p class="step-p mb-0">
                {{ $L['all'] }}
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="dots" aria-hidden="true">
        <div class="dot active" data-dot="0"></div>
        <div class="dot" data-dot="1"></div>
      </div>
    </div>
  </div>
</section>
