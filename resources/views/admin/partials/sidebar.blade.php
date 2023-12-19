<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Sistem Pendukung Keputusan</span>
        </a>

        <ul class="sidebar-nav">
            {{-- Admin navbar navigation --}}
            @if (Auth::user()->level == 1)
                <li class="sidebar-item {{ $title == 'Dashboard' ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                        <span class="align-middle">Dashboard</span>
                    </a>
                </li>
                <li
                    class="sidebar-item  {{ $title == 'Kelola Kecamatan' || $title == 'Tambah Kecamatan' || $title == 'Edit Kecamatan' ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.kecamatan.index') }}">
                        <span class="align-middle"></span>Kelola Kecamatan</span>
                    </a>
                </li>
                <li
                    class="sidebar-item {{ $title == 'Kelola Kriteria' || $title == 'Tambah Kriteria' || $title == 'Edit Kriteria' ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.kriteria.index') }}">
                        <span class="align-middle">Kelola Kriteria</span>
                    </a>
                </li>
                <li
                    class="sidebar-item {{ $title == 'Kelola Subkriteria' || $title == 'Tambah Subkriteria' || $title == 'Edit Subkriteria' ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.subkriteria.index') }}">
                        <span class="align-middle">Kelola Subkriteria</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link" href="kelola-laporan.html">
                        <span class="align-middle">Kelola Laporan</span>
                    </a>
                </li> --}}

                <li
                    class="sidebar-item {{ $title == 'Kelola Alternatif Desa' || $title == 'Tambah Alternatif Desa' || $title == 'Edit Alternatif Desa' ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.alternatif-desa.index') }}">
                        <span class="align-middle">Kelola Desa</span>
                    </a>
                </li>
                <li
                    class="sidebar-item {{ $title == 'Kelola Nilai Alternatif Desa' || $title == 'Tambah Nilai Alternatif Desa' || $title == 'Edit Nilai Alternatif Desa' ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.nilai-alternatif-desa.index') }}">
                        <span class="align-middle">Kelola Nilai Alternatif Desa</span>
                    </a>
                </li>
            @endif

            {{-- User sidebar navigation --}}
            @if (Auth::user()->level == 2)
                <li class="sidebar-item {{ $title == 'Dashboard' ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('user.dashboard') }}">
                        <span class="align-middle">Dashboard</span>
                    </a>
                </li>
            @endif

            @php
                $prefix = \Route::current()->getPrefix();
            @endphp

            <li
                class="sidebar-item {{ $title == 'Normalisasi' || $title == 'Normalisasi Terbobot' || $title == 'Hasil Akhir' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route("$prefix.perhitungan-moora.normalisasi") }}">
                    <span class="align-middle">Kelola Perhitungan MOORA</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
