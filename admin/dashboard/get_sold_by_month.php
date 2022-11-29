<?php

require '../classes/db.php';

$month = $_GET['month'];
$sql = "SELECT products.id as 'ma_san_pham',
products.name as 'ten_san_pham', DATE_FORMAT(create_at,'%e-%m') as 'ngay', SUM(quantity) as 'so_san_pham_ban_duoc' 
    FROM orders 
    JOIN order_product ON orders.id = order_product.order_id
    JOIN products ON products.id = order_product.product_id
    WHERE DATE_FORMAT(create_at,'%Y-%m') = '$month'
    GROUP BY products.id, DATE_FORMAT(create_at,'%e-%m')";

$result = Database::getInstance()->query($sql);

$arr = [];

$today = date('d');
if ($today < $max_date) {
    $get_day_last_month =  $max_date - $today;

    $last_month = date('m', strtotime('-1 month'));
    $last_month_date = date('Y-m-d', strtotime('-1 month'));
    $max_day_last_month = (new DateTime($last_month_date))->format('t');
    $start_day_last_month = $max_day_last_month - $get_day_last_month;

    // for($i = $start_day_last_month; $i <= $max_day_last_month; $i++) {
    //     $key = $i . '-' . $last_month;
    //     $arr[$key] = 0;
    // }
    $start_day_this_month = 1;
} else {
    $start_day_this_month =  $today - $max_date;
}

foreach ($result as $each) {
    $ma_san_pham = $each['ma_san_pham'];
    if(empty($arr[$ma_san_pham])) {

        $arr[$ma_san_pham] = [
            'name' => $each['ten_san_pham'],
            'y' => (int)$each['so_san_pham_ban_duoc'],
            'drilldown' => (int)$each['ma_san_pham']
        ];
    } else {
        $arr[$ma_san_pham]['y'] += (int)$each['so_san_pham_ban_duoc'];
    }
}
$arr2 = [];
foreach ($arr as $ma_san_pham => $each) {
    $arr2[$ma_san_pham] = [
        'name' => $each['name'],
        'id' => $ma_san_pham,
    ];
    $arr2[$ma_san_pham]['data'] = [];
    if($today < $max_date) {
        for($i = $start_day_last_month; $i <= $start_day_last_month; $i++) {
            $key = $i . '-' . $last_month;
            $arr2[$ma_san_pham]['data'][$key] = [
                $key,
                0
            ];
        }
    }
}
foreach ($result as $each) {
   $ma_san_pham = $each['ma_san_pham'];
   $key = $each['ngay'];
   $arr2[$ma_san_pham]['data'][$key] = [
    $key,
    (int)$each['so_san_pham_ban_duoc']
   ];
}
$object = json_encode([$arr, $arr2]);
// echo json_encode($arr);
echo $object;
