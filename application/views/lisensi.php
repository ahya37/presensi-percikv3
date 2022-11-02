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

        <div class="row clearfix" id="form-update-lisensi" style="display:none;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            UPDATE LISENSI <button type="button" id="hideFormUbahPassword" class="btn btn-sm bg-deep-orange waves-effect pull-right">
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
                                        <input type="text" id="sn" name="sn" class="form-control date" placeholder="Serial Number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">https</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" id="url" name="url" class="form-control date" placeholder="URL Aplikasi">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <button type="button" id="gopass" class="btn btn-block bg-black waves-effect m-r-30">
                                    <i class="material-icons">cloud_upload</i>
                                    <span>Submit</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            LISENSI APLIKASI<button type="button" id="updateLisensi" class="btn btn-sm bg-deep-orange waves-effect pull-right">
                                <i class="material-icons">lock_outline</i>
                            </button>
                        </h2>



                    </div>
                    <div class="body">
                        <div class="alert bg-orange">
                            <b>Perhatian :</b> Pastikan masukan Serial Number dan URL Aplikasi dengan benar, kesalahan input mengakibatkan aplikasi tidak bisa berjalan dengan baik !
                        </div>
                        <div class="">
                            <table class="table table-bordered table-striped table-hover" id="karyawan" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Lisence Number</th>
                                        <th>URL Aplikasi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        //ambil data count karyawan, zona waktu, shift dan absensi
        $.ajax({
            url: '<?= base_url('admin/getDataCount') ?>',
            dataType: 'json',
            success: function(result) {
                result.forEach(d => {
                    var html = '<div class="number count-to" id="countkaryawan" data-from="0" data-to="' + d.karyawan + '" data-speed="1000" data-fresh-interval="20">' + d.karyawan + '</div>';
                    $('#countkaryawan').html(html);
                    var html = '<div class="number" id="countzona">' + d.zona + '</div>';
                    $('#countzona').html(html);
                    var html = '<div class="number" id="countshift">' + d.shift + '</div>';
                    $('#countshift').html(html);
                    var html = ' <div class="number" id="countabsensi">' + d.absensi + '</div>';
                    $('#countabsensi').html(html);

                });
            }
        });
        //ambil serial dari database
        $.ajax({
            url: '<?= base_url('admin/getserial') ?>',
            dataType: 'json',
            success: function(result) {
                $('#sn').val(result.serial)
                $('#url').val(result.url)
            }
        });

        var k = '<?= $this->session->userdata("email") ?>';
        var karyawan = $('#karyawan').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': false,
            'info': true,
            'autoWidth': false,
            'ajax': {
                'url': '<?= base_url('admin/getdetilserial') ?>',
                'dataSrc': function(result) {
                    console.log(result)
                    return result
                }
            },
            // dom: 'Bfrtip',
            // buttons: [
            //     'copy', 'csv', 'excel', 'pdf', 'print'

            // ],
            'columns': [{
                'target': [0],
                'data': 'data.serial',
            }, {
                'target': [1],
                'data': 'data.url',
            }, ],
        })
    });

    $('#updateLisensi').on('click', function() {
        $('#form-update-lisensi').show(500)
    });
    $('#hideFormUser').on('click', function() {
        $('#form-user').hide(500)
    });
    $('#hideFormUbahPassword').on('click', function() {
        $('#form-update-lisensi').hide(500)
    });

    function hapusid(data) {
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
                    url: '<?= base_url('admin/hapusid') ?>',
                    data: {
                        id: data,
                        table: 'user'
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        console.log(result)
                        if (result == 200) {
                            Swal.fire(
                                'Deleted!',
                                'Data User telah dihapus.',
                                'success'
                            )
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
        })
    }

    function ubahPass(data) {
        // alert(data)
        $('#form-ubah-password').show(500)
        $('#iduser').val(data)
    }

    $('#gopass').on('click', function() {

        $.ajax({
            // url: 'http://localhost:8080/api',
            url: 'https://api.solusiciptamedia.com/api',
            data: {
                sn: $('#sn').val(),
                url: $('#url').val()
            },
            type: 'get',
            dataType: 'json',
            success: function(result) {
                result.forEach(d => {
                    console.log(d.val)
                    if (d.val == 200) {
                        //logic insert ke database
                        $.ajax({
                            url: '<?= base_url('admin/updateapi') ?>',
                            data: {
                                sn: $('#sn').val(),
                                url: $('#url').val(),
                                api: d.api
                            },
                            type: 'post',
                            dataType: 'json',
                            success: function(result) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Aplikasi sudah di Aktivasi!',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }

                        });
                        //end insert data


                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'SERIAL NUMBER YANG ANDA MASUKKAN SALAH!'
                        })
                    }
                });
            }
        })


    });

    $('#tambahuser').on('click', function() {
        if ($('#pass1').val() != $('#pass2').val()) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Password yang Anda masukan tidak sama!'
            })
        } else if ($('#nama').val() == '' || $('#email').val() == '' || $('#pass1').val() == '' || $('#pass2').val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Data belum lengkap!'
            })
        } else {
            $.ajax({
                url: '<?= base_url('admin/tambahadmin') ?>',
                data: {
                    table: 'user',
                    nama: $('#nama').val(),
                    email: $('#email').val(),
                    password: $('#pass1').val(),
                },
                type: 'post',
                dataType: 'json',
                success: function(result) {
                    console.log(result)
                    if (result == 200) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Berhasil menambahkan Admin!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#karyawan').DataTable().ajax.reload();
                        $('#nama').val('');
                        $('#email').val('');
                        $('#pass1').val('');
                        $('#pass2').val('');
                        $('#form-user').hide(500)
                    } else if (result == 500) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Email sudah digunakan oleh user lain!'
                        })
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
</script>