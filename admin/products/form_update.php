<?php 
require '../check_login_admin.php'; 
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
    <?php
    include '../menu.php';
    require '../connect.php';
    $id = $_GET['id'];
    $sql = "select * from products
        where id='$id'";
    $result = mysqli_fetch_array(mysqli_query($connect, $sql));
    $sql = "select * from manufacturers";
    $manufacturers = mysqli_query($connect,$sql);
    ?>
    <form action="process_update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
        Tên sản phẩm
        <input type="text" name="name" value="<?php echo $result['name'] ?>">
        <br>
        Ảnh mới
        <input type="file" name="image_new" >
        <br>
        Hoặc giữ ảnh cũ
        <img src="photos/<?php echo $result['image'] ?>" height="100">
        <input type="hidden" name="image_old" value="<?php echo $result['image'] ?>" >
        <br>
        Giá
        <input type="number" name="price" value="<?php echo $result['price'] ?>">
        <br>
        Mô tả
        <textarea name="description">
            <?php echo $result['description'] ?>
        </textarea>
        <br>
        Nhà sản xuất
        <select name="id_manufacturer">
            <?php foreach ($manufacturers as $manufacturer){ ?> 
                <option value="<?php echo $manufacturer['id'] ?>" <?php if ($result['id_manufacturer'] == $manufacturer['id']){ ?>
                    selected <?php } ?>>
                    <?php echo $manufacturer['name'] ?>
                </option>
            <?php }?>
        </select>
        <br>
        <button>Sửa</button>
    </form>
</body>

</html>