<?php
require_once '../../classes/db.php';

// if (isset($_COOKIE['remember'])) {
//     $token = $_COOKIE['remember'];
//     $sql = "SELECT * FROM customers WHERE token = '$token' limit 1";
//     $result = Database::getInstance()->query($sql);

//     if ($result->num_rows == 1) {
//         $each = $result->fetch_assoc();
//         $_SESSION['id'] = $each['id'];
//         $_SESSION['name'] = $each['name'];
//     }
// }
if (isset($_SESSION['token'])) {
    $token = $_SESSION['token'];
    $sql = "SELECT * FROM customers WHERE token = '$token' limit 1";
    $result = Database::getInstance()->query($sql);

    if ($result->num_rows == 1) {
        $each = $result->fetch_assoc();
        $_SESSION['id'] = $each['id'];
        $_SESSION['name'] = $each['name'];
    }
}

if (isset($_SESSION['id'])) {
    header('location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng ký đăng nhập</title>
    <link rel="stylesheet" href="../../assets/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/login-register.css" />
    <link rel="stylesheet" href="../../assets/css/toastr.min.css" />
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="post" class="sign-in-form" id="sign-in-form">
                    <h2 class="title">Đăng nhập</h2>
                    <div class="field-group">
                        <input type="text" placeholder="Email" name="email" class="input-field" />
                    </div>
                    <!-- <i class="fas fa-lock"></i> -->
                    <div class="field-group">
                        <input type="password" placeholder="Mật khẩu" name="password" class="input-field" />
                        <div class="toggle-password">
                            <i class="far fa-eye eye-open eye"></i>
                            <i class="far fa-eye-slash eye-close eye"></i>
                        </div>
                    </div>
                    <a href="/forgot_password.php">Quên mật khẩu </a>
                    <div class="remember-group">
                        <label for="remember"><input type="checkbox" name="remember" id="remember"><span>Ghi nhớ đăng nhập</span></label>
                    </div>
                    <button type="submit" class="btn solid">Đăng nhập</button>
                    <p class="social-text">Hoặc đăng nhập với</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
                <form class="sign-up-form" id="sign-up-form">
                    <h2 class="title">Đăng ký</h2>
                    <div class="field-group">
                        <input type="text" placeholder="Tên" class="input-field" name="name" />
                    </div>
                    <div class="field-group">
                        <input type="email" placeholder="Email" class="input-field" name="email" />
                    </div>
                    <div class="field-group">
                        <input type="password" placeholder="Mật khẩu" class="input-field" name="password" />
                        <div class="toggle-password">
                            <i class="far fa-eye eye-open eye"></i>
                            <i class="far fa-eye-slash eye-close eye"></i>
                        </div>
                    </div>
                    <div class="field-group">
                        <input type="text" placeholder="Số điện thoại" class="input-field" name="phone_number" />
                    </div>
                    <div class="field-group">
                        <input type="text" placeholder="Địa chỉ" class="input-field" name="address" />
                    </div>
                    <button type="submit" class="btn">Đăng ký</button>
                    <p class="social-text">Hoặc đăng ký với</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Có gì mới ?</h3>
                    <p>
                        Frutikha đem đến cho khách hàng trải nghiệm các loại trái cây tươi ngon
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Đăng ký
                    </button>
                </div>
                <img src="/assets/img/login-register/login-register-1.png" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Bạn đã có tài khoản</h3>
                    <p>
                        Đăng nhập để mua những mặt hàng trái cây tươi ngon
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Đăng nhập
                    </button>
                </div>
                <img src="/assets/img/login-register/login-register-2.png" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="../../assets/js/jquery-1.11.3.min.js"></script>
    <script src="../../assets/js/jquery.validate.min.js"></script>
    <script src="../../assets/js/toastr.min.js"></script>
    <script src="../../assets/js/sweetalert2@11.js"></script>
    <script src="../../assets/js/login-register.js"></script>
    <script src="../../assets/js/handlePasswordVisible.js"></script>
    <script src="../../assets/js/ajax/ajax-login-register.js"></script>
</body>

</html>
