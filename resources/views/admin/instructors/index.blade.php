@extends('layouts.admin')

@section('title', 'Manage Instructors - MÉLORÉ')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Instructors</h1>
    <a href="{{ route('admin.instructors.create') }}" class="btn btn-primary">
        Create instructor
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if ($instructors->isEmpty())
    <p class="text-muted">No instructors found.</p>
@else
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Specialization</th>
                    <th>Email</th>
                    <th>Courses</th>
                    <th>Created</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instructors as $instructor)
                    <tr>
                        <td>{{ $instructor->id }}</td>
                        <td>
                            @if($instructor->image_url)
                                <img src="{{ $instructor->image_url }}"
                                     alt="{{ $instructor->name }}"
                                     class="rounded"
                                     style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <div class="bg-secondary rounded d-flex align-items-center justify-content-center"
                                     style="width: 50px; height: 50px;">
                                    <i class="bi bi-person text-white"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ $instructor->name }}</td>
                        <td>{{ $instructor->specialization ?? '-' }}</td>
                        <td>{{ $instructor->email ?? '-' }}</td>
                        <td>{{ $instructor->courses_count }}</td>
                        <td>{{ $instructor->created_at->format('Y-m-d') }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.instructors.edit', $instructor->id) }}"
                               class="btn btn-sm btn-outline-primary">
                                Edit
                            </a>
                            <form action="{{ route('admin.instructors.destroy', $instructor->id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete this instructor?');">
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
        {{ $instructors->links() }}
    </div>
@endif
@endsection
