<style>
    html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        .footer-melore {
            flex-shrink: 0;
        }
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
        /* margin-bottom: .35rem; */
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

@php
    $isHome    = request()->routeIs('home');
    $isCourses = request()->routeIs('courses.*');
    $isProfile = request()->routeIs('profile.*')
        || request()->routeIs('login')
        || request()->routeIs('register');

    // current language (default EN)
    $lang = session('lang', 'en');

    // label dictionary
    $t = [
        'en' => [
            'customersupp' => 'Customer Support',
            'question' => 'Questions about courses or payments? Message us and our team will assist you.',
            'menu' => 'MENU',
            'home' => 'Home',
            'courses' => 'Courses',
            'about' => 'About',
            'contact' => 'Contact',
        ],
        'id' => [
            'customersupp' => 'Layanan Pelanggan',
            'question' => 'Punya pertanyaan tentang kursus atau pembayaran? Kirim pesan kepada kami dan tim kami akan membantu.',
            'menu' => 'MENU',
            'home' => 'Beranda',
            'courses' => 'Kursus',
            'about' => 'Tentang Kami',
            'contact' => 'Kontak',
        ],
    ];

    $L = $t[$lang] ?? $t['en'];
@endphp


<footer class="footer-melore pt-5 pb-0.5 mt-0.5">
    <div class="container">

        <div class="row g-4 align-items-start justify-content-center text-center text-lg-start">

            <div class="col-12 col-lg-6">
                <h5 class="footer-title mb-3">{{ $L['customersupp'] }}</h5>
                <p class="footer-text mb-4">
                    {{ $L['question'] }}
                </p>
                <a href="{{ route('contact') }}"
                   class="btn btn-outline-light btn-footer">
                    Contact us &rarr;
                </a>
            </div>

            <div class="col-12 col-lg-4 text-center text-lg-end">
                <div class="footer-menu-label">
                    {{ $L['menu'] }}
                </div>

                <div class="footer-menu d-inline-block text-start">
                    <a href="{{ route('home') }}">
                        {{ $L['home'] }}
                    </a>
                    <a href="{{ route('courses.index') }}">
                        {{ $L['courses'] }}
                    </a>
                    <a href="{{ route('about') }}">
                        {{ $L['about'] }}
                    </a>
                    <a href="{{ route('contact') }}">
                        {{ $L['contact'] }}
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
