<div class="modal fade" id="modalNewsUpdate" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cập nhập danh mục</h4>
            </div>
            <form method="post" id="formUpdate" enctype="multipart/form-data">
                <div class="alert alert-warning hidden" id="errorMessageUpdate"></div>
                <div class="modal-body">
                    <input name="id" type="hidden" id="news_id">
                    <div class="mb-3">
                        <label for="">Tiêu đề</label>
                        <input type="text" name="title" id="news_title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Nội dung</label>
                        <textarea class="summernote news-content" name="content" class="form-control"></textarea>
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
                                <input type="hidden" name="photo_old" id="news_photo_old">
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

<script src="ajaxNews.js"></script>