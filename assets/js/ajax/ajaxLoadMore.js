var is_busy = false;

var page = 1;

var record_per_page = 3;

var stopped = false;

$(document).ready(function () {
  $("#load_more").click(function () {
    $element = $("#news-content");

    $button = $(this);

    if (is_busy == true) {
      return false;
    }

    page++;

    $button.html("LOADING ...");

    $.ajax({
      type: "get",
      dataType: "json",
      url: "/views/news/data-news.php",
      data: { page },
      success: function (result) {
        var html = "";
        const getNewsCard = (obj) => {
          return `
        <div class="col-lg-4 col-md-6">
                <div class="single-latest-news">
                    <a href="./detail-news/${obj.url}.html">
                        <div class="latest-news-bg">
                            <img src="/admin/assets/uploads/news/${obj.photo}" alt="frutica-${obj.title}" style="width: 100%; height: 100%; object-fit: cover" />
                        </div>
                    </a>
                    <div class="news-text-box">
                        <h3><a href="./detail-news/${obj.url}.html">${obj.title}</a></h3>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i> Admin</span>
                            <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                        </p>
                        <p class="excerpt">${obj.content}</p>
                        <a href="./detail-news/${obj.url}.html" class="read-more-btn">đọc thêm <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
             </div>
        `;
        };

        if (result.length <= record_per_page) {
          $.each(result, function (key, obj) {
            html += getNewsCard(obj);
          });

          $element.append(html);

          // Xóa button
          $button.remove();
        } else {
          $.each(result, function (key, obj) {
            if (key < result.length - 1) {
              html += getNewsCard(obj);
            }
          });

          $element.append(html);
        }
      },
    }).always(function () {
      $button.html("hiển thị thêm");
      is_busy = false;
    });
  });
});
