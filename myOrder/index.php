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
                    <div id="tabs-1">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Gía</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th>Thông tin người đặt hàng</th>
                                    <th>Thời gian đặt hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($currentOrderTime as $time) {
                                    $currentOrder = getOrder($customer_id, 0, $time['create_at']); ?>
                                    <div>
                                        <?php foreach ($currentOrder as $each) { ?>
                                            <tr>
                                                <td><img src="/admin/assets/uploads/products/<?php echo $each['photo'] ?>" alt="" height="100"></td>
                                                <td><?php echo $each['product_name'] ?></td>
                                                <td><?php echo handleCurrency($each['price']) ?></td>
                                                <td><?php echo $each['quantity'] ?></td>
                                                <td><?php echo handleCurrency($each['price'] * $each['quantity']) ?></td>
                                                <td>
                                                    <?php echo $each['name_receiver'] ?> <br>
                                                    <?php echo $each['phone_receiver'] ?> <br>
                                                    <?php echo $each['address_receiver'] ?>
                                                </td>
                                                <td><?php echo $each['create_at'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="tabs-2">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Gía</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th>Thông tin người đặt hàng</th>
                                    <th>Thời gian đặt hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($passOrderTime as $time) {
                                    $passOrder = getOrder($customer_id, 1, $time['create_at']); ?>
                                    <div>
                                        <?php foreach ($passOrder as $each) { ?>
                                            <tr>
                                                <td><img src="/admin/assets/uploads/products/<?php echo $each['photo'] ?>" alt="" height="100"></td>
                                                <td><?php echo $each['product_name'] ?></td>
                                                <td><?php echo handleCurrency($each['price']) ?></td>
                                                <td><?php echo $each['quantity'] ?></td>
                                                <td><?php echo handleCurrency($each['price'] * $each['quantity']) ?></td>
                                                <td>
                                                    <?php echo $each['name_receiver'] ?> <br>
                                                    <?php echo $each['phone_receiver'] ?> <br>
                                                    <?php echo $each['address_receiver'] ?>
                                                </td>
                                                <td><?php echo $each['create_at'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="tabs-3">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Gía</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th>Thông tin người đặt hàng</th>
                                    <th>Thời gian đặt hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($cancelOrderTime as $time) {
                                    $cancelOrder = getOrder($customer_id, 2, $time['create_at']); ?>
                                    <div>
                                        <?php foreach ($cancelOrder as $each) { ?>
                                            <tr>
                                                <td><img src="/admin/assets/uploads/products/<?php echo $each['photo'] ?>" alt="" height="100"></td>
                                                <td><?php echo $each['product_name'] ?></td>
                                                <td><?php echo handleCurrency($each['price']) ?></td>
                                                <td><?php echo $each['quantity'] ?></td>
                                                <td><?php echo handleCurrency($each['price'] * $each['quantity']) ?></td>
                                                <td>
                                                    <?php echo $each['name_receiver'] ?> <br>
                                                    <?php echo $each['phone_receiver'] ?> <br>
                                                    <?php echo $each['address_receiver'] ?>
                                                </td>
                                                <td><?php echo $each['create_at'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once ROOT . 'includes/footer.php'; ?>