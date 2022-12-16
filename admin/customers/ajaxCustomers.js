$(document).ready(function () {
  // handle button in table
  $(".viewCustomerBtn").click(function () {
    var customer_id = $(this).val();
    $.ajax({
      url: "process.php?customer_id=" + customer_id,
      type: "GET",
      success: function (response) {
        var res = jQuery.parseJSON(response);
        if (res.status == 200) {
          $("#view_customer_name").text(res.data.customer_name);
          $("#view_customer_email").html(`<b>Email</b>: ${res.data.email}`);
          $("#view_totalPricePayment").html(
            `<b>Số tiền bỏ ra</b>: ${handleCurrency(res.data.totalPricePayment)}`
          );
          $("#view_lastOrder").html(
            `<b>Thời gian mua gần nhất</b>: ${res.data.create_at}`
          );
          $("#modalCustomerView").modal("show");
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
