<?php
require_once '../path.php';
$title = 'Quản lý đơn hàng';
$current = 'Quản lý đơn hàng';
require_once ADMIN . 'includes/sidebar.php';
?>
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <?php require_once ADMIN . 'includes/headerbar.php' ?>

    <!-- Static Table Start -->
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Quản lý đơn hàng</h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <select class="form-control dt-tb">
                                        <option value="">Xuất cơ bản</option>
                                        <option value="all">Xuất tất cả</option>
                                        <option value="selected">Xuất lựa chọn</option>
                                    </select>
                                </div>
                                <table class="tableOrder table table-striped" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="id">ID</th>
                                            <th data-field="create_at">Thời gian đặt</th>
                                            <th data-field="info_receiver">Thông tin người nhận</th>
                                            <th data-field="info_orders">Thông tin người đặt</th>
                                            <th data-field="status">Trạng thái</th>
                                            <th data-field="totalPrice">Tổng tiền</th>
                                            <th data-field="action">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once '../classes/db.php';
                                        $query = "SELECT orders.*, customers.name,customers.phone_number,  customers.address
                                    FROM orders JOIN customers ON customers.id = orders.customer_id";
                                        $query_run = Database::getInstance()->query($query);
                                        if ($query_run->num_rows > 0) {
                                            foreach ($query_run as $each) { ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $each['id'] ?></td>
                                                    <td><?php echo $each['create_at'] ?></td>
                                                    <td>
                                                        <?php echo $each['name_receiver'] ?> <br>
                                                        <?php echo $each['phone_receiver'] ?> <br>
                                                        <?php echo $each['address_receiver'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $each['name'] ?> <br>
                                                        <?php echo $each['phone_number'] ?> <br>
                                                        <?php echo $each['address'] ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        switch ($each['status']) {
                                                            case '0':
                                                                echo 'Mới đặt';
                                                                break;
                                                            case '1':
                                                                echo 'Đã duyệt';
                                                                break;
                                                            case '2':
                                                                echo 'Đã hủy';
                                                                break;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $each['totalPrice'] ?></td>
                                                    <td class="datatable-ct">
                                                        <div style="text-align: end;">
                                                            <button type="button" class="viewOrderBtn btn btn-primary" value="<?php echo $each['id'] ?>">Xem</button>
                                                            <?php if ($each['status'] == 0) { ?>
                                                                <button type="button" class="browsingOrderBtn btn btn-primary" value="<?php echo $each['id'] ?>" data-status="1">Duyệt</button>
                                                                <button type="button" class="cancelOrderBtn btn btn-primary" value="<?php echo $each['id'] ?>" data-status="2">Hủy</button>
                                                            <?php } ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once ADMIN . 'includes/footer.php';
require_once ADMIN . 'orders/view_order.php';

?>

<script src="ajaxOrders.js"></script>