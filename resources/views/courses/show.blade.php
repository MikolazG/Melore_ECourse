@extends('layouts.main')

@section('title', $course->title . ' | MÉLORÉ')

@section('content')
@php
  $defaultLessonId = null;
  $defaultEmbed = null;
  $defaultOriginal = null;
  $defaultLocal = null;

  $normalizeEmbed = function($url) {
    if (!$url) return null;
    $v = $url;

    if (str_contains($v, 'youtube.com/watch')) {
      $v = preg_replace('#https?://(www\.)?youtube\.com/watch\?v=([^&]+).*#', 'https://www.youtube.com/embed/$2', $v);
    } elseif (str_contains($v, 'youtu.be/')) {
      $v = preg_replace('#https?://(www\.)?youtu\.be/([^?]+).*#', 'https://www.youtube.com/embed/$2', $v);
    }
    return $v;
  };

  if (!empty($course->video_url)) {
    $defaultOriginal = $course->video_url;
    $defaultEmbed = $normalizeEmbed($course->video_url);
  } else {
    foreach ($lessons as $ls) {
      $local = !empty($ls->video_path) ? \Illuminate\Support\Facades\Storage::url($ls->video_path) : null;
      $embed = $normalizeEmbed($ls->video_url);
      if ($local || $embed) {
        $defaultLessonId = $ls->id;
        $defaultLocal = $local;
        $defaultEmbed = $embed;
        $defaultOriginal = $ls->video_url;
        break;
      }
    }
  }

  $isPaidCourse = (float)$course->price > 0;
@endphp

<div class="container py-5">
  <div class="row g-5">

    <div class="col-lg-8">

      <h1 class="fw-bold mb-2">{{ $course->title }}</h1>
      <p class="text-muted mb-3">{{ $course->category }} • Level {{ $course->level }}</p>
      <p class="text-secondary mb-4">{{ $course->description }}</p>

      <div class="rounded-4 overflow-hidden mb-3 shadow-sm" style="border:1px solid rgba(0,0,0,.08); background:#fff;">
        <div class="ratio ratio-16x9" id="videoFrameWrap" style="display:none;">
          <iframe id="coursePlayer" src="" allowfullscreen
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share">
          </iframe>
        </div>

        <div id="localVideoWrap" style="display:none;">
          <video id="localPlayer" controls style="width:100%; height:auto; display:block;">
            <source id="localSource" src="">
          </video>
        </div>

        <div id="noVideoWrap" class="p-4 text-center text-muted" style="display:none;">
          No video available for this course / lesson.
        </div>
      </div>

      <p class="small text-muted mb-4" id="watchOnYoutube" style="display:none;">
        If the video cannot be played, you may
        <a href="#" target="_blank" id="watchLink">watch it on YouTube</a>.
      </p>

      <h4 class="fw-semibold mt-4 mb-3">Lessons</h4>

      @if ($lessons->isEmpty())
        <div class="alert alert-dark rounded-4 p-3">
          This course doesn’t have any lessons yet.
        </div>
      @else
        <div class="list-group rounded-4 shadow-sm overflow-hidden" id="lessonList">
          @foreach ($lessons as $lesson)
            @php
              $original = $lesson->video_url;
              $embed = $normalizeEmbed($original);

              $local = !empty($lesson->video_path)
                ? \Illuminate\Support\Facades\Storage::url($lesson->video_path)
                : null;

              $hasVideo = !empty($embed) || !empty($local);

              $locked = !$isEnrolled;
            @endphp

            <button
              type="button"
              class="list-group-item list-group-item-action py-3 text-start {{ $locked ? 'disabled' : '' }}"
              data-locked="{{ $locked ? '1' : '0' }}"
              data-lesson-id="{{ $lesson->id }}"
              data-video-embed="{{ $embed ?? '' }}"
              data-video-original="{{ $original ?? '' }}"
              data-video-local="{{ $local ?? '' }}"
              @if($locked) disabled @endif
              style="{{ $locked ? 'cursor:not-allowed; opacity:.65;' : '' }}"
            >
              <div class="d-flex justify-content-between align-items-start gap-3">
                <div>
                  <h5 class="mb-1 fw-semibold">{{ $loop->iteration }}. {{ $lesson->title }}</h5>

                  @if ($lesson->description)
                    <p class="text-muted small mb-1">{{ $lesson->description }}</p>
                  @endif

                  @if($locked)
                    <div class="small text-muted">Complete payment to unlock lessons.</div>
                  @endif
                </div>

                @if ($hasVideo)
                  <span class="badge bg-primary rounded-pill align-self-start">Video</span>
                @endif
              </div>
            </button>
          @endforeach
        </div>
      @endif

    </div>

    <div class="col-lg-4">
      <div class="card shadow-sm border border-2 border-dark-subtle rounded-4 mb-4">
        @if ($course->thumbnail_url)
          <img src="{{ $course->thumbnail_url }}" class="card-img-top rounded-top-4"
               style="height: 200px; object-fit: cover;">
        @endif

        <div class="card-body">
          <h3 class="fw-bold mb-2">Rp{{ number_format($course->price, 2) }}</h3>

          <p class="text-muted mb-3">
            {{ $lessons->count() }} {{ \Illuminate\Support\Str::plural('lesson', $lessons->count()) }}
          </p>

          @guest
            <p class="small text-muted mb-3">Please login to enroll.</p>
            <div class="d-grid gap-2">
              <a href="{{ route('login') }}" class="btn btn-primary rounded-pill">Login</a>
              <a href="{{ route('register') }}" class="btn btn-outline-secondary rounded-pill">Register</a>
            </div>
          @else
            @if ($isEnrolled)
              <div class="d-grid gap-2">
                <button class="btn btn-success rounded-pill" disabled>Enrolled</button>
              </div>
            @else
              <div class="d-grid gap-2">
                @if($isPaidCourse)
                  <a href="{{ route('payments.checkout', $course) }}" class="btn btn-dark rounded-pill w-100">
                    Pay & Enroll
                  </a>
                @else
                  <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-dark rounded-pill w-100" type="submit">
                      Enroll now
                    </button>
                  </form>
                @endif
              </div>
            @endif
          @endguest
        </div>
      </div>

      <div class="card shadow-sm border border-2 border-secondary-subtle rounded-4">
        <div class="card-body">
          <h5 class="fw-semibold mb-3">Comments</h5>

          @auth
            @if($isEnrolled)
              <form action="{{ route('comments.store', $course) }}" method="POST" class="mb-3">
                @csrf
                <textarea name="content" class="form-control rounded-3 mb-2" rows="3"
                          placeholder="Write your comment..." required></textarea>
                <button class="btn btn-dark btn-sm rounded-pill w-100">Post</button>
              </form>
            @else
              <p class="small text-muted">Complete payment to write a comment.</p>
            @endif
          @else
            <p class="small text-muted">Login to see and write comments.</p>
          @endauth

          @forelse($comments as $comment)
            <div class="border-top pt-3 mt-3">
              <strong class="small">{{ $comment->user->name ?? 'User' }}</strong>
              <p class="small text-muted mb-1">{{ $comment->created_at->diffForHumans() }}</p>
              <p class="mb-0">{{ $comment->content }}</p>
            </div>
          @empty
            <p class="small text-muted mt-3">No comments yet.</p>
          @endforelse
        </div>
      </div>
    </div>

  </div>
