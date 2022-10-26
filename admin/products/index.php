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
        require '../menu.php'; 
        require '../connect.php';
        $sql = "select * from products";
        $result = mysqli_query($connect,$sql);
    ?>
    <h1>Quản lý sản phẩm</h1>
    <button>
        <a href="form_insert.php">Thêm</a>
    </button>
    <table border="1" width="100%">
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Mô tả</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <tr>
        <?php foreach ($result as $each){?>
            
                <td><?php echo $each['id'] ?></td>
                <td><?php echo $each['name'] ?></td>
                <td>
                    <img src="photos/<?php echo $each['image'] ?>" height="100">
                </td>
                <td><?php echo $each['price'] ?></td>
                <td><?php echo $each['description'] ?></td>
                <td>
                    <a href="form_update.php?id=<?php echo $each['id'] ?>">Sửa</a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $each['id'] ?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>