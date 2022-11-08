<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<section class="content">
    <div class="container-fluid">
        <!-- <div class="block-header">
            <h2>BLANK PAGE</h2>
        </div> -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Laporan Absensi <button type="button" id="addUser" class="btn btn-sm bg-deep-orange waves-effect pull-right">
                                <i class="material-icons">account_box</i>
                            </button>
                        </h2>
                    </div>
                    <div class="body">
                        <form action="http://api-v1-presensi.perciktours.com/api/absensi/multi" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label> Tanggal : </label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="date" placeholder="Please choose a date...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <button type="submit" id="print" class="btn btn-sm bg-deep-orange waves-effect">
                                            Cetak
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
$(function() {
  $('input[name="date"]').daterangepicker({
    opens: 'left',
    locale: {
        separator: '/',
            format: 'YYYY-MM-DD'
        }
  })
});


// $('#print').on('click', function(){
//    let date = $('#date').val();
//    let expdate = date.split('-')
//    let start = moment(expdate[0]).format('YYYY-MM-DD');
//    let end = moment(expdate[1]).format('YYYY-MM-DD');

//    // ajax laporan
//    $.ajax({
//         url: `http://api-v1-presensi.perciktours.com/api/absensi/multi?start=${start}&end=${end}`,
//         method: "GET",
//         success: function(data){
//             console.log('data:', data)
//         }
//    })
// })
</script>