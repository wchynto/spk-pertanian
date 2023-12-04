@extends('app')

@section('pages')
    <div class="wrapper">
        @include('admin.partials.sidebar')
        <div class="main">
            @include('admin.partials.navbar')
            <main class="content">
                <div class="container-fluid p-0">
                    <div class="mb-3">
                        <a href="{{ route('admin.subkriteria.index') }}"> <i class="align-middle"
                                data-feather="arrow-left"></i>
                            Kembali ke Kelola Subkriteria</a>
                    </div>
                    <h1 class="h3 mb-3">{{ $title }}</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin.subkriteria.store') }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <div class="mb-3">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <input type="text" class="form-control" name="keterangan" id="keterangan"
                                                aria-describedby="helpId" placeholder="Masukkan keterangan..."
                                                value="{{ old('keterangan') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nilai" class="form-label">Nilai</label>
                                            <input type="text" class="form-control" name="nilai" id="nilai"
                                                aria-describedby="helpId" placeholder="Masukkan nilai..."
                                                value="{{ old('nilai') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="kriteria" class="form-label">Kriteria</label>
                                            <select class="form-select form-select-lg" name="kriteria" id="kriteria">
                                                <option selected disabled>Pilih kriteria...</option>
                                                @foreach ($kriteria as $k)
                                                    <option value="{{ $k->kode_kriteria }}"
                                                        {{ old('kriteria') ? 'selected' : '' }}>
                                                        {{ $k->nama_kriteria }}
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
