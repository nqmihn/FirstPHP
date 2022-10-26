<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    session_start();
    if (!empty($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        $sum = 0;
    ?> 
    <center><h1>Giỏ hàng của bạn</h1></center>
    <table border="1" width="100%">
    <tr>
        <th>Ảnh</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Tổng tiền</th>
        <th>Xóa đơn hàng</th>
    </tr>
    <?php foreach ($cart as $id => $value){ ?>  
        <tr>
            <td>
                <img src="admin/products/photos/<?php echo $value['image'] ?>" height="100">
                <td><?php echo $value['name'] ?></td>
                <td><?php echo $value['price'] ?></td>
                <td>
                    <a href="update_quantity_in_cart.php?id=<?php echo $id ?>&type=dec">
                        <button>-</button>
                    </a>
                    <center><?php echo $value['quantity'] ?></center>
                    <a href="update_quantity_in_cart.php?id=<?php echo $id ?>&type=inc">
                        <button>+</button>
                    </a>
                </td>
                <td>
                    <?php 
                        $sum+= $value['quantity'] * $value['price'];
                        echo $value['quantity'] * $value['price'] 
                    ?>
                </td>
            </td>
            <td>
                <center>
                <a href="delete_product_from_cart.php?id=<?php echo $id ?>">
                    <button>Xóa</button>
                </a>
                </center>
            </td>
        </tr>     
    <?php }?>
    </table>
    <h1>Tổng tiền phải trả: <?php echo $sum ?></h1>
    <?php 
        $id = $_SESSION['id'];
        require 'admin/connect.php';
        $sql = "select * from customers
        where id='$id'";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);
    ?>
    <center>
    <h1>Đặt hàng</h1>
    <form action="process_check_out.php" method="post">
    Họ Tên 
    <input type="text" name="name_customer" value="<?php echo $each['name'] ?>">
    <br>
    Số điện thoại 
    <input type="text" name="phone_customer" value="<?php echo $each['phone'] ?>">
    <br>
    Địa chỉ
    <input type="text" name="address_customer" value="<?php echo $each['address'] ?>">
    <br>
    <button>Đặt hàng</button>
    </form>
    </center>
    <?php }else{ ?>
        <center><h1>Giỏ hàng trống</h1></center>
    <?php } ?>
</body>
</html>