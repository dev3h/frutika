$(document).ready(function () {
  $(".browsingOrderBtn").click(function () {
    var category_id = $(this).val();
    var status = $(this).data("status");
    $.ajax({
      url: "process.php",
      method: "POST",
      data: {
        category_id: category_id,
        status: status,
        update_order: true,
      },
      success: function (response) {
        var res = jQuery.parseJSON(response);
        if (res.status == 422) {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!",
          });
        } else if (res.status == 200) {
          Swal.fire("Thành công", res.message, "success");

          $(".tableOrder").load(location.href + " .tableOrder");
        }
      },
    });
  });

  $(".cancelOrderBtn").click(function () {
    var category_id = $(this).val();
    var status = $(this).data("status");
    $.ajax({
      url: "process.php",
      method: "POST",
      data: {
        category_id: category_id,
        status: status,
        cancel_order: true,
      },
      success: function (response) {
        var res = jQuery.parseJSON(response);
        if (res.status == 422) {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!",
          });
        } else if (res.status == 200) {
          Swal.fire("Thành công", res.message, "success");

          $(".tableOrder").load(location.href + " .tableOrder");
        }
      },
    });
  });

   $(".viewOrderBtn").click(function () {
     var product_id = $(this).val();
     $.ajax({
       url: "process.php?product_id=" + product_id,
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
           $("#view_price").text(res.data.price);
           $(".summernote.view_description").summernote(
             "code",
             `<p>${res.data.description}</p>`
           );
           $(".summernote.view_description").summernote("disable");
           $("#view_category").text(res.data.category_name);
           $("#view_photo").attr("src", `/admin/assets/uploads/news/${res.data.photo}`);
           $("#view_photo").attr("alt", `bac-and-chill-${res.data.name}`);
           $("#modalCategoryView").modal("show");
         }
       },
     });
   });
});
