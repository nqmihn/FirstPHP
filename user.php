<?php session_start(); 
    if(empty($_SESSION['id']))
        header('location:sign_in.php?error=Vui lòng đăng nhập');
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
    <h1>
    <center>Chào <?php echo $_SESSION['name']; ?>. Đây là giao diện người dùng</center>
    </h1>
    <center>
    <button>
        <a href="sign_out.php">Đăng xuất</a>
    </button>
    </center>
</body>
</html>