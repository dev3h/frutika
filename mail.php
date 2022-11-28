<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/OAuthTokenProvider.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/POP3.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $name, $title, $content)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        // Phải đăng ký 1 mail để có thể gửi mail cho khách hàng
        $mail->Username   = 'namolis241@gmail.com';                     //SMTP username
        // mật khẩu của mail trong bảo mật mật khẩu ứng dụng
        $mail->Password   = 'eyniyvcqrmmpeyxo';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->SMTPSecure = "tls";
        $mail->CharSet = 'UTF-8'; // support send mail with Vietnamese
        
        //Recipients
        // * Chỗ này đê gửi mail
        $mail->setFrom('namolis241@gmail.com', 'namolis241');
        $mail->addAddress($email, $name);     //Add a recipient            //Name is optional

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $title;
        $mail->Body    = $content;

        $mail->send();
        echo 'Gửi tin nhắn thành công';
    } catch (Exception $e) {
        echo "Tin nhắn không được gửi. Lỗi: {$mail->ErrorInfo}";
    }
}
