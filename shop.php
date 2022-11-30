<?php
$title = 'Cửa hàng';
require_once './path.php';
require_once ROOT . 'includes/header.php';
require_once ROOT . 'functions/handleCurrency.php';
require_once ROOT . 'classes/db.php';

$page  = 1;

if (isset($_GET['page'])) {
	$page = $_GET['page'];
}

// $sql = "SELECT COUNT(*) FROM products ";
// $result = Database::getInstance()->query($sql);
// $num_of_product = $result->fetch_assoc()['COUNT(*)'];

// $products_per_page = 3;
// $num_of_page = ceil($num_of_product / $products_per_page);

// $skip = $products_per_page * ($page - 1);

// $query = "SELECT products.*, categories.name as category_name FROM products, categories WHERE products.category_id = categories.id limit $products_per_page offset $skip";
$query = "SELECT products.*, categories.name as category_name FROM products JOIN categories ON products.category_id = categories.id";
$productsList = Database::getInstance()->query($query);
?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<h1>Cửa hàng</h1>
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

						$query = "SELECT * FROM categories";
						$categories = Database::getInstance()->query($query);

						if ($categories->num_rows > 0) {
							foreach ($categories as $each) {
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


			if ($productsList->num_rows > 0) {
				foreach ($productsList  as $product) {
					$name = explode(" ", $product['category_name']);
					$filter = implode("-", $name);
			?>
					<div class="col-lg-4 col-md-6 text-center <?php echo $filter ?>">
						<div class="single-product-item">
							<div class="product-image single-product-image">
								<a href="single-product.php?id=<?php echo $product['id'] ?>" class="product-image-link"><img src="/admin/assets/uploads/products/<?php echo $product['photo'] ?>" alt="frutikha - <?php $product['name'] ?> "></a>
							</div>
							<h3><?php echo $product['name'] ?></h3>
							<p class="product-price d-flex"><?php echo handleCurrency($product['price']) ?></p>

							<button class="cart-btn" value="<?php echo $product['id'] ?>"><i class="fas fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
						</div>
					</div>
			<?php }
			} ?>
		</div>
	</div>
</div>
<!-- end products -->


<?php require_once ROOT . 'includes/footer.php'; ?>
<script src="/assets/js/ajax/ajaxAddToCart.js"></script>