<?php
$title = 'Trang chủ';
require_once 'includes/header.php';
?>

<!-- hero area -->
<div class="hero-area hero-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 offset-lg-2 text-center">
				<div class="hero-text">
					<div class="hero-text-tablecell">
						<p class="subtitle">Tươi và giàu hữu cơ</p>
						<h1>Trái cây ngon các mùa</h1>
						<div class="hero-btns">
							<a href="shop.php" class="boxed-btn">Cửa hàng</a>
							<a href="contact.php" class="bordered-btn">Liên hệ</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end hero area -->

<!-- features list section -->
<div class="list-section pt-80 pb-80">
	<div class="container">

		<div class="row">
			<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
				<div class="list-box d-flex align-items-center">
					<div class="list-icon">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="content">
						<h3>Miễn phí vẫn chuyển</h3>
						<p>Cho đơn từ 100 nghìn</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
				<div class="list-box d-flex align-items-center">
					<div class="list-icon">
						<i class="fas fa-phone-volume"></i>
					</div>
					<div class="content">
						<h3>Hỗ trợ 24/7</h3>
						<p>Nhân hỗ trợ cả ngày</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="list-box d-flex justify-content-start align-items-center">
					<div class="list-icon">
						<i class="fas fa-sync"></i>
					</div>
					<div class="content">
						<h3>Hoàn trả</h3>
						<p>Nhận hoàn trả trong vòng 7 ngày từ lúc nhận hàng</p>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- end features list section -->

