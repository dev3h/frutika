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
        if (res.status == 200) {
          Swal.fire("Thành công", res.message, "success");

          location.reload();
          // $(".tableOrder").load(location.href + " .tableOrder");
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
        if (res.status == 200) {
          Swal.fire("Thành công", res.message, "success");

          location.reload();
          // $(".tableOrder").load(location.href + " .tableOrder");
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

  $(".viewOrderBtn").click(function () {
    var order_id = $(this).val();

    $.ajax({
      url: "process.php?order_id=" + order_id,
      type: "GET",
      success: function (response) {
        var res = jQuery.parseJSON(response);
        if (res.status == 200) {
          if (res.data) {
            var table_view_order = $(".order_table_view");
            var value_of_order = $(".value-of-order");
            let sum = 0;
            let html = "";
            const orders = res.data;
            const getOrderInfo = (item) => {
              return `
              <tr>
                <td><img src='/admin/assets/uploads/products/${
                  item.photo
                }' alt='' width='50' height='50' /></td>
                <td>${item.name}</td>
                <td>${item.price}</td>
                <td>${item.quantity}</td>
                 <td>${item.quantity * item.price}</td>
              </tr>
              `;
            };
            $.each(orders, function (key, obj) {
              html += getOrderInfo(obj);
              totalPrice = obj.price * obj.quantity;
              sum += totalPrice;
            });
            table_view_order.html("");
            table_view_order.append(html);
            value_of_order.html("");
            value_of_order.append(`Tổng giá trị của đơn hàng: ${handleCurrency(sum)}`);
          }
          $("#modalCategoryView").modal("show");
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
});
