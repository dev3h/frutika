<?php

require_once 'header.php';
?>
<main>
    <div class="box">
        <div class="inner-box">
            <div class="forms-wrap">
                <form method="POST" autocomplete="off" class="sign-in-form">
                    <div class="logo">
                        <img src="/admin/img/logo/logo.png" alt="easyclass" />
                    </div>

                    <div class="heading">
                        <h2>ĐĂNG NHẬP</h2>
                    </div>

                    <div class="actual-form">
                        <div class="input-wrap">
                            <input type="text" class="input-field" autocomplete="off" name="username" />
                            <label class="login-label">Tên đăng nhập</label>
                        </div>

                        <div class="input-wrap">
                            <div class="field-group">
                                <input type="password" class="input-field" autocomplete="off" name="password" />
                                <div class="toggle-password">
                                    <i class="fa fa-eye eye-open eye"></i>
                                    <i class="fa fa-eye-slash eye-close eye"></i>
                                </div>
                            </div>
                            <label class="login-label">Mật khẩu</label>
                        </div>

                        <input type="submit" value="Đăng nhập" class="sign-btn" />
                    </div>
                </form>

            </div>

            <div class="carousel">
                <div class="images-wrapper">
                    <img src="/admin/img/login/img1.jpg" class="image img-0 show" alt="" />
                    <img src="/admin/img/login/img2.jpg" class="image img-1" alt="" />
                    <img src="/admin/img/login/img3.jpg" class="image img-2" alt="" />
                </div>

                <div class="text-slider">
                    <div class="text-wrap">
                        <div class="text-group">
                            <h2>Trái cây tươi ngon</h2>
                            <h2>Giá cả hợp lý</h2>
                            <h2>Đặt chữ tín lên hàng đầu</h2>
                        </div>
                    </div>

                    <div class="bullets">
                        <span class="active" data-value="0"></span>
                        <span data-value="1"></span>
                        <span data-value="2"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
require_once 'footer.php';
?>