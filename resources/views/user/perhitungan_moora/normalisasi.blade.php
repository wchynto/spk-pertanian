@extends('app')

@php
    $prefix = \Route::current()->getPrefix();
@endphp

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
                    <h1 class="h3 mb-3">{{ $title }}</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-end">
                                    <a name="" class="btn btn-primary"
                                        href="{{ route("$prefix.perhitungan-moora.normalisasi-terbobot") }}" role="button">
                                        Normalisasi Terbobot
                                    </a>
                                </div>
                                <div class="card-body">
                                    <table id="datatable" class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th>Nama Desa</th>
                                                <th scope="col">Ketinggian Tempat</th>
                                                <th scope="col">Curah Hujan</th>
                                                <th scope="col">Suhu Udara</th>
                                                <th scope="col">PH Tanah</th>
                                                <th scope="col">Tekstur Tanah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $num = 1;
                                            @endphp
                                            @if ($result)
                                                @for ($i = 0; $i < count($result[0]); $i++)
                                                    <tr>
                                                        <td scope="row">{{ $num++ }}</td>
                                                        <td>{{ $result[$i]['nama_desa'] }}</td>
                                                        @for ($j = 0; $j < 5; $j++)
                                                            <td>{{ $result[$i]['nilai_c' . ($j + 1)]['normalisasi'] }}</td>
                                                        @endfor
                                                    </tr>
                                                @endfor
                                            @endif
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
