@extends('layouts.admin')

@section('title', 'Manage Lessons - MÉLORÉ')

@section('content')
<h1 class="h3 mb-4">Lessons for: {{ $course->title }}</h1>

<div class="mb-3">
    <a href="{{ route('admin.courses.lessons.create', $course->id) }}" class="btn btn-primary">
        Add lesson
    </a>
    <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">
        Back to courses
    </a>
</div>

@if ($lessons->isEmpty())
    <p class="text-muted">No lessons found.</p>
@else
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>Order</th>
                    <th>Title</th>
                    <th>Has Video?</th>
                    <th>Updated</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lessons as $lesson)
                    <tr>
                        <td>{{ $lesson->order }}</td>
                        <td>{{ $lesson->title }}</td>
                        <td>
                            @if ($lesson->video_url)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </td>
                        <td>{{ $lesson->updated_at->format('Y-m-d') }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.courses.lessons.edit', [$course->id, $lesson->id]) }}"
                               class="btn btn-sm btn-outline-primary">
                                Edit
                            </a>
                            <form action="{{ route('admin.courses.lessons.destroy', [$course->id, $lesson->id]) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete this lesson?');">
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
@endif
@endsection
