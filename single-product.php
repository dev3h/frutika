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
					<img src="/admin/uploads/fruits/<?php echo $each['photo'] ?>" alt="frutikha-<?php echo $each['name'] ?>">
				</div>
			</div>
			<div class="col-md-7">
				<div class="single-product-content">
					<h3><?php echo $each['name'] ?></h3>
					<p class="single-product-pricing d-flex"><?php echo number_format($each['price'], 0, '', '.') ?></p>
					<p><?php echo $each['short_description'] ?></p>
					<div class="single-product-form">
						<form action="index.html">
							<input type="number" placeholder="0">
						</form>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
						<p><strong>Thẻ: </strong>Trái cây, dưa hấu</p>
					</div>
					<h4>Share:</h4>
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
			<div class="col-lg-4 col-md-6 text-center">
				<div class="single-product-item">
					<div class="product-image">
						<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
					</div>
					<h3>Strawberry</h3>
					<p class="product-price"><span>Per Kg</span> 85$ </p>
					<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 text-center">
				<div class="single-product-item">
					<div class="product-image">
						<a href="single-product.html"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
					</div>
					<h3>Berry</h3>
					<p class="product-price"><span>Per Kg</span> 70$ </p>
					<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
				<div class="single-product-item">
					<div class="product-image">
						<a href="single-product.html"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
					</div>
					<h3>Lemon</h3>
					<p class="product-price"><span>Per Kg</span> 35$ </p>
					<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end more products -->

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

<?php require_once 'includes/footer.php' ?>