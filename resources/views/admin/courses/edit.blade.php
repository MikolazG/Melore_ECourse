@extends('layouts.admin')

@section('title', 'Edit Course - MÉLORÉ')

@section('content')
<h1 class="h3 mb-4">Edit course</h1>

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

<form action="{{ route('admin.courses.update', $course->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Title *</label>
        <input type="text" name="title" id="title" class="form-control"
               value="{{ old('title', $course->title) }}" required>
    </div>

    <div class="mb-3">
        <label for="slug" class="form-label">Slug *</label>
        <input type="text" name="slug" id="slug" class="form-control"
               value="{{ old('slug', $course->slug) }}" required>
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <input type="text" name="category" id="category" class="form-control"
               value="{{ old('category', $course->category) }}">
    </div>

    <div class="mb-3">
        <label for="level" class="form-label">Level *</label>
        <input type="text" name="level" id="level" class="form-control"
               value="{{ old('level', $course->level) }}" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description *</label>
        <textarea name="description" id="description" rows="4" class="form-control" required>{{ old('description', $course->description) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price (USD) *</label>
        <input type="number" name="price" id="price" class="form-control"
               step="0.01" min="0" value="{{ old('price', $course->price) }}" required>
    </div>

    <div class="mb-3">
        <label for="thumbnail_url" class="form-label">Thumbnail URL</label>
        <input type="text" name="thumbnail_url" id="thumbnail_url" class="form-control"
               value="{{ old('thumbnail_url', $course->thumbnail_url) }}">
    </div>

    <div class="mb-3">
        <label for="video_url" class="form-label">Intro Video URL (embed)</label>
        <input type="text" name="video_url" id="video_url" class="form-control"
               value="{{ old('video_url', $course->video_url) }}">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
