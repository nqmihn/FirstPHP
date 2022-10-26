<?php 
    $email = $_POST['email'];
    require 'admin/connect.php';
    $sql = "select * from customers
    where email='$email'";

    $result = mysqli_query($connect,$sql);
    if (mysqli_num_rows($result) === 1){
        $each = mysqli_fetch_array($result);
        $id = $each['id'];
        $name = $each['name'];
        $sql_delete = "delete from forgot_password
        where id_customer='$id'";
        mysqli_query($connect,$sql_delete);
        $token = uniqid();
        $url = $_SERVER['HTTP_HOST'].'/SecondPHP'. '/change_new_password.php?token='.$token;
        $sql = "insert into forgot_password(id_customer,token)
        values('$id','$token')";
        mysqli_query($connect,$sql);
        require 'mail.php';
        $subject = 'Đặt lại mật khẩu của bạn';
        $content = "Chào $name.<a href='$url'>Ấn vào đây để đặt lại mật khẩu của bạn</a>";
        send_mail($email,$name,$subject,$content);

    }else
    header('location:index.php');