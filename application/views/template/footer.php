</body>

</html>
<script>
  $.ajaxSetup({
    cache: false
  })

  function card_information() {
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
  }
</script>