@extends('app')

@section('pages')
    <div class="wrapper">
        @include('admin.partials.sidebar')
        <div class="main">
            @include('admin.partials.navbar')
            <main class="content">
                <div class="container-fluid p-0">
                    <div class="mb-3">
                        <a href="{{ route('admin.alternatif-desa.index') }}"> <i class="align-middle"
                                data-feather="arrow-left"></i>
                            Kembali ke Kelola Alternatif Desa</a>
                    </div>
                    <h1 class="h3 mb-3">{{ $title }}</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin.alternatif-desa.store') }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <div class="mb-3">
                                            <label for="namaDesa" class="form-label">Nama Desa</label>
                                            <input type="text" class="form-control" name="nama_desa" id="namaDesa"
                                                aria-describedby="helpId" placeholder="Masukkan nama desa..."
                                                value="{{ old('nama_desa') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="luasTanah" class="form-label">Luas Tanah</label>
                                            <div class="input-group"><input type="text" class="form-control"
                                                    name="luas_tanah" id="luasTanah" aria-describedby="satuan"
                                                    placeholder="Masukkan luas tanah..." value="{{ old('luas_tanah') }}">
                                                <span class="input-group-text" id="satuan">Hektar</span>
                                            </div>
                                            <small id="helpId" class="form-text text-muted">Input dengan satuan
                                                hektar</small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="kecamatan" class="form-label">Kecamatan</label>
                                            <select class="form-select form-select-lg" name="kecamatan" id="kecamatan">
                                                <option selected disabled>Pilih kecamatan...</option>
                                                @foreach ($kecamatan as $k)
                                                    <option value="{{ $k->kode_kecamatan }}"
                                                        {{ old('kecamatan') ? 'selected' : '' }}>
                                                        {{ $k->nama_kecamatan }}
                                                    </option>
                                                @endforeach
                                            </select>
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
