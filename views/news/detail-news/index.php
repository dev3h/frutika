<?php
$title = $_GET['url'];
require_once '../../../includes/header.php';
?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Read the Details</p>
					<h1>Single Article</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- single article section -->
<div class="mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="single-article-section">
					<div class="single-article-text">
						<?php
require_once '../../../classes/db.php';
$conn = Database::getConnection();
$url = $_GET['url'];
$query = "SELECT * FROM posts WHERE url = '$url'";
$query_run = mysqli_query($conn, $query);
if ($query_run->num_rows == 0) {
    header("location: news.php");
    exit;
} else {
    $each = $query_run->fetch_assoc();
}
?>
						<div class="single-artcile-bg">
							<img src="/admin/assets/uploads/news/<?php echo $each['photo'] ?>" alt="frutika-news-<?php echo $each['title'] ?>" style="width: 100%; height: 100%; object-fit: cover">
						</div>
						<p class="blog-meta">
							<span class="author"><i class="fas fa-user"></i> Admin</span>
							<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
						</p>
						<h2><?php echo $each['title'] ?></h2>
						<p>
							<?php echo nl2br($each['content']) ?>
						</p>
					</div>

					<div class="comments-list-wrap">
						<h3 class="comment-count-title">3 Bình luận</h3>
						<div class="comment-list">
							<div class="single-comment-body">
								<div class="comment-user-avater">
									<img src="assets/img/avaters/avatar1.png" alt="">
								</div>
								<div class="comment-text-body">
									<h4>Jenny Joe <span class="comment-date">Aprl 26, 2020</span> <a href="#">reply</a></h4>
									<p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
								</div>
								<div class="single-comment-body child">
									<div class="comment-user-avater">
										<img src="assets/img/avaters/avatar3.png" alt="">
									</div>
									<div class="comment-text-body">
										<h4>Simon Soe <span class="comment-date">Aprl 27, 2020</span> <a href="#">reply</a></h4>
										<p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
									</div>
								</div>
							</div>
							<div class="single-comment-body">
								<div class="comment-user-avater">
									<img src="assets/img/avaters/avatar2.png" alt="">
								</div>
								<div class="comment-text-body">
									<h4>Addy Aoe <span class="comment-date">May 12, 2020</span> <a href="#">reply</a></h4>
									<p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
								</div>
							</div>
						</div>
					</div>

					<div class="comment-template">
						<h4>Để lại bình luận</h4>
						<p>Nếu bạn có bất cứ góp ý gì cho bài viết thì bình luận ở bên dưới nha.</p>
						<form action="">
							<p>
								<input type="text" placeholder="Tên">
								<input type="email" placeholder="Email">
							</p>
							<p><textarea name="comment" id="comment" cols="30" rows="10" placeholder="để lại bình luận ở đây"></textarea></p>
							<p><input type="submit" value="Đăng"></p>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="sidebar-section">
					<div class="recent-posts">
						<h4>Recent Posts</h4>
						<ul>
							<li><a href="single-news.html">You will vainly look for fruit on it in autumn.</a></li>
							<li><a href="single-news.html">A man's worth has its season, like tomato.</a></li>
							<li><a href="single-news.html">Good thoughts bear good fresh juicy fruit.</a></li>
							<li><a href="single-news.html">Fall in love with the fresh orange</a></li>
							<li><a href="single-news.html">Why the berries always look delecious</a></li>
						</ul>
					</div>
					<div class="archive-posts">
						<h4>Archive Posts</h4>
						<ul>
							<li><a href="single-news.html">JAN 2019 (5)</a></li>
							<li><a href="single-news.html">FEB 2019 (3)</a></li>
							<li><a href="single-news.html">MAY 2019 (4)</a></li>
							<li><a href="single-news.html">SEP 2019 (4)</a></li>
							<li><a href="single-news.html">DEC 2019 (3)</a></li>
						</ul>
					</div>
					<div class="tag-section">
						<h4>Tags</h4>
						<ul>
							<?php
$tags = explode(",", $each['tags']);
foreach ($tags as $tag) {?>
								<li><a href="single-news.html"><?php echo $tag ?></a></li>
							<?php }?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end single article section -->


<?php require_once '../../../includes/footer.php';?>