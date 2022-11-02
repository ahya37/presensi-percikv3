<section class="content">
    <div class="container-fluid">
        <!-- <div class="block-header">
            <h2>BLANK PAGE</h2>
        </div> -->
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-indigo hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">face</i>
                    </div>
                    <div class="content">
                        <div class="text">Karyawan</div>
                        <div class="number count-to" id="countkaryawan" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">257</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">flight_takeoff</i>
                    </div>
                    <div class="content">
                        <div class="text">Zona Waktu</div>
                        <div class="number" id="countzona">Asia/Jakarta</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-light-blue hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">access_alarm</i>
                    </div>
                    <div class="content">
                        <div class="text">Shift</div>
                        <div class="number" id="countshift">0</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-purple hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">bookmark</i>
                    </div>
                    <div class="content">
                        <div class="text">Absensi</div>
                        <div class="number" id="countabsensi">1,450</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix" id="form-karyawan" style="display: none;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            REGISTER KARYAWAN BARU <button type="button" id="hideForm" class="btn btn-sm bg-deep-orange waves-effect pull-right">
                                <i class="material-icons">swap_horiz</i>
                            </button>
                        </h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" id="submit">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="nama" name="nama" class="form-control date" placeholder="Nama">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="nik" name="nik" class="form-control date" placeholder="NIK">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group shift">
                                        <span class="input-group-addon">
                                            <i class="material-icons">alarm</i>
                                        </span>
                                        <select class="form-control show-tick" id="shift" name="shift">
                                            <option value="">- Pilih Shift --</option>
                                            <?php foreach ($shift as $key) {
                                                echo '<option value="' . $key['id'] . '">' . $key['shift_name'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">drafts</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="email" name="email" class="form-control date" placeholder="Username">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <h5>Upload Photo</h5>

                                        <input type="file" name="file" id="file">

                                        <p class="help-block">File yang di ijinkan adalah *jpg, *JPG, *png, *PNG.</p>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="password" id="pass" name="pass" class="form-control date" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <button type="submit" id="submit" class="btn btn-block bg-black waves-effect m-r-30">
                                        <i class="material-icons">cloud_upload</i>
                                        <span>Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix" id="form-reset" style="display:none;">
            <form class="form-horizontal" id="f-pass">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                RESET PASSWORD <button type="button" id="hideresets" class="btn btn-sm bg-deep-orange waves-effect pull-right">
                                    <i class="material-icons">swap_horiz</i>
                                </button>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="hidden" id="iduser" name="iduser" class="form-control date">
                                            <input type="password" id="pass1" name="pass1" class="form-control date" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="password" id="pass2" name="pass2" class="form-control date" placeholder="Password Lagi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" id="gopass" class="btn btn-block bg-black waves-effect m-r-30">
                                        <i class="material-icons">cloud_upload</i>
                                        <span>Submit</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DATA KARYAWAN <button type="button" id="addKaryawan" class="btn btn-sm bg-deep-orange waves-effect pull-right">
                                <i class="material-icons">account_box</i>
                            </button>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="karyawan" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="width: 25%;">Nama</th>
                                        <th>Photo</th>
                                        <th style="width: 10%;">NIK</th>
                                        <th style="width: 20%;">Username</th>
                                        <th>Shift</th>
                                        <th style="width: 44%;">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Photo</th>
                                        <th>NIK</th>
                                        <th>Username</th>
                                        <th>Shift</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var global_id = ''
    $(document).ready(function() {
        //ambil data count karyawan, zona waktu, shift dan absensi
        // function reload card_information ada di view footer
        card_information()
        var karyawan = $('#karyawan').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': false,
            'ajax': {
                'url': '<?= base_url('admin/getkaryawan') ?>',
                'dataSrc': function(result) {
                    console.log(result)
                    return result
                }
            },
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'

            ],
            'columns': [{
                    'target': [0],
                    'data': 'data.no',
                },
                {
                    'target': [1],
                    'data': 'data.name',

                },
                {
                    'target': [2],
                    'data': 'data',
                    'render': function(data) {
                        var ft = ''
                        var render = ''
                        if (data.image != '' && data.image != null) {
                            ft = data.image
                        } else {
                            ft = "defaults.png"
                        }
                        render =
                            // `<img class="profile-user-img img-responsive img-circle" src="assets/bsb/images/` + data.image + `" width="50%" height="50%">`
                            `<img alt="Image placeholder" src="assets/bsb/images/` + ft + `" style="width: 45px;height: 45px;border-radius: 50px;object-fit:cover;">`
                        return render
                    }
                },
                {
                    'target': [3],
                    'data': 'data.nik'
                },
                {
                    'target': [4],
                    'data': 'data.email'
                },
                {
                    'target': [5],
                    'data': 'data.shift'
                },
                {
                    'target': [6],
                    'data': 'data',
                    'render': function(data) {
                        if (data.is_active == 2) {
                            var render = `
                            <button class="btn btn-sm waves-effect bg-pink" onclick="hapusid('${data.id}','${data.image}')"><i class="material-icons">delete</i> Hapus</button>
                            <button class="btn btn-sm waves-effect bg-purple" onclick="aktifkan('${data.id}')"><i class="material-icons">lock_outline</i> Aktifkan</button> 
                            <button class="btn btn-sm waves-effect bg-green" onclick="resetpass('${data.id}')"><i class="material-icons">restore</i> Reset</button>
                            `
                        } else if (data.is_active == 1) {
                            var render = `
                            <button class="btn btn-sm waves-effect bg-pink" onclick="hapusid('${data.id}','${data.image}')"><i class="material-icons">delete</i> Hapus</button> 
                            <button class="btn btn-sm waves-effect bg-blue" onclick="nonaktif('${data.id}')"><i class="material-icons">lock_outline</i> Nonaktifkan</button> 
                            <button class="btn btn-sm waves-effect bg-green" onclick="resetpass('${data.id}')"><i class="material-icons">restore</i> Reset</button>
                            `
                        }
                        return render
                    }
                },
            ],
        })
    });

    function clear_form() {

        $('#form-karyawan').find('input').val('')
        $('#form-reset').find('input').val('')
        $("option:selected").prop("selected", false)
        $("div.shift select").val('').change();
    }
    $('#addKaryawan').on('click', function() {
        $('#form-karyawan').hide(500)
        $('#form-karyawan').show(500)
        $('#form-reset').hide(500)
        $(window).scrollTop($('body').position().top);
        clear_form()
    });
    $('#hideForm').on('click', function() {
        $('#form-karyawan').hide(500)
    });

    function hapusid(data, img) {
        Swal.fire({
            title: 'Apakah Anda yakin ?',
            text: "File yang telah dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('admin/hapus_data') ?>',
                    data: {
                        id: data,
                        table: 'user',
                        image: img
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        console.log(result)
                        if (result == 200) {
                            Swal.fire(
                                'Deleted!',
                                'Data Karyawan telah dihapus.',
                                'success'
                            )
                            $('#karyawan').DataTable().ajax.reload();
                            // function reload card_information ada di view footer
                            card_information()
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!'
                            })
                        }
                    }
                })
            }
        })
    }

    function nonaktif(data) {
        $.ajax({
            url: '<?= base_url('admin/updateid') ?>',
            data: {
                id: data,
                table: 'user'
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                console.log(result)
                if (result == 200) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'User Nonaktif!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#karyawan').DataTable().ajax.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    })
                }
            }
        })
    }

    function aktifkan(data) {
        $.ajax({
            url: '<?= base_url('admin/updateaktifid') ?>',
            data: {
                id: data,
                table: 'user'
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                console.log(result)
                if (result == 200) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'User Aktif!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#karyawan').DataTable().ajax.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    })
                }
            }
        })
    }

    $('#submit').submit(function(e) {
        // console.log('ok')
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url('admin/do_upload') ?>?fileupload=' + $('#file').prop('files')[0],
            type: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function(result) {
                // $('#myModal').modal('hide');
                // console.log(result)
                if (result == 200) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Berhasil menambahkan user',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#karyawan').DataTable().ajax.reload();
                    $('#form-karyawan').hide();
                    $('#nama').val('');
                    $('#nik').val('');
                    $('#shift').val('');
                    $('#email').val('');
                    // function reload card_information ada di view footer
                    card_information()

                } else if (result == 100) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Maaf NIK sudah terdaftar!'
                    });
                    $('#karyawan').DataTable().ajax.reload();
                    $('#form-karyawan').hide();
                    $('#nama').val('');
                    $('#nik').val('');
                    $('#shift').val('');
                    $('#email').val('');
                } else if (result == 400) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Maaf Username telah terdaftar!'
                    });
                    $('#karyawan').DataTable().ajax.reload();
                    $('#form-karyawan').hide();
                    $('#nama').val('');
                    $('#nik').val('');
                    $('#shift').val('');
                    $('#email').val('');
                } else if (result == 600) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Anda belum memilih SHIFT!'
                    });
                    $('#karyawan').DataTable().ajax.reload();
                    $('#form-karyawan').hide();
                    $('#nama').val('');
                    $('#nik').val('');
                    $('#shift').val('');
                    $('#email').val('');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Maaf telah terjadi kesalahan!'
                    });
                    $('#karyawan').DataTable().ajax.reload();
                    $('#form-karyawan').hide();
                    $('#nama').val('');
                    $('#nik').val('');
                    $('#shift').val('');
                    $('#email').val('');
                }
            }
        });
    });

    function resetpass(data) {
        global_id = data
        // alert(data)
        $('#form-reset').show(500)
        $('#form-karyawan').hide(500)
        $(window).scrollTop($('body').position().top);
        $('#iduser').val(data)
        clear_form()
    }

    $('#f-pass').on('submit', function(e) {
        e.preventDefault()
        if (($('#pass1').val() != $('#pass2').val()) || $('#pass1').val() == '' || $('#pass2').val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Password yang Anda masukan tidak sama!'
            })
        } else {
            $.ajax({
                url: '<?= base_url('admin/updatepass') ?>',
                data: {
                    id: global_id,
                    table: 'user',
                    pass1: $('#pass1').val()
                },
                type: 'post',
                dataType: 'json',
                success: function(result) {
                    console.log(result)
                    if (result == 200) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Sukses ganti password!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#karyawan').DataTable().ajax.reload();
                        $('#pass1').val('');
                        $('#pass2').val('');
                        $('#form-reset').hide(500)
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    }
                }
            })

        }
    });

    $('#hideresets').on('click', function() {
        $('#form-reset').hide(500)
    });
</script>