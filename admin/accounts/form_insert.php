<div class="modal fade" id="modalAccountInsert" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm tài khoản</h4>
            </div>
            <form method="post" id="formInsert" enctype="multipart/form-data">
                <div class="alert alert-warning hidden" id="errorMessage"></div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Tên đăng nhập</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Tên hiển thị</label>
                        <input type="text" name="displayname" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Giới tính</label>
                        <?php
                        for ($i = 0; $i < 3; $i++) { ?>
                            <div>
                                <input type="radio" name="gender" value="<?php echo $i ?>" <?php if ($i == '0') { ?> checked <?php } ?>>
                                <label for="">
                                    <?php echo handleGender($i) ?>
                                </label>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-3">
                        <label for="">Quyền</label>
                        <select class="form-control custom-select-value" type="text" name="role_id">
                            <?php
                            $query = $sql = "SELECT * FROM role_types";
                            $result = Database::$instance->query($query);
                            foreach ($result as $each) { ?>
                                <option value="<?php echo $each['id'] ?>"><?php echo $each['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Trạng thái</label>
                        <select class="form-control custom-select-value" type="text" name="status_id">
                            <?php
                            for ($i = 0; $i < 2; $i++) { ?>
                                <option value="<?php echo $i ?>"><?php echo handleStatus($i) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Ảnh</label>
                        <input type="hidden" name="size" value="1000000">
                        <input type="file" name="photo" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button class="btn btn-primary" type="submit" id="add">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="ajaxAccounts.js"></script>