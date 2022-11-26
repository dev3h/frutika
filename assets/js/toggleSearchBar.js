$(document).ready(function () {
  $(".search-bar-icon").click(function (e) {
    e.stopImmediatePropagation();
    const searchBarContainer = $(".search-bar-icon").children(".search-bar-container");
    searchBarContainer.addClass("show");
    console.log(e.currentTarget);
  });
});
