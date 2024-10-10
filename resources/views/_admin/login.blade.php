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

    <title>Digital Library | {{ env('LIB_NAME') }}</title>
    <link rel="stylesheet" href="{{ url('admin-ui') }}/assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ url('admin-ui') }}/assets/images/logos/logo-2.png" alt=""
                                        width="400" class="img-fluid">
                                </a>
                                <p class="text-center">Silahkan Login</p>

                                @if (Session::has('success'))
                                    <div class="alert alert-success mt-3">
                                        {{ Session::get('success') }}
                                        @php
                                            Session::forget('success');
                                        @endphp
                                    </div>
                                @endif
                                @if (Session::has('error'))
                                    <div class="alert alert-warning mt-3">
                                        {{ Session::get('error') }}
                                        @php
                                            Session::forget('error');
                                        @endphp
                                    </div>
                                @endif

                                <form class="form w-100" action="<?= base_url('auth/login') ?>" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="email" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            id="exampleInputPassword1" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2"
                                        style="letter-spacing: 1px">MASUK</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('admin-ui') }}/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ url('admin-ui') }}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    
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
</body>

</html>
