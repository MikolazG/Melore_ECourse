@extends('layouts.admin')

@section('title', 'Edit Instructor - MÉLORÉ')

@section('content')
<h1 class="h3 mb-4">Edit instructor</h1>

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

<form action="{{ route('admin.instructors.update', $instructor->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Name *</label>
        <input type="text" name="name" id="name" class="form-control"
               value="{{ old('name', $instructor->name) }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control"
               value="{{ old('email', $instructor->email) }}">
    </div>

    <div class="mb-3">
        <label for="specialization" class="form-label">Specialization</label>
        <input type="text" name="specialization" id="specialization" class="form-control"
               value="{{ old('specialization', $instructor->specialization) }}">
    </div>

    <div class="mb-3">
        <label for="bio" class="form-label">Biography</label>
        <textarea name="bio" id="bio" rows="5" class="form-control">{{ old('bio', $instructor->bio) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="image_url" class="form-label">Profile Image URL</label>
        <input type="text" name="image_url" id="image_url" class="form-control"
               value="{{ old('image_url', $instructor->image_url) }}">
    </div>

    @if($instructor->image_url)
        <div class="mb-3">
            <label class="form-label">Current Image</label>
            <div>
                <img src="{{ $instructor->image_url }}"
                     alt="{{ $instructor->name }}"
                     class="img-thumbnail"
                     style="max-width: 200px;">
            </div>
        </div>
    @endif

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.instructors.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
