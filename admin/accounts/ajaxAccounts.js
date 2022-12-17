$(document).ready(function () {
  function handleGender(gender_id) {
    switch (gender_id) {
      case "0":
        return "nữ";
      case "1":
        return "nam";
      case "2":
        return "khác";
      default:
        return "không xác định";
    }
  }
  function handleStatus(status_id) {
    switch (status_id) {
      case "0":
        return "chưa kích hoạt";
      case "1":
        return "kích hoạt";
      default:
        return "không xác định";
    }
  }
  // handle button in form
  $("#formInsert").validate({
    rules: {
      username: {
        required: true,
      },
      displayname: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
    },
    messages: {
      username: {
        required: "Bắt buộc nhập tên đăng nhập",
      },
      displayname: {
        required: "Bắt buộc nhập tên hiển thị",
      },
      email: {
        required: "Bắt buộc nhập email",
        email: "định dạng email không đúng",
      },
    },
    submitHandler: function () {
      var formData = new FormData(document.querySelector("#formInsert"));
      formData.append("save_account", true);
      $.ajax({
        url: "process.php",
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          const res = jQuery.parseJSON(response);
          console.log(res);
          if (res.status == 200) {
            $("#errorMessage").addClass("hidden");
            $("#modalAccountInsert").modal("hide");
            $("#formInsert")[0].reset();
            Swal.fire("Thành công", res.message, "success");

            location.reload();
            // $(".tableAccount").load(location.href + " .tableAccount");
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
    },
  });

  $("#formUpdate").validate({
    rules: {
      username: {
        required: true,
      },
      displayname: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
    },
    messages: {
      username: {
        required: "Bắt buộc nhập tên đăng nhập",
      },
      displayname: {
        required: "Bắt buộc nhập tên hiển thị",
      },
      email: {
        required: "Bắt buộc nhập email",
        email: "định dạng email không đúng",
      },
    },
    submitHandler: function () {
      var formData = new FormData(document.querySelector("#formUpdate"));
      formData.append("update_account", true);
      $.ajax({
        url: "process.php",
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          const res = jQuery.parseJSON(response);
          if (res.status == 200) {
           $("#errorMessageUpdate").addClass("hidden");
           $("#modalAccountUpdate").modal("hide");
           $("#formUpdate")[0].reset();
           Swal.fire("Thành công", res.message, "success");

            location.reload();
          //  $(".tableAccount").load(location.href + " .tableAccount");
          } else  {
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
    },
  });

  // handle button in table
  $(".updateAccountBtn").click(function () {
    var account_id = $(this).val();
    $.ajax({
      url: "process.php?account_id=" + account_id,
      type: "GET",
      success: function (response) {
        var res = jQuery.parseJSON(response);
        if (res.status == 200) {
         $("#account_id").val(res.data.id);
         $("#account_displayname").val(res.data.displayname);
         $("#account_email").val(res.data.email);

         $.each($(".gender_id"), function (key, value) {
           key == res.data.gender
             ? $(this).prop("checked", true)
             : $(this).prop("checked", false);
         });
         $(".gender_id").val().change;
         $("#role_id").val(res.data.role).change;
         $("#status_id").val(res.data.status).change;
         $("#photo_old").attr("src", `/admin/assets/uploads/accounts/${res.data.photo}`);
         $("#photo_old").attr("alt", `bac-and-chill-${res.data.title}`);
         $("#account_photo_old").val(res.data.photo);

         $("#modalAccountUpdate").modal("show");
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

  $(".viewAccountBtn").click(function () {
    var account_id = $(this).val();
    $.ajax({
      url: "process.php?account_id=" + account_id,
      type: "GET",
      success: function (response) {
        var res = jQuery.parseJSON(response);
        if (res.status == 200) {
          $("#view_username").text(res.data.username);
          $("#view_displayname").text(res.data.displayname);
          $("#view_email").text(res.data.email);
          $("#view_gender").text(handleGender(res.data.gender));
          $("#view_role").text(res.data.role_name);
          $("#view_status").text(handleStatus(res.data.status));
          $("#view_photo").attr(
            "src",
            `/admin/assets/uploads/accounts/${res.data.photo}`
          );
          $("#view_photo").attr("alt", `bac-and-chill-${res.data.name}`);
          $("#modalAccountView").modal("show");
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

  $(".deleteAccountBtn").click(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "Bạn có chắc muốn khóa tài khoản này không?",
      text: "Tài khoản này sẽ không thể truy cập được!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Có, khóa!",
    }).then((result) => {
      if (result.isConfirmed) {
        var account_id = $(this).val();
        $.ajax({
          url: "process.php",
          type: "POST",
          data: {
            lock_account: true,
            id: account_id,
          },
          success: function (response) {
            var res = jQuery.parseJSON(response);
            if (res.status == 200) {
              Swal.fire("Thành công", res.message, "success");
            location.reload();
              // $(".tableAccount").load(location.href + " .tableAccount");
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
      }
    });
  });
});
