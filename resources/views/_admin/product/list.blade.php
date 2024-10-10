@extends('_admin/_layout/app')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="fw-bolder mb-4">{{ $page['title'] }}</h4>
                        </div>
                        <div class="col-md-6 text-end mb-4">
                            <div class="text-start text-md-end">
                                <a href="{{ base_url($page['route'] . '/add') }}" class="btn btn-primary btn fw-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
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

                    <div class="card rounded-3 border-1 border-primary-subtle shadow-sm">
                        <div class="card-body p-3">
                            <p class="text-gray-md letter-spacing-2 fs-1 mb-2">PENCARIAN DATA</p>
                            <form action="{{ base_url('product') }}" method="GET" class="row gy-2 gx-3 align-items-center">
                                <input type="hidden" name="filter_on" value="true">
                                <div class="col- mb-2">
                                    <label class="visually-hidden" for="filter_name">Kata kunci Nama Produk</label>
                                    <input type="text" class="form-control" id="filter_name" name="filter_name"
                                        value="{{ $filter['filter_name'] ?? '' }}" placeholder="Kata kunci Nama Produk">
                                </div>
                                <div class="col-md-auto mb-2">
                                    <label class="visually-hidden" for="filter_category_id">Preference</label>
                                    <select class="form-select" id="filter_category_id" name="filter_category_id">
                                        <option value="">Semua Kategori</option>
                                        @foreach ($productCategories as $p)
                                            <option value="{{ $p->id }}" @selected($p->id == get($filter['filter_category_id'] ?? ''))>
                                                {{ title($p->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-0">
                                    <button type="submit" class="btn btn-primary"><b>Pencarian</b></button>
                                    @if (!empty($filter['filter_on']))
                                        <a href="{{ base_url('product') }}" class="btn btn-outline-warning ms-1">Reset
                                            Filter</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mt-2 table-sm">
                            <thead>
                                <tr class="table-light">
                                    <th style="width: 40%" class="fw-bolder text-gray-md letter-spacing-2">JUDUL</th>
                                    <th style="width: 2%" class="text-center fw-bolder text-gray-md letter-spacing-2">
                                        AKSI
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>
                                            {{-- <span class="badge bg-light text-dark">Rak test</span> --}}
                                            <span class="badge bg-light text-dark text ms-0 ms-md-1 mt-1 mt-md-0">{{ title($d->category) }}</span>
                                            <div class="mt-2">
                                                <h5><b>{{ title($d->name) }}</b></h5>
                                                <p>Stok <b>100</b></p>
                                            </div>
                                        </td>
                                        <td class="text-center">
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
                                                            href="{{ base_url($page['route'] . "/detail/{$d->id}") }}">Lihat Detail</a>
                                                    </li>
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
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                    @if (!count($data))
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
