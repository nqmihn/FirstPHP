<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'header.php' ?>
    <?php 
    if (!empty($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        $sum = 0;
    ?> 
    <center><h1>
            Giỏ hàng của bạn
    </h1></center>
    <span id="span-view-cart">
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
                <td>
                    <span class="span-price">
                        <?php echo $value['price'] ?>
                    </span>
                </td>
                <td>
                    <button class="btn-update-quantity" data-id="<?php echo $id ?>" data-type="0">
                        -
                    </button>
                    <center>
                        <span class="span-quantity">
                            <?php echo $value['quantity'] ?>
                        </span>
                    </center>
                    <button class="btn-update-quantity" data-id="<?php echo $id ?>" data-type="1">
                        +
                    </button>
                </td>
                <td>
                    <span class="span-sum">
                    <?php 
                        $sum+= $value['quantity'] * $value['price'];
                        echo $value['quantity'] * $value['price'] 
                    ?>
                    </span>
                </td>
            </td>
            <td>
                <center>
                    <button class="btn-remove-product" data-id="<?php echo $id ?>">Xóa đơn</button>
                </center>
            </td>
        </tr>     
    <?php }?>
    </table>
    <h1>Tổng tiền phải trả: 
        <span id="span-total-price">
            <?php echo $sum ?>
        </span>
    </h1>
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
    </span>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".btn-update-quantity").click(function()  { 
                let btn = $(this);
                let id = btn.data('id');
                let type = parseInt(btn.data('type'));
                $.ajax({
                    type: "GET",
                    url: "update_quantity_in_cart.php",
                    data: {id,type},
                    success: function () {
                        let tr_parent = btn.parents('tr');
                        let quantity = parseInt(tr_parent.find(".span-quantity").text());
                        let price = parseFloat(tr_parent.find(".span-price").text());
                        quantity = (type == 1 ? quantity+1 : quantity-1)
                        if (quantity === 0){
                            tr_parent.remove()
                        }else{
                        tr_parent.find('.span-quantity').text(quantity);
                        let sum = quantity * price
                        tr_parent.find('.span-sum').text(sum);
                        }
                        getTotalPrice();

                    }
                });
            });
            $(".btn-remove-product").click(function () { 
                let btn = $(this)
                let id = $(this).data('id')
                $.ajax({
                    type: "GET",
                    url: "delete_product_from_cart.php",
                    data: {id},
                    success: function () {
                            tr_parent = btn.parents("tr")
                            tr_parent.remove()
                            getTotalPrice();
                            if (total == 0){
                                $("#span-view-cart").text("")
                            }
                        }
                });
                
            });
        }); 
    function getTotalPrice(){
        let total = 0;
        $(".span-sum").each(function () {
        total += parseFloat($(this).text())
        });
        $("#span-total-price").text(total);
    }   
    </script>
    <?php }else{ ?>
        <center><h1>Giỏ hàng trống</h1></center>
    <?php } ?>
    
</body>
</html>
