<?php
require_once '../classes/db.php';
require_once '../path.php';
$conn = Database::getConnection();

// DELETE
if (isset($_POST['delete_product'])) {
    $id = $conn->real_escape_string($_POST['id']);

    $query = "DELETE FROM products WHERE id=' $id'";
    $query_run = Database::getInstance()->query($query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Xóa sản phẩm thành công'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Xóa sản phẩm thất bại'
        ];
        echo json_encode($res);
        return false;
    }
}

// UPDATE
if (isset($_POST['update_product'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $price = $conn->real_escape_string($_POST['price']);
    $short_description = $conn->real_escape_string($_POST['short_description']);
    $long_description = $conn->real_escape_string($_POST['long_description']);
    $category_id = $conn->real_escape_string($_POST['category_id']);

    $extensions = array("jpeg", "jpg", "png");

    if ($_FILES['photo_new']['size'] > 0) {
        $photo = $_FILES['photo_new']['name'];
        $file_name = $_FILES['photo_new']['name'];

        $file_size = $_FILES['photo_new']['size'];
        $file_tmp = $_FILES['photo_new']['tmp_name'];
        $file_type = $_FILES['photo_new']['type'];
        $path = explode('.', $file_name)[1];
        $file_ext = strtolower($path);


        if (in_array($file_ext, $extensions) === false) {
            $res = [
                'status' => 415,
                'message' => 'Chỉ hỗ trợ upload file JPEG, PNG, JPG'
            ];
            echo json_encode($res);
            return false;
        }
        if ($file_size > 2097152) {
            $res = [
                'status' => 413,
                'message' => 'Kích thước file không được lớn hơn 2MB'
            ];
            echo json_encode($res);
            return false;
        }
        $target = ADMIN . "assets/uploads/products/" . basename($photo);
        move_uploaded_file($file_tmp, $target);
    } else {
        $file_name = $_POST['photo_old'];
    }

    if ($name == NULL || $price == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Vui lòng nhập đầy đủ thông tin'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "UPDATE products SET name='$name', photo = '$file_name', price='$price', short_description='$short_description',long_description='$long_description', category_id='$category_id' WHERE id='$id'";
    $query_run = Database::getInstance()->query($query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Cập nhập sản phẩm thành công'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Cập nhập sản phẩm thất bại'
        ];
        echo json_encode($res);
        return false;
    }
}

// GET product by id
if (isset($_GET['product_id'])) {
    $product_id = $conn->real_escape_string($_GET['product_id']);

    $query = "SELECT products.*, categories.name AS category_name FROM products 
    JOIN categories ON products.category_id = categories.id
     WHERE products.id = '$product_id'";
    $query_run = Database::getInstance()->query($query);

    if ($query_run->num_rows == 1) {
        $product = $query_run->fetch_assoc();
        $res = [
            'status' => 200,
            'message' => 'Lấy sản phẩm thành công',
            'data' => $product
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Không tìm thấy sản phẩm'
        ];
        echo json_encode($res);
        return false;
    }
}

// ADD 
if (isset($_POST['save_product'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $price = $conn->real_escape_string($_POST['price']);
    $short_description = $_POST['short_description'] ? $conn->real_escape_string($_POST['short_description']) : NULL;
    $long_description = $_POST['long_description'] ? $conn->real_escape_string($_POST['long_description']) : NULL;
    $category_id = $conn->real_escape_string($_POST['category_id']);

    $file_tmp = $_FILES['photo']['tmp_name'];
    if ($_FILES['photo']['name']) {
        $photo = $_FILES['photo']['name'];
        $file_name = $_FILES['photo']['name'];

        $file_size = $_FILES['photo']['size'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_type = $_FILES['photo']['type'];
        $path = explode('.', $file_name)[1];
        $file_ext = strtolower($path);

        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $res = [
                'status' => 415,
                'message' => 'Chỉ hỗ trợ upload file JPEG, PNG, JPG'
            ];
            echo json_encode($res);
            return false;
        }
        if ($file_size > 2097152) {
            $res = [
                'status' => 413,
                'message' => 'Kích thước file không được lớn hơn 2MB'
            ];
            echo json_encode($res);
            return false;
        }
    } else {
        $photo = 'default-product.png';
        $file_name = NULL;
    }

    $target = ADMIN . "assets/uploads/products" . basename($photo);
    move_uploaded_file($file_tmp, $target);

    if ($name == NULL || $price == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Vui lòng nhập đầy đủ thông tin'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "INSERT INTO products (name, photo, price,short_description,long_description,category_id) VALUES('$name', IFNULL(DEFAULT(photo),'$file_name'), '$price', IFNULL(DEFAULT(short_description),'$short_description'),IFNULL(DEFAULT(long_description),'$long_description'), '$category_id')";
    $query_run = Database::getInstance()->query($query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Thêm sản phẩm thành công'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Thêm sản phẩm thất bại'
        ];
        echo json_encode($res);
        return false;
    }
}
