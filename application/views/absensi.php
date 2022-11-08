<!--Daterangepicker -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
    .header h2 {
        font-weight: lighter;
        text-align: center;
        margin: 0
    }

    .header h3 {
        font-weight: lighter;
        text-align: center;
        margin: 0
    }

    .number {
        text-align: right;
    }
</style>
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
                <div class="card" id="cari" style="display: none;">
                    <div class="header">
                        <h2>
                            PENCARIAN <button type="button" id="hideResult" class="btn btn-sm bg-deep-orange waves-effect pull-right">
                                <i class="material-icons">swap_horiz</i>
                            </button>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label> From : </label>
                                    <div class="form-line">
                                        <input id="search_date_from" type="date" class="form-control" placeholder="Please choose a date...">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label> End : </label>
                                    <div class="form-line">
                                        <input id="search_date_end" type="date" class="form-control" placeholder="Please choose a date...">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button type="button" id="searchabsensi" class="btn btn-sm bg-deep-orange waves-effect">
                                        <i class="material-icons">search</i><span> Search</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" id="absensi">
                    <div class="header">
                        <h2>
                            DATA ABSENSI
                            <!-- <button type="button" id="showResult" class="btn btn-sm bg-deep-orange waves-effect pull-right">
                                <i class="material-icons">swap_horiz</i>
                            </button> -->
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-hover" id="karyawan" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Date</th>
                                        <th>Clock IN</th>
                                        <th>Clock Out</th>
                                        <th>Lokasi IN</th>
                                        <th>Lokasi OUT</th>
                                        <th>Terlambat</th>
                                        <th>Early Leave</th>
                                        <th>Overtime</th>
                                        <th>Total Work</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="d-none">
                    <input type="hidden" value="" id="start_date_filter">
                    <input type="hidden" value="" id="end_date_filter">
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary btn-modal-show" style="display: none;" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>
</section>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="img-show" style="text-align: center;">
                    <img src="<?= base_url() ?>/assets/bsb/images/absensi/6a4d7f6ed71933f97bf9691705bc9b16.png" alt="..." class="img-thumbnail">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<!--DateRangePicker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

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
                'url': '<?= base_url('admin/getabsensi') ?>',
                'type': 'post',
                'data': {
                    "search_date_from": function() {
                        return $("#start_date_filter").val()
                    },
                    "search_date_end": function() {
                        return $("#end_date_filter").val()
                    }
                },
                'dataSrc': function(result) {
                    return result
                }
            },
            "dom": 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'

            ],
            'columns': [{
                    'target': [0],
                    "className": 'text-center',
                    'data': 'data.no',
                },
                {
                    'target': [1],
                    'data': 'data',
                    "className": 'text-center',
                    'render': function(data) {
                        var render = `
                        <div style="display: flex;">
                            <div> <img alt="Image placeholder" src="<?= base_url() ?>assets/bsb/images/` + data.image + `" style="width: 30px;height: 30px;border-radius: 50%;object-fit:cover;margin-right:10px"></div>
                            <div style="margin-top:5px;">` + data.name + `</div>
                        </div>
                        
                        `
                        return render
                    }
                },

                {
                    'target': [2],
                    "className": 'text-center',
                    'data': 'data.nik',

                },
                {
                    'target': [3],
                    "className": 'text-center',
                    'data': 'data.attendance_date'
                },
                {
                    'target': [4],
                    'data': 'data',
                    "className": 'text-center',
                    'render': function(data) {
                        var ci = data.clock_in
                        if (ci == '0000-00-00 00:00:00') {
                            var render = `
                                <div style="margin-top:5px;">${data.clock_in}</div>
                            `
                        } else {
                            var render = `
                        <div style="display:flex;">
                            <div style="margin-right:20px;">
                                <div style="margin-top:5px;">${data.clock_in}</div>
                            </div>
                            <div>
                                <label class="fw-bold text-dark d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" title="Silahkan klik ikon dibawah ini untuk melihat bukti Clock In karyawan!">
                                
                                <a href="#" onclick="show_picture('${data.image_in}','clock_in','${data.name}')" class="btn btn-xs bg-blue waves-effect"><i class="material-icons">insert_photo</i></a> 
                                
                                </label> 
                            </div>
                        </div>
                        `
                        }

                        return render
                    }
                },
                {
                    'target': [5],
                    'data': 'data',
                    "className": 'text-center',
                    'render': function(data) {
                        var co = data.clock_out
                        // console.log(co)
                        if (co == '0000-00-00 00:00:00') {
                            var render = `
                                <div style="margin-top:5px;">${data.clock_out}</div>
                            `
                        } else {
                            var render = `
                            <div style="display:flex;">
                                <div style="margin-right:20px;">
                                    <div style="margin-top:5px;">${data.clock_out}</div>
                                </div>
                                <div>
                                    <label class="fw-bold text-dark d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" title="Silahkan klik ikon dibawah ini untuk melihat bukti Clock Out karyawan!">
                                    
                                    <a href="#"  onclick="show_picture('${data.image_out}','clock_out','${data.name}')" class="btn btn-xs bg-blue waves-effect"><i class="material-icons">insert_photo</i></a> 
                                    
                                    </label> 
                                </div>
                            </div>
                            `
                        }


                        return render
                    }
                },
                {
                    'target': [6],
                    'data': 'data',
                    "className": 'text-center',
                    'render': function(data) {
                        var render = `
                        <a href="https://www.google.com/maps/place/` + data.clock_in_latitude + `,` + data.clock_in_longitude + `" target="_blank" class="btn btn-xs bg-pink waves-effect"><i class="material-icons"> location_on</i></a>
                            `
                        return render
                    }
                },
                {
                    'target': [7],
                    'data': 'data',
                    "className": 'text-center',
                    'render': function(data) {
                        var render = `
                        <a href="https://www.google.com/maps/place/` + data.clock_out_latitude + `,` + data.clock_out_longitude + `" target="_blank" class="btn btn-xs bg-pink waves-effect"><i class="material-icons"> location_on</i></a>
                            `
                        return render
                    }
                },
                {
                    'target': [8],
                    "className": 'text-center',
                    'data': 'data.time_late'
                },
                {
                    'target': [9],
                    "className": 'text-center',
                    'data': 'data.early_leaving'
                },
                {
                    'target': [10],
                    "className": 'text-center',
                    'data': 'data.overtime'
                },
                {
                    'target': [11],
                    "className": 'text-center',
                    'data': 'data.total_work'
                },
            ],

        })
        $("<div class='datesearchbox'></div>").insertAfter(".dt-buttons");
        $("body").tooltip({
            selector: '[data-bs-toggle="tooltip"]'
        });

        //fungsi untuk filtering data berdasarkan tanggal 
        var start_date;
        var end_date;


        //menambahkan daterangepicker di dalam datatables
        $("div.datesearchbox").html('<div class="input-group"> <div class="input-group-addon"> <i class="glyphicon glyphicon-calendar"></i> </div><input type="search" style="width:155px"  class="form-control pull-right" id="datesearch" placeholder="Search by date range.."> </div>');

        document.getElementsByClassName("datesearchbox")[0].style.textAlign = "right";
        document.getElementsByClassName("datesearchbox")[0].style.float = "left";
        document.getElementsByClassName("datesearchbox")[0].style.marginLeft = "250px";

        //konfigurasi daterangepicker pada input dengan id datesearch
        $('#datesearch').daterangepicker({
            autoUpdateInput: false
        });

        //menangani proses saat apply date range
        $('#datesearch').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            start_date = picker.startDate.format('Y-MM-DD');
            end_date = picker.endDate.format('Y-MM-DD');
            $("#start_date_filter").val(start_date)
            $("#end_date_filter").val(end_date)
            karyawan.ajax.reload()

        });

        $('#datesearch').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
            start_date = '';
            end_date = '';
            $("#start_date_filter").val(start_date)
            $("#end_date_filter").val(end_date)
            karyawan.ajax.reload()

        });
    });

    $('#hideResult').on('click', function() {
        $('#cari').hide(500)
    });

    $('#showResult').on('click', function() {
        $('#cari').show(500)
    });



    function change_date2(date) {
        var dt = date
        const d = new Date(dt)
        const ye = new Intl.DateTimeFormat('en', {
            year: 'numeric'
        }).format(d)
        const mo = new Intl.DateTimeFormat('en', {
            month: '2-digit'
        }).format(d)
        const da = new Intl.DateTimeFormat('en', {
            day: '2-digit'
        }).format(d)
        // const value = ye + '-' + mo + '-' + da\
        const value = ye + '-' + mo + '-' + da
        return value
    }



    $('#searchabsensi').on('click', function() {
        $('#cari').hide(500)

        $('#karyawan').DataTable().ajax.reload();
    });

    function show_picture(img, type, name) {
        $('.btn-modal-show').click()
        $('.modal-body').find('#img-show').remove()
        var str = name;
        str = str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
            return letter.toUpperCase();
        });
        if (type == 'clock_in') {
            $('.modal-title').html('Bukti Clock In Karyawan ' + str)
        } else {
            $('.modal-title').html('Bukti Clock Out Karyawan ' + str)
        }

        $('.modal-body').append(`
            <div id="img-show" style="text-align: center;">
                <img src="<?= base_url() ?>/assets/bsb/images/absensi/${img}" alt="${img}" class="img-thumbnail">
            </div>
        `)
        // 6a4d7f6ed71933f97bf9691705bc9b16.png
    }
