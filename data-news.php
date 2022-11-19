<?php
require_once 'classes/db.php';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if ($page < 1) {
    $page = 1;
}

$limit = 3;

$start = ($limit * $page) - $limit;

$sql = "select * from posts limit $start," . ($limit + 1);

$query_run = mysqli_query(Database::getConnection(), $sql);

$result = array();
while ($row = $query_run->fetch_assoc()) {
    array_push($result, $row);
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    sleep(1);

    die(json_encode($result));
} else {
    $total = count($result);

    for ($i = 0; $i < $total - 1; $i++) { ?>
        <div class="col-lg-4 col-md-6">
            <div class="single-latest-news">
                <a href="./post/<?php echo $result[$i]['url'] ?>.html">
                    <div class="latest-news-bg">
                        <img src="/admin/uploads/posts/<?php echo $result[$i]['photo'] ?>" alt="frutica-<?php echo $result[$i]['title'] ?>" style="width: 100%; height: 100%; object-fit: cover" />
                    </div>
                </a>
                <div class="news-text-box">
                    <h3><a href="./post/<?php echo $result[$i]['url'] ?>.html"><?php echo $result[$i]['title'] ?></a></h3>
                    <p class="blog-meta">
                        <span class="author"><i class="fas fa-user"></i> Admin</span>
                        <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                    </p>
                    <p class="excerpt"><?php echo $result[$i]['content'] ?></p>
                    <a href="./post/<?php echo $result[$i]['url'] ?>.html" class="read-more-btn">đọc thêm <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>
<?php }
} ?>