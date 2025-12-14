@extends('layouts.main')

@section('title', 'All Courses - MÉLORÉ')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold h3 mb-0">All Courses</h1>

    {{-- SEARCH BAR --}}
    <form action="{{ route('courses.index') }}" method="GET" class="d-flex align-items-center gap-1">
        <input type="text"
               name="search"
               class="form-control rounded-pill me-2"
               placeholder="Search courses..."
               value="{{ request('search') }}">

        {{-- keep filter values --}}
        <input type="hidden" name="category" value="{{ request('category') }}">
        <input type="hidden" name="price" value="{{ request('price') }}">

        <button class="btn btn-dark btn-sm rounded-pill">Search</button>
    </form>
</div>

{{-- FILTER FORM --}}
<form action="{{ route('courses.index') }}" method="GET" class="row g-2 mb-4">
    {{-- keep search value --}}
    <input type="hidden" name="search" value="{{ request('search') }}">

    {{-- CATEGORY --}}
    <div class="col-md-4">
        <select name="category" class="form-select rounded-pill">
            <option value="">All Categories</option>
            <option value="guitar" {{ request('category') == 'guitar' ? 'selected' : '' }}>Guitar</option>
            <option value="drum" {{ request('category') == 'drum' ? 'selected' : '' }}>Drum</option>
            <option value="piano" {{ request('category') == 'piano' ? 'selected' : '' }}>Piano</option>
            <option value="vocal" {{ request('category') == 'vocal' ? 'selected' : '' }}>Vocal</option>
        </select>
    </div>

    {{-- PRICE --}}
    <div class="col-md-4">
        <select name="price" class="form-select rounded-pill">
            <option value="">All Prices</option>
            <option value="0-50000" {{ request('price') == '0-50000' ? 'selected' : '' }}>Rp 0 – RP 50.000</option>
            <option value="50000-100000" {{ request('price') == '50000-100000' ? 'selected' : '' }}>Rp 50.000 – Rp 100.000</option>
            <option value="100000-200000" {{ request('price') == '100000-200000' ? 'selected' : '' }}>Rp 100.000 – Rp 200.000</option>
            <option value="200000+" {{ request('price') == '200000+' ? 'selected' : '' }}>Rp 200.000+</option>
        </select>
    </div>

    {{-- FILTER BUTTON --}}
    <div class="col-md-4">
        <button class="btn btn-outline-dark rounded-pill">Filter</button>
    </div>
</form>

@if ($courses->isEmpty())
    <p class="text-muted">No courses available yet.</p>
@else
    <div class="row g-4">
        @foreach ($courses as $course)
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-3 h-100 hover-shadow transition">

                    {{-- Thumbnail --}}
                    @if ($course->thumbnail_url)
                        <img src="{{ $course->thumbnail_url }}"
                             class="card-img-top rounded-top-3"
                             style="height: 200px; object-fit: cover;"
                             alt="{{ $course->title }}">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center rounded-top-3"
                             style="height: 200px;">
                            <span class="text-muted">No image</span>
                        </div>
                    @endif

                    <div class="card-body d-flex flex-column">

                        <h5 class="fw-semibold mb-1">{{ $course->title }}</h5>

                        <p class="text-muted small mb-2">
                            {{ $course->category ?? 'General' }} • Level {{ $course->level }}
                        </p>

                        <p class="text-secondary mb-3 flex-grow-1">
                            {{ \Illuminate\Support\Str::limit($course->description, 80) }}
                        </p>

                        <div class="d-flex align-items-center justify-content-between mt-auto">
                            <span class="fw-bold text-dark fs-5">Rp{{ number_format($course->price, 2) }}</span>
                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-dark rounded-pill">
                                View
                            </a>
                        </div>

                    </div>

                    <div class="card-footer bg-white border-0 text-muted small pt-0">
                        {{ $course->lessons_count }} lessons
                    </div>

                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $courses->links() }}
    </div>
@endif

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
