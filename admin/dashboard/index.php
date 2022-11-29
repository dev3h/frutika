<?php
$title = 'Trang chủ';

require_once 'getData.php';
require_once '../path.php'
?>
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <?php require_once '../includes/headerbar.php' ?>
    <div class="analytics-sparkle-area" style="margin-top: 40px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5>Số danh mục của quán</h5>
                            <h2><span class="counter"><?php echo $categories['sumOfCategory'] ?></span></h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5>Số sản phẩm của quán</h5>
                            <h2><span class="counter"><?php echo $products['sumOfProduct'] ?></span></h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Số khách hàng có tài khoản</h5>
                            <h2><span class="counter"><?php echo $customersJoined['sumOfCustomerJoined'] ?></span></h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Số bài viết</h5>
                            <h2><span class="counter"><?php echo $posts['sumOfPost'] ?></span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-sales-area mg-tb-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">

                        <?php require_once 'chart.php' ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">

                        <?php require_once 'chartColumn.php' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="traffic-analysis-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="social-media-edu">
                        <i class="fa fa-facebook"></i>
                        <div class="social-edu-ctn">
                            <h3>50k Likes</h3>
                            <p>You main list growing</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="social-media-edu twitter-cl res-mg-t-30 table-mg-t-pro-n">
                        <i class="fa fa-twitter"></i>
                        <div class="social-edu-ctn">
                            <h3>30k followers</h3>
                            <p>You main list growing</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="social-media-edu linkedin-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <i class="fa fa-linkedin"></i>
                        <div class="social-edu-ctn">
                            <h3>7k Connections</h3>
                            <p>You main list growing</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="social-media-edu youtube-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <i class="fa fa-youtube"></i>
                        <div class="social-edu-ctn">
                            <h3>50k Subscribers</h3>
                            <p>You main list growing</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>

<?php require_once '../includes/footer.php' ?>