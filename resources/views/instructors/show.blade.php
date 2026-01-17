@extends('layouts.main')

@section('title', $instructor->name . ' | MÉLORÉ Instructor')

@section('content')
<div class="container py-5">
    <div class="row g-5">

        {{-- MAIN COLUMN --}}
        <div class="col-lg-8">

            {{-- Instructor Info --}}
            <h1 class="fw-bold mb-2">{{ $instructor->name }}</h1>
            <p class="text-success mb-3 fs-5">
                {{ $instructor->specialization ?? 'Music Instructor' }}
            </p>

            {{-- Bio --}}
            <h4 class="fw-semibold mt-4 mb-3">About</h4>
            <p class="text-secondary mb-4">
                {{ $instructor->bio ?? 'No bio available.' }}
            </p>

        </div>

        {{-- SIDEBAR --}}
        <div class="col-lg-4">
            <div class="card shadow-lg border-0 rounded-4">

                @if ($instructor->image_url)
                    <img src="{{ $instructor->image_url }}"
                         class="card-img-top rounded-top-4"
                         style="height: 400px; object-fit: cover;"
                         alt="{{ $instructor->name }}">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded-top-4"
                         style="height: 400px;">
                        <i class="bi bi-person-circle text-muted" style="font-size: 150px;"></i>
                    </div>
                @endif

                <div class="card-body">
                    <h4 class="fw-bold mb-2">{{ $instructor->name }}</h4>
                    <p class="text-success mb-3">{{ $instructor->specialization ?? 'Music Instructor' }}</p>

                    @if ($instructor->email)
                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">Contact</small>
                            <a href="mailto:{{ $instructor->email }}" class="text-decoration-none">
                                {{ $instructor->email }}
                            </a>
                        </div>
                    @endif

                    @if (!empty($instructor->social_links))
                        <div class="mt-3">
                            <small class="text-muted d-block mb-2">Connect</small>
                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle">
                                    <i class="bi bi-instagram"></i>
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle">
                                    <i class="bi bi-youtube"></i>
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
