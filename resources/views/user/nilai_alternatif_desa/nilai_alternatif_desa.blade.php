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
                    <h1 class="h3 mb-3">{{ $title }}</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-end">
                                    <a name="" class="btn btn-primary"
                                        href="{{ route('user.nilai-alternatif-desa.create') }}" role="button">
                                        <i class="align-middle" data-feather="plus"></i>
                                        Tambah
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
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($nilai_alternatif_desa as $n)
                                                <tr>
                                                    <th scope="row">{{ $i++ }}</th>
                                                    <td>{{ $n->alternatifDesa->nama_desa }}</td>
                                                    <td>{{ $n->nilai_c1 }}</td>
                                                    <td>{{ $n->nilai_c2 }}</td>
                                                    <td>{{ $n->nilai_c3 }}</td>
                                                    <td>{{ $n->nilai_c4 }}</td>
                                                    <td>{{ $n->nilai_c5 }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a class="btn btn-primary m-1"
                                                                href="{{ route('user.nilai-alternatif-desa.edit', $n->kode_nilai_alternatif_desa) }}"
                                                                role="button">
                                                                <i class="align-middle" data-feather="edit-2"></i>
                                                            </a>
                                                            <form
                                                                action="{{ route('user.nilai-alternatif-desa.destroy', $n->kode_nilai_alternatif_desa) }}""
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-danger m-1"
                                                                    onclick="confirmDelete(event)">
                                                                    <i class="align-middle" data-feather="trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
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
