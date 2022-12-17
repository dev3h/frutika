<?php
$title = "";
require_once "includes/header.php";
require_once "classes/db.php";
$id = $_GET['id'];

$sql = "SELECT * FROM products WHERE products.id = '$id'";
$result = Database::getInstance()->query($sql);
$each = $result->fetch_assoc();

$sql = "SELECT products.id, customers.name as customer_name, customers.photo as customer_photo, rating, comment FROM products 
JOIN products_rating ON products.id = products_rating.product_id
JOIN customers ON customers.id = products_rating.customer_id
  WHERE products.id = '$id' ORDER BY create_at DESC";
$comments = Database::getInstance()->query($sql);

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
<div class="single-product mt-150">
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
						<form method="get" id="single-product-form">
							<input type="number" name="quantity-product" value="1" min="1" class="quantityProduct">
							<input type="hidden" name="id" value="<?php echo $each['id'] ?>" class="quantityProduct">
							<button class="cart-btn" value="<?php echo $each['id'] ?>"><i class="fas fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
						</form>
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
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Mô tả</a></li>
		<li><a href="#tabs-2">Bình Luận</a></li>
		<li><a href="#tabs-3">Khác</a></li>
	</ul>
	<div id="tabs-1">

		<p><?php echo $each['long_description'] ?></p>
	</div>
	<div id="tabs-2">
		<form id="rating-form" method="post">
			<h3>Để lại đánh giá</h3>
			<input type="hidden" name="product_id" value="<?php echo $each['id'] ?>">
			<textarea name="content" class="form-control"></textarea>
			<div class="rating-star">
				<fieldset class="rating">
					<input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
					<input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
					<input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
					<input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
					<input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
					<input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
					<input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
					<input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
					<input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
					<input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
				</fieldset>
				<button class="rating-btn">Đánh giá</button>
			</div>
		</form>
		<?php foreach ($comments as $comment) { ?>
			<div class="comment-group">
				<div class="comment-customer-photo">
					<img src="/admin/assets/uploads/customers/<?php echo $comment['customer_photo'] ?>" alt="">
				</div>
				<div class="comment-content">
					<h5><?php echo $comment['customer_name'] ?></h5>
					<span><?php echo $comment['rating'] ?>sao</span>
					<p><?php echo $comment['comment'] ?></p>
				</div>

			</div>
		<?php } ?>
	</div>
	<div id="tabs-3">
		<p>Chưa có gì</p>
	</div>
</div>

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
<script src="/assets/js/ajax/ajaxRating.js"></script>