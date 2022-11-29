$(document).ready(function () {
  $("#rating-form").validate({
    rules: {
      content: {
        required: true,
        minlength: 10,
        maxlength: 1000,
      },
      rating: {
        required: true,
        number: true,
        min: 1,
        max: 5,
      },
    },
    messages: {
      content: {
        required: "Bắt buộc nhập nội dung",
        minlength: "Nội dung phải có ít nhất 10 ký tự",
        maxlength: "Nội dung không được quá 1000 ký tự",
      },
      rating: {
        required: "Bắt buộc nhập số sao",
        number: "Số sao phải là số",
        min: "Số sao phải từ 1 đến 5",
        max: "Số sao phải từ 1 đến 5",
      },
    },
    submitHandler: function () {
      var formData = new FormData(document.querySelector("#rating-form"));
      formData.append("comment", true);
      $.ajax({
        url: "process_rating.php",
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          const res = jQuery.parseJSON(response);
          if (res.status == 200) {
            $("#rating-form")[0].reset();
            Swal.fire("Thành công", res.message, "success");
            setTimeout(() => {
              location.reload();
            }, 1000);
          } else if (res.status == 302) {
            location.href = res.redirect;
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
