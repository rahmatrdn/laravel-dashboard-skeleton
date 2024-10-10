@extends('_admin/_layout/app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <h4 class="mb-0">Detail <b>{{ $page['title'] }}</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="">
                                <a href="{{ base_url($page['route'] . '/') }}" class="btn btn-outline-indigo btn-sm fw-bold">
                                    <b>← Kembali</b>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="mb-0">
                                <label for="">Nama</label>
                                <p class="mb-0 fs-5"><strong>{{ title($data->name) }} </strong></p>
                            </div>
                            <hr class="dotted">
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="">Harga</label>
                                <p class="mb-0 fs-5"><strong>{{ $data->price }}</strong></p>
                            </div>
                            <div class="mb-2">
                                <label for="">Aksi</label>
                                <div class="mt-1">
                                    <a href="{{ base_url($page['route'] . "/update/{$data->id}") }}" class="btn btn-warning">Edit Data</a>
                                    <a href="{{ base_url($page['route'] . "/delete/{$data->id}") }}"
                                        onclick="return confirm('Apakah kamu Yakin?')" class="btn btn-danger ms-1">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h6 class="text-uppercase letter-spacing-2 text-gray-2 fs-2">Riwayat Stok</h6>

                    <table class="table table-bordered table-hover mt-3 table-sm">
                        <thead>
                            <tr class="table-light">
                                <th style="width: 30%" class="fw-bolder">WAKTU</th>
                                <th style="width: 40%" class="fw-bolder">DESKRIPSI</th>
                                <th style="width: 10%" class="fw-bolder text-center">JUMLAH</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div> --}}

    </div>
@endsection
