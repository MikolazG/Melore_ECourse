@extends('layouts.main')

@section('title', 'Support Center - MÉLORÉ')

@section('content')
<div class="container py-5" style="max-width: 920px;">

    <div class="support-header mb-4 text-center">
        <h1 class="mb-2">Support Center</h1>
        <p class="mb-0 text-muted" style="max-width: 720px; margin:0 auto;">
            Having trouble, We’re here to help! Submit a support ticket and our team will get back to you as soon as possible.
        </p>
    </div>

    <div class="card support-card border-0 shadow-sm">
        <div class="card-body p-4 p-md-5">

            <div id="formAlert" class="alert d-none" role="alert"></div>

            <form id="supportForm" autocomplete="off">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            class="form-control"
                            name="full_name"
                            value="{{ old('full_name', auth()->user()->name ?? '') }}"
                            placeholder="Your full name"
                            required
                        >
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            value="{{ old('email', auth()->user()->email ?? '') }}"
                            placeholder="you@example.com"
                            required
                        >
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">I am a <span class="text-danger">*</span></label>
                        <select class="form-select" name="iam" required>
                            <option value="" disabled {{ old('iam') ? '' : 'selected' }}>Select role</option>
                            <option value="User"   {{ old('iam')=='User' ? 'selected' : '' }}>User</option>
                            <option value="Instructor" {{ old('iam')=='Seller' ? 'selected' : '' }}>Instructor</option>
                            <option value="Other"  {{ old('iam')=='Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Issue Category <span class="text-danger">*</span></label>
                        <select class="form-select" name="category" required>
                            <option value="" disabled {{ old('category') ? '' : 'selected' }}>Select category</option>
                            <option value="Bug Report"        {{ old('category')=='Bug Report' ? 'selected' : '' }}>Bug Report</option>
                            <option value="Payment"           {{ old('category')=='Payment' ? 'selected' : '' }}>Payment</option>
                            <option value="Account / Login"   {{ old('category')=='Account / Login' ? 'selected' : '' }}>Account / Login</option>
                            <option value="Course / Content"  {{ old('category')=='Course / Content' ? 'selected' : '' }}>Course / Content</option>
                            <option value="Feature Request"   {{ old('category')=='Feature Request' ? 'selected' : '' }}>Feature Request</option>
                            <option value="Other"             {{ old('category')=='Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Subject <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            class="form-control"
                            name="subject"
                            placeholder="Report technical issues like errors, crashes, or unexpected behavior in the system"
                            required
                        >
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Detailed Description <span class="text-danger">*</span></label>
                        <textarea
                            class="form-control"
                            name="message"
                            rows="6"
                            minlength="10"
                            placeholder="Please provide as much detail as possible about your issue. Include any error messages, steps you took, and what you expected to happen."
                            required
                        ></textarea>
                        <small class="text-muted d-block mt-2">Minimum 10 characters required</small>
                    </div>

                    <input type="text" name="company" id="company" class="d-none" tabindex="-1" autocomplete="off">

                    <div class="col-12 pt-2 d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-outline-secondary px-4" onclick="document.getElementById('supportForm').reset()">
                            Cancel
                        </button>
                        <button id="btnSubmit" type="submit" class="btn btn-danger px-4">
                            Submit Ticket
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<style>
    .support-header{
        border: 2px solid black;
        border-radius: 10px;
        padding: 22px 18px;
        box-shadow: 0 0 0 4px rgba(43,132,255,.08);
        background: #fff;
    }
    .support-header h1{
        font-family: "Playfair Display","Times New Roman",serif;
        font-weight: 700;
        letter-spacing: -.02em;
    }
    .support-card{
        border-radius: 12px;
        background: #fff;
    }
    .form-control, .form-select{
        border-radius: 8px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
<script>
    const EMAILJS_PUBLIC_KEY = "{{ env('EMAILJS_PUBLIC_KEY', '') }}";
    const EMAILJS_SERVICE_ID = "{{ env('EMAILJS_SERVICE_ID', '') }}";
    const EMAILJS_TEMPLATE_ID = "{{ env('EMAILJS_TEMPLATE_ID', '') }}";

    (function() {
        if (!EMAILJS_PUBLIC_KEY || !EMAILJS_SERVICE_ID || !EMAILJS_TEMPLATE_ID) {
            console.warn("EmailJS env belum diisi. Isi EMAILJS_PUBLIC_KEY / SERVICE_ID / TEMPLATE_ID di .env");
            return;
        }
        emailjs.init({ publicKey: EMAILJS_PUBLIC_KEY });
    })();

    const form = document.getElementById('supportForm');
    const alertBox = document.getElementById('formAlert');
    const btn = document.getElementById('btnSubmit');

    function showAlert(type, msg){
        alertBox.className = "alert alert-" + type;
        alertBox.textContent = msg;
        alertBox.classList.remove('d-none');
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        if (document.getElementById('company').value.trim() !== "") return;

        if (!EMAILJS_PUBLIC_KEY || !EMAILJS_SERVICE_ID || !EMAILJS_TEMPLATE_ID) {
            showAlert('warning', 'Email service belum dikonfigurasi. Isi EMAILJS_* di file .env');
            return;
        }

        btn.disabled = true;
        btn.textContent = "Sending...";

        try {

            await emailjs.sendForm(EMAILJS_SERVICE_ID, EMAILJS_TEMPLATE_ID, form);

            showAlert('success', 'Ticket sent! Our team will get back to you soon.');
            form.reset();
        } catch (err) {
            console.error(err);
            showAlert('danger', 'Failed to send ticket. Please try again.');
        } finally {
            btn.disabled = false;
            btn.textContent = "Submit Ticket";
        }
    });
</script>
@endsection
