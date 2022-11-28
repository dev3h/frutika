$(document).ready(function () {
  // handle button form
  $("#formInsert").validate({
    rules: {
      name: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "Bắt buộc nhập tên danh mục",
      },
    },
    submitHandler: function () {
      var formData = new FormData(document.querySelector("#formInsert"));
      formData.append("save_category", true);
      $.ajax({
        url: "process.php",
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          const res = jQuery.parseJSON(response);
          if (res.status == 422) {
            $("#errorMessage").removeClass("hidden");
            $("#errorMessage").text(res.message);
          } else if (res.status == 200) {
            $("#errorMessage").addClass("hidden");
            $("#modalCategoryInsert").modal("hide");
            $("#formInsert")[0].reset();
            Swal.fire("Thành công", res.message, "success");

            $(".tableCategories").load(location.href + " .tableCategories");
          }
        },
      });
    },
  });

  $("#formUpdate").validate({
    rules: {
      "name": {
        required: true,
      },
    },
    messages: {
      "name": {
        required: "Bắt buộc nhập tên danh mục",
      },
    },
    submitHandler: function () {
      var formData = new FormData(document.querySelector("#formUpdate"));
      formData.append("update_category", true);
      $.ajax({
        url: "process.php",
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          const res = jQuery.parseJSON(response);
          if (res.status == 422) {
            $("#errorMessageUpdate").removeClass("hidden");
            $("#errorMessageUpdate").text(res.message);
          } else if (res.status == 200) {
            $("#errorMessageUpdate").addClass("hidden");
            $("#modalCategoryUpdate").modal("hide");
            $("#formUpdate")[0].reset();
            Swal.fire("Thành công", res.message, "success");

            $(".tableCategories").load(location.href + " .tableCategories");
          }
        },
      });
    },
  });

  // handle button in table
  $(".updateCategoryBtn").click(function () {
    var category_id = $(this).val();
    $.ajax({
      url: "process.php?category_id=" + category_id,
      type: "GET",
      success: function (response) {
        var res = jQuery.parseJSON(response);
        if (res.status == 422) {
          Swal.fire({
            icon: "error",
            title: "Lỗi",
            text: res.message,
          });
        } else if (res.status == 200) {
          $("#category_id").val(res.data.id);
          $("#category_name").val(res.data.name);
          $("#modalCategoryUpdate").modal("show");
        }
      },
    });
  });

  $(".viewCategoryBtn").click(function () {
    var category_id = $(this).val();
    $.ajax({
      url: "process.php?category_id=" + category_id,
      type: "GET",
      success: function (response) {
        var res = jQuery.parseJSON(response);
        if (res.status == 422 || res.status == 500) {
          Swal.fire({
            icon: "error",
            title: "Lỗi",
            text: res.message,
          });
        } else if (res.status == 200) {
          $("#view_name").text(res.data.name);
          $("#modalCategoryView").modal("show");
        }
      },
    });
  });

  $(".deleteCategoryBtn").click(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "Bạn có chắc muốn xóa danh mục này không?",
      text: "Danh mục này sẽ không thể khôi phục lại được!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Có, xóa!",
    }).then((result) => {
      if (result.isConfirmed) {
        var category_id = $(this).val();
        $.ajax({
          url: "process.php",
          type: "POST",
          data: {
            delete_category: true,
            id: category_id,
          },
          success: function (response) {
            var res = jQuery.parseJSON(response);
            if (res.status == 500) {
              Swal.fire({
                icon: "error",
                title: "Lỗi",
                text: res.message,
              });
            } else {
              Swal.fire("Thành công", res.message, "success");
              $(".tableCategories").load(location.href + " .tableCategories");
            }
          },
        });
      }
    });
  });
});
