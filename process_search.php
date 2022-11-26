<?php 

$search = $_GET['term'];

require './classes/db.php';

$sql = "SELECT * FROM products WHERE name LIKE '%$search%'";

$result = Database::getInstance()->query($sql);

$arr = [];
foreach ($result as $each) {
    $arr[] = [
        'label' => $each['name'],
        'value' => $each['id'],
        'photo' => $each['photo'],
        'id' => $each['id']
    ];
}
echo json_encode($arr);
?>
