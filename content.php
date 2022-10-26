<style type="text/css">
    .each_product{
        width: 33%;
        border: 1px solid blue;
        height: 250px;
        float: left;
    }
</style>
<?php 
        require 'admin/connect.php';
        $sql = "select * from products";
        $result = mysqli_query($connect,$sql);
?>
<div id="mid">
    <?php foreach ($result as $each){ ?>  
        <div class="each_product">
            <h1>
                <?php echo $each['name']; ?>
            </h1>
            <img src="admin/products/photos/<?php echo $each['image']; ?>" height="100">
            <p><?php echo $each['price'] ?></p>
            <a href="product.php?id=<?php echo $each['id'] ?>">
                >> Chi tiết
            </a>
            <?php if (!empty($_SESSION['id'])) {?>
                <br>
                <a href="add_to_cart.php?id=<?php echo $each['id'] ?>">
                     + Thêm vào giỏ hàng
                </a>
            <?php } ?>
        </div>    
    <?php }?>
        
</div>