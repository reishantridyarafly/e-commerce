<div id="password" class="tab-pane">
    <div class="user-profile-content">
        <form id="form_password">
            <div class="mb-3">
                <label for="old_password" class="form-label">Password Lama</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="old_password" name="old_password" class="form-control"
                        placeholder="Masukan password lama">
                    <div class="input-group-text" data-password="false">
                        <span class="password-eye"></span>
                    </div>
                </div>
                <small class="text-danger errorOldPassword mt-2"></small>
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <div class="input-group input-group-merge">
                    <input type="password" class="form-control" name="password" id="new_password"
                        placeholder="Masukan password baru">
                    <div class="input-group-text" data-password="false">
                        <span class="password-eye"></span>
                    </div>
                </div>
                <small class="text-danger errorPassword"></small>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi
                    Password</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                        placeholder="Masukan konfirmasi password">
                    <div class="input-group-text" data-password="false">
                        <span class="password-eye"></span>
                    </div>
                </div>
                <small class="text-danger errorConfirmPassword mt-2"></small>
            </div>
            <div class="text-end">
                <button class="btn btn-primary" type="submit" id="simpan"><i
                        class="ri-save-line me-1 fs-16 lh-1"></i>
                    Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#form_password').submit(function(e) {
            e.preventDefault();
            $.ajax({
                data: $(this).serialize(),
                url: "{{ route('profile.changePassword') }}",
                type: "POST",
                dataType: 'json',
                beforeSend: function() {
                    $('#simpan').attr('disable', 'disabled');
                    $('#simpan').text('Proses...');
                },
                complete: function() {
                    $('#simpan').removeAttr('disable');
                    $('#simpan').html(
                        `<i class="ri-save-line me-1 fs-16 lh-1"></i> Simpan`);
                },
                success: function(response) {
                    if (response.errors) {
                        if (response.errors.old_password) {
                            $('#old_password').addClass('is-invalid');
                            $('.errorOldPassword').html(response.errors.old_password);
                        } else {
                            $('#old_password').removeClass('is-invalid');
                            $('.errorOldPassword').html('');
                        }

                        if (response.errors.password) {
                            $('#new_password').addClass('is-invalid');
                            $('.errorPassword').html(response.errors.password);
                        } else {
                            $('#new_password').removeClass('is-invalid');
                            $('.errorPassword').html('');
                        }

                        if (response.errors.password_confirmation) {
                            $('#password_confirmation').addClass('is-invalid');
                            $('.errorConfirmPassword').html(response.errors
                                .password_confirmation);
                        } else {
                            $('#password_confirmation').removeClass('is-invalid');
                            $('.errorConfirmPassword').html('');
                        }
                    } else {
                        if (response.error_password) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.error_password,
                            })
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: response.success,
                            }).then(function() {
                                top.location.href =
                                    "{{ route('profile.index') }}";
                            });
                        }
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError);
                }
            });
        });
    });
</script>
