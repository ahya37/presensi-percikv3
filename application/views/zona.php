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
                        <div class="number" id="countshift">3</div>
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

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ZONA WAKTU
                        </h2>
                    </div>
                    <div class="body">
                        <div class="alert bg-orange">
                            <b>Perhatian :</b> Aktifkan hanya satu saja Zona Waktu !
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="karyawan" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Lokasi</th>
                                        <th>Kode</th>
                                        <th>Status</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Lokasi</th>
                                        <th>kode</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot> -->
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

        var karyawan = $('#karyawan').DataTable({
            'paging': false,
            'lengthChange': false,
            'searching': false,
            'ordering': false,
            'info': false,
            'autoWidth': false,
            'ajax': {
                'url': '<?= base_url('admin/getzona') ?>',
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
                    'data': 'data.lokasi',

                },
                {
                    'target': [2],
                    'data': 'data.kode'
                },
                {
                    'target': [3],
                    'data': 'data',
                    'render': function(data) {
                        if (data.default_zone == 'Aktif') {
                            var render = `
                            <span class="badge bg-green">` + data.default_zone + `</span>
                            `
                        } else if (data.default_zone == 'Non-Aktif') {
                            var render = `
                            <span class="badge bg-red">` + data.default_zone + `</span>
                            `
                        }
                        return render
                    }
                },
                {
                    'target': [4],
                    'data': 'data',
                    'render': function(data) {
                        if (data.default_zone == 'Aktif') {
                            var render = `
                            <button class="btn btn-xs waves-effect bg-green" onclick="nonaktif(` + data.id + `)"><i class="material-icons">lock_outline</i></button>
                            `
                        } else if (data.default_zone == 'Non-Aktif') {
                            var render = `
                            <button class="btn btn-xs waves-effect bg-red" onclick="aktifkan(` + data.id + `)"><i class="material-icons">visibility</i></button>
                            `
                        }
                        return render
                    }
                },
            ],
        })
    });

    function nonaktif(data) {
        $.ajax({
            url: '<?= base_url('admin/updatenonaktif') ?>',
            data: {
                id: data,
                table: 'indonesia_timezone'
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                if (result == 200) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Sukses ubah Zona!',
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
            url: '<?= base_url('admin/updateaktif') ?>',
            data: {
                id: data,
                table: 'indonesia_timezone'
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                if (result == 200) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Sukses ubah Zona!',
                        showConfirmButton: false,
                        timer: 1500
                    })
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
</script>