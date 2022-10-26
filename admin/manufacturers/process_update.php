<?php 
    require '../check_login_super_admin.php';
?>
<?php  


if (empty($_POST['id'])){
    header('location:form_update.php?error=Phải truyền mã để sửa');
    exit;
}

$id = $_POST['id'];

if (empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['image'])){
    header("location:form_update.php?id=$id&error=Phải điền đầy đủ thông tin");
    exit;
}




$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$image = $_POST['image'];

require '../connect.php';

$sql = "update manufacturers
set
name='$name',
address='$address',
phone='$phone',
image='$image'
where
id='$id'";


mysqli_query($connect,$sql);

$check_error = mysqli_error($connect);

mysqli_close($connect);


if (empty($check_error)){
    header('location:index.php?success=Sửa thành công');       
}
else
    header("location:form_update.php?id=$id&error=Lỗi truy vấn");