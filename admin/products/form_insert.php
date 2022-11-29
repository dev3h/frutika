<div class="modal fade" id="modalProductInsert" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm sản phẩm</h4>
            </div>
            <form method="post" id="formInsert" enctype="multipart/form-data">
                <div class="alert alert-warning hidden" id="errorMessage"></div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Tên</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Giá</label>
                        <input type="text" name="price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Mô tả ngắn</label>
                        <textarea name="short_description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Mô tả dài</label>
                        <textarea class="summernote" name="long_description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Danh mục</label>
                        <select class="form-control custom-select-value" type="text" name="category_id">
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

<script src="ajaxProducts.js"></script>