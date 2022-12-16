<?php
require_once '../path.php';
$title = 'Quản lý tài khoản khách hàng';
$current = 'Quản lý tài khoản';
require_once ADMIN . 'includes/sidebar.php';
require_once ADMIN . 'functions/handleCurrency.php';

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
                                <h1>Quản lý khách hàng</h1>
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
                                <table class="tableAccount table table-striped" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="customer_id">ID khách hàng</th>
                                            <th data-field="customer_name">Tên khách hàng</th>
                                            <th data-field="create_at">Ngày mua gần nhất</th>
                                            <th data-field="totalPricePayment">Tổng tiền khách chi</th>
                                            <th data-field="action">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once '../classes/db.php';
                                        $query = "SELECT SUM(totalPrice) as totalPricePayment,customer_id,create_at, customers.name as customer_name FROM orders JOIN customers ON customer_id = customers.id GROUP BY customer_id ORDER BY totalPricePayment DESC
                                        ";
                                        $query_run = Database::getInstance()->query($query);
                                        if ($query_run->num_rows > 0) {
                                            foreach ($query_run as $each) { ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $each['customer_id'] ?></td>
                                                    <td><?php echo $each['customer_name'] ?></td>
                                                    <td><?php echo $each['create_at'] ?></td>
                                                    <td><?php echo handleCurrency($each['totalPricePayment']) ?></td>
                                                    <td class="datatable-ct">
                                                        <div style="text-align: end;">
                                                            <button type="button" class="viewCustomerBtn btn btn-primary" value="<?php echo $each['customer_id'] ?>" title="xem"><i class="fa fa-eye"></i></button>
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
require_once ADMIN . 'customers/view_customer.php';

?>

<script src="ajaxCustomers.js"></script>