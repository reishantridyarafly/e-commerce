<div id="settings" class="tab-pane">
    <div class="user-profile-content">
        <form id="form_settings">
            <div class="row">
                <div class="mb-3">
                    <label for="name" class="form-label">Photo</label>
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" alt="{{ auth()->user()->name }}" id="photoPreview"
                            style="width: 100px; height: 100px; margin-right: 15px"
                            src="{{ auth()->user()->avatar == '' ? 'https://ui-avatars.com/api/?background=random&name=' . auth()->user()->first_name . ' ' . auth()->user()->last_name : asset('storage/avatar/' . auth()->user()->avatar) }}">
                        <button type="button" class="btn btn-danger btn-sm mt-1" id="deletePhoto">Hapus Foto</button>
                    </div>
                    <small style="display: block; margin-top: 10px;">Maksimal ukuran 5 Mb.</small>
                    <input type="file" name="photo" id="photo" class="form-control mt-2"
                        onchange="previewPhoto(this)">
                    <div class="invalid-feedback errorPhoto"></div>
                </div>
                <div class="col-6">
                    <div class="mb-2">
                        <label class="form-label" for="first_name">Nama Depan</label>
                        <input type="text" id="first_name" name="first_name" class="form-control"
                            value="{{ auth()->user()->first_name }}">
                        <small class="text-danger errorFirstName mt-2"></small>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-2">
                        <label class="form-label" for="last_name">Nama Belakang</label>
                        <input type="text" id="last_name" name="last_name" class="form-control"
                            value="{{ auth()->user()->last_name }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="no_telepon">No Telepon</label>
                        <input type="number" id="no_telepon" name="no_telepon" class="form-control"
                            value="{{ auth()->user()->no_telepon }}">
                        <small class="text-danger errorNoTelepon mt-2"></small>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                            value="{{ auth()->user()->email }}">
                        <small class="text-danger errorEmail mt-2"></small>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3" id="datepicker4">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                            value="{{ auth()->user()->tanggal_lahir }}" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="Password">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L" {{ auth()->user()->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="P" {{ auth()->user()->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="bio">Bio</label>
                    <textarea name="bio" id="bio" rows="3" class="form-control">{{ auth()->user()->bio }}</textarea>
                </div>
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
    function previewPhoto(input) {
        var photoPreview = document.getElementById('photoPreview');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                photoPreview.setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#form_settings').submit(function(e) {
            e.preventDefault();
            $.ajax({
                data: new FormData(this),
                url: "{{ route('profile.settings') }}",
                type: "POST",
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
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
                        if (response.errors.photo) {
                            $('#photo').addClass('is-invalid');
                            $('.errorPhoto').html(response.errors.photo);
                        } else {
                            $('#photo').removeClass('is-invalid');
                            $('.errorPhoto').html('');
                        }

                        if (response.errors.first_name) {
                            $('#first_name').addClass('is-invalid');
                            $('.errorFirstName').html(response.errors.first_name);
                        } else {
                            $('#first_name').removeClass('is-invalid');
                            $('.errorFirstName').html('');
                        }

                        if (response.errors.email) {
                            $('#email').addClass('is-invalid');
                            $('.errorEmail').html(response.errors.email);
                        } else {
                            $('#email').removeClass('is-invalid');
                            $('.errorEmail').html('');
                        }

                        if (response.errors.no_telepon) {
                            $('#no_telepon').addClass('is-invalid');
                            $('.errorNoTelepon').html(response.errors.no_telepon);
                        } else {
                            $('#no_telepon').removeClass('is-invalid');
                            $('.errorNoTelepon').html('');
                        }
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: response.success,
                        }).then(function() {
                            top.location.href = "{{ route('profile.index') }}";
                        });
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError);
                }
            });
        });

        $('body').on('click', '#deletePhoto', function() {
            Swal.fire({
                title: 'Delete Photo',
                text: "Are you sure?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete!',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('profile.deletePhoto') }}",
                        type: "POST",
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Sukses',
                                    text: response.success,
                                }).then(function() {
                                    top.location.href =
                                        "{{ route('profile.index') }}";
                                });
                            } else {
                                if (response.errors.photo) {
                                    $('#photo').addClass('is-invalid');
                                    $('.errorPhoto').html(response.errors.photo);
                                } else {
                                    $('#photo').removeClass('is-invalid');
                                    $('.errorPhoto').html('');
                                }
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            console.error(xhr.status + "\n" + xhr.responseText +
                                "\n" + thrownError);
                        }
                    });
                }
            });
        });
    });
</script>
