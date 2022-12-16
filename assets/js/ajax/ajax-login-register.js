$(document).ready(function () {
  $(".sign-in-form").validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        // minlength: 8,
      },
    },
    messages: {
      email: {
        required: "Bắt buộc nhập email",
        email: " Định dạng email không đúng",
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
        url: "process_login-register.php",
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          const res = jQuery.parseJSON(response);
          if (res.status === 200) {
            $(".sign-in-form")[0].reset();
            history.back();
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

  $(".sign-up-form").validate({
    rules: {
      name: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        // minlength: 8,
      },
      phone_number: {
        required: true,
        number: true,
        // minlength: 10,
      },
      address: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "Bắt buộc nhập tên",
        email: " Định dạng email không đúng",
      },
      email: {
        required: "Bắt buộc nhập email",
        email: " Định dạng email không đúng",
      },
      password: {
        required: "Bắt buộc nhập mật khẩu",
        // minlength: "Hãy nhập ít nhất 8 ký tự",
      },
      phone_number: {
        required: "Bắt buộc nhập số điện thoại",
        number: " Định dạng số điện thoại không đúng",
        // minlength: "Số điện thoại tối thiểu là 10 số",
      },
      address: {
        required: "Bắt buộc nhập địa chỉ",
      },
    },
    submitHandler: function () {
      var formData = new FormData(document.querySelector(".sign-up-form"));
      formData.append("register", true);
      $.ajax({
        url: "process_login-register.php",
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          const res = jQuery.parseJSON(response);
          if (res.status === 200) {
            $(".sign-up-form")[0].reset();
            history.back();
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
