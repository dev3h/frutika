<?php
require_once '../path.php';
$title = 'Quản lý tài khoản khách hàng';
$current = 'Quản lý tài khoản';
require_once ADMIN . 'includes/sidebar.php';
require_once ADMIN. 'functions/handleGender.php';
require_once ADMIN . 'functions/handleStatus.php';
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
                                <h1>Quản lý tài khoản</h1>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end"><button class="btn btn-primary" data-toggle="modal" data-target="#modalAccountInsert"><i class="fa fa-plus"></i> Thêm</div>
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
                                            <th data-field="id">ID</th>
                                            <th data-field="photo">Ảnh</th>
                                            <th data-field="username">Tên đăng nhập</th>
                                            <th data-field="displayname">Tên hiển thị</th>
                                            <th data-field="gender">Giới tính</th>
                                            <th data-field="email">Email</th>
                                            <th data-field="role">Quyền</th>
                                            <th data-field="status">Trạng thái</th>
                                            <th data-field="action">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once '../classes/db.php';
                                        $query = "SELECT admin.*, role_types.name AS role_name FROM admin 
                                        JOIN role_types ON admin.role = role_types.id
                                        ";
                                        $query_run = Database::getInstance()->query($query);
                                        if ($query_run->num_rows > 0) {
                                            foreach ($query_run as $each) { ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $each['id'] ?></td>
                                                    <td>
                                                        <img src="/admin/assets/uploads/accounts/<?php echo $each['photo'] ?>" alt="bac-and-chill-admin-<?php echo $each['displayname'] ?>" width="50" height="50" />
                                                    </td>
                                                    <td><?php echo $each['username'] ?></td>
                                                    <td><?php echo $each['displayname'] ?></td>
                                                    <td><?php echo handleGender($each['gender']) ?></td>
                                                    <td><?php echo $each['email'] ?></td>
                                                    <td><?php echo $each['role_name'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($each['status'] == 1) {
                                                            echo '<span class="badge" style="background-color: #337ab7">Kích hoạt</span>';
                                                        } else {
                                                            echo '<span class="badge" style="background-color: #EB1D36">Chưa kích hoạt</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="datatable-ct">
                                                        <div style="text-align: end;">
                                                            <button type="button" class="viewAccountBtn btn btn-primary" value="<?php echo $each['id'] ?>" title="xem"><i class="fa fa-eye"></i></button>
                                                            <button type="button" class="updateAccountBtn btn btn-primary" value="<?php echo $each['id'] ?>" title="sửa"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="deleteAccountBtn btn btn-primary" value="<?php echo $each['id'] ?>" title="xóa"><i class="fa fa-trash-o"></i></button>
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
require_once ADMIN . 'accounts/form_insert.php';
require_once ADMIN . 'accounts/form_update.php';
require_once ADMIN . 'accounts/view_account.php';

?>

<script src="ajaxAccounts.js"></script>