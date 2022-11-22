$(document).ready(function () {
  $(".cart-btn").click(function () {
    let id = $(this).val();
    $.ajax({
      url: "add_to_cart.php",
      type: "GET",
      data: {
        id,
      },
      success: function (response) {
        const res = jQuery.parseJSON(response);
        if (res.status == 200) {
          Swal.fire("Thành công", res.message, "success");
        } else {
          toastr.options.escapeHtml = true;

          Command: toastr["error"](res.message, "Lỗi");

          toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: false,
            progressBar: false,
            positionClass: "toast-top-right",
            preventDuplicates: false,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
          };
        }
      },
    });
  });
});
