<div class="modal fade" id="modalNewsInsert" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm tin tức</h4>
            </div>
            <form method="post" id="formInsert" enctype="multipart/form-data">
                <div class="alert alert-warning hidden" id="errorMessage"></div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Tiêu đề</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Nội dung</label>
                        <textarea class="summernote" name="content" class="form-control"></textarea>
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

<script src="ajaxNews.js"></script>