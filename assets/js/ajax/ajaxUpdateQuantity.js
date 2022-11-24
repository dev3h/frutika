$(document).ready(function () {
  $(".btn-update-quantity").click(function () {
    let btn = $(this);
    let id = btn.data("id");
    let type = parseInt(btn.data("type"));
    $.ajax({
      url: "processUpdateQuantity.php",
      type: "get",
      data: {
        id,
        type,
      },
    }).done(function (response) {
      const res = jQuery.parseJSON(response);
      const cartQuantity = $("#cart-quantity");
      let parent_tr = btn.parents("tr");
      let price = parent_tr.find(".span-price").text();

      price = price.replace(".", "");
      let quantity = parent_tr.find(".span-quantity").text();
      if (type == 1) {
        quantity++;
      } else {
        quantity--;
      }

      if (quantity === 0) {
        parent_tr.remove();
      } else {
        console.log(parent_tr.find(".span-quantity"));
        parent_tr.find(".span-quantity").text(quantity);
        let sum = price * quantity;

        sum = sum.toLocaleString("vi-VN", {
          currency: "VND",
        });

        parent_tr.find(".span-sum").text(sum);
      }
      getTotal();
      if (res.data != null) {
        $.trim(cartQuantity.text(res.data));
      }
    });
  });
  $(".btn-delete").click(function () {
    let btn = $(this);
    let id = btn.data("id");
    $.ajax({
      url: "delete_from_cart.php",
      type: "get",
      data: {
        id,
      },
    }).done(function (response) {
      const res = jQuery.parseJSON(response);
      const cartQuantity = $("#cart-quantity");
      btn.parents("tr").remove();
      getTotal();
      if (res.data != null) {
        $.trim(cartQuantity.text(res.data));
      }
    });
  });
});
function getTotal() {
  let total = 0;
  let payment = 0;
  let shipping = 20000;

  $(".span-sum").each(function () {
    let sum = $(this).text();
    sum = sum.replaceAll(".", "");
    console.log("sum", sum);
    total += parseInt(sum);
  });
  payment = total + shipping;

  total = total.toLocaleString("vi-VN", {
    currency: "VND",
  });

  payment = payment.toLocaleString("vi-VN", {
    currency: "VND",
  });
  $("#span-total").text(total);
  $("#span-payment").text(payment);
}
