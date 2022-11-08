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

        <div class="row clearfix" id="form-karyawan">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            SET LOKASI
                        </h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" id="submit">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div id="googleMap" style="width:100%;height:380px;"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <!-- <span class="input-group-addon">
                                                <i class="material-icons">account_balance</i>
                                            </span> -->
                                            <span class="input-group-addon"><label class="form-control-label">Nama Lokasi</label></span>
                                            <div class="form-line">
                                                <input type="text" id="nama" name="nama" class="form-control date" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <!-- <span class="input-group-addon">
                                                <i class="material-icons">picture_in_picture</i>
                                            </span> -->
                                            <span class="input-group-addon"><label class="form-control-label">Latitude</label></span>
                                            <div class="form-line">
                                                <input type="text" id="lat" name="lat" class="form-control date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <!-- <span class="input-group-addon">
                                                <i class="material-icons">picture_in_picture</i>
                                            </span> -->
                                            <span class="input-group-addon"><label class="form-control-label">Longitude</label></span>
                                            <div class="form-line">
                                                <input type="text" id="lng" name="lng" class="form-control date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group radius">
                                            <!-- <span class="input-group-addon">
                                                <i class="material-icons">picture_in_picture</i>
                                            </span> -->
                                            <span class="input-group-addon"><label class="form-control-label">Radius</label></span>
                                            <div class="form-line">
                                                <select name="radius" id="radius" class="form-control date">
                                                    <!-- <option value="" disabled selected class='pilih'>Pilih Radius</option> -->
                                                    <option value="10">10 Meter</option>
                                                    <option value="25">25 Meter</option>
                                                    <option value="50">50 Meter</option>
                                                </select>
                                                <!-- <input type="text" id="nik" name="nik" class="form-control date" placeholder="Radius"> -->
                                            </div>
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


    </div>
</section>
<!-- <script src="http://maps.googleapis.com/maps/api/js"></script> -->
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqIHgemVh7heZGKDaGsS6MRwJrePhY6EM&callback=initMap"></script> -->
<!-- <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqIHgemVh7heZGKDaGsS6MRwJrePhY6EM&callback=initMap"></script> -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqIHgemVh7heZGKDaGsS6MRwJrePhY6EM&callback=initMap&v=weekly" async></script> -->
<script src="https://maps.googleapis.com/maps/api/js?key=<?= $api['api'] ?>"></script>
<script>
    // variabel global marker
    var marker;
    var peta
    var markers = [];
    $(document).ready(function() {
        //ambil data count karyawan, zona waktu, shift dan absensi
        // function reload card_information ada di view footer
        card_information()
    });


    function taruhMarker(peta, posisiTitik) {
        if (marker) {
            // pindahkan marker
            marker.setPosition(posisiTitik);
        } else {
            // buat marker baru
            marker = new google.maps.Marker({
                position: posisiTitik,
                map: peta
            });
        }
        // console.log(posisiTitik.lat().toFixed(7))
        // isi nilai koordinat ke form
        document.getElementById("lat").value = posisiTitik.lat().toFixed(7);
        document.getElementById("lng").value = posisiTitik.lng().toFixed(7);

    }
    var data_lat = ''
    var data_lng = ''
    var data_name = ''
    var data_radius = ''

    function initialize() {
        var propertiPeta = {
            // center: new google.maps.LatLng(-8.5830695, 116.3202515),
            center: new google.maps.LatLng(-7.960874077363414, 112.66454134042029),
            zoom: 9,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

        // even listner ketika peta diklik
        google.maps.event.addListener(peta, 'click', function(event) {
            // console.log('oke')
            taruhMarker(this, event.latLng);
        });
        get_data_loc()
    }

    $('#submit').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url('admin/addLocation'); ?>',
            type: "post",
            data: {
                nama: $('#nama').val(),
                lat: $('#lat').val(),
                lng: $('#lng').val(),
                radius: $('#radius').val()
            },
            cache: false,
            dataType: 'JSON',
            success: function(result) {
                // $('#myModal').modal('hide');
                // console.log(result)
                if (result == 200) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Berhasil Set Lokasi',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#nama').val('');
                    $('#lat').val('');
                    $('#lng').val('');
                    $('#radius').val('');
                    // function reload card_information ada di view footer
                    card_information()
                    // get_data_loc()
                    initialize()

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

    function get_data_loc() {
        $.ajax({
            url: '<?php echo base_url('admin/getDataLocation'); ?>',
            type: "post",
            data: {},
            cache: false,
            dataType: 'JSON',
            success: function(result) {
                // $('#myModal').modal('hide');
                // console.log(result)
                var count_loc = result.length
                // console.log(count_loc)

                if (count_loc != 0) {
                    result.forEach((e) => {
                        // console.log(e.longitude)
                        data_lat = e.latitude
                        data_lng = e.longitude
                        data_name = e.name
                        data_radius = e.radius
                    })

                } else {
                    data_lat = -7.9605227
                    data_lng = 112.6647725
                    data_name = ''
                    data_radius = '10'
                }
                // console.log(data_lat)
                // console.log(data_lng)
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(data_lat, data_lng),
                    map: peta
                });
                document.getElementById("nama").value = data_name;
                document.getElementById("lat").value = data_lat;
                document.getElementById("lng").value = data_lng;

                $('form').find(".radius select").val(data_radius).change();
            }
        });
    }
    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
</script>