@extends('layouts.admin')

@section('title', 'Create Instructor - MÉLORÉ')

@section('content')
<h1 class="h3 mb-4">Create instructor</h1>

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

<form action="{{ route('admin.instructors.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Name *</label>
        <input type="text" name="name" id="name" class="form-control"
               value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control"
               value="{{ old('email') }}">
        <div class="form-text">Contact email for the instructor.</div>
    </div>

    <div class="mb-3">
        <label for="specialization" class="form-label">Specialization</label>
        <input type="text" name="specialization" id="specialization" class="form-control"
               value="{{ old('specialization') }}">
        <div class="form-text">e.g., Piano Instructor, Vocal Coach, Guitar Teacher.</div>
    </div>

    <div class="mb-3">
        <label for="bio" class="form-label">Biography</label>
        <textarea name="bio" id="bio" rows="5" class="form-control">{{ old('bio') }}</textarea>
        <div class="form-text">Write a brief biography about the instructor.</div>
    </div>

    <div class="mb-3">
        <label for="image_url" class="form-label">Profile Image URL</label>
        <input type="text" name="image_url" id="image_url" class="form-control"
               value="{{ old('image_url') }}">
        <div class="form-text">Example: https://example.com/image.jpg</div>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
    <a href="{{ route('admin.instructors.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
