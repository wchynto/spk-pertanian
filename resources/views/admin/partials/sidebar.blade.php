<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Sistem Pendukung Keputusan</span>
        </a>

        <ul class="sidebar-nav">
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
                class="sidebar-item {{ $title == 'Kelola Alternatif Desa' || $title == 'Tambah Alternatif Desa' || $title == 'Edit Alternatif Desa' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.alternatif-desa.index') }}">
                    <span class="align-middle">Kelola Desa</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="kelola-kriteria.html">
                    <span class="align-middle">Kelola Kriteria</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="kelola-subkriteria.html">
                    <span class="align-middle">Kelola Subkriteria</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="kelola-laporan.html">
                    <span class="align-middle">Kelola Laporan</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
