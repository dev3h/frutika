<?php
$title = 'Bài viết';
require_once 'includes/header.php';
?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<h1>Tổng hợp bài viết trái cây</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- latest news -->
<div class="latest-news mt-150 mb-150">
	<div class="container">
		<div class="row" id="news-content">
			<?php require_once 'classes/db.php' ?>
			<?php require_once 'seo_friendly.php' ?>
			<?php require_once 'data-news.php' ?>
		</div>

		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<a href="#" class="cart-btn" id="load_more">Hiển thị thêm</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end latest news -->

<!-- logo carousel -->
<div class="logo-carousel-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="logo-carousel-inner">
					<div class="single-logo-item">
						<img src="assets/img/company-logos/1.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/2.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/3.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/4.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/5.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end logo carousel -->

<?php require_once 'includes/footer.php'; ?>
<script src="/assets/js/load-more.js"></script>