@extends('_admin/_layout/app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="fw-bolder mb-4">{{ $page['title'] }}</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="text-end">
                                <a href="{{ base_url($page['route'] . '/add') }}" class="btn btn-primary btn fw-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                    <b>Tambah Data</b>
                                </a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover mt-3 table-sm">
                        <thead>
                            <tr class="table-light">
                                <th width="80%" style="font-size: 13px" class="fw-bolder text-gray-md letter-spacing-2">NAMA</th>
                                <th width="20%" class="text-center fw-bolder text-gray-md letter-spacing-2" style="font-size: 13px">
                                    AKSI
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ title($d->name) }}</td>
                                <td class="text-center">
                                    @if ($d->id != 1)
                                        <div class="dropdown">
                                            <button class="btn btn-light btn-sm" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-dots">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                    <path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item"
                                                        href="{{ base_url($page['route'] . "/update/{$d->id}") }}">Edit</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item text-danger"
                                                        href="{{ base_url($page['route'] . "/delete/{$d->id}") }}"
                                                        onclick="return confirm('Apakah kamu Yakin?')">Hapus</a></li>
                                            </ul>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if (empty($data))
                        <div class="text-center my-5">
                            <h4>Data Belum Tersedia 😐</h4>
                            <p>Silahkan melakukan penambahan data</p>
                        </div>
                    @endif
                    <div>
                        {{ !empty($data) ? $data->links() : '' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
