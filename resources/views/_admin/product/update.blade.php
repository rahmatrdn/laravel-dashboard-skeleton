@extends('_admin/_layout/app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">Edit Data <b>{{ $page['title'] }}</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="">
                                <a href="{{ base_url($page['route'] . '/') }}" class="btn btn-outline-indigo btn-sm fw-bold">
                                    <b>← Kembali</b>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <b>Terjadi kesalahan pada proses input data</b> <br>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ base_url($page['route'] . "/update/" . $data->id) }}">
                            <input type="hidden" name="current_stock" value="{{ $data->price }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $data->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="product_category_id" class="form-label">Kategori Produk</label>
                                <select name="product_category_id" id="product_category_id" class="form-select" required>
                                    <option value="">- Pilih Kategori Buku -</option>
                                    @foreach ($productCategories as $d)
                                        <option value="{{ $d->id }}" @selected($data->product_category_id == $d->id)>{{ $d->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Harga</label>
                                <input type="text" class="form-control" name="price" id="price" value="{{ $data->price }}">
                            </div>
                            <button type="submit" class="btn btn-primary"><b>Simpan Perubahan</b></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
