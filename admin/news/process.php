<?php
session_start();
require_once '../classes/db.php';

require_once '../path.php';
$conn = Database::getConnection();

// DELETE
if (isset($_POST['delete_news'])) {
    $id = $conn->real_escape_string($_POST['id']);

    $query = "DELETE FROM posts WHERE id=' $id'";
    $query_run = Database::getInstance()->query($query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Xóa tin tức thành công'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Xóa tin tức thất bại'
        ];
        echo json_encode($res);
        return false;
    }
}

// UPDATE
if (isset($_POST['update_news'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);

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
        $target = ADMIN . "assets/uploads/news/" . basename($photo);
        move_uploaded_file($file_tmp, $target);
    } else {
        $file_name = $_POST['photo_old'];
    }
   
    if ($title == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Vui lòng nhập đầy đủ thông tin'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "UPDATE posts SET title='$title', photo = '$file_name', content='$content' WHERE id='$id'";
    $query_run = Database::getInstance()->query($query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Cập nhập tin tức thành công'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Cập nhập tin tức thất bại'
        ];
        echo json_encode($res);
        return false;
    }
}

// GET news by id
if (isset($_GET['news_id'])) {
    $news_id = $conn->real_escape_string($_GET['news_id']);

    $query = "SELECT * FROM posts WHERE id = ' $news_id'";
    $query_run = Database::getInstance()->query($query);

    if ($query_run->num_rows == 1) {
        $news = $query_run->fetch_assoc();
        $res = [
            'status' => 200,
            'message' => 'Lấy tin tức thành công',
            'data' => $news
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Không tìm thấy tin tức'
        ];
        echo json_encode($res);
        return false;
    }
}

// ADD 
if (isset($_POST['save_news'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $content = $_POST['content'] ? $conn->real_escape_string($_POST['content']) : null;

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
        $photo = "default-news.jpg";
        $file_name = NULL;
    }
    $target = ADMIN . "assets/uploads/news/" . basename($photo);
    move_uploaded_file($file_tmp, $target);

    if ($title == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Vui lòng nhập đầy đủ thông tin'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "INSERT INTO posts (title, photo, content) VALUES('$title', IFNULL(DEFAULT(photo),'$file_name'), IFNULL(DEFAULT(content),'$content'))";
    $query_run = Database::getInstance()->query($query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Thêm tin tức thành công'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Thêm tin tức thất bại'
        ];
        echo json_encode($res);
        return false;
    }
}
