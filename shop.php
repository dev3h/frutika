<?php
$title = 'Cửa hàng';
require_once 'includes/header.php';
require_once 'functions/handleCurrency.php';
?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<h1>Tươi mới và giàu hữu cơ</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- products -->
<div class="product-section mt-150 mb-150">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="product-filters">
					<ul>
						<li class="active" data-filter="*">All</li>
						<?php
						require_once 'classes/db.php';

						$query = "SELECT * FROM categories";
						$query_run = Database::getInstance()->query($query);

						if ($query_run->num_rows > 0) {
							foreach ($query_run as $each) {
								$name = explode(" ", $each['name']);
								$filter = implode("-", $name);
						?>
								<li data-filter=".<?php echo $filter ?>"><?php echo $each['name'] ?></li>
						<?php }
						} ?>
					</ul>
				</div>
			</div>
		</div>

		<div class="row product-lists">
			<?php
			$query = "SELECT products.*, categories.name as category_name FROM products, categories WHERE products.category_id = categories.id";
			$query_run = Database::getInstance()->query($query);

			if ($query_run->num_rows > 0) {
				foreach ($query_run as $each) {
					$name = explode(" ", $each['category_name']);
					$filter = implode("-", $name);
			?>
					<div class="col-lg-4 col-md-6 text-center <?php echo $filter ?>">
						<div class="single-product-item">
							<div class="product-image single-product-image">
								<a href="single-product.php?id=<?php echo $each['id'] ?>" class="product-image-link"><img src="/admin/uploads/products/<?php echo $each['photo'] ?>" alt="frutikha - <?php $each['name'] ?> "></a>
							</div>
							<h3><?php echo $each['name'] ?></h3>
							<p class="product-price d-flex"><?php echo handleCurrency($each['price']) ?></p>

							<button class="cart-btn" value="<?php echo $each['id'] ?>"><i class="fas fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
						</div>
					</div>
			<?php }
			} ?>
		</div>

		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="pagination-wrap">
					<ul>
						<li><a href="#">Prev</a></li>
						<li><a href="#">1</a></li>
						<li><a class="active" href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">Next</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end products -->

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
<script src="/assets/js/ajax/ajaxAddToCart.js"></script>