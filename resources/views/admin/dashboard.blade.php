@extends('layouts.admin')

@section('title', 'Admin Dashboard - MÉLORÉ')

@section('content')
<h1 class="h3 mb-4">Dashboard</h1>

<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card text-bg-light">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">Total Users</h6>
                <h3 class="card-title mb-0">{{ $totalUsers }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-bg-light">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">Total Admins</h6>
                <h3 class="card-title mb-0">{{ $totalAdmins }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-bg-light">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">Total Courses</h6>
                <h3 class="card-title mb-0">{{ $totalCourses }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-bg-light">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">Total Instructors</h6>
                <h3 class="card-title mb-0">{{ $totalInstructors }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card text-bg-light">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">Total Lessons</h6>
                <h3 class="card-title mb-0">{{ $totalLessons }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-bg-light">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">Total Enrollments</h6>
                <h3 class="card-title mb-0">{{ $totalEnrollments }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header">
                Latest Registered Users
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Joined</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($latestUsers as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-muted text-center">
                                        No users yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header">
                Latest Courses
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Level</th>
                                <th>Price</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($latestCourses as $course)
                                <tr>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ $course->level }}</td>
                                    <td>${{ number_format($course->price, 2) }}</td>
                                    <td>{{ $course->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-muted text-center">
                                        No courses yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header">
                Latest Instructors
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Specialization</th>
                                <th>Courses</th>
                                <th>Joined</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($latestInstructors as $instructor)
                                <tr>
                                    <td>{{ $instructor->name }}</td>
                                    <td>{{ $instructor->specialization ?? '-' }}</td>
                                    <td>{{ $instructor->courses_count }}</td>
                                    <td>{{ $instructor->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-muted text-center">
                                        No instructors yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
