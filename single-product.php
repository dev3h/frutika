<?php
$title = "";
require_once "includes/header.php";
require_once "classes/db.php";
$id = $_GET['id'];

$sql = "SELECT * FROM products WHERE id = '$id'";
$result = Database::getInstance()->query($sql);
$each = $result->fetch_assoc();

?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<h1>Thông tin chi tiết</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- single product -->
<div class="single-product mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="single-product-img">
					<img src="/admin/assets/uploads/products/<?php echo $each['photo'] ?>" alt="frutikha-<?php echo $each['name'] ?>">
				</div>
			</div>
			<div class="col-md-7">
				<div class="single-product-content">
					<h3><?php echo $each['name'] ?></h3>
					<p class="single-product-pricing d-flex"><?php echo number_format($each['price'], 0, '', '.') ?></p>
					<p><?php echo $each['short_description'] ?></p>
					<div class="single-product-form">
						<form method="post" id="single-product-form">
							<input type="number" placeholder="1" class="quantityProduct">
							<button class="cart-btn" value="<?php echo $each['id'] ?>"><i class="fas fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
						</form>
						<p><strong>Thẻ: </strong>Trái cây, dưa hấu</p>
					</div>
					<h4>Chia sẻ:</h4>
					<ul class="product-share">
						<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
						<li><a href=""><i class="fab fa-twitter"></i></a></li>
						<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
						<li><a href=""><i class="fab fa-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end single product -->

<!-- more products -->
<div class="more-products mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3>Các sản phẩm <span class="orange-text">liên quan</span></h3>
					<p>Xem thêm các mặt hàng trái cây khác</p>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			require_once 'classes/db.php';
			$query = "SELECT * FROM products WHERE category_id='" . $each['category_id'] . "' AND NOT id='" . $each['id'] . "'ORDER BY RAND() LIMIT 3";
			$query_run = Database::getInstance()->query($query);

			if ($query_run->num_rows > 0) {
				foreach ($query_run as $each) { ?>
					<div class="col-lg-4 col-md-6 text-center">
						<div class="single-product-item single-product-container">
							<div class="product-image single-product-image">
								<a href="single-product.php?id=<?php echo $each['id'] ?>" class="product-image-link"><img src="/admin/assets/uploads/products/<?php echo $each['photo'] ?>" alt="frutikha - <?php $each['name'] ?>"></a>
							</div>
							<h3><?php echo $each['name'] ?></h3>
							<p class="product-price"><?php echo number_format($each['price'], 0, '', '.') ?></p>
							<button class="cart-btn" value="<?php echo $each['id'] ?>"><i class="fas fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
						</div>
					</div>
			<?php }
			} ?>
		</div>
	</div>
</div>
<!-- end more products -->


<?php require_once 'includes/footer.php' ?>
<script src="/assets/js/ajax/ajaxAddToCart.js"></script>