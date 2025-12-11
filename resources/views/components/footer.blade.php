<style>
    .footer-melore {
        background-color: #050608;
        color: #f8f9fa;
        font-size: 0.95rem;
    }

    .footer-melore .footer-title {
        font-weight: 600;
        letter-spacing: .08em;
        text-transform: uppercase;
        font-size: 1rem;
    }

    .footer-melore .footer-text {
        color: rgba(248,249,250,.7);
        font-size: 0.9rem;
    }

    .footer-melore .btn-footer {
        border-radius: 999px;
        padding-inline: 1.9rem;
        padding-block: .55rem;
        font-size: 0.9rem;
        border-width: 1px;
    }

    .footer-melore .footer-menu-label {
        letter-spacing: .35em;
        text-transform: uppercase;
        font-size: 1.1rem;
        color: rgba(248,249,250,.55);
        margin-bottom: .75rem;
    }

    .footer-melore .footer-menu a {
        display: block;
        color: #f8f9fa;
        text-decoration: none;
        font-size: 1.3rem;
        font-weight: 500;
        margin-bottom: .35rem;
    }

    .footer-melore .footer-menu a:hover {
        color: #ffffff;
        text-decoration: underline;
    }

    .footer-melore hr {
        border-color: rgba(255,255,255,.12);
        margin-top: 2.5rem;
        margin-bottom: 1rem;
    }

    .footer-melore .footer-copy {
        font-size: 0.8rem;
        color: rgba(248,249,250,.7);
        letter-spacing: .08em;
        text-transform: uppercase;
    }

    @media (max-width: 576px) {
        .footer-melore .footer-menu a {
            font-size: 1.1rem;
        }

        .footer-melore .footer-menu-label {
            font-size: 0.85rem;
        }
    }
</style>

<footer class="footer-melore pt-5 pb-3 mt-5">
    <div class="container">

        <div class="row g-4 align-items-start justify-content-center text-center text-lg-start">

            <div class="col-12 col-lg-6">
                <h5 class="footer-title mb-3">Customer Support</h5>
                <p class="footer-text mb-4">
                    Questions about courses or payments? Message us and our team will assist you.
                </p>
                <a href="#contact"
                   class="btn btn-outline-light btn-footer">
                    Contact us &rarr;
                </a>
            </div>

            <div class="col-12 col-lg-4 text-center text-lg-end">
                <div class="footer-menu-label">
                    MENU
                </div>

                <div class="footer-menu d-inline-block text-start">
                    <a href="{{ route('home') }}">
                        Home
                    </a>
                    <a href="{{ route('courses.index') }}">
                        Courses
                    </a>
                    <a href="#about">
                        About
                    </a>
                    <a href="#contact">
                        Contact
                    </a>
                </div>
            </div>
        </div>

        <hr>

        <p class="footer-copy text-center mb-0">
            MÉLORÉ ©2025
        </p>
    </div>
</footer>
