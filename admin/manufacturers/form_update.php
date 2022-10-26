<?php 
    require '../check_login_super_admin.php';
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
        if (empty($_GET['id']))
            header('location:index.php?error= Phải truyền mã để sửa');
        include '../menu.php';
        require '../connect.php';
        $id = $_GET['id'];
        $sql = "select * from manufacturers
        where id='$id'";
        $result = mysqli_query($connect,$sql);
        $number_rows = mysqli_num_rows($result);
        if ($number_rows === 1){
        $values = mysqli_fetch_array($result);
    ?>
        <form action="process_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $values['id'] ?>">
        Tên
        <input type="text" name="name" value="<?php echo $values['name'] ?>">
        <br>
        Địa chỉ
        <textarea name="address"><?php echo $values['address'] ?></textarea>
        <br>
        Điện thoại
        <input type="text" name="phone" value="<?php echo $values['phone'] ?>">
        <br>
        Ảnh
        <input type="text" name="image" value="<?php echo $values['image'] ?>">
        <br>
        <button>Sửa</button>

    </form>
    <?php }else{ ?>
        <h1>Không tìm thấy mã cần sửa</h1>
    <?php } ?>
</body>
</html>