<div class="modal fade" id="modalCategoryUpdate" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cập nhập danh mục</h4>
            </div>
            <form method="post" id="formUpdate">
                <div class="alert alert-warning hidden" id="errorMessageUpdate"></div>
                <div class="modal-body">
                    <input name="id" type="hidden" id="category_id">
                    <div class="mb-3">
                        <label for="">Tên</label>
                        <input type="text" name="name" id="category_name" class="form-control">
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

<script src="ajaxCategories.js"></script>