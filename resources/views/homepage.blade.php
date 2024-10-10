@extends('_front/_layout/app')

@section('title')Beranda -@endsection

@section('content')
    <section class="my-2 py-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 pt-md-5">
                    <div class="pt-md-5 text-md-start text-center big-title">
                        <p class="text-gray-md mb-1" style="font-size: 20px">Selamat Datang di</p>
                        <h2 class="fw-bolder text-gray mb-0"><b>Perpustakaan</b></h2>
                        <h1 class="fw-bolder text-gray"
                            style="
                        background: linear-gradient(
                            90deg,
                            rgba(99, 91, 255, 1) 0%,
                            rgba(244, 135, 189, 1) 100%
                        );
                        background-clip: text;
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        ">
                            <b>SMKN 8 Jember</b>
                        </h1>
                        <p class="text-gray-md mt-3 mt-md-4">Sudah baca buku apa hari ini?</p>
                    </div>
                </div>
                <div class="col-md-6 col-12" style="z-index: 10">
                    <img src="{{ url('admin-ui') }}/assets/images/ilustrasi-1.png" class="img-fluid mt-2 mt-md-0"
                        alt="" width="500">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-dark section-menu pb-4"
        style="
        border-top-right-radius: 30px;
        border-top-left-radius: 30px;
    ">
        <div class="container pt-5 pb-0 pb-md-4">
            <div class="row">
                <div class="col-md-6 mt-5 mt-md-0 pt-3">
                    <a href="{{ url('member') }}" class="text-decoration-none">
                        <div class="card card-menu">
                            <div class="card-body">
                                <div class="box-icon mb-4">
                                    <svg width="35" height="35" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5"
                                            d="M3 10.417C3 7.219 3 5.62 3.378 5.082C3.755 4.545 5.258 4.03 8.265 3.001L8.838 2.805C10.405 2.268 11.188 2 12 2C12.812 2 13.595 2.268 15.162 2.805L15.735 3.001C18.742 4.03 20.245 4.545 20.622 5.082C21 5.62 21 7.22 21 10.417V11.991C21 17.629 16.761 20.366 14.101 21.527C13.38 21.842 13.02 22 12 22C10.98 22 10.62 21.842 9.899 21.527C7.239 20.365 3 17.63 3 11.991V10.417Z"
                                            stroke="#635BFF" stroke-width="1.5" />
                                        <path
                                            d="M12 11C13.1046 11 14 10.1046 14 9C14 7.89543 13.1046 7 12 7C10.8954 7 10 7.89543 10 9C10 10.1046 10.8954 11 12 11Z"
                                            stroke="#635BFF" stroke-width="1.5" />
                                        <path
                                            d="M16 15C16 16.105 16 17 12 17C8 17 8 16.105 8 15C8 13.895 9.79 13 12 13C14.21 13 16 13.895 16 15Z"
                                            stroke="#635BFF" stroke-width="1.5" />
                                    </svg>


                                </div>
                                <h4 class="mb-1"><b>Keanggotaan Saya</b></h4>
                                <p class="mb-0 text-gray-md">Lihat informasi tentang keanggotaanmu</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 pt-3">
                    <a href="{{ url('book') }}" class="text-decoration-none">
                        <div class="card card-menu">
                            <div class="card-body">
                                <div class="box-icon mb-4">
                                    <svg width="35" viewBox="0 0 22 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M21 10V9C21 5.229 21 3.343 19.828 2.172C18.656 1.001 16.771 1 13 1H9C5.229 1 3.343 1 2.172 2.172C1.001 3.344 1 5.229 1 9C1 12.771 1 14.657 2.172 15.828C3.344 16.999 5.229 17 9 17H12"
                                            stroke="#635BFF" stroke-width="1.5" stroke-linecap="round" />
                                        <path opacity="0.4" d="M9 13H5M1 7H21" stroke="#635BFF" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path
                                            d="M17 17C18.6569 17 20 15.6569 20 14C20 12.3431 18.6569 11 17 11C15.3431 11 14 12.3431 14 14C14 15.6569 15.3431 17 17 17Z"
                                            stroke="#635BFF" stroke-width="1.5" />
                                        <path d="M19.5 16.5L20.5 17.5" stroke="#635BFF" stroke-width="1.5"
                                            stroke-linecap="round" />
                                    </svg>
                                </div>
                                <h4 class="mb-1"><b>Katalog Buku</b></h4>
                                <p class="mb-0 text-gray-md">Lihat dan cari koleksi data buku</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


        </div>
    </section>

    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="card card-panel">
                        <div class="card-body p-2">
                            <h4 class="fw-bolder fs-md mb-1">Keterlambatan Pinjam Siswa</h4>
                            <p class="text-gray-md mb-3 fs-sm">Top 10 Siswa</p>

                            <div class="row" id="top-late-return-list">
                                <div id="top-late-loading"
                                    class="d-flex flex-column justify-content-center align-items-center my-5"
                                    style="height: 100%;">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <p class="mt-2 text-gray-md mb-0">Menampilkan data ...</p>
                                </div>

                                <div class="text-center my-5" id="empty-late">
                                    <h3 class=" text-gray-md fw-bolder">Alhamdulillah 🙏🏻</h3>
                                    <p class=" text-gray-md mb-0">Belum ada yang terlambat!</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5 py-5">
        <div class="container">
            <div class="row">
                <div class="offset-md-2 col-md-8 text-center text-gray-md">
                    <h1 class="fw-bolder">"{{ $motivations[array_rand($motivations)] }}"</h1>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script>
    $('#empty-late').hide();

    $(document).ready(function() {
        // Ambil data dari API
        $.ajax({
            url: '{{ url('report/top-late-returns') }}', // Ganti dengan URL API keterlambatan pinjam
            method: 'GET',
            success: function(response) {
                var lateReturns = response
                    .data; // Asumsikan response API berisi field data yang berisi array
                var lateReturnList = $('#top-late-return-list');

                $('#top-late-loading').addClass('d-none');

                // Loop melalui data dan buat elemen HTML untuk setiap item
                lateReturns.forEach(function(item, index) {
                    var lateReturnCard = `
                        <div class="col-md-12 fs-sm">
                            <div class="card shadow-sm border-1 border-danger rounded-4 mb-2">
                                <div class="card-body p-3">
                                    <span class="badge bg-danger mb-2 fs-sm">${item.days_late} Hari!</span>
                                    <p class="mb-0 fs-md"><b>${index + 1}. ${item.name}</b></p>
                                    <small>NISN. ${item.identity_no} - ${item.join_year} ${item.identity_type}</small>
                                </div>
                            </div>
                        </div>
                    `;

                    // Tambahkan elemen ke dalam list
                    lateReturnList.append(lateReturnCard);
                });

                if (lateReturns.length == 0) {
                    $('#empty-late').show();
                } else {
                    $('#empty-late').hide();
                }

            },
            error: function(error) {
                console.log("Error fetching data:", error);
                $('#top-late-return-list').html('<p>Data gagal diambil.</p>');
            }
        });
    });
</script>
@endsection
