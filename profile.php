<?php
$title = 'Tài khoản';
require_once 'includes/header.php';
require_once 'functions/handleCurrency.php';
?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1>Tài khoản</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="profile-info-inner">

                    <form id="profileForm" method="post">
                        <?php
                        require_once './classes/db.php';
                        $query = "SELECT * FROM customers WHERE id='" . $_SESSION["id"] . "'";
                        $query_run = Database::getInstance()->query($query);
                        if ($query_run->num_rows == 1) {
                            $each = $query_run->fetch_assoc();
                        }
                        ?>
                        <div class="profile-img">
                            <div style="display: flex; align-items: flex-end; justify-content: center">
                                <div class="image-container">
                                    <img src="/admin/assets/uploads/customers/<?php echo $each['photo'] ?>" alt="" id="current-profile-img" />
                                    <input type="hidden" name="size" value="1000000">
                                    <input type="hidden" name="photo_old" value="<?php echo $each['photo'] ?>">
                                </div>
                                <div>
                                    <input type="hidden" name="size" value="1000000">
                                    <label class="btn-file" style="cursor: pointer;"> <input type="file" name="photo_new" style="display: none;" onchange="loadFile(event)"> <i class="fa fa-pencil-alt"></i></label>
                                </div>
                            </div>

                        </div>
                        <div>
                            <input name="id" type="hidden" class="form-control" value="<?php echo $each['id'] ?>" />
                            <div class="form-group-inner">
                                <label>Tên hiển thị </label>
                                <input type="text" name="name" class="form-control" value="<?php echo $each['name'] ?>" placeholder="nhập tên hiển thị" />
                            </div>
                            <div class="form-group-inner">
                                <label>Email</label>
                                <input type="email" name="email" value="<?php echo $each['email'] ?>" class="form-control" placeholder="nhập Email" />
                            </div>
                            <div class="form-group-inner">
                                <label>Số điện thoại</label>
                                <input type="text" name="phone_number" value="<?php echo $each['phone_number'] ?>" class="form-control" placeholder="nhập Email" />
                            </div>
                            <div class="form-group-inner">
                                <label>Địa chỉ</label>
                                <input type="text" name="address" value="<?php echo $each['address'] ?>" class="form-control" placeholder="nhập Email" />
                            </div>
                            <div class="form-group-inner">
                                <label>Mật khẩu</label>
                                <div class="field-group">
                                    <input type="password" name="password" class="form-control" placeholder="nhập mật khẩu" />
                                    <div class="toggle-password">
                                        <i class="far fa-eye eye-open eye"></i>
                                        <i class="far fa-eye-slash eye-close eye"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-inner">
                                <label>Mật khẩu mới</label>
                                <div class="field-group">
                                    <input type="password" id="newPassword" name="newPassword" class="form-control" placeholder="nhập mật khẩu mới" />
                                    <div class="toggle-password">
                                        <i class="far fa-eye eye-open eye"></i>
                                        <i class="far fa-eye-slash eye-close eye"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-inner">
                                <label>Nhập lại mật khẩu mới</label>
                                <div class="field-group">
                                    <input type="password" name="reNewPassword" class="form-control" placeholder="nhập lại mật khẩu mới" />
                                    <div class="toggle-password">
                                        <i class="far fa-eye eye-open eye"></i>
                                        <i class="far fa-eye-slash eye-close eye"></i>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Cập nhập" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
<script>
    var loadFile = function(event) {
        var currentProfileImage = document.getElementById('current-profile-img');
        currentProfileImage.src = URL.createObjectURL(event.target.files[0]);
        currentProfileImage.onload = function() {
            URL.revokeObjectURL(currentProfileImage.src)
        }
    };
</script>
<script src="/assets/js/handlePasswordVisible.js"></script>
<script src="/assets/js/ajax/ajaxProfile.js"></script>