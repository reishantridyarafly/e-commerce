<div id="delete" class="tab-pane">
    <form id="form_delete">
        <div class="row">
            <div class="mb-1">
                <div class="alert alert-danger">Apakah anda yakin ingin <strong>menghapus akun ini?</strong>?</div>
            </div>

            <div class="mb-3">
                <label for="new_password" class="form-label">Password</label>
                <div class="input-group input-group-merge">
                    <input type="password" class="form-control" name="password" id="new_password">
                    <div class="input-group-text" data-password="false">
                        <span class="password-eye"></span>
                    </div>
                </div>
                <small class="text-danger errorPassword"></small>
            </div>

        </div> <!-- end row -->

        <div class="text-end">
            <button type="submit" class="btn btn-danger mt-2" id="delete_account"><i
                    class="ri-delete-bin-line me-1 fs-16 lh-1"></i>
                Hapus</button>
        </div>
    </form>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<script>
    $(document).ready(function() {
        $('#form_delete').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikannya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        data: $(this).serialize(),
                        url: "{{ route('profile.deleteAccount') }}",
                        type: "POST",
                        dataType: 'json',
                        beforeSend: function() {
                            $('#delete_account').prop('disabled', true);
                            $('#delete_account').html(
                                `<i class="ri-delete-bin-line me-1 fs-16 lh-1"></i> Proses...`
                            );
                        },
                        success: function(response) {
                            if (response.errors && response.errors.password) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response.errors.password,
                                });
                            } else {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Sukses',
                                    text: 'Akun Anda telah berhasil dihapus.',
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(function() {
                                    var logoutForm = document
                                        .getElementById('logout-form');
                                    logoutForm.submit();
                                });
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            console.error(xhr.status + "\n" + xhr.responseText +
                                "\n" + thrownError);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Terjadi kesalahan, silakan coba lagi nanti.',
                            });
                        },
                        complete: function() {
                            $('#delete_account').prop('disabled', false);
                            $('#delete_account').html(
                                `<i class="ri-delete-bin-line me-1 fs-16 lh-1"></i> Hapus`
                            );
                        }
                    });
                }
            });
        });
    });
</script>
