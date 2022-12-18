<?php
$title = 'Đặt hàng';
require_once 'includes/header.php';
require_once 'functions/handleCurrency.php';

$cart = null;
$customer_id = $_SESSION['id'];
if (isset($_SESSION['cart'])) {
	$cart = $_SESSION['cart'][$customer_id];
}
$payment = 0;
$shipping = 20000;
?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<h1>Đặt hàng</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="checkout-accordion-wrap">
					<div class="accordion" id="accordionExample">
						<div class="card single-accordion">
							<div class="card-header" id="headingOne">
								<h5 class="mb-0">
									<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Thông tin đặt hàng
									</button>
								</h5>
							</div>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body">
									<div class="billing-address-form">
										<?php

										require_once './classes/db.php';
										$sql = "SELECT * FROM customers WHERE id = '$customer_id'";
										$result = Database::getInstance()->query($sql);
										$each = $result->fetch_assoc();

										?>
										<form method="post" id="payment-form">
											<p>
												<label>Tên người nhận <span>*</span></label>
												<input type="text" name="name_receiver" placeholder="tên người nhận" value="<?php echo $each['name'] ?>">
											</p>
											<p>
												<label>Số điện thoại người nhận<span>*</span></label>
												<input type="text" name="phone_receiver" placeholder="sđt người nhận" value="<?php echo $each['phone_number'] ?>">
											</p>
											<p>
												<label>Địa chỉ nhận hàng<span>*</span></label>
												<input type="text" name="address_receiver" placeholder="địa chỉ nhận hàng" value="<?php echo $each['address'] ?>">
											</p>
											<button class="cart-btn">Đặt hàng</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="card single-accordion">
							<div class="card-header" id="headingTwo">
								<h5 class="mb-0">
									<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										Shipping Address
									</button>
								</h5>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
								<div class="card-body">
									<div class="shipping-address-form">
										<p>Your shipping address form is here.</p>
									</div>
								</div>
							</div>
						</div> -->
					</div>

				</div>
			</div>

			<div class="col-lg-4">
				<div class="order-details-wrap">
					<table class="order-details">
						<thead>
							<tr>
								<th>Sản phẩm</th>
								<th>Đơn giá</th>
								<th>Số lượng</th>
							</tr>
						</thead>
						<tbody class="order-details-body">
							<?php
							if ($cart != null) {
								foreach ($cart as $id => $each) {
									$sum = $each['price'] * $each['quantity'];
									$payment += $sum;
							?>
									<tr>
										<td><?php echo $each['name'] ?></td>
										<td><?php echo handleCurrency($each['price']) ?></td>
										<td><?php echo $each['quantity'] ?></td>
									</tr>
							<?php }
							} ?>
						</tbody>
						<tbody class="checkout-details">
							<tr class="font-bold">
								<td>Tổng tiền</td>
								<td><?php echo handleCurrency($payment) ?></td>
							</tr>
							<tr class="font-bold">
								<td>Phí ship</td>
								<td><?php echo handleCurrency($shipping) ?></td>
							</tr>
							<tr class="font-bold">
								<td>Thanh toán</td>
								<td><?php echo handleCurrency($payment + $shipping) ?></td>
							</tr>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- end check out section -->

<?php require_once 'includes/footer.php'; ?>
<script src="/assets/js/ajax/ajaxCheckOut.js"></script>