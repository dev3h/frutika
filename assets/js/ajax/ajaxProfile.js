$("#profileForm").validate({
  rules: {
    name: {
      required: true,
    },
    email: {
      required: true,
      email: true,
    },
    phone: {
      required: true,
      number: true,
    },
    address: {
      required: true,
    },
  },
  messages: {
    name: {
      required: "Bắt buộc nhập tên hiển thị",
    },
    email: {
      required: "Bắt buộc nhập email",
      email: "Định dạng email không đúng",
    },
    phone: {
      required: "Bắt buộc nhập số điện thoại",
      number: "Định dạng số điện thoại không đúng",
    },
    address: {
      required: "Bắt buộc nhập địa chỉ",
    },
  },
  submitHandler: function () {
    var formData = new FormData(document.querySelector("#profileForm"));
    formData.append("update_profile", true);
    $.ajax({
      url: "process-profile.php",
      type: "post",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        const res = jQuery.parseJSON(response);
        if (res.status == 422 || res.status == 401 || res.status == 421) {
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
        } else if (res.status == 200) {
          Swal.fire("Thành công", res.message, "success");
          setTimeout(() => {
            location.reload();
          }, 1000);
        }
      },
    });
  },
});
