@extends('layouts.main')

@section('title', 'My Profile - MÉLORÉ')

@section('content')
<h1 class="h3 mb-4">My Profile</h1>

<div class="row">
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-header">
                User Information
            </div>
            <div class="card-body">
                <p class="mb-1"><strong>Name:</strong> {{ $user->name }}</p>
                <p class="mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="mb-1"><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-header">
                Learning Summary
            </div>
            <div class="card-body">
                <p class="mb-1">
                    <strong>Enrolled courses:</strong> {{ $enrolledCoursesCount }}
                </p>
                <a href="{{ route('profile.my-courses') }}" class="btn btn-primary mt-3">
                    View my courses
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
