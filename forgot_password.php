<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yinka Enoch Adedokun">
    <meta name="description" content="Simple Forgot Password Page Using HTML and CSS">
    <meta name="keywords" content="forgot password page, basic html and css">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="/assets/css/forgot-password.css">
</head>

<body>
    <div class="row">
        <h1>Quên mật khẩu</h1>
        <h6 class="information-text">Nhập email để reset mật khẩu</h6>
        <form action="process_forgot_password.php" method="post" class="form-group">
            <input type="email" name="email" id="user_email" placeholder="nhập email">
            <button type="submit">Reset mật khẩu</button>
        </form>
    </div>
</body>