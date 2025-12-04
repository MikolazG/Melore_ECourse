@extends('layouts.main')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/course.css') }}">
@endpush

@section('content')

<h2 class="section-title">Begin your learning journey today</h2>

<div class="category-buttons">
    <button class="category active">Guitar</button>
    <button class="category">Piano</button>
    <button class="category">Drum</button>
</div>

<div class="course-grid">
    @foreach($courses as $course)
        <div class="course-card">
        <img class="course-img" src="{{ asset('images/guitar.png') }}" alt="Course Image">

            <div class="card-inner">
                <h3 class="course-title">Guitar Mastery Course</h3>
                <p class="course-desc">Learn the essential techniques, chords, and rhythms to confidently play guitar in any style.</p>
                <button class="price-btn">Rp. 100.000</button>

                <h3 class="course-title">{{ $course->title }}</h3>
                <p class="course-desc">{{ $course->description }}</p>
                <button class="price-btn">Rp {{ number_format($course->price, 0, ',', '.') }}</button>
            </div>
            
        </div>
    @endforeach
</div>

@endsection