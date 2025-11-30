@extends('layouts.admin')

@section('title', 'Create Lesson - MÉLORÉ')

@section('content')
<h1 class="h3 mb-4">Create lesson for: {{ $course->title }}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>There were some problems with your input.</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.courses.lessons.store', $course->id) }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Title *</label>
        <input type="text" name="title" id="title" class="form-control"
               value="{{ old('title') }}" required>
    </div>

    <div class="mb-3">
        <label for="order" class="form-label">Order *</label>
        <input type="number" name="order" id="order" class="form-control"
               value="{{ old('order') }}" min="1" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" rows="3" class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="video_url" class="form-label">Video URL</label>
        <input type="text" name="video_url" id="video_url" class="form-control"
               value="{{ old('video_url') }}">
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
    <a href="{{ route('admin.courses.lessons.index', $course->id) }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
