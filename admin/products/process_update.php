<?php 
require '../check_login_admin.php'; 
?>
<?php
$id = $_POST['id'];
$name = $_POST['name'];
$image = $_FILES['image_new'];
$price = $_POST['price'];
$description = $_POST['description'];
$id_manufacturer = $_POST['id_manufacturer'];

if ($image['size'] > 0){
    $folder = 'photos/';
    $file_extension = explode('.',$image['name'])[1];
    $file_name = time() . '.' . $file_extension;
    $path_file = $folder . $file_name;
    move_uploaded_file($image["tmp_name"], $path_file);
} else{
    $file_name = $_POST['image_old'];
}


require '../connect.php';

$sql = "update products
set
name='$name',
image='$file_name',
price='$price',
description='$description',
id_manufacturer='$id_manufacturer'
where
id ='$id' 
";
mysqli_query($connect,$sql);
mysqli_close($connect);

