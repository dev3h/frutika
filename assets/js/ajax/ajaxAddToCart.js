$(document).ready(function () {
  $(".cart-btn").click(function () {
    let id = $(this).val();
    $.ajax({
      url: "add_to_cart.php",
      type: "GET",
      data: {
        id,
      },
      success: function (response) {
        const res = jQuery.parseJSON(response);
        const cartQuantity = $("#cart-quantity");
        if (res.status == 200) {
          if (res.data != null) {
            $.trim(cartQuantity.text(res.data));
          }
          Swal.fire("Thành công", res.message, "success");
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
        }
      },
    });
  });
  $("#single-product-form").validate({
    rules: {
      "quantity-product": {
        min: 1,
        max: 10,
      },
    },
    messages: {
      "quantity-product": {
        min: "Số lượng phải lớn hơn hoặc bằng 1",
        max: "Số lượng phải nhỏ hơn hoặc bằng 10",
      },
    },
    submitHandler: function () {
      var formData = new FormData(document.querySelector("#single-product-form"));
      formData.append("add_product_to_cart", true);
      $.ajax({
        url: "add_to_cart.php",
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          const res = jQuery.parseJSON(response);
          const cartQuantity = $("#cart-quantity");
          if (res.status == 200) {
            if (res.data != null) {
              $.trim(cartQuantity.text(res.data));
            }
            Swal.fire("Thành công", res.message, "success");
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
          }
        },
      });
    },
  });
});
