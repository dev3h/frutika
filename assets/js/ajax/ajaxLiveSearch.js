$(document).ready(function () {
  $("#project")
    .autocomplete({
      minLength: 0,
      source: "process_search.php",
      focus: function (event, ui) {
        $("#project").val(ui.item.label);
        return false;
      },
      select: function (event, ui) {
        console.log();
        $("#project").val(ui.item.label);
        $("#project-id").val(ui.item.value);

        $("#project-icon").attr("src", "/admin/assets/uploads/products/" + ui.item.photo);

        return false;
      },
    })
    .autocomplete("instance")._renderItem = function (ul, item) {
    return $("<li>")
      .append(
        `<div>
         <a href="single-product.php?id=${item.id} ?>">
        <span>${item.label}</span>
        <br/>
        
        <img src='/admin/assets/uploads/products/${item.photo}' height=50 />
        </a>
        </div> 
              `
      )
      .appendTo(ul);
  };
});
