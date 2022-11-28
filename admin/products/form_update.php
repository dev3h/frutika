<div class="modal fade" id="modalProductUpdate" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cập nhập danh mục</h4>
            </div>
            <form method="post" id="formUpdate" enctype="multipart/form-data">
                <div class="alert alert-warning hidden" id="errorMessageUpdate"></div>
                <div class="modal-body">
                    <input name="id" type="hidden" id="product_id">
                    <div class="mb-3">
                        <label for="">Tên</label>
                        <input type="text" name="name" id="product_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Giá</label>
                        <input type="text" name="price" id="product_price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Mô tả</label>
                        <textarea class="summernote product-description" name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Danh mục</label>
                        <select class="form-control custom-select-value" type="text" name="category_id" id="category_id">
                            <?php
                            $query = $sql = "SELECT * FROM categories";
                            $result = Database::$instance->query($query);
                            foreach ($result as $each) { ?>
                                <option value="<?php echo $each['id'] ?>"><?php echo $each['name'] ?></option>
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
                                <img src="" id="photo_old" alt="" width="100" height="100">
                                <input type="hidden" name="size" value="1000000">
                                <input type="hidden" name="photo_old" id="product_photo_old">
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

<script src="ajaxProducts.js"></script>