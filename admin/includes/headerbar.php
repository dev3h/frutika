 <?php
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    if (!function_exists('str_contains')) {
        function str_contains($haystack, $needle): bool
        {
            if (is_string($haystack) && is_string($needle)) {
                return '' === $needle || false !== strpos($haystack, $needle);
            } else {
                return false;
            }
        }
    }
    ?>
 <div class="container-fluid">
     <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <div class="logo-pro">
                 <a href="/admin/dashboard"><img class="main-logo" src="/admin/img/logo/logo.png" alt="bac-and-chill-logo" style="width: 50px; height: 50px;" /></a>
             </div>
         </div>
     </div>
 </div>
 <div class="header-advance-area">
     <div class="header-top-area">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="header-top-wraper">
                         <div class="row">
                             <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                 <div class="menu-switcher-pro">
                                     <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                         <i class="educate-icon educate-nav"></i>
                                     </button>
                                 </div>
                             </div>
                             <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                             </div>
                             <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                 <div class="header-right-info">
                                     <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                         <li class="nav-item">
                                             <?php
                                                require_once '../classes/db.php';

                                                $query = "SELECT photo, displayname FROM admin WHERE username='$_SESSION[username]'";
                                                $query_run = Database::getInstance()->query($query);
                                                if ($query_run->num_rows == 1) {
                                                    $each = $query_run->fetch_assoc();
                                                }
                                                ?>
                                             <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                 <img src="/admin/accounts/uploads/<?php echo $each['photo'] ?>" alt="" />
                                                 <span class="admin-name"><?php echo $each['displayname'] ?></span>
                                                 <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                             </a>
                                             <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated fadeIn">
                                                 <li><a href="/admin/profile"><span class="edu-icon edu-home-admin author-log-ic"></span>Tài khoản</a>
                                                 </li>
                                                 <li><a href="/admin/logout.php"><span class="edu-icon edu-locked author-log-ic"></span>Đăng xuất</a>
                                                 </li>
                                             </ul>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Mobile Menu start -->
     <?php require_once 'mobile_menu_bar.php' ?>
     <!-- Mobile Menu end -->
     <?php
        if (!str_contains($CurPageURL, '/admin/dashboard')) {
        ?>
         <div class="breadcome-area">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <div class="breadcome-list">
                             <div class="row">
                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                     <?php if (!str_contains($CurPageURL, '/admin/profile')) { ?>
                                         <div class="breadcome-heading">
                                             <form role="search" class="sr-input-func">
                                                 <input type="text" placeholder="Tìm kiếm..." class="search-int form-control">
                                                 <a href="#"><i class="fa fa-search"></i></a>
                                             </form>
                                         </div>
                                     <?php } ?>
                                 </div>

                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                     <ul class="breadcome-menu">
                                         <li><a href="/admin/dashboard">Trang chủ</a> <span class="bread-slash">/</span>
                                         </li>
                                         <li><span class="bread-blod"><?php echo $current; ?></span>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     <?php } ?>
 </div>