<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Absensi Karyawan</title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url('assets/bsb/images/calendar.png') ?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url('assets/bsb/plugins/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url('assets/bsb/plugins/node-waves/waves.css') ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url('assets/bsb/plugins/animate-css/animate.css') ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url('assets/bsb/css/style.css') ?>" rel="stylesheet">
    <style type="text/css">
        .profile-user-img {
            margin: 0 auto;
            width: 100px;
            padding: 3px;
            border: 3px solid #fff;
        }

        .waktu {
            margin-bottom: 30px;
            text-align: center;
            font-weight: bold;
            font-size: 24px;
            color: #fff;
            background-color: gainsboro;
        }

        .histori {
            font-size: 10px;
            font-style: italic;
        }

        .camera {
            /* display: flex; */
            justify-content: center;
            align-items: center;
            width: 100%;
            margin: 1% auto;
            position: relative;
            /* height: 500px; */

        }

        body {
            background-color: #EBC500;
        }

        #body {
            margin: 10px;
        }

        canvas {
            /* margin-top: -143px; */
            margin-top: -143px;
            /* width: 400;
            margin-left: auto;
            margin-right: auto;
            display: block; */
        }



        @media screen and (max-width: 992px) {
            #canvas {
                width: 0%;
            }

            #canvas2 {
                width: 0%;
            }

            .btn-clock-in.btn:not(.btn-link):not(.btn-circle) {
                font-size: 13px;
            }

            .btn-clock-out.btn:not(.btn-link):not(.btn-circle) {
                font-size: 13px;
            }
        }

        @media screen and (max-width: 400px) {
            #canvas {
                width: 100%;
            }

            #canvas2 {
                width: 100%;
            }

            .btn-clock-in.btn:not(.btn-link):not(.btn-circle) {
                font-size: 10px;
            }

            .btn-clock-in.btn:not(.btn-link):not(.btn-circle) i {
                font-size: 11px;
                position: relative;
                top: 1px;
                left: -3px;
                text-align: center;
                margin: -2px;
            }

            .btn-clock-out.btn:not(.btn-link):not(.btn-circle) {
                font-size: 10px;
            }

            .btn-clock-out.btn:not(.btn-link):not(.btn-circle) i {
                font-size: 11px;
                position: relative;
                top: 1px;
                left: -3px;
                text-align: center;
                margin: -2px;
            }
        }

        .img-thumbnail {
            background-color: transparent;
            border: none;
        }

        /* spinner */
        .overlay {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 999;
            background: rgba(255, 255, 255, 0.8) url("<?= base_url('assets/bsb/images/spin.gif') ?>") center no-repeat;
        }

        /* Turn off scrollbar when body element has the loading class */
        body.loading {
            overflow: hidden;
        }

        /* Make spinner image visible when body element has the loading class */
        body.loading .overlay {
            display: block;
        }

        .alert {
            width: 500px;
            width: 343px;
        }
    </style>
</head>