<!-- product section -->
<div class="product-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><span class="orange-text">Sản phẩm</span> của chúng tôi</h3>
					<p>Cửa hàng cung cấp đa dạng các mặt hàng trái cây</p>
				</div>
			</div>
		</div>

		<div class="row">
			<?php
			require_once 'classes/db.php';
			$query = "SELECT * FROM products ORDER BY RAND() LIMIT 3";
			$query_run = Database::getInstance()->query($query);

			if ($query_run->num_rows > 0) {
				foreach ($query_run as $each) { ?>
					<div class="col-lg-4 col-md-6 text-center">
						<div class="single-product-item">
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
<!-- end product section -->

<!-- cart banner section -->
<section class="cart-banner pt-100 pb-100">
	<div class="container">
		<div class="row clearfix">
			<!--Image Column-->
			<div class="image-column col-lg-6">
				<div class="image">
					<div class="price-box">
						<div class="inner-price">
							<span class="price">
								<strong>-30%</strong> <br> /kg
							</span>
						</div>
					</div>
					<img src="assets/img/a.jpg" alt="">
				</div>
			</div>
			<!--Content Column-->
			<div class="content-column col-lg-6">
				<h3><span class="orange-text">Giảm giá</span> cuối năm</h3>
				<h4>Dâu anh đào nhật</h4>
				<div class="text">Dâu anh đào nhật chúng có mùi thơm rõ nét, kích thước lớn, vị ngọt thanh đặc trưng, căng mọng hơn rất nhiều, đồng thời lại giàu các loại vitamin A, C, E và các đặc tính chống lão hóa tốt, ít calo, tăng chất xơ. Ngoài ra, nguồn gốc xuất xứ Nhật Bản cũng là yếu tố khiến loại quả này được 'sủng ái' và khiến khách hàng sẵn sàng chi mạnh hầu bao để mua.</div>
				<!--Countdown Timer-->
				<div class="time-counter">
					<div class="time-countdown clearfix" data-countdown="2022/12/01">
						<div class="counter-column">
							<div class="inner"><span class="count">00</span>Days</div>
						</div>
						<div class="counter-column">
							<div class="inner"><span class="count">00</span>Hours</div>
						</div>
						<div class="counter-column">
							<div class="inner"><span class="count">00</span>Mins</div>
						</div>
						<div class="counter-column">
							<div class="inner"><span class="count">00</span>Secs</div>
						</div>
					</div>
				</div>
				<button class="cart-btn" value="<?php echo $each['id'] ?>"><i class="fas fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
			</div>
		</div>
	</div>
</section>
<!-- end cart banner section -->

<!-- testimonail-section -->
<div class="testimonail-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 text-center">
				<div class="testimonial-sliders">
					<div class="single-testimonial-slider">
						<div class="client-avater">
							<img src="assets/img/avaters/avatar1.png" alt="">
						</div>
						<div class="client-meta">
							<h3>Hoàng Huy Văn</h3>
							<div class="last-icon">
								<span>5</span><i class="fas fa-star"></i>
							</div>
							<p class="testimonial-body">
								"Sản phẩm ở đây rất tươi, đóng gói cẩn thận"
							</p>

						</div>
					</div>
					<div class="single-testimonial-slider">
						<div class="client-avater">
							<img src="assets/img/avaters/avatar2.png" alt="">
						</div>
						<div class="client-meta">
							<h3>Hoa Văn Mai</h3>
							<div class="last-icon">
								<span>4.5</span><i class="fas fa-star"></i>
							</div>
							<p class="testimonial-body">
								"Dâu ở đây rất ngon, đóng gói cẩn thận"
							</p>
						</div>
					</div>
					<div class="single-testimonial-slider">
						<div class="client-avater">
							<img src="assets/img/avaters/avatar3.png" alt="">
						</div>
						<div class="client-meta">
							<h3>Nguyễn Mai Anh</h3>
							<div class="last-icon">
								<span>5</span><i class="fas fa-star"></i>
							</div>
							<p class="testimonial-body">
								"Sản phẩm tươi ngon, shop tư vấn nhiệt tình, giao hàng nhanh"
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end testimonail-section -->

<!-- advertisement section -->
<div class="abt-section mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<div class="abt-bg">
					<a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="abt-text">
					<p class="top-sub">Bắt đầu từ năm 2010</p>
					<h2>Chúng tôi là <span class="orange-text">Fruitkha</span></h2>
					<p>Với tôn chỉ “Mang đến cho khách hàng không chỉ là những sản phẩm trái cây an toàn, chất lượng cao, mà kèm theo đó là những dịch vụ tiện ích thân thiện.”. Hiện tại, công ty có hệ thống 44 cửa hàng mang thương hiệu Fruitkha được phân bố rộng khắp trên địa bàn Hà Nội và Hồ Chí Minh để phục vụ đủ nhu cầu cho mọi khách hàng.</p>
					<p>Bằng những nỗ lực không ngừng theo thời gian, hệ thống Fruitkha của công ty từng bước hoàn thiện hơn về tất cả mọi mặt.</p>
					<a href="/about.php" class="boxed-btn mt-4">Đọc thêm</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end advertisement section -->

<!-- shop banner -->
<section class="shop-banner">
	<div class="container">
		<h3>Siêu sale tháng 12 <br> with big <span class="orange-text">Giảm giá...</span></h3>
		<div class="sale-percent"><span>Siêu sale! <br> Giảm đến</span>50%</div>
		<a href="/shop.php" class="cart-btn btn-lg">Truy cập cửa hàng</a>
	</div>
</section>
<!-- end shop banner -->

<!-- latest news -->
<div class="latest-news pt-150 pb-150">
	<div class="container">

		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><span class="orange-text">Bài viết</span> mới</h3>
					<p>Chúng tôi luôn cập nhập những bài viết mới, những mẹo, những món ăn ngon chế biến từ trái cây</p>
				</div>
			</div>
		</div>

		<div class="row">
			<?php require_once 'classes/db.php' ?>
			<?php require_once 'seo_friendly.php' ?>
			<?php require_once 'data-news.php' ?>
		</div>
		<div class="row">
			<div class="col-lg-12 text-center">
				<a href="news.php" class="boxed-btn">Xem thêm bài viết</a>
			</div>
		</div>
	</div>
</div>
<!-- end latest news -->

<?php require_once 'includes/footer.php'; ?>
<script src="/assets/js/ajax/ajaxAddToCart.js"></script>