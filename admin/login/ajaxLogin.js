$(document).ready(function () {
  $(".sign-in-form").validate({
    rules: {
      username: {
        required: true,
      },
      password: {
        required: true,
        // minlength: 8,
      },
    },
    messages: {
      username: {
        required: "Bắt buộc nhập username",
      },
      password: {
        required: "Bắt buộc nhập mật khẩu",
        // minlength: "Hãy nhập ít nhất 8 ký tự",
      },
    },
    submitHandler: function () {
      var formData = new FormData(document.querySelector(".sign-in-form"));
      formData.append("login", true);
      $.ajax({
        url: "process.php",
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          const res = jQuery.parseJSON(response);
          if (res.status == 200) {
            $(".sign-in-form")[0].reset();
            location.href = "/admin/dashboard";
          } else {
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
