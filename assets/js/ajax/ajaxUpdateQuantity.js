$(document).ready(function () {
  $(".btn-update-quantity").click(function () {
    let btn = $(this);
    let id = btn.data("id");
    let type = parseInt(btn.data("type"));
    $.ajax({
      url: "processUpdateQuantity",
      type: "get",
      data: {
        id,
        type,
      },
    }).done(function () {
      let parent_tr = btn.parents("tr");
      let price = parent_tr.find(".span-price").text();
      let quantity = parent_tr.find(".span-quantity").text();
      if (type == 1) {
        quantity++;
      } else {
        quantity--;
      }
      // có thể kiểm tra là khi quantity = 1 mà bấm trừ nữa thì hỏi là có muốn xóa không
      if (quantity === 0) {
        parent_tr.remove();
      } else {
        parent_tr.find(".span-quantity").text(quantity);
        let sum = price * quantity;
        parent_tr.find(".span-sum").text(sum);
      }
      getTotal();
    });
  });
  $(".btn-delete").click(function () {
    let btn = $(this);
    let id = btn.data("id");
    $.ajax({
      url: "./delete_from_cart.php",
      type: "get",
      data: {
        id,
      },
    }).done(function () {
      btn.parents("tr").remove();
      getTotal();
    });
  });
});
