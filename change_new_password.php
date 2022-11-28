 <?php
    $token = $_GET['token'];
    require_once './classes/db.php';
    $sql = "SELECT * FROM forgot_password WHERE token = '$token'";
    $result = Database::getInstance()->query($sql);
    if ($result->num_rows === 0) {
        header('location:index.php');
    }
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Đổi mật khẩu mới</title>
     <link rel="stylesheet" href="/assets/css/forgot-password.css">
 </head>

 <body>
     <div class="row">
         <h1>Quên mật khẩu</h1>
         <h6 class="information-text">Nhập email để reset mật khẩu</h6>
         <form action="process_change_new_password.php" method="post" class="form-group">
             <form action="process_change_new_password.php" method="post">
                 <input type="hidden" name="token" value="<?php echo $token ?>">
                 <br>
                 Mật khẩu mới
                 <input type="password" name="password">
                 <br>
                 <button>Đỗi mật khẩu</button>
             </form>
         </form>
     </div>

 </body>

 </html>