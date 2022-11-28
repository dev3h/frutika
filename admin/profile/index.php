<?php
require_once '../path.php';
$title = 'Thông tin';
$current = "Thông tin";
require_once ADMIN . 'includes/sidebar.php';
require_once ADMIN . 'functions/handleGender.php';
require_once ADMIN . 'functions/handleStatus.php';
?>
<div class="all-content-wrapper">
    <?php require_once ADMIN . 'includes/headerbar.php' ?>
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="profile-info-inner">

                        <form id="profileForm" method="post">
                            <?php require_once 'getProfile.php' ?>
                            <div class="profile-img">
                                <div style="display: flex; align-items: flex-end; justify-content: center">
                                    <div style="width: 100px; height: 100px;">
                                        <img src="/admin/assets/uploads/accounts/<?php echo $each['photo'] ?>" alt="" id="current-profile-img" />
                                        <input type="hidden" name="size" value="1000000">
                                        <input type="hidden" name="photo_old" value="<?php echo $each['photo'] ?>">
                                    </div>
                                    <div>
                                        <input type="hidden" name="size" value="1000000">
                                        <label class="btn-file" style="cursor: pointer;"> <input type="file" name="photo_new" style="display: none;" onchange="loadFile(event)"> <i class="fa fa-pencil"></i></label>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <input name="username" type="hidden" class="form-control" value="<?php echo $each['username'] ?>" />
                                <div class="form-group-inner">
                                    <label>Tên hiển thị </label>
                                    <input type="text" name="displayname" class="form-control" value="<?php echo $each['displayname'] ?>" placeholder="nhập tên hiển thị" />
                                </div>
                                <div class="form-group-inner">
                                    <label>Giới tính </label>
                                    <?php
                                    for ($i = 0; $i < 3; $i++) {
                                    ?>
                                        <div>
                                            <input type="radio" name="gender" value="<?php echo $i ?>" <?php if($each['gender'] == $i){  ?> checked <?php }?> class="gender_id">
                                            <label for="">
                                                <?php echo handleGender($i) ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group-inner">
                                    <label>Email</label>
                                    <input type="email" name="email" value="<?php echo $each['email'] ?>" class="form-control" placeholder="nhập Email" />
                                </div>
                                <div class="form-group-inner">
                                    <label>Quyền</label>
                                    <input type="text" value="<?php echo $each['role_name']  ?>" disabled class="form-control" />
                                </div>
                                <div class="form-group-inner">
                                    <label>Trạng thái</label>
                                    <input type="text" value="<?php echo handleStatus($each['status']) ?>" disabled class="form-control" />
                                </div>
                                <div class="form-group-inner">
                                    <label>Mật khẩu</label>
                                    <input type="password" name="password" class="form-control" placeholder="nhập mật khẩu" />
                                </div>
                                <div class="form-group-inner">
                                    <label>Mật khẩu mới</label>
                                    <input type="password" id="newPassword" name="newPassword" class="form-control" placeholder="nhập mật khẩu mới" />
                                </div>
                                <div class="form-group-inner">
                                    <label>Nhập lại mật khẩu mới</label>
                                    <input type="password" name="reNewPassword" class="form-control" placeholder="nhập lại mật khẩu mới" />
                                </div>
                                <input type="submit" value="Cập nhập" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once ADMIN . 'includes/footer.php';

?>
<script>
    var loadFile = function(event) {
        var currentProfileImage = document.getElementById('current-profile-img');
        currentProfileImage.src = URL.createObjectURL(event.target.files[0]);
        currentProfileImage.onload = function() {
            URL.revokeObjectURL(currentProfileImage.src)
        }
    };
</script>
<script src="ajaxProfile.js"></script>