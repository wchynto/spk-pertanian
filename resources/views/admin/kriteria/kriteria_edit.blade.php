@extends('app')

@section('pages')
    <div class="wrapper">
        @include('admin.partials.sidebar')
        <div class="main">
            @include('admin.partials.navbar')
            <main class="content">
                <div class="container-fluid p-0">
                    <div class="mb-3">
                        <a href="{{ route('admin.kriteria.index') }}"> <i class="align-middle" data-feather="arrow-left"></i>
                            Kembali ke Kelola Kriteria</a>
                    </div>
                    <h1 class="h3 mb-3">{{ $title }} #{{ $kriteria->kode_kriteria }}</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin.kriteria.update', $kriteria->kode_kriteria) }}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="namaKriteria" class="form-label">Nama Kriteria</label>
                                            <input type="text" class="form-control" name="nama_kriteria"
                                                id="namaKriteria" aria-describedby="helpId"
                                                placeholder="Masukkan nama kriteria..."
                                                value="{{ $kriteria->nama_kriteria }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="jenisKriteria" class="form-label">Jenis Kriteria</label>
                                            <select class="form-select form-select-lg" name="jenis_kriteria"
                                                id="jenisKriteria">
                                                <option selected disabled>Pilih jenis kriteria...</option>
                                                <option value="Benefit"
                                                    {{ $kriteria->jenis_kriteria == 'Benefit' ? 'selected' : '' }}>
                                                    Benefit
                                                </option>
                                                <option value="Cost"
                                                    {{ $kriteria->jenis_kriteria == 'Cost' ? 'selected' : '' }}>
                                                    Cost
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="bobotNilai" class="form-label">Bobot Nilai</label>
                                            <input type="text" class="form-control" name="bobot_nilai" id="bobotNilai"
                                                aria-describedby="helpId" placeholder="Masukkan bobot nilai..."
                                                value="{{ $kriteria->bobot_nilai }}">
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
