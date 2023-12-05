@extends('app')

@push('css')
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            $("#datatable").DataTable();
        });
    </script>
@endpush

@section('pages')
    <div class="wrapper">
        @include('admin.partials.sidebar')
        <div class="main">
            @include('admin.partials.navbar')
            <main class="content">
                <div class="container-fluid p-0">
                    <div class="mb-3">
                        <a href="{{ route('user.perhitungan-moora.normalisasi-terbobot') }}"> <i class="align-middle"
                                data-feather="arrow-left"></i>
                            Kembali ke Normalisasi</a>
                    </div>
                    <h1 class="h3 mb-3">{{ $title }}</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatable" class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Kecamatan</th>
                                                <th scope="col">Nama Desa</th>
                                                <th scope="col">Luas Tanah</th>
                                                <th scope="col">Hasil Perhitungan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($alternatif_desa as $a)
                                                <tr>
                                                    <th scope="row">{{ $i++ }}</th>
                                                    <td>{{ $a->kecamatan->nama_kecamatan }}</td>
                                                    <td>{{ $a->nama_desa }}</td>
                                                    <td>{{ $a->luas_tanah }} hektar</td>
                                                    <td>{{ $a->hasil_perhitungan }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
