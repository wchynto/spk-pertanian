@extends('app')

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
                                    <a name="" class="btn btn-primary" href="{{ route('admin.subkriteria.create') }}"
                                        role="button">
                                        <i class="align-middle" data-feather="plus"></i>
                                        Tambah
                                    </a>
                                </div>
                                <div class="card-body">
                                    <table id="datatable" class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Kriteria</th>
                                                <th scope="col">Keterangan</th>
                                                <th scope="col">Nilai</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($subkriteria as $s)
                                                <tr>
                                                    <th scope="row">{{ $i++ }}</th>
                                                    <td>{{ $s->kriteria->nama_kriteria }}</td>
                                                    <td>{{ $s->keterangan }}</td>
                                                    <td>{{ $s->nilai }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a class="btn btn-primary m-1"
                                                                href="{{ route('admin.subkriteria.edit', $s->kode_subkriteria) }}"
                                                                role="button">
                                                                <i class="align-middle" data-feather="edit-2"></i>
                                                            </a>
                                                            <form
                                                                action="{{ route('admin.subkriteria.destroy', $s->kode_subkriteria) }}"
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
