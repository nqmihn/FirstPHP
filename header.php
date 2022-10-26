<div id="top">
    <ol>
        <li>
            <a href="index.php">Trang chủ</a>
        </li>
        <?php 
        session_start();
        if(empty($_SESSION['id'])){ ?>
            <li>
                <a href="sign_in.php">Đăng nhập</a>
            </li>
            <li>
             <a href="sign_up.php">Đăng ký</a>
         </li>
            <li>
                <a href="sign_out.php">Đăng xuất</a>
            </li>
        <?php } else{?>
            <li>
                Welcome,<?php echo $_SESSION['name'] ?>
                <a href="sign_out.php">Đăng xuất</a>
            </li>
            <li>
                <a href="view_cart.php">Xem giỏ hàng</a>
            </li>
        
        <?php } ?>
    </ol>
</div>