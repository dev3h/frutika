<?php
session_start();
$title = 'Giỏ hàng';
require_once 'includes/header.php';
require_once 'functions/handleCurrency.php';

$cart = null;
if ($_SESSION['cart']) {
	$cart = $_SESSION['cart'];
}
$sum = 0;

?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Tươi mới vả giàu hữu cơ</p>
					<h1>Giỏ hàng</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- cart -->
<div class="cart-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12">
				<div class="cart-table-wrap">
					<table class="cart-table">
						<thead class="cart-table-head">
							<tr class="table-head-row">
								<th class="product-remove"></th>
								<th class="product-image">Ảnh</th>
								<th class="product-name">Tên sản phẩm</th>
								<th class="product-price">Giá</th>
								<th class="product-quantity">Số lượng</th>
								<th class="product-total">Tổng tiền</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ($cart != null) {
								foreach ($cart as $id => $each) { ?>
									<tr class="table-body-row">
										<td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
										<td class="product-image product-image-cart"><img src="/admin/uploads/products/<?php echo $each['photo'] ?>" alt="frutikha - <?php $each['name'] ?>" height=100 /></td>
										<td class="product-name"><?php echo $each['name'] ?></td>
										<td class="product-price"><span class="span-price"><?php echo handleCurrency($each['price']) ?></span></td>
										<td class="product-quantity"><button class="btn-update-quantity" data-id="<?php echo $id ?>" data-type='0'>-</button>
											<span class="span-quantity">
												<?php echo $each['quantity'] ?>
											</span>
											<button class="btn-update-quantity" data-id="<?php echo $id ?>" data-type='1'>+</button>
										</td>
										<td class="product-total">
											<span class="span-sum">
												<?php
												$result = $each['price'] * $each['quantity'];
												echo handleCurrency($result);
												$sum += $result;
												?>
											</span>
										</td>
									</tr>
								<?php }
							} else { ?>
								<tr>
									<td colspan="6" style="border: unset">Chưa có sản phẩm</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="total-section">
					<table class="total-table">
						<thead class="total-table-head">
							<tr class="table-total-row">
								<th>Total</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<tr class="total-data">
								<td><strong>Subtotal: </strong></td>
								<td>$500</td>
							</tr>
							<tr class="total-data">
								<td><strong>Shipping: </strong></td>
								<td>$45</td>
							</tr>
							<tr class="total-data">
								<td><strong>Total: </strong></td>
								<td>$545</td>
							</tr>
						</tbody>
					</table>
					<div class="cart-buttons">
						<a href="checkout.html" class="boxed-btn black">Đặt hàng</a>
					</div>
				</div>

				<div class="coupon-section">
					<h3>Apply Coupon</h3>
					<div class="coupon-form-wrap">
						<form action="index.html">
							<p><input type="text" placeholder="Coupon"></p>
							<p><input type="submit" value="Apply"></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end cart -->

<?php require_once 'includes/footer.php'; ?>
<script src="/assets/js/ajax/ajaxUpdateQuantity.js"></script>