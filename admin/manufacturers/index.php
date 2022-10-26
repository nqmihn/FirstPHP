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
    Giao diện nhà sản xuất
    <?php
    include '../menu.php';
    ?>
    <button>
    <a href="form_insert.php">Thêm</a>
    </button>
    <?php
    include '../connect.php';
    $sql_manufacturers = "select count(*) from manufacturers";
    $array_of_manufacturers = mysqli_query($connect, $sql_manufacturers);
    $number_of_manufacturers = mysqli_fetch_array($array_of_manufacturers)['count(*)'];
    $number_of_manufacturers_in_page = 4;
    $pages = ceil($number_of_manufacturers / $number_of_manufacturers_in_page);
    $page = 1;
    if (isset($_GET['page']))
        $page = $_GET['page'];
    $ignore = $number_of_manufacturers_in_page * ($page - 1);
    $sql = "select * from manufacturers
    limit $number_of_manufacturers_in_page offset $ignore";
    $result = mysqli_query($connect, $sql);
    ?>
    <table border="1" width="100%">
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Ảnh</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php foreach ($result as $key) { ?>
            <tr>
                <td> <?php echo $key['id'] ?></td>
                <td> <?php echo $key['name'] ?></td>
                <td> <?php echo $key['address'] ?></td>
                <td> <?php echo $key['phone'] ?></td>
                <td>
                    <img src="<?php echo $key['image'] ?>" width="100">
                </td>
                <td>
                    <a href="form_update.php?id=<?php echo $key['id'] ?>">Sửa</a>

                </td>
                <td>
                    <a href="delete.php?id=<?php echo $key['id'] ?>">Xóa</a>

                </td>
            </tr>
        <?php } ?>
    </table>
    <?php for ($i = 1; $i <= $pages; $i++) { ?>
        <a href="?page=<?php echo $i ?>">
            <?php echo $i ?>
        </a>

    <?php } ?>
</body>

</html>