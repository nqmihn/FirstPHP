<?php 
    require '../check_login_super_admin.php';
?>
<?php 
if (empty($_GET['id'])){
    header('location:index.php?error=Phải truyền mã để xóa');
    exit;
}

require '../connect.php';

$id = $_GET['id'];

$sql = "delete from manufacturers
where
id='$id'";

mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:index.php?success=Xóa thành công');