$(document).ready(function () {
  $("#payment-form").validate({
    rules: {
      name_receiver: {
        required: true,
      },
      phone_receiver: {
        required: true,
        number: true,
      },
      address_receiver: {
        required: true,
      },
    },
    messages: {
      name_receiver: {
        required: "Bắt buộc nhập tên người nhận",
      },
      phone_receiver: {
        required: "Bắt buộc nhập số điện thoại người nhận",
        number: "Định dạng số điện thoại không đúng",
      },
      address_receiver: {
        required: "Bắt buộc nhập địa chỉ nhận hàng",
      },
    },
    submitHandler: function () {
      var formData = new FormData(document.querySelector("#payment-form"));
      formData.append("payment", true);
      $.ajax({
        url: "process_checkout.php",
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          const res = jQuery.parseJSON(response);
          if (res.status === 200) {
            $("#payment-form")[0].reset();
            Swal.fire("Thành công", res.message, "success");
            setTimeout(function () {
              window.location.href = "/index.php";
            }, 2000);
          } else if (res.status == 200) {
            toastr.options.escapeHtml = true;

            Command: toastr["error"](res.message, "Lỗi");

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
          }
        },
      });
    },
  });
});
