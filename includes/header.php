<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title><?php echo $title; ?></title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="/assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="/assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="/assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="/assets/css/meanmenu.min.css">
    <!-- responsive -->
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <!-- toastr -->
    <link rel="stylesheet" href="/assets/css/toastr.min.css">
    <!-- jquery ui -->
    <link rel="stylesheet" href="/assets/css/jquery-ui.min.css">
    <!-- summernote -->
    <!-- main style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/rating.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/summernote/summernote.css">
</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="/">
                                <img src="assets/img/logo.png" alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li class="current-list-item">
                                    <a href="/">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="/shop.php">Cửa hàng</a>
                                </li>
                                <li>
                                    <a href="/news.php">Bài viết</a>
                                </li>
                                <li>
                                    <a href="/contact.php">Liên hệ</a>
                                </li>
                                <li><a href="/about.php">Giới thiệu</a></li>
                                <li>
                                    <div class="header-icons">
                                        <div class="cart-nums">
                                            <a class="shopping-cart" <?php
                                                                        if (isset($_SESSION['id'])) {
                                                                            echo 'href="/cart.php"';
                                                                        } else {
                                                                            echo 'href="/login-register"';
                                                                        }
                                                                        ?>><i class="fas fa-shopping-cart"></i>
                                            </a>
                                            <?php
                                            if (isset($_SESSION['id'])) { ?>
                                                <span id="cart-quantity">
                                                    <?php
                                                    if (isset($_SESSION['cart'])) {
                                                        echo sizeof($_SESSION['cart']);
                                                    } else {
                                                        echo 0;
                                                    }
                                                    ?>
                                                </span>
                                            <?php } ?>
                                        </div>
                                        <div class="mobile-hide search-bar-icon">
                                            <i class="fas fa-search icon-search"></i>
                                            <div class="ui-widget search-bar-container">
                                                <!-- <img id="project-icon" height="200" src="images/transparent_1x1.png" class="ui-state-default" alt /> -->
                                                <input id="project" />
                                                <input type="hidden" id="project-id" />
                                                <p id="project-description"></p>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($_SESSION['id'])) { ?>
                                            <div class="user-menu">
                                                <span class="user-menu--name"><?php echo $_SESSION['name'] ?></span>
                                                <ul class="user-menu__item">
                                                    <li><a href="/profile.php">Tài khoản</a></li>
                                                    <li><a href="/myOrder.php">Đơn hàng</a></li>
                                                    <li><a href="/logout.php">Đăng xuất</a></li>
                                                </ul>
                                            </div>
                                        <?php } else { ?>
                                            <a class="account-icon" href="/login-register"><i class="fas fa-user"></i></a>
                                        <?php } ?>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <!-- <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Hôm nay bạn muốn ăn trái cây gì?</h3>
                            <input type="text" placeholder="nhập tên trái cây">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end search area -->