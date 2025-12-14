@extends('layouts.main')

@section('title', 'Contact Us - MÉLORÉ')

@section('content')
<div class="container py-5">

    {{-- Hero Section --}}
    <section class="text-center mb-5">
        <span class="badge rounded-pill border border-dark text-dark mb-3 px-3 py-1"
              style="font-size:.8rem; letter-spacing:.12em; text-transform:uppercase; background-color:#f5f5f5;">
            GET IN TOUCH
        </span>

        <h1 class="mb-3"
            style="
                font-family: 'Playfair Display', 'Times New Roman', serif;
                font-size: 3.5rem;
                line-height: 1.2;
                letter-spacing: -.02em;
            ">
            We'd Love To<br>
            Hear From You
        </h1>

        <p class="text-muted mb-4" style="max-width: 720px; margin:0 auto; font-size:1.1rem;">
            Have questions? Need support? Want to partner with us?
            Send us a message and we'll respond as soon as possible.
        </p>
    </section>

    <div class="row g-5">

        {{-- Contact Form --}}
        <div class="col-lg-7">
            <div class="card border-0 rounded-4 shadow-sm">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4">Send Us a Message</h4>

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

                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       id="name"
                                       name="name"
                                       value="{{ old('name', auth()->user()->name ?? '') }}"
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email"
                                       name="email"
                                       value="{{ old('email', auth()->user()->email ?? '') }}"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text"
                                       class="form-control @error('subject') is-invalid @enderror"
                                       id="subject"
                                       name="subject"
                                       value="{{ old('subject') }}"
                                       required>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control @error('message') is-invalid @enderror"
                                          id="message"
                                          name="message"
                                          rows="5"
                                          required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-success rounded-pill px-4">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Contact Information --}}
        <div class="col-lg-5">

            {{-- Contact Details --}}
            <div class="card border-0 rounded-4 shadow-sm mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Contact Information</h5>

                    <div class="mb-3">
                        <div class="d-flex align-items-start mb-2">
                            <i class="bi bi-envelope-fill text-success me-3 fs-5"></i>
                            <div>
                                <small class="text-muted d-block">Email</small>
                                <a href="mailto:support@melore.com" class="text-decoration-none text-dark">
                                    support@melore.com
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex align-items-start mb-2">
                            <i class="bi bi-telephone-fill text-success me-3 fs-5"></i>
                            <div>
                                <small class="text-muted d-block">Phone</small>
                                <a href="tel:+621234567890" class="text-decoration-none text-dark">
                                    +62 123 4567 890
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mb-0">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-geo-alt-fill text-success me-3 fs-5"></i>
                            <div>
                                <small class="text-muted d-block">Address</small>
                                <p class="mb-0">
                                    Jl. Pendidikan No. 123<br>
                                    Jakarta, Indonesia 12345
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Office Hours --}}
            <div class="card border-0 rounded-4 shadow-sm mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Office Hours</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <strong>Monday - Friday:</strong> 9:00 AM - 6:00 PM
                        </li>
                        <li class="mb-2">
                            <strong>Saturday:</strong> 10:00 AM - 4:00 PM
                        </li>
                        <li class="mb-0">
                            <strong>Sunday:</strong> Closed
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Social Media --}}
            <div class="card border-0 rounded-4 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Follow Us</h5>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-outline-success rounded-circle" style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="btn btn-outline-success rounded-circle" style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="btn btn-outline-success rounded-circle" style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-outline-success rounded-circle" style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-youtube"></i>
                        </a>
                        <a href="#" class="btn btn-outline-success rounded-circle" style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
