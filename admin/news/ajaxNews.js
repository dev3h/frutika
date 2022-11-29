$(document).ready(function () {
  // handle button in form
   $("#formInsert").validate({
     rules: {
       title: {
         required: true,
       },
     },
     messages: {
       title: {
         required: "Bắt buộc nhập tiêu đề bài viết",
       },
       price: {
         required: "Bắt buộc nhập giá sản phẩm",
         number: "Giá sản phẩm phải là số",
         min: "Giá sản phẩm phải lớn hơn hoặc bằng 1000",
       },
     },
     submitHandler: function () {
       var formData = new FormData(document.querySelector("#formInsert"));
      formData.append("save_news", true);
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
            $("#modalNewsInsert").modal("hide");
            $("#formInsert")[0].reset();
            Swal.fire("Thành công", res.message, "success");

            $(".tableNews").load(location.href + " .tableNews");
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
        title: {
          required: true,
        },
      },
      messages: {
        title: {
          required: "Bắt buộc nhập tiêu đề bài viết",
        },
      },
      submitHandler: function () {
        var formData = new FormData(document.querySelector("#formInsert"));
         formData.append("update_news", true);
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
               $("#modalNewsUpdate").modal("hide");
               $("#formUpdate")[0].reset();
               Swal.fire("Thành công", res.message, "success");

               $(".tableNews").load(location.href + " .tableNews");
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
  $(".updateNewsBtn").click(function () {
    var news_id = $(this).val();
    $.ajax({
      url: "process.php?news_id=" + news_id,
      type: "GET",
      success: function (response) {
        var res = jQuery.parseJSON(response);
        if (res.status == 200) {
           $("#news_id").val(res.data.id);
           $("#news_title").val(res.data.title);
           $("#news_url").val(res.data.url);
           $(".summernote.news-content").summernote("code", `<p>${res.data.content}</p>`);
           $("#photo_old").attr("src", `/admin/assets/uploads/news/${res.data.photo}`);
           $("#photo_old").attr("alt", `bac-and-chill-${res.data.title}`);
           $("#news_photo_old").val(res.data.photo);

           $("#modalNewsUpdate").modal("show");
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

  $(".viewNewsBtn").click(function () {
    var news_id = $(this).val();
    $.ajax({
      url: "process.php?news_id=" + news_id,
      type: "GET",
      success: function (response) {
        var res = jQuery.parseJSON(response);
        if (res.status == 200) {
          $("#view_title").text(res.data.title);
          $(".summernote.view_content").summernote("code", `<p>${res.data.content}</p>`);
          $(".summernote.view_content").summernote("disable");
          $("#view_photo").attr("src", `/admin/assets/uploads/news/${res.data.photo}`);
          $("#view_photo").attr("alt", `bac-and-chill-${res.data.name}`);
          $("#modalNewsView").modal("show");
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

  $(".deleteNewsBtn").click(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "Bạn có chắc muốn xóa tin tức này không?",
      text: "Tin tức này sẽ không thể khôi phục lại được!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Có, xóa!",
    }).then((result) => {
      if (result.isConfirmed) {
        var news_id = $(this).val();
        $.ajax({
          url: "process.php",
          type: "POST",
          data: {
            delete_news: true,
            id: news_id,
          },
          success: function (response) {
            var res = jQuery.parseJSON(response);
            if (res.status == 200) {
               Swal.fire("Thành công", res.message, "success");
               $(".tableNews").load(location.href + " .tableNews");
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
