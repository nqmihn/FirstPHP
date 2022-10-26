<?php 
require '../check_login_admin.php'; 
?>
<?php 

$name = $_POST['name'];
$image = $_FILES['image'];
$price = $_POST['price'];
$description = $_POST['description'];
$id_manufacturer = $_POST['id_manufacturer'];

$folder = 'photos/';


$file_extension = explode('.',$image['name'])[1];

$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;


move_uploaded_file($image["tmp_name"], $path_file);

require '../connect.php';

$sql = "insert into products(name,image,price,description,id_manufacturer)
values('$name','$file_name','$price','$description','$id_manufacturer')";
mysqli_query($connect,$sql);
mysqli_close($connect);