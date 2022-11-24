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
						<button class="cart-btn" id="load_more">Hiển thị thêm</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end latest news -->

<?php require_once 'includes/footer.php'; ?>
<script src="/assets/js/ajax/ajaxLoadMore.js"></script>