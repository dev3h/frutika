$(document).ready(function () {
  $("#sign-in-form").submit(function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("login", true);

    $.ajax({
      url: "process_login-register.php",
      type: "post",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        const res = jQuery.parseJSON(response);
 
        if (res.status == 422) {
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
        } else if (res.status == 200) {
          $("#sign-in-form")[0].reset();
          window.location.href = "index.php";
        }
      },
    });
  });
});
