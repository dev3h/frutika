$(document).ready(function () {
  // handle button in form
  $("#formInsert").validate({
    rules: {
      name: {
        required: true,
      },
      price: {
        required: true,
        number: true,
        min: 1000,
      },
      short_description: {
        max: 100,
      },
    },
    messages: {
      name: {
        required: "Bắt buộc nhập tên sản phẩm",
      },
      price: {
        required: "Bắt buộc nhập giá sản phẩm",
        number: "Giá sản phẩm phải là số",
        min: "Giá sản phẩm phải lớn hơn hoặc bằng 1000",
      },
      short_description: {
        max: "Mô tả ngắn không được quá 100 ký tự",
      },
    },
    submitHandler: function () {
      var formData = new FormData(document.querySelector("#formInsert"));
      formData.append("save_product", true);
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
            $("#modalProductInsert").modal("hide");
            $("#formInsert")[0].reset();
            Swal.fire("Thành công", res.message, "success");

            location.reload();
            // $(".tableProducts").load(location.href + " .tableProducts");
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
      name: {
        required: true,
      },
      price: {
        required: true,
        number: true,
        min: 1000,
      },
    },
    messages: {
      name: {
        required: "Bắt buộc nhập tên sản phẩm",
      },
      price: {
        required: "Bắt buộc nhập giá sản phẩm",
        number: "Giá sản phẩm phải là số",
        min: "Giá sản phẩm phải lớn hơn hoặc bằng 1000",
      },
    },
    submitHandler: function () {
      var formData = new FormData(document.querySelector("#formUpdate"));
      formData.append("update_product", true);
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
            $("#modalProductUpdate").modal("hide");
            $("#formUpdate")[0].reset();
            Swal.fire("Thành công", res.message, "success");

            location.reload();
            // $(".tableProducts").load(location.href + " .tableProducts");
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

  // handle button in table
  $(".updateProductBtn").click(function () {
    var product_id = $(this).val();
    $.ajax({
      url: "process.php?product_id=" + product_id,
      type: "GET",
      success: function (response) {
        var res = jQuery.parseJSON(response);
        if (res.status == 200) {
          $("#product_id").val(res.data.id);
          $("#product_name").val(res.data.name);
          $("#product_price").val(res.data.price);
          $(".product-short_description").val(res.data.short_description);
          $(".summernote.product-description").summernote(
            "code",
            `<p>${res.data.long_description}</p>`
          );
          $("#category_id").val(res.data.category_id).change();
          $("#photo_old").attr("src", `/admin/assets/uploads/products/${res.data.photo}`);
          $("#photo_old").attr("alt", `bac-and-chill-${res.data.name}`);
          $("#product_photo_old").val(res.data.photo);

          $("#modalProductUpdate").modal("show");
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

  $(".viewProductBtn").click(function () {
    var product_id = $(this).val();
    $.ajax({
      url: "process.php?product_id=" + product_id,
      type: "GET",
      success: function (response) {
        var res = jQuery.parseJSON(response);
        if (res.status == 200) {
          $("#view_name").text(res.data.name);
          $("#view_price").text(res.data.price);
          $(".view_short_description").val(res.data.short_description);
          $(".view_short_description").attr("disabled", true);
          $(".summernote.view_long_description").summernote(
            "code",
            `<p>${res.data.long_description}</p>`
          );
          $(".summernote.view_long_description").summernote("disable");
          $("#view_category").text(res.data.category_name);
          $("#view_photo").attr(
            "src",
            `/admin/assets/uploads/products/${res.data.photo}`
          );
          $("#view_photo").attr("alt", `bac-and-chill-${res.data.name}`);
          $("#modalCategoryView").modal("show");
        } else if (res.status == 200) {
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

  $(".deleteProductBtn").click(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "Bạn có chắc muốn xóa sản phẩm này không?",
      text: "Sản phẩm này sẽ không thể khôi phục lại được!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Có, xóa!",
      cancelButtonText: "Hủy",
    }).then((result) => {
      if (result.isConfirmed) {
        var product_id = $(this).val();
        $.ajax({
          url: "process.php",
          type: "POST",
          data: {
            delete_product: true,
            id: product_id,
          },
          success: function (response) {
            var res = jQuery.parseJSON(response);
            if (res.status == 200) {
              Swal.fire("Thành công", res.message, "success");
              location.reload();
              // $(".tableProducts").load(location.href + " .tableProducts");
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
