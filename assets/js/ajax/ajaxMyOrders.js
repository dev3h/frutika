$(document).ready(function () {
  $(".cancelMyOrderBtn").click(function () {
    var order_id = $(this).val();
    var status = $(this).data("status");
    $.ajax({
      url: "process.php",
      method: "POST",
      data: {
        order_id: order_id,
        cancel_my_order: true,
        status: status,
      },
      success: function (response) {
        var res = jQuery.parseJSON(response);
        if (res.status == 200) {
          Swal.fire("Thành công", res.message, "success");

          location.reload();
        } else {
          toastr.options.escapeHtml = true;

          toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: false,
            progressBar: false,
            positionClass: "toast-top-right",
            preventDuplicates: true,
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
          toastr["error"](res.message, "Lỗi");
        }
      },
    });
  });
});
