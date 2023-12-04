<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Sistem Pendukung Keputusan</span>
        </a>

        <ul class="sidebar-nav">
            @if (Auth::user()->level == 1)
                <li class="sidebar-item {{ $title == 'Dashboard' ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                        <span class="align-middle">Dashboard</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->level == 2)
                <li class="sidebar-item {{ $title == 'Dashboard' ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('user.dashboard') }}">
                        <span class="align-middle">Dashboard</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->level == 1)
                <li
                    class="sidebar-item  {{ $title == 'Kelola Kecamatan' || $title == 'Tambah Kecamatan' || $title == 'Edit Kecamatan' ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.kecamatan.index') }}">
                        <span class="align-middle"></span>Kelola Kecamatan</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->level == 2)
                <li
                    class="sidebar-item {{ $title == 'Kelola Alternatif Desa' || $title == 'Tambah Alternatif Desa' || $title == 'Edit Alternatif Desa' ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('user.alternatif-desa.index') }}">
                        <span class="align-middle">Kelola Desa</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->level == 1)
                <li
                    class="sidebar-item {{ $title == 'Kelola Kriteria' || $title == 'Tambah Kriteria' || $title == 'Edit Kriteria' ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.kriteria.index') }}">
                        <span class="align-middle">Kelola Kriteria</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->level == 1)
                <li
                    class="sidebar-item {{ $title == 'Kelola Subkriteria' || $title == 'Tambah Subkriteria' || $title == 'Edit Subkriteria' ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.subkriteria.index') }}">
                        <span class="align-middle">Kelola Subkriteria</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->level == 1)
                <li class="sidebar-item">
                    <a class="sidebar-link" href="kelola-laporan.html">
                        <span class="align-middle">Kelola Laporan</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
