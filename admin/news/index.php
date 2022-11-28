<?php
require_once '../path.php';
$title = 'Quản lý bài viết';
$current = 'Quản lý bài viết';
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
                                <h1>Quản lý tin tức</h1>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end"><button class="btn btn-primary" data-toggle="modal" data-target="#modalNewsInsert"><i class="fa fa-plus"></i> Thêm</div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <select class="form-control dt-tb">
                                        <option value="">Xuất cơ bản</option>
                                        <option value="all">Xuất tất cả</option>
                                        <option value="selected">Xuất lựa chọn</option>
                                    </select>
                                </div>
                                <table class="tableNews table table-striped" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="id">ID</th>
                                            <th data-field="photo">Ảnh</th>
                                            <th data-field="title">Tiêu đề</th>
                                            <th data-field="action">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once '../classes/db.php';
                                        $query = "SELECT * FROM posts";
                                        $query_run = Database::getInstance()->query($query);
                                        if ($query_run->num_rows > 0) {
                                            foreach ($query_run as $each) { ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $each['id'] ?></td>
                                                    <td>
                                                        <img src="/admin/assets/uploads/news/<?php echo $each['photo'] ?>" alt="bac-and-chill-<?php echo $each['title'] ?>" width="100" height="100" />
                                                    </td>
                                                    <td><?php echo $each['title'] ?></td>
                                                    <td class="datatable-ct">
                                                        <div style="text-align: end;">
                                                            <button type="button" class="viewNewsBtn btn btn-primary" value="<?php echo $each['id'] ?>" title="xem"><i class="fa fa-eye"></i></button>
                                                            <button type="button" class="updateNewsBtn btn btn-primary" value="<?php echo $each['id'] ?>" title="sửa"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="deleteNewsBtn btn btn-primary" value="<?php echo $each['id'] ?>" title="xóa"><i class="fa fa-trash-o"></i></button>
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
require_once ADMIN . 'news/form_insert.php';
require_once ADMIN . 'news/form_update.php';
require_once ADMIN . 'news/view_news.php';

?>

<script src="ajaxNews.js"></script>