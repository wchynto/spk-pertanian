<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            showConfirmButton: true,
            timer: 1500,
        })
    @endif

    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ session('error') }}',
            showConfirmButton: true,
            timer: 1500
        })
    @endif

    function confirmDelete(e) {
        e.preventDefault();
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan',
            text: 'Apakah anda yakin ingin menghapus data ini?',
            showConfirmButton: true,
            showCancelmButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.closest('form').submit();
            }
        });
    }
</script>
