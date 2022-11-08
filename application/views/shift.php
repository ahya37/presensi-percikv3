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

        <div class="row clearfix" id="form-shift" style="display: none;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            TAMBAH SHIFT <button type="button" id="hideFormShift" class="btn btn-sm bg-deep-orange waves-effect pull-right">
                                <i class="material-icons">swap_horiz</i>
                            </button>
                        </h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" id="form_submit">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">alarm</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="nama" name="nama" class="form-control date" placeholder="Nama Shift">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="senin_in" name="senin_in" class="timepicker form-control" placeholder="senin_in">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="senin_out" name="senin_out" class="timepicker form-control" placeholder="senin_out">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="selasa_in" name="selasa_in" class="timepicker form-control" placeholder="selasa_in">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="selasa_out" name="selasa_out" class="timepicker form-control" placeholder="selasa_out">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="rabu_in" name="rabu_in" class="timepicker form-control" placeholder="rabu_in">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="rabu_out" name="rabu_out" class="timepicker form-control" placeholder="rabu_out">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="kamis_in" name="kamis_in" class="timepicker form-control" placeholder="kamis_in">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="kamis_out" name="kamis_out" class="timepicker form-control" placeholder="kamis_out">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="jumat_in" name="jumat_in" class="timepicker form-control" placeholder="jumat_in">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="jumat_out" name="jumat_out" class="timepicker form-control" placeholder="jumat_out">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="sabtu_in" name="sabtu_in" class="timepicker form-control" placeholder="sabtu_in">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="sabtu_out" name="sabtu_out" class="timepicker form-control" placeholder="sabtu_out">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="minggu_in" name="minggu_in" class="timepicker form-control" placeholder="minggu_in">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="minggu_out" name="minggu_out" class="timepicker form-control" placeholder="minggu_out">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <button type="button" id="tambahshift" class="btn btn-block bg-black waves-effect m-r-30">
                                            <i class="material-icons">cloud_upload</i>
                                            <span>Submit</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix" id="form-shift-edit" style="display: none;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            EDIT SHIFT <button type="button" id="hideFormShiftEdit" class="btn btn-sm bg-deep-orange waves-effect pull-right">
                                <i class="material-icons">swap_horiz</i>
                            </button>
                        </h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" id="form_submit">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">alarm</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="nama_edit" name="nama_edit" class="form-control date" placeholder="Nama Shift">
                                            <input type="hidden" id="id_shift" name="id_shift" class="form-control date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label> Senin IN</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="senin_in_edit" name="senin_in_edit" class="timepicker form-control" placeholder="senin_in">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label> Senin OUT</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="senin_out_edit" name="senin_out_edit" class="timepicker form-control" placeholder="senin_out">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label> Selasa IN</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="selasa_in_edit" name="selasa_in_edit" class="timepicker form-control" placeholder="selasa_in">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label> Selasa OUT</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="selasa_out_edit" name="selasa_out_edit" class="timepicker form-control" placeholder="selasa_out">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label> Rabu IN</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="rabu_in_edit" name="rabu_in_edit" class="timepicker form-control" placeholder="rabu_in">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label> Rabu OUT</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="rabu_out_edit" name="rabu_out_edit" class="timepicker form-control" placeholder="rabu_out">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label> Kamis IN</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="kamis_in_edit" name="kamis_in_edit" class="timepicker form-control" placeholder="kamis_in">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label> Kamis OUT</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="kamis_out_edit" name="kamis_out_edit" class="timepicker form-control" placeholder="kamis_out">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label> Jumat IN</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="jumat_in_edit" name="jumat_in_edit" class="timepicker form-control" placeholder="jumat_in">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label> Jumat OUT</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="jumat_out_edit" name="jumat_out_edit" class="timepicker form-control" placeholder="jumat_out">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label> Sabtu IN</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="sabtu_in_edit" name="sabtu_in_edit" class="timepicker form-control" placeholder="sabtu_in">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label> Sabtu OUT</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="sabtu_out_edit" name="sabtu_out_edit" class="timepicker form-control" placeholder="sabtu_out">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label> Minggu IN</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="minggu_in_edit" name="minggu_in_edit" class="timepicker form-control" placeholder="minggu_in">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label> Minggu OUT</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">picture_in_picture</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="minggu_out_edit" name="minggu_out_edit" class="timepicker form-control" placeholder="minggu_out">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <button type="button" id="editshift" class="btn btn-block bg-black waves-effect m-r-30">
                                            <i class="material-icons">cloud_upload</i>
                                            <span>Submit</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            WAKTU KERJA <button type="button" id="addShift" class="btn btn-sm bg-deep-orange waves-effect pull-right">
                                <i class="material-icons">alarm</i>
                            </button>
                        </h2>



                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="karyawan" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="width: 50%;">Action</th>
                                        <th>Shift</th>
                                        <th>Senin IN</th>
                                        <th>Senin OUT</th>
                                        <th>Selasa IN</th>
                                        <th>Selasa OUT</th>
                                        <th>Rabu IN</th>
                                        <th>Rabu OUT</th>
                                        <th>Kamis IN</th>
                                        <th>Kamis OUT</th>
                                        <th>Jumat IN</th>
                                        <th>Jumat OUT</th>
                                        <th>Sabtu IN</th>
                                        <th>Sabtu OUT</th>
                                        <th>Minggu IN</th>
                                        <th>Minggu OUT</th>
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

        var karyawan = $('#karyawan').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': false,
            'ajax': {
                'url': '<?= base_url('admin/getdatashift') ?>',
                'dataSrc': function(result) {
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
                    'data': 'data',
                    'render': function(data) {

                        var render = `
                        <div style="display: flex;"><button class="btn btn-xs waves-effect bg-green" onclick="editid(` + data.id + `)"><i class="material-icons">mode_edit</i> </button> &nbsp; <button class="btn btn-xs waves-effect bg-pink" onclick="deleteid(` + data.id + `)"><i class="material-icons">delete</i> </button></div>
                            `
                        return render
                    }
                },
                {
                    'target': [2],
                    'data': 'data.shift_name'
                },
                {
                    'target': [3],
                    'data': 'data.senin_in'
                },
                {
                    'target': [4],
                    'data': 'data.senin_out'
                },
                {
                    'target': [5],
                    'data': 'data.selasa_in'
                },
                {
                    'target': [6],
                    'data': 'data.selasa_out'
                },
                {
                    'target': [7],
                    'data': 'data.rabu_in'
                },
                {
                    'target': [8],
                    'data': 'data.rabu_out'
                },
                {
                    'target': [9],
                    'data': 'data.kamis_in'
                },
                {
                    'target': [10],
                    'data': 'data.kamis_out'
                },
                {
                    'target': [11],
                    'data': 'data.jumat_in'
                },
                {
                    'target': [12],
                    'data': 'data.jumat_out'
                },
                {
                    'target': [13],
                    'data': 'data.sabtu_in'
                },
                {
                    'target': [14],
                    'data': 'data.sabtu_out'
                },
                {
                    'target': [15],
                    'data': 'data.minggu_in'
                },
                {
                    'target': [16],
                    'data': 'data.minggu_out'
                },
            ],
        })
    });

    function deleteid(data) {
        $.ajax({
            url: '<?= base_url('admin/hapusid') ?>',
            data: {
                id: data,
                table: 'office_shift'
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                if (result == 200) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Sukses Hapus!',
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

    $('#addShift').on('click', function() {
        $('#form-shift').show(500)
    });
    $('#hideFormShift').on('click', function() {
        $('#form-shift').hide(500)
    });

    function editid(data) {
        $('#form-shift-edit').show(500)
        $('#id_shift').val(data)

        $.ajax({
            url: '<?= base_url('admin/getshiftedit') ?>',
            data: {
                id: data,
                table: 'office_shift'
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                result.forEach(d => {
                    $('#nama_edit').val(d.shift_name)
                    $('#senin_in_edit').val(d.senin_in)
                    $('#senin_out_edit').val(d.senin_out)
                    $('#selasa_in_edit').val(d.selasa_in)
                    $('#selasa_out_edit').val(d.selasa_out)
                    $('#rabu_in_edit').val(d.rabu_in)
                    $('#rabu_out_edit').val(d.rabu_out)
                    $('#kamis_in_edit').val(d.kamis_in)
                    $('#kamis_out_edit').val(d.kamis_out)
                    $('#jumat_in_edit').val(d.jumat_in)
                    $('#jumat_out_edit').val(d.jumat_out)
                    $('#sabtu_in_edit').val(d.sabtu_in)
                    $('#sabtu_out_edit').val(d.sabtu_out)
                    $('#minggu_in_edit').val(d.minggu_in)
                    $('#minggu_out_edit').val(d.minggu_out)
                });
            }
        })
    }

    $('#hideFormShiftEdit').on('click', function() {
        $('#form-shift-edit').hide(500)
    });

    $('#tambahshift').on('click', function() {
        //cek dulu apakah ada input kosong ?
        if ($('#nama').val() == '' || $('#senin_in').val() == '' || $('#senin_out').val() == '' || $('#selasa_in').val() == '' || $('#selasa_out').val() == '' || $('#rabu_in').val() == '' || $('#rabu_out').val() == '' || $('#kamis_in').val() == '' || $('#kamis_out').val() == '' || $('#jumat_in').val() == '' || $('#jumat_out').val() == '' || $('#sabtu_in').val() == '' || $('#sabtu_out').val() == '' || $('#minggu_in').val() == '' || $('#minggu_out').val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Data belum lengkap!'
            })

        } else {

            $.ajax({
                url: '<?= base_url('admin/tambahshift') ?>',
                data: {
                    table: 'office_shift',
                    nama: $('#nama').val(),
                    senin_in: $('#senin_in').val(),
                    senin_out: $('#senin_out').val(),
                    selasa_in: $('#selasa_in').val(),
                    selasa_out: $('#selasa_out').val(),
                    rabu_in: $('#rabu_in').val(),
                    rabu_out: $('#rabu_out').val(),
                    kamis_in: $('#kamis_in').val(),
                    kamis_out: $('#kamis_out').val(),
                    jumat_in: $('#jumat_in').val(),
                    jumat_out: $('#jumat_out').val(),
                    sabtu_in: $('#sabtu_in').val(),
                    sabtu_out: $('#sabtu_out').val(),
                    minggu_in: $('#minggu_in').val(),
                    minggu_out: $('#minggu_out').val(),
                },
                type: 'post',
                dataType: 'json',
                success: function(result) {
                    if (result == 200) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Berhasil menambahkan Shift!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#karyawan').DataTable().ajax.reload();
                        // function reload card_information ada di view footer
                        card_information()
                        $('#nama').val('');
                        $('#senin_in').val('');
                        $('#senin_out').val('');
                        $('#selasa_in').val('');
                        $('#selasa_out').val('');
                        $('#rabu_in').val('');
                        $('#rabu_out').val('');
                        $('#kamis_in').val('');
                        $('#kamis_out').val('');
                        $('#jumat_in').val('');
                        $('#jumat_out').val('');
                        $('#sabtu_in').val('');
                        $('#sabtu_out').val('');
                        $('#minggu_in').val('');
                        $('#minggu_out').val('');
                        $('#form-shift').hide(500)
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

    $('#editshift').on('click', function() {

        //cek dulu apakah ada input kosong ?
        if ($('#nama_edit').val() == '' || $('#senin_in_edit').val() == '' || $('#senin_out_edit').val() == '' || $('#selasa_in_edit').val() == '' || $('#selasa_out_edit').val() == '' || $('#rabu_in_edit').val() == '' || $('#rabu_out_edit').val() == '' || $('#kamis_in_edit').val() == '' || $('#kamis_out_edit').val() == '' || $('#jumat_in_edit').val() == '' || $('#jumat_out_edit').val() == '' || $('#sabtu_in_edit').val() == '' || $('#sabtu_out_edit').val() == '' || $('#minggu_in_edit').val() == '' || $('#minggu_out_edit').val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Data belum lengkap!'
            })
        } else {

            $.ajax({
                url: '<?= base_url('admin/editshift') ?>',
                data: {
                    table: 'office_shift',
                    id: $('#id_shift').val(),
                    nama: $('#nama_edit').val(),
                    senin_in: $('#senin_in_edit').val(),
                    senin_out: $('#senin_out_edit').val(),
                    selasa_in: $('#selasa_in_edit').val(),
                    selasa_out: $('#selasa_out_edit').val(),
                    rabu_in: $('#rabu_in_edit').val(),
                    rabu_out: $('#rabu_out_edit').val(),
                    kamis_in: $('#kamis_in_edit').val(),
                    kamis_out: $('#kamis_out_edit').val(),
                    jumat_in: $('#jumat_in_edit').val(),
                    jumat_out: $('#jumat_out_edit').val(),
                    sabtu_in: $('#sabtu_in_edit').val(),
                    sabtu_out: $('#sabtu_out_edit').val(),
                    minggu_in: $('#minggu_in_edit').val(),
                    minggu_out: $('#minggu_out_edit').val(),
                },
                type: 'post',
                dataType: 'json',
                success: function(result) {
                    if (result == 200) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Berhasil edit data Shift!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#karyawan').DataTable().ajax.reload();
                        // function reload card_information ada di view footer
                        card_information()
                        $('#nama_edit').val('');
                        $('#senin_in_edit').val('');
                        $('#senin_out_edit').val('');
                        $('#selasa_in_edit').val('');
                        $('#selasa_out_edit').val('');
                        $('#rabu_in_edit').val('');
                        $('#rabu_out_edit').val('');
                        $('#kamis_in_edit').val('');
                        $('#kamis_out_edit').val('');
                        $('#jumat_in_edit').val('');
                        $('#jumat_out_edit').val('');
                        $('#sabtu_in_edit').val('');
                        $('#sabtu_out_edit').val('');
                        $('#minggu_in_edit').val('');
                        $('#minggu_out_edit').val('');
                        $('#form-shift-edit').hide(500)
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