<?php
session_start();
require_once './classes/db.php';
require_once './path.php';
require_once './check_login.php';
$conn = Database::getConnection();

function handleCorrectPass($id, $password)
{
    $sql = "SELECT * FROM customers WHERE id = '$id' AND password = '$password'";
    $result = Database::getInstance()->getNumRow($sql);
    if ($result == 1) {
        return 1;
    }
    return 0;
}

if (isset($_POST['update_profile'])) {
    $id = $conn->real_escape_string($_POST['id']);

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);
    $address = $conn->real_escape_string($_POST['address']);
    $password = $conn->real_escape_string($_POST['password']);

    $newPassword = $conn->real_escape_string($_POST['newPassword']);
    $reNewPassword = $conn->real_escape_string($_POST['reNewPassword']);

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
        $target = ROOT . "admin/assets/uploads/customers/" . basename($photo);
        move_uploaded_file($file_tmp, $target);
    } else {
        $file_name = $_POST['photo_old'];
    }

    if ($name == NULL || $email == NULL || $phone_number == NULL || $address == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Vui lòng nhập đầy đủ thông tin'
        ];
        echo json_encode($res);
        return false;
    }
    // if($password !== $reNewPassword) {
    //     $res = [
    //         'status' => 421,
    //         'message' => 'Mật khẩu mới và xác nhận mật khẩu mới không khớp'
    //     ];
    //     echo json_encode($res);
    //     return false;
    // }
    if (handleCorrectPass($id, $password) == 1) {
        if ($newPassword == NULL || $newPassword == "") {
            $query = "UPDATE customers SET name='$name', photo = '$file_name', email='$email',phone_number='$phone_number',address='$address' WHERE id='$id'";
        } else {
            $query = "UPDATE customers SET name='$name', photo = '$file_name', email='$email',phone_number='$phone_number',address='$address', password='$newPassword' WHERE id='$id'";
        }
        $query_run = Database::getInstance()->query($query);

        if ($query_run) {
            $res = [
                'status' => 200,
                'message' => 'Cập nhập thông tin thành công'
            ];
            echo json_encode($res);
            return false;
        } else {
            $res = [
                'status' => 500,
                'message' => 'Cập nhập thông tin thất bại'
            ];
            echo json_encode($res);
            return false;
        }
    } else {
        $res = [
            'status' => 401,
            'message' => 'Yêu cầu nhập mật khẩu để sửa'
        ];
        echo json_encode($res);
        return false;
    }

    // if ($newPassword == NULL || $newPassword == "") {
    //     $query = "UPDATE admin SET displayname='$displayname', photo = '$file_name', email='$email' WHERE username='$username'";
    // } else {
    //     $query = "UPDATE admin SET displayname='$displayname', photo = '$file_name', email='$email', password='$newPassword' WHERE username='$username'";
    // }
    // $query_run = Database::getInstance()->query($query);

    // if ($query_run) {
    //     $res = [
    //         'status' => 200,
    //         'message' => 'Cập nhập thông tin thành công'
    //     ];
    //     echo json_encode($res);
    //     return false;
    // } else {
    //     $res = [
    //         'status' => 500,
    //         'message' => 'Cập nhập thông tin thất bại'
    //     ];
    //     echo json_encode($res);
    //     return false;
    // }
}
