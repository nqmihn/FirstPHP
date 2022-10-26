<?php 
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($_POST['remember_login'])){
        $remember_login = true;
    }else{
        $remember_login = false;
    }

    
    require 'admin/connect.php';
    $sql = "select * from customers
    where email='$email' and password ='$password'";

    $result = mysqli_query($connect,$sql);
    $number_rows = mysqli_num_rows($result);

    if($number_rows == 1){
        session_start();
        $each = mysqli_fetch_array($result);
        $id = $each['id'];
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $each['name'];
        if ($remember_login){
            $token = uniqid('user',true);
            $sql = "update customers
            set
            token = '$token'
            where
            id = '$id'
            ";
            mysqli_query($connect,$sql);
            setcookie('remember_login',$token,time() + 86400 * 30);
        }
        header('location:sign_in.php');
        exit;
    }
    else
        header('location:sign_in.php?error=Thông tin đăng nhập không chính xác');

