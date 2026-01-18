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
            'experts' => 'LEARN WITH EXPERTS',
            'meetment' => 'Meet the mentors guiding your journey',
            'seemen' => 'See mentors →',
        ],
        'id' => [
            'experts' => 'BELAJAR BERSAMA PARA AHLI',
            'meetment' => 'Kenali para mentor yang membimbing perjalanan belajarmu',
            'seemen' => 'Lihat mentor →',
        ],
    ];

    $L = $t[$lang] ?? $t['en'];
@endphp

<section class="section mentors">
  <div class="container">
    <div class="section-label">{{ $L['experts'] }}</div>
    <h2 class="section-title">{{ $L['meetment'] }}</h2>

    <div class="mentor-grid">
      <div class="mcard">
        <img class="mimg" src="https://images.pexels.com/photos/1181519/pexels-photo-1181519.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Daniel Rafiq">
        <div class="mbody">
          <p class="mname">Evelyn H.</p>
          <p class="mrole">Guitar • Performance</p>
          <a class="mlink" href="{{ route('instructors.index') }}">{{ $L['seemen'] }}</a>
        </div>
      </div>

      <div class="mcard">
        <img class="mimg" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Aiko Tan">
        <div class="mbody">
          <p class="mname">Aiko Tan</p>
          <p class="mrole">Piano • Foundations</p>
          <a class="mlink" href="{{ route('instructors.index') }}">{{ $L['seemen'] }}</a>
        </div>
      </div>

      <div class="mcard">
        <img class="mimg" src="https://media.licdn.com/dms/image/v2/D5603AQErUl1eRgSIng/profile-displayphoto-crop_800_800/B56Zl6_hUxKEAI-/0/1758705098182?e=1767225600&v=beta&t=K_CKBhLS3WvPSR2zNOInUgvY1ZPXquiZozqPnBVuq-c" alt="Raka Pratama">
        <div class="mbody">
          <p class="mname">Stevie Adrian</p>
          <p class="mrole">Drums • Groove</p>
          <a class="mlink" href="{{ route('instructors.index') }}">{{ $L['seemen'] }}</a>
        </div>
      </div>

      <div class="mcard">
        <img class="mimg" src="https://images.pexels.com/photos/3824771/pexels-photo-3824771.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Maya Collins">
        <div class="mbody">
          <p class="mname">William Adrian</p>
          <p class="mrole">Vocal • Technique</p>
          <a class="mlink" href="{{ route('instructors.index') }}">{{ $L['seemen'] }}</a>
        </div>
      </div>
    </div>
  </div>
</section>
