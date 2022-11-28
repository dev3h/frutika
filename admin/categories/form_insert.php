<div class="modal fade" id="modalCategoryInsert" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm danh mục</h4>
            </div>
            <form method="post" id="formInsert">
                <div class="alert alert-warning hidden" id="errorMessage"></div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Tên</label>
                        <input type="text" name="name" class="form-control">
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

<script src="ajaxCategories.js"></script>