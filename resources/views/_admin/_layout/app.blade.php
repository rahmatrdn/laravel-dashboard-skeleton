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

    <title>Admin Digital Library | {{ env('LIB_NAME') }}</title>
    <link rel="stylesheet" href="{{ url('admin-ui') }}/assets/css/style.css?v={{ env('APP_VERSION') }}" />
    <link rel="stylesheet" href="{{ url('admin-ui') }}/assets/css/custom.css?v={{ env('APP_VERSION') }}" />

    @yield('css')
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="{{ url('admin-ui') }}/assets/images/logos/logo-2.png" alt=""
                            width="200" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                @include('_admin/_layout/sidebar')
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <div class="d-none d-md-block">
                            <p class="mb-0 text-gray-2 badge bg-light text-dark" id="date">
                            </p>
                            <p class="mb-0 text-gray-2 badge bg-primary-subtle text-primary" id="time">
                            </p>
                        </div>
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="{{ url('admin-ui') }}/assets/images/user.png" alt=""
                                        width="25" height="25" class="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="{{ base_url('auth/logout') }}"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="body-wrapper-inner">
                <div class="container-fluid">
                    <div class="mb-3 mb-md-0"></div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
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

    <script src="{{ url('admin-ui') }}/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ url('admin-ui') }}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('admin-ui') }}/assets/js/sidebarmenu.js"></script>
    <script src="{{ url('admin-ui') }}/assets/js/app.min.js"></script>
    <script src="{{ url('admin-ui') }}/assets/libs/simplebar/dist/simplebar.js"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

    @yield('js')

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


    <script>
        updateTime();

        function updateTime() {
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const now = new Date();
            const localTime = new Date(now.getTime()); // UTC +7

            const dateStr = localTime.toLocaleDateString('id-ID', options);
            const timeStr = localTime.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit'
            });

            document.getElementById('date').innerHTML = `<b>${dateStr}</b>`;
            document.getElementById('time').innerHTML = `<b>${timeStr}</b>`;
        }

        setInterval(updateTime, 1000); // Update every second
    </script>
</body>

</html>
