@extends('app')

@section('pages')
    <div class="wrapper">
        @include('admin.partials.sidebar')
        <div class="main">
            @include('admin.partials.navbar')
            <main class="content">
                <div class="container-fluid p-0">
                    <div class="mb-3">
                        <a href="{{ route('user.nilai-alternatif-desa.index') }}"> <i class="align-middle"
                                data-feather="arrow-left"></i>
                            Kembali ke Kelola Nilai Alternatif Desa</a>
                    </div>
                    <h1 class="h3 mb-3">{{ $title }}</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('user.nilai-alternatif-desa.store') }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <div class="mb-3">
                                            <label for="desa" class="form-label">Desa</label>
                                            <select class="form-select form-select-lg" name="desa" id="desa">
                                                <option selected disabled>Pilih desa...</option>
                                                @foreach ($desa as $d)
                                                    <option value="{{ $d->kode_alternatif_desa }}"
                                                        {{ old('desa') ? 'selected' : '' }}>
                                                        {{ $d->nama_desa }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="c1" class="form-label">Nilai Ketinggian Tempat</label>
                                            <select class="form-select form-select-lg" name="c1" id="c1">
                                                <option selected disabled>Pilih nilai...</option>
                                                @foreach ($ketinggian_tempat as $k)
                                                    <option value="{{ $k->nilai }}" {{ old('c1') ? 'selected' : '' }}>
                                                        {{ $k->nilai }} poin | {{ $k->keterangan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="c2" class="form-label">Nilai Curah Hujan</label>
                                            <select class="form-select form-select-lg" name="c2" id="c2">
                                                <option selected disabled>Pilih nilai...</option>
                                                @foreach ($curah_hujan as $c)
                                                    <option value="{{ $c->nilai }}" {{ old('c2') ? 'selected' : '' }}>
                                                        {{ $c->nilai }} poin | {{ $c->keterangan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="c3" class="form-label">Nilai Suhu Udara</label>
                                            <select class="form-select form-select-lg" name="c3" id="c3">
                                                <option selected disabled>Pilih nilai...</option>
                                                @foreach ($suhu as $s)
                                                    <option value="{{ $s->nilai }}" {{ old('c3') ? 'selected' : '' }}>
                                                        {{ $s->nilai }} poin | {{ $s->keterangan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="c4" class="form-label">Nilai pH Tanah</label>
                                            <select class="form-select form-select-lg" name="c4" id="c4">
                                                <option selected disabled>Pilih nilai...</option>
                                                @foreach ($ph_tanah as $p)
                                                    <option value="{{ $p->nilai }}" {{ old('c4') ? 'selected' : '' }}>
                                                        {{ $p->nilai }} poin | {{ $p->keterangan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="c5" class="form-label">Nilai Tekstur Tanah</label>
                                            <select class="form-select form-select-lg" name="c5" id="c5">
                                                <option selected disabled>Pilih nilai...</option>
                                                @foreach ($tekstur_tanah as $t)
                                                    <option value="{{ $t->nilai }}" {{ old('c5') ? 'selected' : '' }}>
                                                        {{ $t->nilai }} poin | {{ $t->keterangan }}
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
