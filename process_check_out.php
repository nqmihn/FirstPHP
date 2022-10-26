<?php 

$name_customer = $_POST['name_customer'];
$phone_customer = $_POST['phone_customer'];
$address_customer = $_POST['address_customer'];

$status_cart = 1;

require 'admin/connect.php';
session_start();
$id_customer = $_SESSION['id'];
$cart = $_SESSION['cart'];
$total_price = 0;
foreach ($cart as $each ){
    $total_price+= $each['quantity'] * $each['price'];
}

$sql = "INSERT INTO orders(id_customer, name_customer, phone_customer, address_customer, status_cart,total_price)
values('$id_customer', '$name_customer', '$phone_customer', '$address_customer', '$status_cart','$total_price')";

mysqli_query($connect,$sql);

$sql = "select max(id) from orders
where id_customer='$id_customer'";

$result = mysqli_query($connect,$sql);

$order = mysqli_fetch_array($result)['max(id)'];

foreach ($cart as $id_product => $value) {
    $quantity = $value['quantity'];
    $sql = "insert into order_product(id_order,id_product,quantity)
    values('$order','$id_product','$quantity')";
    mysqli_query($connect,$sql);

}
unset($_SESSION['cart']);
header('location:view_cart.php');
mysqli_close($connect);

