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

        <div class="row clearfix" id="form-user" style="display: none;">
            <form class="form-horizontal" id="f-user-add">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                REGISTER USER BARU <button type="button" id="hideFormUser" class="btn btn-sm bg-deep-orange waves-effect pull-right">
                                    <i class="material-icons">swap_horiz</i>
                                </button>
                            </h2>
                        </div>
                        <div class="body">
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
                                            <i class="material-icons">drafts</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="email" id="email" name="email" class="form-control date" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                        <div class="form-line">
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
                                    <button type="submit" id="tambahuser" class="btn btn-block bg-black waves-effect m-r-30">
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

        <div class="row clearfix" id="form-ubah-password" style="display:none;">
            <form class="form-horizontal" id="f-pass">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH PASSWORD <button type="button" id="hideFormUbahPassword" class="btn btn-sm bg-deep-orange waves-effect pull-right">
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
                            DATA USER <button type="button" id="addUser" class="btn btn-sm bg-deep-orange waves-effect pull-right">
                                <i class="material-icons">account_box</i>
                            </button>
                        </h2>



                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="karyawan" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 7%;">No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th style="width: 25%;">Action</th>
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot> -->
                                <!-- <tbody>
                                    <tr>
                                        <td>Agus Salim</td>
                                        <td>agus@gmail.com</td>
                                        <td><button class="btn btn-sm waves-effect bg-pink"><i class="material-icons">delete</i> Hapus</button> <button class="btn btn-sm waves-effect bg-blue" id="ubahPassword"><i class="material-icons">edit</i> Ubah Password</button></td>
                                    </tr>

                                </tbody> -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var modalPass = $('#form-ubah-password'),
        modalUser = $('#form-user'),
        fPass = $('#f-pass'),
        fUser = $('#f-user-add'),
        global_id = ''
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

        var k = '<?= $this->session->userdata("email") ?>';
        var karyawan = $('#karyawan').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': false,
            'info': true,
            'autoWidth': false,
            'ajax': {
                'url': '<?= base_url('admin/getadmin') ?>',
                'dataSrc': function(result) {
                    return result
                }
            },
            // dom: 'Bfrtip',
            // buttons: [
            //     'copy', 'csv', 'excel', 'pdf', 'print'

            // ],
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
                    'data': 'data.email'
                },
                {
                    'target': [3],
                    'data': 'data',
                    'render': function(data) {
                        if (data.email == k) {
                            var render = `
                        <button class="btn btn-sm waves-effect bg-blue" onclick="ubahPass('${data.id}')"><i class="material-icons">edit</i> Ubah Password</button>
                            `
                        } else {
                            var render = `
                            
                            <button class="btn btn-sm waves-effect bg-blue" onclick="ubahPass('${data.id}')"><i class="material-icons">edit</i> Ubah Password</button>
                            <button class="btn btn-sm waves-effect bg-pink" onclick="hapusid('${data.id}')"><i class="material-icons">delete</i> Hapus</button> 
                            `
                        }
                        return render
                    }
                },
            ],
        })
    });

    function clear_form() {
        fUser.find('input').val('')
        fPass.find('input').val('')
    }

    $('#addUser').on('click', function() {
        clear_form()
        $('#form-user').show(500)
        $('#form-ubah-password').hide(500)
        $(window).scrollTop($('body').position().top);
    });
    $('#hideFormUser').on('click', function() {
        $('#form-user').hide(500)
    });
    $('#hideFormUbahPassword').on('click', function() {
        $('#form-ubah-password').hide(500)
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
        global_id = data
        $('#form-ubah-password').show(500)
        $('#form-user').hide(500)
        $(window).scrollTop($('body').position().top);
        $('#iduser').val(data)
        clear_form()
    }

    fPass.on('submit', function(e) {
        e.preventDefault()
        if (fPass.find('#pass1').val() != fPass.find('#pass2').val()) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Password yang Anda masukan tidak sama!'
            })
        } else if (fPass.find('#pass1').val() == '' || fPass.find('#pass2').val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Data belum lengkap!'
            })
        } else {
            $.ajax({
                url: '<?= base_url('admin/updatepass') ?>',
                data: {
                    id: global_id,
                    table: 'user',
                    pass1: fPass.find('#pass1').val()
                },
                type: 'post',
                dataType: 'json',
                success: function(result) {
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
                        $('#form-ubah-password').hide(500)
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

    fUser.on('submit', function(e) {
        e.preventDefault()
        if (fUser.find('#pass1').val() != fUser.find('#pass2').val()) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Password yang Anda masukan tidak sama!'
            })
        } else if ($('#nama').val() == '' || $('#email').val() == '' || fUser.find('#pass1').val() == '' || fUser.find('#pass2').val() == '') {
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
                    pass1: fUser.find('#pass1').val(),
                },
                type: 'post',
                dataType: 'json',
                success: function(result) {
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