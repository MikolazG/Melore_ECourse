@extends('layouts.admin')

@section('title', 'Manage Courses - MÉLORÉ')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Courses</h1>
    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
        Create course
    </a>
</div>

@if ($courses->isEmpty())
    <p class="text-muted">No courses found.</p>
@else
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Level</th>
                    <th>Price</th>
                    <th>Created</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->level }}</td>
                        <td>Rp{{ number_format($course->price, 2) }}</td>
                        <td>{{ $course->created_at->format('Y-m-d') }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.courses.lessons.index', $course->id) }}"
                               class="btn btn-sm btn-outline-secondary">
                                Lessons
                            </a>
                            <a href="{{ route('admin.courses.edit', $course->id) }}"
                               class="btn btn-sm btn-outline-primary">
                                Edit
                            </a>
                            <form action="{{ route('admin.courses.destroy', $course->id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete this course?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $courses->links() }}
    </div>
@endif
@endsection
