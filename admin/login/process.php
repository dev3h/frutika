<?php
require '../classes/db.php';
$conn = Database::getConnection();

if (isset($_POST['login'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    if ($username == NULL || $password == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Vui lòng nhập đầy đủ thông tin'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $query_run = Database::getInstance()->query($query);


    if ($query_run) {
        $number_rows = $query_run->num_rows;

        if ($number_rows == 1) {
            $each = $query_run->fetch_assoc();
            if($each['status'] == 1) {
                session_start();
                $id = $each['id'];

                $token = uniqid('user_', true);

                $sql = "UPDATE admin SET token = '$token' WHERE id='$id'";
                Database::getInstance()->query($sql);

                $_SESSION['username'] = $each['username'];
                $_SESSION['token'] = $token;
                $_SESSION['role'] = $each['role'];

                $res = [
                        'status' => 200,
                        'message' => 'Đăng nhập thành công'
                    ];
                echo json_encode($res);
                return false;
                $res = [
                    'status' => 200,
                    'message' => 'Đăng nhập thành công'
                ];
                echo json_encode($res);
                return true;
            } else {
                $res = [
                    'status' => 421,
                    'message' => 'Tài khoản của bạn đã bị khóa'
                ];
                echo json_encode($res);
                return false;
            }
        } else {
            $res = [
                'status' => 403,
                'message' => 'Sai tên đăng nhập hoặc mật khẩu'
            ];
            echo json_encode($res);
            return false;
        }
    } else {
        $res = [
            'status' => 500,
            'message' => 'Lỗi truy vấn'
        ];
        echo json_encode($res);
        return false;
    }
}
