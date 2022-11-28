<div class="modal fade" id="modalAccountUpdate" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cập nhập tài khoản</h4>
            </div>
            <form method="post" id="formUpdate" enctype="multipart/form-data">
                <div class="alert alert-warning hidden" id="errorMessageUpdate"></div>
                <div class="modal-body">
                    <input name="id" type="hidden" id="account_id">
                    <div class="mb-3">
                        <label for="">Tên hiển thị</label>
                        <input type="text" name="displayname" class="form-control" id="account_displayname">
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" id="account_email">
                    </div>
                    <div class="mb-3">
                        <label for="">Giới tính</label>
                        <?php
                        for ($i = 0; $i < 3; $i++) {
                        ?>
                            <div>
                                <input type="radio" name="gender" value="<?php echo $i ?>" class="gender_id">
                                <label for="">
                                    <?php echo handleGender($i) ?>
                                </label>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-3">
                        <label for="">Quyền</label>
                        <select class="form-control custom-select-value" type="text" name="role_id" id="role_id">
                            <?php
                            $query = "SELECT * FROM role_types";
                            $result = Database::$instance->query($query);
                            foreach ($result as $each) { ?>
                                <option value="<?php echo $each['id'] ?>"><?php echo $each['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Trạng thái</label>
                        <select class="form-control custom-select-value" type="text" name="status_id" id="status_id">
                            <?php
                            for ($i = 0; $i < 2; $i++) { ?>
                                <option value="<?php echo $i ?>"><?php echo handleStatus($i) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Ảnh</label>
                        <div style="display: flex; align-items: center">
                            <div>
                                <label for="">Đổi ảnh mới</label>
                                <input type="hidden" name="size" value="1000000">
                                <input type="file" name="photo_new">
                            </div>
                            <div>
                                <label for="">Hoặc giữ ảnh cũ</label>
                                <img src="" id="photo_old" alt="" style="height: 100px!important;">
                                <input type="hidden" name="size" value="1000000">
                                <input type="hidden" name="photo_old" id="account_photo_old">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button class="btn btn-primary" id="update">Cập nhập</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="ajaxAccounts.js"></script>