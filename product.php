<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        #container{
            width: 100%;
            height: 700px;
            background: blueviolet;
        }
        #top{
            width: 100%;
            height: 20%;
            background: aqua;
        }
        #mid{
            width: 100%;
            height: 70%;
            background: pink;
        }
        #bottom{
            width: 100%;
            height: 10%;
            background: yellow;
        }

    </style>
</head>
<body>
    <div id="container">
        <?php include 'header.php'; ?>
        <?php include 'product_detail.php'; ?>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>