<?php
require '../classes/db.php';
$conn = Database::getConnection();

// DELETE category
if(isset($_POST['delete_category'])) {
    $id = $conn->real_escape_string($_POST['id']);

    $query = "DELETE FROM categories WHERE id=' $id'";
    $query_run = Database::getInstance()->query($query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Xóa danh mục thành công'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Xóa danh mục thất bại'
        ];
        echo json_encode($res);
        return false;
    }
}

// UPDATE category
if (isset($_POST['update_category'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);

    if ($name == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Vui lòng nhập đầy đủ thông tin'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "UPDATE categories SET name='$name' WHERE id=' $id'";
    $query_run = Database::getInstance()->query($query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Cập nhập danh mục thành công'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Cập nhập danh mục thất bại'
        ];
        echo json_encode($res);
        return false;
    }
}

// GET category by id
if (isset($_GET['category_id'])) {
    $category_id = $conn->real_escape_string($_GET['category_id']);

    $query = "SELECT * FROM categories WHERE id = '$category_id'";
    $query_run = Database::getInstance()->query($query);

    if ($query_run->num_rows == 1) {
        $category = $query_run->fetch_assoc();
        $res = [
            'status' => 200,
            'message' => 'Lấy danh mục thành công',
            'data' => $category
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Không tìm thấy danh mục'
        ];
        echo json_encode($res);
        return false;
    }
}

// ADD category
if (isset($_POST['save_category'])) {
    $name = $conn->real_escape_string($_POST['name']);

    if ($name == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Vui lòng nhập đầy đủ thông tin'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "INSERT INTO categories (name) VALUES( '$name')";
    $query_run = Database::getInstance()->query($query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Thêm danh mục thành công'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Thêm danh mục thất bại'
        ];
        echo json_encode($res);
        return false;
    }
}
