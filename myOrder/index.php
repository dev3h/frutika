<?php
$title = 'Đơn hàng';
require_once '../path.php';
require_once ROOT . 'includes/header.php';
require_once ROOT . 'functions/handleCurrency.php';
require_once ROOT . 'check_login.php';

$customer_id = $_SESSION['id'];
require_once 'getData.php';

$currentOrderTime = getCreateAt($customer_id, 0);
$passOrderTime = getCreateAt($customer_id, 1);
$cancelOrderTime = getCreateAt($customer_id, 2);

?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1>Đơn hàng</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="tabs">
                    <ul>
                        <li><a href="#tabs-1">Mới đặt</a></li>
                        <li><a href="#tabs-2">Đã duyệt</a></li>
                        <li><a href="#tabs-3">Đã hủy</a></li>
                    </ul>
                    <div id="tabs-1" class="tabs-my-order">
                        <?php
                        foreach ($currentOrderTime as $time) {
                            $sum = 0;
                            $currentOrder = getOrder($customer_id, 0, $time['create_at']); ?>

                            <div class="my-order-group">
                                <?php foreach ($currentOrder as $each) {
                                    $sum += $each['price'] * $each['quantity'];
                                    $order_id = $each['id'];
                                ?>
                                    <div class="my-order-item">
                                        <div class="my-order-item-row">
                                            <div class="item-wrapper">
                                                <div class="order-image-wrapper">
                                                    <div class="order-image"><img src=" /admin/assets/uploads/products/<?php echo $each['photo'] ?>" alt="" height="100">
                                                    </div>
                                                    <span>x<?php echo $each['quantity'] ?></span>
                                                </div>
                                                <div class="order-info">
                                                    <h5><?php echo $each['product_name'] ?></h5>
                                                    <p>
                                                        <?php echo $each['name_receiver'] ?> <br>
                                                        <?php echo $each['phone_receiver'] ?> <br>
                                                        <?php echo $each['address_receiver'] ?>
                                                    </p>
                                                    <p><?php echo $each['create_at'] ?></p>
                                                </div>
                                            </div>
                                            <p class="item-price"><?php echo handleCurrency($each['price']) ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="footer-my-order">
                                    <button class="cancelMyOrderBtn" value="<?php echo $order_id ?>" data-status="2">Hủy </button>
                                    <div class="totalPayment"><b>Thành tiền</b>: <span><?php echo handleCurrency($sum) ?></spa>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="tabs-2" class="tabs-my-order">
                        <?php
                        foreach ($passOrderTime as $time) {
                            $sum = 0;
                            $passOrder = getOrder($customer_id, 1, $time['create_at']); ?>

                            <div class="my-order-group">
                                <?php foreach ($passOrder as $each) {
                                    $sum += $each['price'] * $each['quantity'];
                                ?>
                                    <div class="my-order-item">
                                        <div class="my-order-item-row">
                                            <div class="item-wrapper">
                                                <div class="order-image-wrapper">
                                                    <div class="order-image"><img src=" /admin/assets/uploads/products/<?php echo $each['photo'] ?>" alt="" height="100">
                                                    </div>
                                                    <span>x<?php echo $each['quantity'] ?></span>
                                                </div>
                                                <div class="order-info">
                                                    <h5><?php echo $each['product_name'] ?></h5>
                                                    <p>
                                                        <?php echo $each['name_receiver'] ?> <br>
                                                        <?php echo $each['phone_receiver'] ?> <br>
                                                        <?php echo $each['address_receiver'] ?>
                                                    </p>
                                                    <p><?php echo $each['create_at'] ?></p>
                                                </div>
                                            </div>
                                            <p class="item-price"><?php echo handleCurrency($each['price']) ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="footer-my-order">
                                    <div></div>
                                    <div class="totalPayment"><b>Thành tiền</b>: <span><?php echo handleCurrency($sum) ?></spa>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="tabs-3" class="tabs-my-order">
                        <?php
                        foreach ($cancelOrderTime as $time) {
                            $sum = 0;
                            $cancelOrder = getOrder($customer_id, 2, $time['create_at']); ?>

                            <div class="my-order-group">
                                <?php foreach ($cancelOrder as $each) {
                                    $sum += $each['price'] * $each['quantity'];
                                    $order_id = $each['id'];
                                ?>
                                    <div class="my-order-item">
                                        <div class="my-order-item-row">
                                            <div class="item-wrapper">
                                                <div class="order-image-wrapper">
                                                    <div class="order-image"><img src=" /admin/assets/uploads/products/<?php echo $each['photo'] ?>" alt="" height="100">
                                                    </div>
                                                    <span>x<?php echo $each['quantity'] ?></span>
                                                </div>
                                                <div class="order-info">
                                                    <h5><?php echo $each['product_name'] ?></h5>
                                                    <p>
                                                        <?php echo $each['name_receiver'] ?> <br>
                                                        <?php echo $each['phone_receiver'] ?> <br>
                                                        <?php echo $each['address_receiver'] ?>
                                                    </p>
                                                    <p><?php echo $each['create_at'] ?></p>
                                                </div>
                                            </div>
                                            <p class="item-price"><?php echo handleCurrency($each['price']) ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="footer-my-order">
                                    <div></div>
                                    <div class="totalPayment"><b>Thành tiền</b>: <span><?php echo handleCurrency($sum) ?></spa>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once ROOT . 'includes/footer.php'; ?>
<script src="/assets/js/ajax/ajaxMyOrders.js"></script>