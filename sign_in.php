<?php 
    session_start();
    if (isset($_COOKIE['remember_login'])){
        $token = $_COOKIE['remember_login'];
        require 'admin/connect.php';
        $sql = "select * from customers
        where token = '$token'
        limit 1 ";
        $result = mysqli_fetch_array(mysqli_query($connect,$sql));
        $number_rows = mysqli_num_rows(mysqli_query($connect,$sql));
        if ($number_rows == 1){
        $_SESSION['id'] = $result['id'];
        $_SESSION['name'] = $result['name'];
    }
    }
    
    if (isset($_SESSION['id'])){
        header('location:user.php');
        exit;
    }
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Đăng nhập</h1>
    <form action="process_sign_in.php" method="post">
    Email
    <input type="email" name="email">
    <br>
    Mật khẩu
    <input type="password" name="password">
    <br>
    Ghi nhớ đăng nhập
    <input type="checkbox" name="remember_login">
    <br>
    <button>Đăng nhập</button>
    <a href="forgot_password.php">Quên mật khẩu</a>
    </form>
</body>
</html>