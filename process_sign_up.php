<?php 
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];

require 'admin/connect.php';

$sql = "select count(*) from customers
where email='$email'";

$result = mysqli_query($connect,$sql);
$check = mysqli_fetch_array($result)['count(*)'];

if ($check == 1 ){
    header('location:sign_up.php?error=Email đã được sử dụng');
    exit;
}
$sql = "insert into customers(name,email,password,phone,address)
values('$name','$email','$password','$phone','$address')";
mysqli_query($connect,$sql);

$sql = "select id from customers
where email='$email'";
$result = mysqli_query($connect,$sql);
$id = mysqli_fetch_array($result)['id'];

session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;

header('location:index.php');


mysqli_close($connect);