</script>

<script>
    // <img class="profile-user-img img-responsive img-circle" src="<?= base_url() ?>assets/bsb/images/` + data.image + `" width="10%" height="10%"> </div>

    // var DateFilterFunction = (function(oSettings, aData, iDataIndex) {
    //     var dateStart = parseDateValue(start_date);
    //     var dateEnd = parseDateValue(end_date);
    //     //Kolom tanggal yang akan kita gunakan berada dalam urutan 2, karena dihitung mulai dari 0
    //     //nama depan = 0
    //     //nama belakang = 1
    //     //tanggal terdaftar =2
    //     var evalDate = parseDateValue(change_date(aData[3]));
    //     // evalDate = change_date(evalDate)
    //     console.log(change_date(aData[3]))
    //     if ((isNaN(dateStart) && isNaN(dateEnd)) ||
    //         (isNaN(dateStart) && evalDate <= dateEnd) ||
    //         (dateStart <= evalDate && isNaN(dateEnd)) ||
    //         (dateStart <= evalDate && evalDate <= dateEnd)) {
    //         return true;
    //     }
    //     return false;
    // });

    // // fungsi untuk converting format tanggal dd/mm/yyyy menjadi format tanggal javascript menggunakan zona aktubrowser
    // function parseDateValue(rawDate) {
    //     var dateArray = rawDate.split("/");
    //     var parsedDate = new Date(dateArray[2], parseInt(dateArray[1]) - 1, dateArray[0]);
    //     // -1 because months are from 0 to 11   
    //     return parsedDate;
    // }

    // $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
    // karyawan.draw();

    // var today = new Date();
    // var endDate = new Date();
    // // endDate.setMonth(endDate.getMonth() + 1);
    // $('#datesearch').daterangepicker({
    //     startDate: today, // after open picker you'll see this dates as picked
    //     endDate: endDate,
    // });

    // $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
    // karyawan.draw();

    // function change_date(date) {
    //     var dt = date
    //     const d = new Date(dt)
    //     const ye = new Intl.DateTimeFormat('en', {
    //         year: 'numeric'
    //     }).format(d)
    //     const mo = new Intl.DateTimeFormat('en', {
    //         month: '2-digit'
    //     }).format(d)
    //     const da = new Intl.DateTimeFormat('en', {
    //         day: '2-digit'
    //     }).format(d)
    //     // const value = ye + '-' + mo + '-' + da\
    //     const value = da + '/' + mo + '/' + ye
    //     return value
    // }

    // $('#searchabsensi').on('click', function() {
    //     $('#cari').hide(500)

    //     var karyawan = $('#karyawan').DataTable({
    //         'paging': true,
    //         'lengthChange': false,
    //         'searching': true,
    //         'ordering': false,
    //         'info': true,
    //         'autoWidth': false,
    //         'ajax': {
    //             'url': '<?= base_url('admin/getabsensi') ?>',
    //             'dataSrc': function(result) {
    //                 console.log(result)
    //                 return result
    //             }
    //         },
    //         dom: 'Bfrtip',
    //         buttons: [
    //             'copy', 'csv', 'excel', 'pdf', 'print'

    //         ],
    //         'columns': [{
    //                 'target': [0],
    //                 'data': 'data.no',
    //             },
    //             {
    //                 'target': [1],
    //                 'data': 'data.name',

    //             },
    //             {
    //                 'target': [2],
    //                 'data': 'data.nik',

    //             },
    //             {
    //                 'target': [3],
    //                 'data': 'data.attendance_date'
    //             },
    //             {
    //                 'target': [4],
    //                 'data': 'data.clock_in'
    //             },
    //             {
    //                 'target': [5],
    //                 'data': 'data.clock_out'
    //             },
    //             {
    //                 'target': [6],
    //                 'data': 'data',
    //                 'render': function(data) {
    //                     var render = `
    //                     <a href="https://www.google.com/maps/place/` + data.clock_in_latitude + `,` + data.clock_in_longitude + `" target="_blank" class="btn btn-xs bg-pink waves-effect"><i class="material-icons"> location_on</i></a>
    //                         `
    //                     return render
    //                 }
    //             },
    //             {
    //                 'target': [7],
    //                 'data': 'data',
    //                 'render': function(data) {
    //                     var render = `
    //                     <a href="https://www.google.com/maps/place/` + data.clock_out_latitude + `,` + data.clock_out_longitude + `" target="_blank" class="btn btn-xs bg-pink waves-effect"><i class="material-icons"> location_on</i></a>
    //                         `
    //                     return render
    //                 }
    //             },
    //             {
    //                 'target': [8],
    //                 'data': 'data.time_late'
    //             },
    //             {
    //                 'target': [9],
    //                 'data': 'data.early_leaving'
    //             },
    //             {
    //                 'target': [10],
    //                 'data': 'data.overtime'
    //             },
    //             {
    //                 'target': [11],
    //                 'data': 'data.total_work'
    //             },
    //         ],
    //     })


    // });
</script>