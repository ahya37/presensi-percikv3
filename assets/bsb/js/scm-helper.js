function _minimizeCard(el) {
  if ($(el).data("hide") == "show") {
    $(el).parents(".card").find(".card-body").hide(200)
    $(el).html("<i class='fa fa-plus'></i>")
    $(el).data("hide", "hide")
  } else {
    $(el).parents(".card").find(".card-body").show(200)
    $(el).html("<i class='fa fa-minus'></i>")
    $(el).data("hide", "show")
  }
}

class SCMHelper {
  setLoading(el) {
    $(el).html(`<center>
    <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
      <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
    </svg>
  </center>`)
  }
  modalLoading = $(`<div class="modal" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Loading</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
      <center>
          <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
          </svg>
        </center>
      </div>
    </div>
  </div>
</div>`);

  error_req_handler(xhr, base_url) {
    if (xhr.status == 401) {
      Swal.fire({
        title: 'Sorry!',
        text: "Sesi anda telah habis!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Batal'
      }).then(function (result) {
        if (result.isConfirmed) {
          location.href = base_url
        }
      })
    }

    else if (xhr.status == 404) {
      Swal.fire({
        title: '404',
        text: "halaman tidak ditemukan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Batal'
      }).then(function (result) {
        if (result.isConfirmed) {
          window.history.back()
        }
      })
    }

    else {
      Swal.fire({
        title: "Oops!",
        text: xhr.responseText,
        icon: "warning",
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ya!',
      })
    }
  }

  swalSuccess(text = "data berhasil diproses") {
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: text,
      timer: 1500
    })
  }

  swalDanger(text = "") {
    Swal.fire({
      position: 'center',
      icon: 'warning',
      title: text,
      timer: 1500
    })
  }

  setFormVal(data = {}) {
    for (const key in data) {
      if (Object.hasOwnProperty.call(data, key)) {
        const element = data[key];
        $(key).val(element)
      }
    }
  }
}

var _sh = new SCMHelper();