<body class="">
    <div class="login-page">
        <div class="login-box m-t-45" id="head">
            <div class="logo">
                <a href="javascript:void(0);"><?= $this->session->userdata('name') ?> </a>
                <small>NIK. <?= $this->session->userdata('nik') ?></small><br>
                <!-- <img class="profile-user-img img-responsive img-circle" src="assets/images/' + result.image + '"> -->
                <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/bsb/images/' . $this->session->userdata('image') . '') ?>" />
            </div>
        </div>

        <div style="margin:10px">
            <div class=" alert bg-pink time_limit" style="display:none;"></div>  
        </div>

        <div class="card" id="body">
            <div class="body">
                <p><a href="<?= base_url('auth/logout') ?>" class="btn btn-xs bg-grey waves-effect pull-right" type="button"><i class="material-icons">power_settings_new</i></a></p>
                <p class="login-box-msg text-center p-l-20"><b><?= $tanggal ?></b></p>
                <p class="waktu"><small id="jam"></small> : <small id="menit"></small> : <small id="detik"></small><small> <?= date('A') ?></small> </p>
                <div class="col-xs-6">
                    <button class="btn btn-block bg-green waves-effect btn-clock-in" type="button" id="clock_in"><i class="material-icons">add_alarm</i> MASUK</button>
                </div>
                <div class="col-xs-6">
                    <button class="btn btn-block bg-pink waves-effect btn-clock-out" type="button" id="clock_out"><i class="material-icons">alarm_off</i> PULANG</button>
                </div>
                <!-- <div class="col-xs-1">
                <button class="btn bg-deep-purple waves-effect" type="button"><i class="material-icons">settings</i></button>
            </div> -->

                <div class="row m-t-15 m-b--30">
                    <div class="col-xs-12">
                        <p class="histori">
                        </p>
                    </div>
                </div>

                <!-- <div class="overlay">
                    <div id='loading-text' style="text-align:center;padding-top: 220px;font-weight:bold;">Sistem Sedang Mengambil Lokasi Absen...</div>
                    <div id='loading' style="text-align:center;padding-top: 220px;font-weight:bold;">Mohon tunggu browser sedang mengaktifkan kamera Anda..</div>
                    <div id='loading2' style="text-align:center;padding-top: 220px;font-weight:bold;">Mohon tunggu browser sedang mengaktifkan kamera Anda...</div>
                </div> -->
            </div>
        </div>
    </div>


    <div class="container text-center" id="absen">
        <!-- <h3 style="color: white;">Foto Selfie</h3> -->
        <!-- <div class="col-md-12 mt-5">
            <select name="tipe" id="tipe" style="width: 400px; max-width: 100%; padding: .3rem">
                <option <?= $total_absen % 2 == 0 ? "selected" : "" ?> value="masuk">Masuk</option>
                <option <?= $total_absen % 2 == 1 ? "selected" : "" ?> value="pulang">Pulang</option>
            </select>
        </div> -->
        <!-- <div class="me-auto ms-auto mt-5" style="max-width: 100%; width: 200px;">
            <select id="video-source" class="form-control"></select>
        </div> -->
        <div class="camera cam_clock_in">
            <div class="upload-loading"></div>
            <!-- <div style="display: block; width: 100%;">a</div> -->

            <video playsinline id="video" class="" style="width: 400; margin-left: auto; margin-right: auto; display: block;"></video>
            <!-- <div id="loading" style="color: white;"><strong>Mohon tunggu browser sedang mengaktifkan kamera Anda...</strong></div> -->
            <canvas id="canvas"></canvas>
            <img src="<?= base_url('/assets/bsb/images/absensi/') ?>" class="img-thumbnail" alt="...">
            <p class="histori1">
            </p>
        </div>
        <div class="camera cam_clock_out">
            <div class="upload-loading2"></div>
            <!-- <div style="display: block; width: 100%;">a</div> -->

            <video playsinline id="video2" class="" style="width: 400; margin-left: auto; margin-right: auto; display: block;"></video>
            <!-- <div id="loading2" style="color: white;"><strong>Mohon tunggu browser sedang mengaktifkan kamera Anda...</strong></div> -->
            <canvas id="canvas2"></canvas>
            <img src="<?= base_url('/assets/bsb/images/absensi/') ?>" class="img-thumbnail" alt="...">
            <p class="histori2">
            </p>

        </div>
        <div class="text-center btn_clock_in">
            <button class="btn btn-primary btn-md btn-take-photo" style="max-width: 100%; width: 200px;margin-top:10px;" type="button">
                <i class="material-icons" style="font-size: 17px;margin-right: 5px;margin-top: 1px;">add_a_photo</i>
                Ambil Foto
            </button>
            <button class="btn btn-primary btn-md btn-retake-photo" style="max-width: 100%; width: 200px;margin-top:10px;" type="button">
                <i class="material-icons" style="font-size: 17px;margin-right: 5px;margin-top: 1px;">add_a_photo</i>
                Ambil Ulang Foto
            </button>
            <button class="btn btn-primary btn-md btn-simpan mt-4" style="max-width: 100%; width: 200px;margin-top:10px;" type="button">
                <i class="material-icons" style="font-size: 17px;margin-right: 5px;">save</i>
                Simpan
            </button>
            <button class="btn btn-danger btn-md btn-back" style="max-width: 100%; width: 200px;margin-top:10px;" type="button">
                <i class="material-icons" style="font-size: 17px;">arrow_back_ios</i>
                Back
            </button>
        </div>
        <div class="text-center btn_clock_out">
            <button class="btn btn-primary btn-md btn-take-photo2" style="max-width: 100%; width: 200px;margin-top:10px;" type="button">
                <i class="material-icons" style="font-size: 17px;margin-right: 5px;margin-top: 1px;">add_a_photo</i>
                Ambil Foto
            </button>
            <button class="btn btn-primary btn-md btn-retake-photo2" style="max-width: 100%; width: 200px;margin-top:10px;" type="button">
                <i class="material-icons" style="font-size: 17px;margin-right: 5px;margin-top: 1px;">add_a_photo</i>
                Ambil Ulang Foto
            </button>
            <button class="btn btn-primary btn-md btn-simpan2 mt-4" style="max-width: 100%; width: 200px;margin-top:10px;" type="button">
                <i class="material-icons" style="font-size: 17px;margin-right: 5px;">save</i>
                Simpan
            </button>
            <button class="btn btn-danger btn-md btn-back2" style="max-width: 100%; width: 200px;margin-top:10px;" type="button">
                <i class="material-icons" style="font-size: 17px;">arrow_back_ios</i>
                Back
            </button>
        </div>
        <!-- <div class="overlay"></div> -->
        <div class="overlay">
            <div id='loading-text' style="text-align:center;padding-top: 220px;font-weight:bold;">Sistem Sedang Mengambil Lokasi Absen...</div>
            <div id='loading' style="text-align:center;padding-top: 220px;font-weight:bold;">Mohon tunggu browser sedang mengaktifkan kamera Anda..</div>
            <div id='loading2' style="text-align:center;padding-top: 220px;font-weight:bold;">Mohon tunggu browser sedang mengaktifkan kamera Anda...</div>
        </div>
        <!-- <div class="overlay2"></div> -->



    </div>

    <center>
        <div class="alert alert-success" id="alert_in" style="display:none;">
            Sukses MASUK!
        </div>
        <div class="alert alert-warning" id="alert_late" style="display:none;">
            Anda  Telat!
        </div>
        <div class="alert bg-green" id="alert_out" style="display:none;">
            Sukses PULANG!
        </div>
        <div class="alert bg-pink" id="alert_error" style="display:none;">
            Anda belum Clock IN!
        </div>
        <div class="alert bg-pink" id="alert_double" style="display:none;">
            Anda sudah melakukan MASUK sebelumnya!
        </div>
        <div class="alert bg-pink" id="alert_finish" style="display:none;">
            Anda sudah melakukan MASUK dan PULANG sebelumnya!
        </div>
    </center>


    <!-- Jquery Core Js -->
    <script src="<?= base_url('assets/bsb/plugins/jquery/jquery.min.js') ?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url('assets/bsb/plugins/bootstrap/js/bootstrap.js') ?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url('assets/bsb/plugins/node-waves/waves.js') ?>"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= base_url('assets/bsb/plugins/jquery-validation/jquery.validate.js') ?>"></script>

    <!-- Custom Js -->
    <script src="<?= base_url('assets/bsb/js/admin.js') ?>"></script>
    <script src="<?= base_url('assets/bsb/js/pages/examples/sign-in.js') ?>"></script>
    <script src="<?= base_url() ?>/assets/bsb/js/scm-helper.js"></script>
    <script>
        // var data_id_attendance = ''
        // var check_image_checkIn = ''
        // var check_image_checkOut = ''
        $(document).ready(function() {

            $.ajax({
                url: '<?= base_url('karyawan/getClock') ?>',
                data: {
                    nik: '<?= $this->session->userdata('nik') ?>',
                    attendance_date: '<?= date('Y-m-d') ?>',
                },
                type: 'post',
                dataType: 'json',
                success: function(result) {
                    if (result != 500) {
                        if (result.clock_in != '0000-00-00 00:00:00') {
                            $('.histori').append('<small> - MASUK [ ' + result.clock_in + ' ' + result.zona + ' ] </small>')
                        }
                        if (result.clock_out != '0000-00-00 00:00:00') {
                            $('.histori').append('<br><small> - PULANG [ ' + result.clock_out + ' ' + result.zona + ' ] </small>')
                        }
                    }

                }
            });

        });
        window.setTimeout("waktu()", 1000);

        function waktu() {
            var waktu = new Date();
            setTimeout("waktu()", 1000);
            document.getElementById("jam").innerHTML = waktu.getHours();
            document.getElementById("menit").innerHTML = waktu.getMinutes();
            document.getElementById("detik").innerHTML = waktu.getSeconds();
        }
    </script>



    <script>
        $('#alert_in').hide(500)
        $('#alert_out').hide(500)
        $('#alert_error').hide(500)
        $('#alert_finish').hide(500)
        $('#alert_double').hide(500)
        $('.btn-simpan').hide(500)
        $('.btn-simpan2').hide(500)
        $('#loading-text').hide()
        $('#loading').hide()
        $('#loading2').hide()
        $('.btn-back').hide()
        $('.btn-back2').hide()
        $(document).ready(function() {
            $("#absen").hide()
        });

        $('.btn-back').on('click', function() {
            $("#head").show()
            $("#body").show()
            $("#absen").hide()
            window.location = '<?= base_url("karyawan") ?>'
        })

        $('.btn-back2').on('click', function() {
            $("#head").show()
            $("#body").show()
            $("#absen").hide()
            window.location = '<?= base_url("karyawan") ?>'
        })

        function check_camera() {
            if ($('#canvas').hasClass('change-width')) {
                $('#loading').hide()
                $(".btn-take-photo").show()
                $('.btn-back').show()
                $('body').removeClass('loading');
            } else {
                $('#loading').show()
                $(".btn-take-photo").hide()
                $('.btn-back').hide()
                $('body').addClass('loading');
            }
        }

        function check_camera2() {
            if ($('#canvas2').hasClass('change-width')) {
                $('#loading2').hide()
                $(".btn-take-photo2").show()
                $('.btn-back2').show()
                $('body').removeClass('loading');
            } else {
                $('#loading2').show()
                $(".btn-take-photo2").hide()
                $('.btn-back2').hide()
                $('body').addClass('loading');
            }
        }
        var data_lat = ''
        var data_lng = ''
        var data_radius = ''
        // Calculate and display the distance between markers
        function haversine_distance(mk1A, mk1B, mk2A, mk2B) {
            var R = 3958.8; // Radius of the Earth in miles
            var rlat1 = mk1A * (Math.PI / 180); // Convert degrees to radians
            var rlat2 = mk2A * (Math.PI / 180); // Convert degrees to radians
            var difflat = rlat2 - rlat1; // Radian difference (latitudes)
            var difflon = (mk2B - mk1B) * (Math.PI / 180); // Radian difference (longitudes)

            var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat / 2) * Math.sin(difflat / 2) + Math.cos(rlat1) * Math.cos(rlat2) * Math.sin(difflon / 2) * Math.sin(difflon / 2)));
            return d;
        }

        $('#clock_in').on('click', function() {
            $(".btn-take-photo").hide()
            $.ajax({
                url: '<?= base_url('karyawan/getClock') ?>',
                data: {
                    nik: '<?= $this->session->userdata('nik') ?>',
                    attendance_date: '<?= date('Y-m-d') ?>',
                },
                type: 'post',
                dataType: 'json',
                success: function(result) {
                    // var countDataImg = result.lenght
                    // console.log('ini' + result)
                    if (result != 500) {
                        if (result.image_in != null) {
                            // console.log('ada foto')
                            $('#alert_in').hide(500)
                            $('#alert_out').hide(500)
                            $('#alert_error').hide(500)
                            $('#alert_finish').hide(500)
                            $('#alert_double').hide(500)
                            $('.btn-simpan').show()
                            $('.btn-simpan2').hide()
                            $('.cam_clock_out').hide()
                            $('.cam_clock_in').show()
                            $('.btn_clock_out').hide()
                            $('.btn_clock_in').show()
                            $("#head").hide()
                            $("#body").hide()
                            $("#absen").show()
                            $('.cam_clock_in').find('img').remove()
                            $('.cam_clock_in').append(
                                `<img src="<?= base_url() ?>/assets/bsb/images/absensi/${result.image_in}" class="img-thumbnail" alt="${result.image_in}">`
                            )
                            if (result.clock_in != '0000-00-00 00:00:00') {
                                $('.cam_clock_in').find('.histori1').remove()
                                $('.cam_clock_in').append('<p class="histori1"><small>MASUK [ ' + result.clock_in + ' ' + result.zona + ' ] </small></p>')
                            }
                            $('#canvas').hide()
                            $('.btn-back').show()
                            $('#video').height('0px');
                            $(".btn-take-photo,.btn-retake-photo, .btn-simpan").hide()
                        } else {
                            $('#video').height('');
                            do_in()
                        }

                    } else {
                        $('#video').height('');
                        do_in()
                    }


                }
            });
        });

        function do_in() {
            // console.log('tidak ada foto')
            $('.cam_clock_in').find('img').remove()
            $('.cam_clock_in').find('.histori1').remove()
            check_camera()
            $('#alert_in').hide(500)
            $('#alert_out').hide(500)
            $('#alert_error').hide(500)
            $('#alert_finish').hide(500)
            $('#alert_double').hide(500)
            $('.btn-simpan').show()
            $('.btn-simpan2').hide()
            $('.cam_clock_out').hide()
            $('.cam_clock_in').show()
            $('.btn_clock_out').hide()
            $('.btn_clock_in').show()
            $("#head").hide()
            $("#body").hide()
            $("#absen").show()


            $(".btn-retake-photo, .btn-simpan").hide()
            var streamSetting;
            var isPhotoReady = false

            var canvas = document.querySelector('#canvas'),
                context = canvas.getContext('2d'),
                video = document.querySelector("#video")


            $(function(e) {
                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    navigator.mediaDevices.enumerateDevices().then(function(devices) {

                        var html = ''
                        devices.forEach(function(e) {
                            if (e.kind == "videoinput") {
                                html += `<option value="${e.deviceId}">${e.label}</option>`
                            }
                        })
                        $("#video-source").html(html)
                    })


                    navigator.mediaDevices.getUserMedia({
                        video: {

                            facingMode: "user",
                        },
                        audio: false,
                    }).then(function(stream) {
                        video.srcObject = stream
                        streamSetting = stream.getVideoTracks()[0].getSettings()
                        // console.log(streamSetting.aspectRatio)
                        video.muted = true;
                        video.playsInline = true;
                        video.play()
                        video.style.width = '320px'
                        $('#canvas').addClass('change-width')
                        check_camera()
                    })
                } else alert("oops your browser not allowed!")

                $("#video-source").on("change", function(e) {
                    const id = $(this).val()
                    navigator.mediaDevices.getUserMedia({
                        video: {
                            facingMode: "user",
                            deviceId: id ? {
                                exact: id
                            } : undefined
                        },
                        audio: false,
                    }).then(function(stream) {
                        video.srcObject = stream
                        streamSetting = stream.getVideoTracks()[0].getSettings()
                        // console.log(streamSetting.aspectRatio)
                        video.muted = true;
                        video.playsInline = true;
                        video.play()
                    })
                })


                $(".btn-simpan").on("click", function(e) {
                    $('.btn-simpan').attr('disabled', 'disabled')
                    if (isPhotoReady) {
                        $('#alert_in').append('')
                        $('body').addClass('loading');
                        $('#loading-text').show()
                        $('.btn-simpan').attr('disabled', 'disabled')
                        $(".btn-retake-photo, .btn-simpan").hide()
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(
                                function(position) {
                                    $('body').addClass('loading');
                                            $('#loading-text').show()
                                            $('.btn-simpan').attr('disabled', 'disabled')
                                            $(".btn-retake-photo, .btn-simpan").hide()                                            
                                            
                                            // if (time_in < data_time) {
                                                // console.log('ada pada radius yang ditentukan')
                                                $('body').addClass('loading');
                                                $('#loading-text').show()
                                                $('.btn-simpan').attr('disabled', 'disabled')
                                                $(".btn-retake-photo, .btn-simpan").hide()
                                                $.ajax({
                                                    url: '<?= base_url('karyawan/addIn') ?>',
                                                    data: {
                                                        img: canvas.toDataURL("image/png", 0.5),
                                                        tipe: function() {
                                                            return $("#tipe").val()
                                                        },
                                                        nik: '<?= $this->session->userdata('nik') ?>',
                                                        attendance_date: '<?= date('Y-m-d') ?>',
                                                        clock_in_latitude: position.coords.latitude,
                                                        clock_in_longitude: position.coords.longitude,

                                                    },
                                                    type: "POST",
                                                    dataType: 'json',
                                                    cache: false,
                                                    success: function(data) {
                                                        $('body').addClass('loading');
                                                        $('#loading-text').show()
                                                        $('.btn-simpan').attr('disabled', 'disabled')
                                                        $(".btn-retake-photo, .btn-simpan").hide()
                                                        // $(".upload-loading").html("")
                                                        // $("#canvas").show()
                                                        //getClock jika ada

                                                        data.forEach((e) => {
                                                            if (e.result == 200) {
                                                                $('body').removeClass('loading');
                                                                $('#loading-text').hide()
                                                                $("#head").show()
                                                                $("#body").show()
                                                                $("#absen").hide()
                                                                $('#alert_in').show(500)
                                                                $('#alert_in').append('<b>[ ' + e.clock + ' ' + e.zona + ' ]</b>')
                                                                if (e.late > '00:00:00') {
                                                                    $('#alert_late').show(500)
                                                                    $('#alert_late').append('<b> ' + e.late + ' </b>')
                                                                }
                                                                $.ajax({
                                                                    url: '<?= base_url('karyawan/getClock') ?>',
                                                                    data: {
                                                                        nik: '<?= $this->session->userdata('nik') ?>',
                                                                        attendance_date: '<?= date('Y-m-d') ?>',
                                                                    },
                                                                    type: 'post',
                                                                    dataType: 'json',
                                                                    success: function(result) {
                                                                        if (result != 500) {
                                                                            $('.histori').append('<small> - MASUK [ ' + result.clock_in + ' ' + result.zona + ' ] </small>')
                                                                        }

                                                                    }
                                                                });
                                                                $('#alert_out').hide(500)
                                                                $('#alert_error').hide(500)
                                                                $('#alert_double').hide(500)
                                                                $('#alert_finish').hide(500)
                                                                $('.btn-simpan').removeAttr("disabled")
                                                                $('.btn-back').show()
                                                                // console.log('200')
                                                            } else if (e.result == 400) {
                                                                $('body').removeClass('loading');
                                                                $('#loading-text').hide()
                                                                $("#head").show()
                                                                $("#body").show()
                                                                $("#absen").hide()
                                                                $('#alert_in').hide(500)
                                                                $('#alert_out').hide(500)
                                                                $('#alert_error').hide(500)
                                                                $('#alert_finish').show(500)
                                                                $('#alert_double').hide(500)
                                                                $('.btn-simpan').removeAttr("disabled")
                                                                $('.btn-back').show()
                                                                // console.log('400')
                                                            } else if (e.result == 500) {
                                                                $('body').removeClass('loading');
                                                                $('#loading-text').hide()
                                                                isPhotoReady = false
                                                                $(".btn-retake-photo, .btn-simpan").hide()
                                                                $(".btn-take-photo").show()
                                                                $("#canvas").hide()
                                                                $("#video").show()

                                                                $("#head").show()
                                                                $("#body").show()
                                                                $("#absen").hide()
                                                                $('#alert_error').show(500)
                                                                $('#alert_in').hide(500)
                                                                $('#alert_out').hide(500)
                                                                $('#alert_finish').hide(500)
                                                                $('#alert_double').hide(500)
                                                                $('.btn-simpan').removeAttr("disabled")
                                                                $('.btn-back').show()
                                                                // console.log('500')
                                                            } else {
                                                                $('body').removeClass('loading');
                                                                $('#loading-text').hide()
                                                                $("#head").show()
                                                                $("#body").show()
                                                                $("#absen").hide()
                                                                $('#alert_error').append('<b>Mohon ada kesalahan pada sistem ini!</b>')
                                                                $('.btn-simpan').removeAttr("disabled")
                                                                $('.btn-back').show()
                                                                // console.log('200 else')
                                                            }


                                                        })
                                                    },
                                                    error: function(x, s, e) {
                                                        $("#head").show()
                                                        $("#body").show()
                                                        $("#absen").hide()
                                                        $('#alert_error').append('<b>Mohon ada kesalahan pada sistem!</b>')
                                                        $(".upload-loading").html("")
                                                        $("#canvas").show()
                                                        $('.btn-simpan').removeAttr("disabled")
                                                        $('body').removeClass('loading');
                                                        $('#loading-text').hide()
                                                        $('.btn-back').show()
                                                    }
                                                })
                                            // }
                                            //  else {

                                            //     isPhotoReady = false
                                            //     $(".btn-retake-photo, .btn-simpan").hide()
                                            //     $(".btn-take-photo").show()
                                            //     $("#canvas").hide()
                                            //     $("#video").show()

                                            //     $("#head").show()
                                            //     $("#body").show()
                                            //     $("#absen").hide()
                                            //     $('#alert_error').show(500)
                                            //     $('#alert_in').hide(500)
                                            //     $('#alert_out').hide(500)
                                            //     $('#alert_finish').hide(500)
                                            //     $('#alert_double').hide(500)
                                            //     $('.btn-simpan').removeAttr("disabled")
                                            //     $('#alert_error').text('')
                                            //     $('#alert_error').append('<b>Maaf Anda Melewati Batas Waktu Absen! '+data_time+'</b>')
                                            //     $('body').removeClass('loading');
                                            //     $('#loading-text').hide()
                                            //     $('.btn-back').show()
                                            // }

                                    // var a = 'ada'
                                    // if (a == 'a') {

                                    // }



                                },
                                function(error) {
                                    switch (error.code) {
                                        case error.PERMISSION_DENIED:
                                            $("#head").show()
                                            $("#body").show()
                                            $("#absen").hide()
                                            $('#alert_error').append('<b>Maaf anda menolak akses geolocation!</b>')
                                            $('.btn-simpan').removeAttr("disabled")
                                            $('body').removeClass('loading');
                                            $('#loading-text').hide()
                                            $('.btn-back').show()
                                            break;
                                        case error.POSITION_UNAVAILABLE:
                                            $("#head").show()
                                            $("#body").show()
                                            $("#absen").hide()
                                            $('#alert_error').append('<b>Maaf lokasi tidak ditemukan!</b>')
                                            $('.btn-simpan').removeAttr("disabled")
                                            $('body').removeClass('loading');
                                            $('#loading-text').hide()
                                            $('.btn-back').show()
                                            break;
                                        case error.TIMEOUT:
                                            $("#head").show()
                                            $("#body").show()
                                            $("#absen").hide()
                                            $('#alert_error').append('<b>Maaf gps anda terlalu lemot!</b>')
                                            $('.btn-simpan').removeAttr("disabled")
                                            $('body').removeClass('loading');
                                            $('#loading-text').hide()
                                            $('.btn-back').show()
                                            // _sh.swalDanger("Maaf gps anda terlalu lemot!")
                                        default:
                                            $("#head").show()
                                            $("#body").show()
                                            $("#absen").hide()
                                            $('#alert_error').append('<b>Maaf gps anda error!</b>')
                                            $('.btn-simpan').removeAttr("disabled")
                                            $('body').removeClass('loading');
                                            $('#loading-text').hide()
                                            $('.btn-back').show()
                                            // _sh.swalDanger("Maaf gps anda error!")
                                            break;
                                    }
                                }
                            )
                        } else {
                            $("#head").show()
                            $("#body").show()
                            $("#absen").hide()
                            $('#alert_error').append('<b>Maaf device anda tidak support dengan geolocation!</b>')
                            $('.btn-simpan').removeAttr("disabled")
                            $('body').removeClass('loading');
                            $('#loading-text').hide()
                            $('.btn-back').show()
                            // _sh.swalDanger("Maaf device anda tidak support dengan geolocation!")
                        }
                    } else {
                        $("#head").show()
                        $("#body").show()
                        $("#absen").hide()
                        $('#alert_error').append('<b>Mohon ambil photo terlebih dahulu</b>')
                        $('.btn-simpan').removeAttr("disabled")
                        $('body').removeClass('loading');
                        $('#loading-text').hide()
                        $('.btn-back').show()
                        // _sh.swalDanger("Mohon ambil photo terlebih dahulu")
                    }
                })

                $(".btn-take-photo").on("click", function(e) {

                    video.defaultPlaybackRate = .4;
                    $(".btn-retake-photo").show()
                    $(".btn-take-photo").hide()
                    $(".btn-back").hide()
                    isPhotoReady = true;
                    const cameraWidth = streamSetting.width
                    const cameraHeight = streamSetting.height
                    const parentWidth = $(".camera").width()
                    const canvasWidth = parentWidth > 700 ? 700 : parentWidth;
                    const canvasHeight = canvasWidth / streamSetting.aspectRatio;
                    canvas.width = canvasWidth
                    canvas.height = canvasHeight

                    canvas.width = video.clientWidth;
                    canvas.height = video.clientHeight;
                    videoActuallyPlaying = true;
                    // $("#canvas").width("100%")
                    // context.drawImage(video, 0, 0, canvasWidth, canvasHeight)
                    context.drawImage(video, 0, 0, canvas.width, canvas.height)

                    $("#canvas").show()
                    $("#video").hide()
                    $(".btn-simpan").show()
                    if (isPhotoReady == true) {
                        document.getElementById("canvas").style.marginTop = "-13px";
                    } else {
                        document.getElementById("canvas").style.marginTop = "-143px";
                    }

                })
               
                $(".btn-retake-photo").on("click", function(e) {
                    $(".btn-retake-photo, .btn-simpan").hide()
                    $(".btn-take-photo").show()
                    $("#canvas").hide()
                    $("#video").show()
                })
            })
        }

        $('#clock_out').on('click', function() {
            $(".btn-take-photo2").hide()
			$("#alert_late").hide()
            $.ajax({
                url: '<?= base_url('karyawan/getClock') ?>',
                data: {
                    nik: '<?= $this->session->userdata('nik') ?>',
                    attendance_date: '<?= date('Y-m-d') ?>',
                },
                type: 'post',
                dataType: 'json',
                success: function(result) {
                    if (result != 500) {
                        if (result.image_out != null) {
                            // console.log('ada foto')
                            $('#alert_in').hide(500)
                            $('#alert_out').hide(500)
                            $('#alert_error').hide(500)
                            $('#alert_finish').hide(500)
                            $('#alert_double').hide(500)
                            $('.btn-simpan').hide()
                            $('.btn-simpan2').show()
                            $('.cam_clock_out').show()
                            $('.cam_clock_in').hide()
                            $('.btn_clock_out').show()
                            $('.btn_clock_in').hide()
                            $("#head").hide()
                            $("#body").hide()
                            $("#absen").show()
                            $('.cam_clock_out').find('img').remove()
                            $('.cam_clock_out').append(
                                `<img src="<?= base_url() ?>/assets/bsb/images/absensi/${result.image_out}" class="img-thumbnail" alt="${result.image_out}">`
                            )
                            if (result.clock_out != '0000-00-00 00:00:00') {
                                $('.cam_clock_out').find('.histori2').remove()
                                $('.cam_clock_out').append('<p class="histori2"><small>PULANG [ ' + result.clock_out + ' ' + result.zona + ' ] </small></p>')
                            }
                            $('#canvas2').hide()
                            $('.btn-back2').show()
                            $('#video2').height('0px');
                            $(".btn-take-photo2,.btn-retake-photo2, .btn-simpan2").hide()
                        } else {
                            $('#video2').height('');
                            do_out()
                        }

                    } else {
                        $('#video2').height('');
                        do_out()
                    }
                }
            });

        });

        function do_out() {
            $('.cam_clock_out').find('img').remove()
            $('.cam_clock_out').find('.histori2').remove()
            check_camera2()
            $('#alert_in').hide(500)
            $('#alert_out').hide(500)
            $('#alert_error').hide(500)
            $('#alert_finish').hide(500)
            $('#alert_double').hide(500)
            $('.btn-simpan').hide()
            $('.btn-simpan2').show()
            $('.cam_clock_out').show()
            $('.cam_clock_in').hide()
            $('.btn_clock_out').show()
            $('.btn_clock_in').hide()
            $("#head").hide()
            $("#body").hide()
            $("#absen").show()



            // $("#canvas").hide()
            $(".btn-retake-photo2, .btn-simpan2").hide()
            var streamSetting;
            var isPhotoReady2 = false

            var canvas = document.querySelector('#canvas2'),
                context = canvas.getContext('2d'),
                video = document.querySelector("#video2")

            $(function(e) {
                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    navigator.mediaDevices.enumerateDevices().then(function(devices) {

                        var html = ''
                        devices.forEach(function(e) {
                            if (e.kind == "videoinput") {
                                html += `<option value="${e.deviceId}">${e.label}</option>`
                            }
                        })
                        $("#video-source").html(html)
                    })


                    navigator.mediaDevices.getUserMedia({
                        video: {

                            facingMode: "user",
                            // width: 320,
                            // height: 768
                        },
                        audio: false,
                    }).then(function(stream) {
                        video.srcObject = stream
                        streamSetting = stream.getVideoTracks()[0].getSettings()
                        // console.log(streamSetting.aspectRatio)
                        video.muted = true;
                        video.playsInline = true;
                        video.play()
                        video.style.width = '320px'
                        $('#canvas2').addClass('change-width')
                        check_camera2()
                    })
                } else alert("oops your browser not allowed!")

                $("#video-source").on("change", function(e) {
                    const id = $(this).val()
                    navigator.mediaDevices.getUserMedia({
                        video: {
                            facingMode: "user",
                            deviceId: id ? {
                                exact: id
                            } : undefined
                        },
                        audio: false,
                    }).then(function(stream) {
                        video.srcObject = stream
                        streamSetting = stream.getVideoTracks()[0].getSettings()
                        // console.log(streamSetting.aspectRatio)
                        video.muted = true;
                        video.playsInline = true;
                        video.play()
                    })
                })

                $(".btn-simpan2").on("click", function(e) {

                    if (isPhotoReady2) {
                        $('.btn-simpan2').attr('disabled', 'disabled')
                        // _sh.setLoading(".upload-loading")
                        // $("#canvas2").hide()
                        $('#alertou_out').append('')
                        $('body').addClass('loading');
                        $('#loading-text').show()
                        $('.btn-simpan2').attr('disabled', 'disabled')
                        $(".btn-retake-photo2, .btn-simpan2").hide()
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(
                                function(position) {

                                    $.ajax({
                                        url: '<?php echo base_url('admin/getDataLocation'); ?>',
                                        type: "post",
                                        data: {},
                                        cache: false,
                                        dataType: 'JSON',
                                        success: function(result) {
                                            $('body').addClass('loading');
                                            $('#loading-text').show()
                                            $('.btn-simpan2').attr('disabled', 'disabled')
                                            $(".btn-retake-photo2, .btn-simpan2").hide()
                                            // $('#myModal').modal('hide');
                                            // console.log(result)
                                            var count_loc = result.length
                                            // console.log(count_loc)

                                            if (count_loc != 0) {
                                                result.forEach((e) => {
                                                    // console.log(e.longitude)
                                                    data_lat = e.latitude
                                                    data_lng = e.longitude
                                                    data_radius = e.radius
                                                })

                                            } else {
                                                data_lat = -7.9605227
                                                data_lng = 112.6647725
                                                data_radius = '10'
                                            }

                                            // console.log(check_radius)
                                            // if (check_radius.indexOf(data_meter) !== -1 || check_radius.indexOf(data_meter2) !== -1) {
                                                $('body').addClass('loading');
                                                $('#loading-text').show()
                                                $('.btn-simpan2').attr('disabled', 'disabled')
                                                $(".btn-retake-photo2, .btn-simpan2").hide()
                                                $.ajax({
                                                    url: '<?= base_url('karyawan/addOut') ?>',
                                                    data: {
                                                        img: canvas.toDataURL("image/png", 0.5),
                                                        tipe: function() {
                                                            return $("#tipe").val()
                                                        },
                                                        // id_attendance: id_attendance
                                                        nik: '<?= $this->session->userdata('nik') ?>',
                                                        attendance_date: '<?= date('Y-m-d') ?>',
                                                        clock_out_latitude: position.coords.latitude,
                                                        clock_out_longitude: position.coords.longitude,

                                                        // latitude: position.coords.latitude,
                                                        // longitude: position.coords.longitude
                                                    },
                                                    type: "POST",
                                                    dataType: 'json',
                                                    cache: false,
                                                    success: function(data) {
                                                        // $(".upload-loading").html("")
                                                        // $("#canvas2").show()
                                                        $('body').addClass('loading');
                                                        $('#loading-text').show()
                                                        $('.btn-simpan2').attr('disabled', 'disabled')
                                                        $(".btn-retake-photo2, .btn-simpan2").hide()

                                                        // console.log(data)
                                                        // console.log(data.clock)

                                                        // _sh.swalSuccess("data berhasil disimpan")
                                                        // location.hash = "#/satpam/absensi/absen-success"

                                                        //getClock jika ada
                                                        data.forEach((e) => {
                                                            if (e.result == 200) {
                                                                $('body').removeClass('loading');
                                                                $('#loading-text').hide()
                                                                $("#head").show()
                                                                $("#body").show()
                                                                $("#absen").hide()
                                                                $('#alert_out').show(500)
                                                                $('#alert_out').append('<b>[ ' + e.clock + ' ' + e.zona + ' ]</b>')
                                                                $.ajax({
                                                                    url: '<?= base_url('karyawan/getClock') ?>',
                                                                    data: {
                                                                        nik: '<?= $this->session->userdata('nik') ?>',
                                                                        attendance_date: '<?= date('Y-m-d') ?>',
                                                                    },
                                                                    type: 'post',
                                                                    dataType: 'json',
                                                                    success: function(result) {
                                                                        if (result != 500) {
                                                                            $('.histori').append('<br><small> - PULANG [ ' + result.clock_out + ' ' + result.zona + ' ] </small>')
                                                                        }
                                                                    }
                                                                })
                                                                $('#alert_in').hide(500)
                                                                $('#alert_error').hide(500)
                                                                $('#alert_double').hide(500)
                                                                $('#alert_finish').hide(500)
                                                                $('.btn-simpan2').removeAttr("disabled")
                                                                $('.btn-back2').show()
                                                            } else if (e.result == 400) {
                                                                $('body').removeClass('loading');
                                                                $('#loading-text').hide()
                                                                // isPhotoReady2 = false
                                                                // $(".btn-retake-photo2, .btn-simpan2").hide()
                                                                // $(".btn-take-photo2").show()
                                                                // $("#canvas2").hide()
                                                                // $("#video2").show()
                                                                $("#head").show()
                                                                $("#body").show()
                                                                $("#absen").hide()
                                                                $('#alert_in').hide(500)
                                                                $('#alert_out').hide(500)
                                                                $('#alert_error').hide(500)
                                                                $('#alert_finish').show(500)
                                                                $('#alert_double').hide(500)
                                                                $('.btn-simpan2').removeAttr("disabled")
                                                                $('.btn-back2').show()
                                                            } else if (e.result == 500) {
                                                                // console.log(e.result)
                                                                $('body').removeClass('loading');
                                                                $('#loading-text').hide()
                                                                isPhotoReady2 = false
                                                                $(".btn-retake-photo2, .btn-simpan2").hide()
                                                                $(".btn-take-photo2").show()
                                                                $("#canvas2").hide()
                                                                $("#video2").show()
                                                                $("#head").show()
                                                                $("#body").show()
                                                                $("#absen").hide()
                                                                $('#alert_error').show(500)
                                                                $('#alert_in').hide(500)
                                                                $('#alert_out').hide(500)
                                                                $('#alert_finish').hide(500)
                                                                $('#alert_double').hide(500)
                                                                $('.btn-simpan2').removeAttr("disabled")
                                                                $('.btn-back2').show()
                                                            } else {
                                                                $("#head").show()
                                                                $("#body").show()
                                                                $("#absen").hide()
                                                                $('#alert_error').append('<b>Maaf ada kesalahan pada sistem ini!</b>')
                                                                $('body').removeClass('loading');
                                                                $('#loading-text').hide()
                                                                $('.btn-simpan2').removeAttr("disabled")
                                                                $('.btn-back2').show()
                                                            }




                                                        })
                                                    },
                                                    error: function(x, s, e) {
                                                        // _sh.errror_req_handler(x, base_url)

                                                        $("#head").show()
                                                        $("#body").show()
                                                        $("#absen").hide()
                                                        $('#alert_error').append('<b>Maaf ada kesalahan pada sistem!</b>')
                                                        $(".upload-loading").html("")
                                                        $("#canvas2").show()
                                                        $('.btn-simpan2').removeAttr("disabled")
                                                        $('body').removeClass('loading');
                                                        $('#loading-text').hide()
                                                        $('.btn-back2').show()
                                                    }
                                                })
                                            // } 
                                            // else {
                                            //     console.log('tidak pada radius yang ditentukan')
                                            //     isPhotoReady2 = false
                                            //     $(".btn-retake-photo2, .btn-simpan2").hide()
                                            //     $(".btn-take-photo2").show()
                                            //     $("#canvas2").hide()
                                            //     $("#video2").show()
                                            //     $("#head").show()
                                            //     $("#body").show()
                                            //     $("#absen").hide()
                                            //     $('#alert_error').show(500)
                                            //     $('#alert_in').hide(500)
                                            //     $('#alert_out').hide(500)
                                            //     $('#alert_finish').hide(500)
                                            //     $('#alert_double').hide(500)
                                            //     $('.btn-simpan2').removeAttr("disabled")
                                            //     $('#alert_error').text('')
                                            //     $('#alert_error').append('<b>Maaf Anda berada diluar lokasi yang ditentukan!</b>')
                                            //     $('body').removeClass('loading');
                                            //     $('#loading-text').hide()
                                            //     $('.btn-back2').show()
                                            // }
                                        }
                                    });
                                },
                                function(error) {
                                    switch (error.code) {
                                        case error.PERMISSION_DENIED:
                                            $("#head").show()
                                            $("#body").show()
                                            $("#absen").hide()
                                            $('#alert_error').append('<b>Maaf anda menolak akses geolocation!</b>')
                                            $('.btn-simpan2').removeAttr("disabled")
                                            $('body').removeClass('loading');
                                            $('#loading-text').hide()
                                            $('.btn-back2').show()
                                            // _sh.swalDanger("Maaf anda menolak akses geolocation!")
                                            break;
                                        case error.POSITION_UNAVAILABLE:
                                            $("#head").show()
                                            $("#body").show()
                                            $("#absen").hide()
                                            $('#alert_error').append('<b>Maaf lokasi tidak ditemukan!</b>')
                                            $('.btn-simpan2').removeAttr("disabled")
                                            $('body').removeClass('loading');
                                            $('#loading-text').hide()
                                            $('.btn-back2').show()
                                            // _sh.swalDanger("Maaf lokasi tidak ditemukan!")
                                            break;
                                        case error.TIMEOUT:
                                            $("#head").show()
                                            $("#body").show()
                                            $("#absen").hide()
                                            $('#alert_error').append('<b>Maaf gps anda terlalu lemot!</b>')
                                            $('.btn-simpan2').removeAttr("disabled")
                                            $('body').removeClass('loading');
                                            $('#loading-text').hide()
                                            $('.btn-back2').show()
                                            // _sh.swalDanger("Maaf gps anda terlalu lemot!")
                                        default:
                                            $("#head").show()
                                            $("#body").show()
                                            $("#absen").hide()
                                            $('#alert_error').append('<b>Maaf gps anda error!</b>')
                                            $('.btn-simpan2').removeAttr("disabled")
                                            $('body').removeClass('loading');
                                            $('#loading-text').hide()
                                            $('.btn-back2').show()
                                            // _sh.swalDanger("Maaf gps anda error!")
                                            break;
                                    }
                                }
                            )
                        } else {
                            $("#head").show()
                            $("#body").show()
                            $("#absen").hide()
                            $('#alert_error').append('<b>Maaf device anda tidak support dengan geolocation!</b>')
                            $('.btn-simpan2').removeAttr("disabled")
                            $('body').removeClass('loading');
                            $('#loading-text').hide()
                            $('.btn-back2').show()
                        }
                        // _sh.swalDanger("Maaf device anda tidak support dengan geolocation!")
                    } else {
                        $("#head").show()
                        $("#body").show()
                        $("#absen").hide()
                        $('#alert_error').append('<b>Mohon ambil photo terlebih dahulu</b>')
                        $('.btn-simpan2').removeAttr("disabled")
                        $('body').removeClass('loading');
                        $('#loading-text').hide()
                        $('.btn-back2').show()
                        // _sh.swalDanger("Mohon ambil photo terlebih dahulu")
                    }
                })

                $(".btn-take-photo2").on("click", function(e) {

                    $(".btn-back2").hide()
                    $(".btn-retake-photo2").show()
                    $(".btn-take-photo2").hide()
                    isPhotoReady2 = true;
                    const cameraWidth = streamSetting.width
                    const cameraHeight = streamSetting.height
                    const parentWidth = $(".camera").width()
                    const canvasWidth = parentWidth > 700 ? 700 : parentWidth;
                    const canvasHeight = canvasWidth / streamSetting.aspectRatio;
                    canvas.width = canvasWidth
                    canvas.height = canvasHeight

                    canvas.width = video.clientWidth;
                    canvas.height = video.clientHeight;
                    videoActuallyPlaying = true;

                    context.drawImage(video, 0, 0, canvas.width, canvas.height)

                    // $("#canvas2").width("100%")
                    // context.drawImage(video, 0, 0, canvasWidth, canvasHeight)

                    $("#canvas2").show()
                    $("#video2").hide()
                    $(".btn-simpan2").show()
                    if (isPhotoReady2 == true) {
                        document.getElementById("canvas2").style.marginTop = "-13px";
                    } else {
                        document.getElementById("canvas2").style.marginTop = "-143px";
                    }
                })
                // if (isPhotoReady2 == true) {
                //     $(".btn-back2").hide()
                // } else {
                //     $(".btn-back2").show()
                // }
                $(".btn-retake-photo2").on("click", function(e) {
                    $(".btn-retake-photo2, .btn-simpan2").hide()
                    $(".btn-take-photo2").show()
                    $("#canvas2").hide()
                    $("#video2").show()
                    // remove style height di sini
                })
            })
        }
    </script>
</body>
</html>