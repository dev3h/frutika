<?php
session_start();
require_once '../classes/db.php';

$max_date = $_GET['days'];
$sql = "SELECT DATE_FORMAT(create_at,'%e-%m') as 'ngay', SUM(totalPrice) as 'doanh thu' 
    FROM orders 
    WHERE DATE(create_at) >= CURDATE() - INTERVAL $max_date DAY
    GROUP BY DATE_FORMAT(create_at,'%e-%m')";

$result = Database::getInstance()->query($sql);

// lấy doanh thu của max_date ngày tình từ ngày hiện tại trở về
$arr = [];

$today = date('d');
if ($today < $max_date) {
    $get_day_last_month =  $max_date - $today;

    $last_month = date('m', strtotime('-1 month'));
    $last_month_date = date('Y-m-d', strtotime('-1 month'));
    $max_day_last_month = (new DateTime($last_month_date))->format('t');
    $start_day_last_month = $max_day_last_month - $get_day_last_month;

    for ($i = $start_day_last_month; $i <= $start_day_last_month; $i++) {
        $key = $i . '-' . $last_month;
        $arr[$key] = 0;
    }
    $start_day_this_month = 1;
} else {
    $start_day_this_month =  $today - $max_date;
}
$this_month = date('m');

for ($i = $start_day_this_month; $i <= $today; $i++) {
    $key = $i . '-' . $this_month;
    $arr[$key] = 0;
}
foreach ($result as $each) {
    $arr[$each['ngay']] = (float)$each['doanh thu'];
}
echo json_encode($arr);
