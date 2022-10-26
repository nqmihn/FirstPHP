<?php
require 'admin/connect.php';
$id = $_GET['id'];
$sql = "select * from products
    where id='$id'";
$each =  mysqli_fetch_array(mysqli_query($connect, $sql));

?>
<div id="mid">
    <h1>
        <?php echo $each['name']; ?>
    </h1>
    <img src="admin/products/photos/<?php echo $each['image']; ?>" height="100">
    <p>Giá:<?php echo $each['price'] ?></p>
    <p><?php echo $each['description'] ?></p>

</div>