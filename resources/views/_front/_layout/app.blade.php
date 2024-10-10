<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="57x57"
        href="{{ url('admin-ui') }}/assets/images/logos/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60"
        href="{{ url('admin-ui') }}/assets/images/logos/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72"
        href="{{ url('admin-ui') }}/assets/images/logos/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76"
        href="{{ url('admin-ui') }}/assets/images/logos/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
        href="{{ url('admin-ui') }}/assets/images/logos/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
        href="{{ url('admin-ui') }}/assets/images/logos/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
        href="{{ url('admin-ui') }}/assets/images/logos/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
        href="{{ url('admin-ui') }}/assets/images/logos/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ url('admin-ui') }}/assets/images/logos/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ url('admin-ui') }}/assets/images/logos/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ url('admin-ui') }}/assets/images/logos/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96"
        href="{{ url('admin-ui') }}/assets/images/logos/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ url('admin-ui') }}/assets/images/logos/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{ url('admin-ui') }}/assets/images/logos/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title>@yield('title') {{ env('APP_NAME') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front/css/theme.css?v=' . env('APP_VERSION')) }}">
    <link rel="stylesheet" href="{{ asset('front/css/custom.css?v=' . env('APP_VERSION')) }}">

    @yield('css')
</head>

<body>
    @php
        $page = Request::segment(1);
    @endphp

    @if (empty($page))
        {{-- <div class="loading-screen" id="loadingScreen">
            <div class="loading-text" id="loadingText">Ayo <b>Baca Buku!</b></div>
        </div> --}}

        <script>
            // Waktu dalam milidetik (misalnya 3000 = 3 detik)
            const fadeOutTime = 2000;

            window.addEventListener('load', function() {
                const loadingScreen = document.getElementById('loadingScreen');
                const loadingText = document.getElementById('loadingText');

                // Mulai animasi fade-in setelah halaman dimuat
                setTimeout(function() {
                    loadingText.classList.add('fade-in');
                }, 10); // Waktu sebelum memulai fade-in (500 milidetik)

                // Mulai transisi fade-out setelah waktu yang ditentukan
                setTimeout(function() {
                    loadingScreen.style.opacity = '0';
                    setTimeout(function() {
                        loadingScreen.style.display = 'none';
                    }, 1000); // Waktu untuk transisi fade-out (1 detik)
                }, fadeOutTime);
            });
        </script>
    @endif

    <section>
        <nav class="navbar navbar-expand-lg bg-body">
            <div class="container">
                <a href="{{ url('/') }}"><img src="{{ url('admin-ui') }}/assets/images/logos/logo-2.png"
                        alt="" width="200" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item ms-3">
                            <a class="nav-link {{ empty($page) ? 'active' : '' }}" aria-current="page"
                                href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link {{ $page == 'member' ? 'active' : '' }}"
                                href="{{ url('member') }}">Keanggotaan Saya</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link {{ $page == 'book' ? 'active' : '' }}"
                                href="{{ url('book') }}">Katalog Buku</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    @yield('content')

    @if (empty($page))
        <footer class="bg-dark text-white" style="border-top-left-radius: 20px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center my-2">
                        <p class="mb-1">Dibuat oleh
                            <a href="https://jinggolabs.com" target="_blank"
                                style="color: rgb(222, 240, 255)"><b>Jinggolabs</b></a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    @else
        <div class="my-5">

        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ url('admin-ui') }}/assets/libs/jquery/dist/jquery.min.js"></script>

    @yield('js')

    <style>
        @keyframes slide-in-right {
            0% {
                transform: translateX(100%);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slide-out-left {
            0% {
                transform: translateX(0);
                opacity: 1;
            }

            100% {
                transform: translateX(-100%);
                opacity: 0;
            }
        }

        .toast.slide-in {
            animation: slide-in-right 0.5s forwards;
        }

        .toast.slide-out {
            animation: slide-out-left 0.5s forwards;
        }
    </style>

    @if (Session::has('success') || Session::has('error'))
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <svg class="bd-placeholder-img rounded me-2" width="20" height="20"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice"
                        focusable="false">
                        <rect width="100%" height="100%" fill="{{ Session::has('success') ? 'green' : 'red' }}">
                        </rect>
                    </svg>
                    <strong class="me-auto">Notifikasi</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-success-emphasis fs-4">
                    <?= session('success') ?>
                    <span class="text-danger fs-4"><?= session('error') ?></span>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var toastEl = document.getElementById('liveToast');
                var toast = new bootstrap.Toast(toastEl, {
                    autohide: true,
                    delay: 4000
                });

                toastEl.addEventListener('show.bs.toast', function() {
                    toastEl.classList.add('slide-in');
                });

                toastEl.addEventListener('hide.bs.toast', function() {
                    toastEl.classList.remove('slide-in');
                    toastEl.classList.add('slide-out');
                });

                toastEl.addEventListener('hidden.bs.toast', function() {
                    toastEl.classList.remove('slide-out');
                });

                toast.show();

                document.getElementById('liveToastBtn').addEventListener('click', function() {
                    toast.show();
                });
            });
        </script>

        @php
            Session::forget('success');
            Session::forget('error');
        @endphp
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector('form');
            const submitButton = form.querySelector('button[type="submit"]');
            const buttonText = submitButton.textContent;

            window.addEventListener("popstate", function(e) {
                // Hapus status "disabled" dari tombol sebelum berpindah halaman
                submitButton.classList.remove("disabled");
                submitButton.innerHTML = buttonText;
            });
            form.addEventListener("submit", function(e) {
                if (!form.checkValidity()) {
                    // Jika form tidak valid, mencegah pengiriman form
                    e.preventDefault();
                    // Hapus status "disabled" dari tombol
                    submitButton.classList.remove("disabled");
                    submitButton.innerHTML = buttonText;
                    form.appendChild(errorElement);
                } else {
                    // Jika form valid, aktifkan spinner pada tombol submit
                    submitButton.classList.add("disabled");
                    submitButton.innerHTML =
                        '<span class="spinner-border spinner-border-sm me-2" aria-hidden="true"></span> Memproses ...';
                }
            });
        });
    </script>

    @if (env('APP_ENV') == 'production')
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-DEV8ZMC6FD"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-DEV8ZMC6FD');
        </script>
    @endif
</body>

</html>
