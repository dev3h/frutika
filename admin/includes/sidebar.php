<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $title; ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
		============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="/admin/img/favicon.png">
  <!-- Google Fonts
		============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="/admin/css/bootstrap.min.css">
  <!-- font awesome
		============================================ -->
  <link rel="stylesheet" href="/admin/css/font-awesome.min.css">
  <!-- owl.carousel CSS
		============================================ -->
  <link rel="stylesheet" href="/admin/css/owl.carousel.css">
  <link rel="stylesheet" href="/admin/css/owl.theme.css">
  <link rel="stylesheet" href="/admin/css/owl.transitions.css">
  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="/admin/css/animate.css">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="/admin/css/normalize.css">
  <!-- meanmenu icon CSS
		============================================ -->
  <link rel="stylesheet" href="/admin/css/meanmenu.min.css">
  <!-- main CSS
		============================================ -->
  <link rel="stylesheet" href="/admin/css/main.css">
  <!-- educate icon CSS
		============================================ -->
  <link rel="stylesheet" href="/admin/css/educate-custon-icon.css">
  <!-- morrisjs CSS
		============================================ -->
  <link rel="stylesheet" href="/admin/css/morrisjs/morris.css">
  <!-- mCustomScrollbar CSS
		============================================ -->
  <link rel="stylesheet" href="/admin/css/scrollbar/jquery.mCustomScrollbar.min.css">
  <!-- metisMenu CSS
		============================================ -->
  <link rel="stylesheet" href="/admin/css/metisMenu/metisMenu.min.css">
  <link rel="stylesheet" href="/admin/css/metisMenu/metisMenu-vertical.css">
  <!-- calendar CSS
		============================================ -->
  <link rel="stylesheet" href="/admin/css/calendar/fullcalendar.min.css">
  <link rel="stylesheet" href="/admin/css/calendar/fullcalendar.print.min.css">
  <!-- x-editor CSS
		============================================ -->
  <link rel="stylesheet" href="/admin/css/editor/select2.css">
  <link rel="stylesheet" href="/admin/css/editor/datetimepicker.css">
  <link rel="stylesheet" href="/admin/css/editor/bootstrap-editable.css">
  <link rel="stylesheet" href="/admin/css/editor/x-editor-style.css">
  <!-- summernote CSS
		============================================ -->
  <link rel="stylesheet" href="/admin/css/summernote/summernote.css">

  <link rel="stylesheet" href="/admin/css/data-table/bootstrap-table.css">
  <link rel="stylesheet" href="/admin/css/data-table/bootstrap-editable.css">
  <!-- modals CSS
		============================================ -->
  <link rel="stylesheet" href="/admin/css/modals.css">
  <!-- forms CSS
		============================================ -->
  <link rel="stylesheet" href="/admin/css/form/all-type-forms.css">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="/admin/style.css">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="/admin/css/responsive.css">
  <!-- modernizr JS
		============================================ -->
  <script src="/admin/js/vendor/modernizr-2.8.3.min.js"></script>
  <link rel="stylesheet" href="/admin/css/toastr.min.css">
  <link rel="stylesheet" href="/admin/css/chart.css">
  <link rel="stylesheet" href="/admin/css/chartColumn.css">
</head>

<body>
  <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
  <!-- Start Left menu area -->
  <div class="left-sidebar-pro">
    <nav id="sidebar">
      <div class="sidebar-header">
        <a href="/admin/dashboard"><img class="main-logo" src="/admin/img/logo/logo.png" alt="bac-and-chill-logo" style="width: 160px;" /></a>
        <strong><a href="/admin/dashboard"><img src="/admin/img/logo/logo.png" alt="bac-and-chill-logo" style="width: 330px" /></a></strong>
      </div>
      <div class="left-custom-menu-adp-wrap comment-scrollbar" style="margin-top: 20px;">
        <nav class="sidebar-nav left-sidebar-menu-pro">
          <ul class="metismenu" id="menu1">
            <li class="active">
              <a aria-expanded="false" href="/admin/dashboard">
                <span class="fa fa-pie-chart icon-wrap"></span>
                <span class="mini-click-non">Trang chủ</span>
              </a>
            </li>
            <li>
              <a href="/admin/categories" aria-expanded="false">
                <span class="fa fa-sitemap icon-wrap"></span>
                <span class="mini-click-non">Quản lý danh mục</span>
              </a>
            </li>
            <li>
              <a href="/admin/products" aria-expanded="false">
                <span class="fa fa-glass icon-wrap"></span>
                <span class="mini-click-non">Quản lý sản phẩm</span>
              </a>
            </li>
            <li>
              <a href="/admin/news" aria-expanded="false">
                <span class="fa fa-newspaper-o icon-wrap"></span>
                <span class="mini-click-non">Quản lý bài viết</span>
              </a>
            </li>
            <?php
            if ($_SESSION['role'] == '1') { ?>
              <li>
                <a href="/admin/accounts" aria-expanded="false">
                  <span class="fa fa-group icon-wrap"></span>
                  <span class="mini-click-non">Quản lý tài khoản</span>
                </a>
              </li>
            <?php } ?>
            <li>
              <a href="/admin/orders" aria-expanded="false">
                <span class="fa fa-shopping-cart icon-wrap"></span>
                <span class="mini-click-non">Quản lý đơn hàng</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </nav>
  </div>
  <!-- End Left menu area -->