@extends('app')

@section('pages')
    <div class="wrapper">
        @include('admin.partials.sidebar')
        <div class="main">
            @include('admin.partials.navbar')
            <main class="content">
                <div class="container-fluid p-0">
                    <div class="mb-3">
                        <a href="{{ route('admin.kecamatan.index') }}"> <i class="align-middle" data-feather="arrow-left"></i>
                            Kembali ke Kelola Kecamatan</a>
                    </div>
                    <h1 class="h3 mb-3">{{ $title }}</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin.kecamatan.store') }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <div class="mb-3">
                                            <label for="namaKecamatan" class="form-label">Nama Kecamatan</label>
                                            <input type="text" class="form-control" name="nama_kecamatan"
                                                id="namaKecamatan" aria-describedby="helpId"
                                                placeholder="Masukkan nama kecamatan..."
                                                value="{{ old('nama_kecamatan') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="namaKecamatan" class="form-label">Alamat Kecamatan</label>
                                            <input type="text" class="form-control" name="alamat_kecamatan"
                                                id="namaKecamatan" aria-describedby="helpId"
                                                placeholder="Masukkan alamat kecamatan..."
                                                value="{{ old('alamat_kecamatan') }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary float-end">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            @include('admin.partials.footer')
        </div>
    </div>
@endsection
