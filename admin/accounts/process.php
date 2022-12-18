<?php
session_start();
require_once '../classes/db.php';
require_once '../path.php';

$conn = Database::getConnection();

$username = $_SESSION['username'];

// LOCK
if (isset($_POST['lock_account'])) {
    $id = $conn->real_escape_string($_POST['id']);

    $query = "SELECT * FROM admin WHERE id = '$id'";
    $query_run = Database::getInstance()->query($query);
    if ($query_run && $query_run->num_rows > 0) {
        $each = $query_run->fetch_assoc();
        if ($each['username'] == $username) {
            $res = [
                'status' => 403,
                'message' => 'Bạn đang đăng nhập bằng tài khoản này'
            ];
            echo json_encode($res);
            return false;
        } else {
            $query = "UPDATE admin SET status = '0'  WHERE id=' $id'";
            $query_run = Database::getInstance()->query($query);

            if ($query_run) {
                $res = [
                    'status' => 200,
                    'message' => 'khóa tài khoản thành công'
                ];
                echo json_encode($res);
                return false;
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'khóa tài khoản thất bại'
                ];
                echo json_encode($res);
                return false;
            }
        }
    }
}

// UPDATE
if (isset($_POST['update_account'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $displayname = $conn->real_escape_string($_POST['displayname']);
    $email = $conn->real_escape_string($_POST['email']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $role = $conn->real_escape_string($_POST['role_id']);
    $status = $conn->real_escape_string($_POST['status_id']);

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
        $target = ADMIN . "assets/uploads/accounts/" . basename($photo);
        move_uploaded_file($file_tmp, $target);
    } else {
        $file_name = $_POST['photo_old'];
    }

    if ($displayname == NULL || $email == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Vui lòng nhập đầy đủ thông tin'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "UPDATE admin SET displayname='$displayname', photo = '$file_name', email='$email', gender='$gender', role='$role', status='$status' WHERE id='$id'";
    $query_run = Database::getInstance()->query($query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Cập nhập tài khoản thành công'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Cập nhập tài khoản thất bại'
        ];
        echo json_encode($res);
        return false;
    }
}

// GET account by id
if (isset($_GET['account_id'])) {
    $account_id = $conn->real_escape_string($_GET['account_id']);

    $query = "SELECT admin.*, role_types.name AS role_name FROM admin 
                                        JOIN role_types ON admin.role = role_types.id
                                        WHERE admin.id = '$account_id'";
    $query_run = Database::getInstance()->query($query);

    if ($query_run->num_rows == 1) {
        $accounts = $query_run->fetch_assoc();
        $res = [
            'status' => 200,
            'message' => 'Lấy tài khoản thành công',
            'data' => $accounts
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Không tìm thấy tài khoản'
        ];
        echo json_encode($res);
        return false;
    }
}

// ADD 
if (isset($_POST['save_account'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $displayname = $conn->real_escape_string($_POST['displayname']);
    $email = $conn->real_escape_string($_POST['email']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $role = $conn->real_escape_string($_POST['role_id']);
    $status = $conn->real_escape_string($_POST['status_id']);

    $extensions = array("jpeg", "jpg", "png");
    $file_tmp = $_FILES['photo']['tmp_name'];
    if ($_FILES['photo']['name']) {
        $photo = $_FILES['photo']['name'];
        $file_name = $_FILES['photo']['name'];

        $file_size = $_FILES['photo']['size'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_type = $_FILES['photo']['type'];
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
    } else {
        $photo = "default-user.png";
        $file_name = NULL;
    }
    $target = ADMIN . "assets/uploads/accounts/" . basename($photo);
    move_uploaded_file($file_tmp, $target);

    if ($username == NULL || $displayname == NULL || $email == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Vui lòng nhập đầy đủ thông tin'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "INSERT INTO admin (username,displayname, photo, email, gender, role, status) VALUES('$username','$displayname', IFNULL(DEFAULT(photo),'$file_name'), '$email', '$gender', '$role', '$status')";
    $query_run = Database::getInstance()->query($query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Thêm tài khoản thành công'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Thêm tài khoản thất bại'
        ];
        echo json_encode($res);
        return false;
    }
}
