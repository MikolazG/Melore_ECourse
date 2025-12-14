@extends('layouts.main')

@section('title', 'All Instructors - MÉLORÉ')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold h3 mb-0">Our Instructors</h1>

        {{-- SEARCH BAR --}}
        <form action="{{ route('instructors.index') }}" method="GET" class="d-flex">
            <input type="text"
                   name="search"
                   class="form-control rounded-pill me-2"
                   placeholder="Search instructors..."
                   value="{{ request('search') }}">
            <button class="btn btn-primary rounded-pill px-4">Search</button>
        </form>
    </div>

    @if ($instructors->isEmpty())
        <p class="text-muted">No instructors available yet.</p>
    @else
        <div class="row g-4">
            @foreach ($instructors as $instructor)
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 rounded-3 h-100 hover-shadow transition">

                        {{-- Instructor Image --}}
                        @if ($instructor->image_url)
                            <img src="{{ $instructor->image_url }}"
                                 class="card-img-top rounded-top-3"
                                 style="height: 300px; object-fit: cover;"
                                 alt="{{ $instructor->name }}">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center rounded-top-3"
                                 style="height: 300px;">
                                <i class="bi bi-person-circle text-muted" style="font-size: 100px;"></i>
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column">

                            <h5 class="fw-semibold mb-1">{{ $instructor->name }}</h5>

                            <p class="text-success small mb-2">
                                {{ $instructor->specialization ?? 'Music Instructor' }}
                            </p>

                            <p class="text-secondary mb-3 flex-grow-1">
                                {{ \Illuminate\Support\Str::limit($instructor->bio, 100) }}
                            </p>

                            <div class="d-flex align-items-center justify-content-between mt-auto">
                                <span class="text-muted small">
                                    {{ $instructor->courses_count ?? 0 }}
                                    {{ \Illuminate\Support\Str::plural('course', $instructor->courses_count ?? 0) }}
                                </span>
                                <a href="{{ route('instructors.show', $instructor->id) }}"
                                   class="btn btn-primary px-3 rounded-pill">
                                    View Profile
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $instructors->links() }}
        </div>
    @endif
</div>

{{-- Hover effect --}}
<style>
    .hover-shadow:hover {
        transform: translateY(-3px);
        box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.15) !important;
    }
    .transition {
        transition: all 0.2s ease-in-out;
    }
</style>
@endsection