</div>

<script>
  const frameWrap = document.getElementById('videoFrameWrap');
  const iframe = document.getElementById('coursePlayer');

  const localWrap = document.getElementById('localVideoWrap');
  const localPlayer = document.getElementById('localPlayer');
  const localSource = document.getElementById('localSource');

  const noVideoWrap = document.getElementById('noVideoWrap');

  const watchOnYoutube = document.getElementById('watchOnYoutube');
  const watchLink = document.getElementById('watchLink');

  function showNoVideo(){
    frameWrap.style.display = 'none';
    localWrap.style.display = 'none';
    noVideoWrap.style.display = 'block';
    watchOnYoutube.style.display = 'none';

    iframe.src = '';
    localPlayer.pause();
    localSource.src = '';
    localPlayer.load();
  }

  function playEmbed(embedUrl, originalUrl){
    noVideoWrap.style.display = 'none';
    localWrap.style.display = 'none';
    frameWrap.style.display = 'block';

    localPlayer.pause();
    localSource.src = '';
    localPlayer.load();

    iframe.src = embedUrl || '';

    if (originalUrl) {
      watchLink.href = originalUrl;
      watchOnYoutube.style.display = 'block';
    } else {
      watchOnYoutube.style.display = 'none';
    }
  }

  function playLocal(localUrl){
    noVideoWrap.style.display = 'none';
    frameWrap.style.display = 'none';
    localWrap.style.display = 'block';
    watchOnYoutube.style.display = 'none';

    iframe.src = '';
    localSource.src = localUrl;

    localPlayer.load();
    localPlayer.play().catch(()=>{});
  }

  const isEnrolled = @json($isEnrolled);
  const defaultLessonId = @json($defaultLessonId);
  const defaultEmbed = @json($defaultEmbed);
  const defaultOriginal = @json($defaultOriginal);
  const defaultLocal = @json($defaultLocal);

  document.querySelectorAll('#lessonList button.list-group-item').forEach(btn => {
    btn.addEventListener('click', () => {
      if (!isEnrolled || btn.dataset.locked === '1') return;

      document.querySelectorAll('#lessonList button.list-group-item')
        .forEach(x => x.classList.remove('active'));

      btn.classList.add('active');

      const embed = btn.dataset.videoEmbed;
      const original = btn.dataset.videoOriginal;
      const local = btn.dataset.videoLocal;

      if (local) return playLocal(local);
      if (embed) return playEmbed(embed, original);
      return showNoVideo();
    });
  });

  if (defaultLocal) playLocal(defaultLocal);
  else if (defaultEmbed) playEmbed(defaultEmbed, defaultOriginal);
  else showNoVideo();

  if (isEnrolled && defaultLessonId) {
    const defBtn = document.querySelector(`#lessonList button[data-lesson-id="${defaultLessonId}"]`);
    if (defBtn) defBtn.classList.add('active');
  }
</script>
@endsection
