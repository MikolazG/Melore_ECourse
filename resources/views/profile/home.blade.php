@extends('layouts.main')

@section('title', 'My Profile - MÉLORÉ')

@section('content')
<h1 class="h3 mb-4">My Profile</h1>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

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
                <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                    Edit Profile
                </button>
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

<!-- Profile Summary Section -->
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Profile Summary</span>
                <button class="btn btn-sm btn-success" id="addNoteBtn" onclick="addSummaryItem()">
                    + Add Note
                </button>
            </div>
            <div class="card-body">
                <div id="summaryContainer">
                    <!-- Summary items will be added here -->
                    <p class="text-muted" id="emptyMessage">No notes yet. Click "Add Note" to create one.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               id="name"
                               name="name"
                               value="{{ old('name', $user->name) }}"
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               id="email"
                               name="email"
                               value="{{ old('email', $user->email) }}"
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.summary-item {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 10px;
    position: relative;
}

.summary-item:hover {
    background-color: #e9ecef;
}

.summary-item textarea {
    resize: none;
    min-height: 80px;
}

.delete-btn {
    position: absolute;
    top: 10px;
    right: 10px;
}
</style>

<script>
let summaryCount = 0;

// Load saved summaries on page load
document.addEventListener('DOMContentLoaded', function() {
    loadSummaries();
});

function addSummaryItem() {
    // Check if a note already exists
    const existingNote = document.querySelector('.summary-item');
    if (existingNote) {
        return; // Don't add if one already exists
    }

    summaryCount++;
    const container = document.getElementById('summaryContainer');
    const emptyMessage = document.getElementById('emptyMessage');
    const addBtn = document.getElementById('addNoteBtn');

    if (emptyMessage) {
        emptyMessage.style.display = 'none';
    }

    // Hide the Add Note button
    addBtn.style.display = 'none';

    const itemId = 'summary-' + summaryCount;

    const itemHTML = `
        <div class="summary-item" id="${itemId}">
            <button type="button" class="btn btn-sm btn-danger delete-btn" onclick="deleteSummaryItem('${itemId}')">
                ×
            </button>
            <textarea
                class="form-control border-0 bg-transparent mb-2"
                placeholder="Write your note here..."
                id="textarea-${itemId}"
            ></textarea>
            <div class="saved-content" id="content-${itemId}" style="display: none;">
                <p class="mb-0"></p>
            </div>
            <button type="button" class="btn btn-sm btn-primary" id="save-btn-${itemId}" onclick="saveSingleNote('${itemId}')">
                Save
            </button>
            <button type="button" class="btn btn-sm btn-secondary" id="edit-btn-${itemId}" onclick="editNote('${itemId}')" style="display: none;">
                Edit
            </button>
        </div>
    `;

    container.insertAdjacentHTML('beforeend', itemHTML);
}

function deleteSummaryItem(itemId) {
    const item = document.getElementById(itemId);
    const addBtn = document.getElementById('addNoteBtn');

    if (item) {
        item.remove();
        localStorage.removeItem('profileSummaries');
        checkEmpty();

        // Show the Add Note button again
        addBtn.style.display = 'inline-block';
    }
}

function saveSummaries() {
    const textarea = document.querySelector('.summary-item textarea');

    if (textarea) {
        const text = textarea.value.trim();
        if (text) {
            localStorage.setItem('profileSummaries', text);
            console.log('Saved summary:', text);
        }
    }
}

function saveSingleNote(itemId) {
    const textarea = document.getElementById('textarea-' + itemId);
    const content = document.getElementById('content-' + itemId);
    const deleteBtn = document.querySelector('#' + itemId + ' .delete-btn');
    const saveBtn = document.getElementById('save-btn-' + itemId);
    const editBtn = document.getElementById('edit-btn-' + itemId);

    const text = textarea.value.trim();

    if (!text) {
        return;
    }

    // Hide textarea and save button
    textarea.style.display = 'none';
    saveBtn.style.display = 'none';

    // Show saved content
    content.querySelector('p').textContent = text;
    content.style.display = 'block';

    // Hide delete button
    deleteBtn.style.display = 'none';

    // Show edit button
    editBtn.style.display = 'inline-block';

    // Save to localStorage
    saveSummaries();
}

function editNote(itemId) {
    const textarea = document.getElementById('textarea-' + itemId);
    const content = document.getElementById('content-' + itemId);
    const deleteBtn = document.querySelector('#' + itemId + ' .delete-btn');
    const saveBtn = document.getElementById('save-btn-' + itemId);
    const editBtn = document.getElementById('edit-btn-' + itemId);

    // Get current text from paragraph
    const currentText = content.querySelector('p').textContent;
    textarea.value = currentText;

    // Show textarea and save button
    textarea.style.display = 'block';
    saveBtn.style.display = 'inline-block';

    // Hide saved content
    content.style.display = 'none';

    // Show delete button
    deleteBtn.style.display = 'block';

    // Hide edit button
    editBtn.style.display = 'none';
}

function loadSummaries() {
    const saved = localStorage.getItem('profileSummaries');
    const addBtn = document.getElementById('addNoteBtn');

    if (saved) {
        const container = document.getElementById('summaryContainer');
        const emptyMessage = document.getElementById('emptyMessage');

        emptyMessage.style.display = 'none';
        addBtn.style.display = 'none'; // Hide button when note exists

        summaryCount++;
        const itemId = 'summary-' + summaryCount;

        const itemHTML = `
            <div class="summary-item" id="${itemId}">
                <button type="button" class="btn btn-sm btn-danger delete-btn" onclick="deleteSummaryItem('${itemId}')" style="display: none;">
                    ×
                </button>
                <textarea
                    class="form-control border-0 bg-transparent mb-2"
                    placeholder="Write your note here..."
                    id="textarea-${itemId}"
                    style="display: none;"
                >${saved}</textarea>
                <div class="saved-content" id="content-${itemId}">
                    <p class="mb-0">${saved}</p>
                </div>
                <button type="button" class="btn btn-sm btn-primary" id="save-btn-${itemId}" onclick="saveSingleNote('${itemId}')" style="display: none;">
                    Save
                </button>
                <button type="button" class="btn btn-sm btn-secondary" id="edit-btn-${itemId}" onclick="editNote('${itemId}')">
                    Edit
                </button>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', itemHTML);
    } else {
        // Show button when no note exists
        addBtn.style.display = 'inline-block';
    }
}

function checkEmpty() {
    const items = document.querySelectorAll('.summary-item');
    const emptyMessage = document.getElementById('emptyMessage');
    const addBtn = document.getElementById('addNoteBtn');

    if (items.length === 0) {
        if (emptyMessage) {
            emptyMessage.style.display = 'block';
        }
        if (addBtn) {
            addBtn.style.display = 'inline-block';
        }
    }
}
</script>
@endsection
