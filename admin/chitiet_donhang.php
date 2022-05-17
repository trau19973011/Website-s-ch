<?php
session_start();
require('function.php');
$iddh = $_GET['iddh'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quản lý</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="tong">
    <div class="header">
        <?php echo 'Xin chào ADMIN'."<br>"."<a href='dangxuat.php'>Thoát</a>"; ?>
    </div>
    <div class="menu">
        <ul>
            <li><a href="index.php">Tài Khoản</a></li>
            <li><a href="list_theloai.php">Danh Mục</a></li>
            <li><a href="list_sach.php">Sách</a></li>
            <li><a href="list_donhang.php">Đơn hàng</a></li>
        </ul>
    </div>
    <div class="content">
        <h3>Chi tiết đơn hàng</h3>
        <table border="1" cellspacing="0" cellpadding="0" style="margin: auto" width="800px">

            <tr style="height: 40px;">
                <th>STT</th>
                <th>Tên sách</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            <?php
            $stt = 1;
            $tongtien = 0;
            $chitiet = chitiet_donhang($iddh);
            while ($num = mysqli_fetch_array($chitiet))
            {
                ?>
                <tr style="height: 30px; text-align: center;">
                    <th><?php echo $stt; ?></th>
                    <td><?php echo $num['tensach']; ?></td>
                    <td><?php echo $num['soluong']; ?></td>
                    <td><?php echo $num['thanhtien']; ?> đ</td>
                </tr>
                <?php $stt += 1; $tongtien += $num['thanhtien']; } ?>
            <tr style="height: 40px">
                <th colspan="4">Tổng tiền: <?php echo $tongtien; ?> đ</th>
            </tr>
        </table>
        <p style="text-align: center;"><a href="list_donhang.php">Quay lại</a></p>
    </div>
    <div class="footer" style="text-align: center">
        <h3 style="color: white; padding-top: 10px;"><a href="thongke.php" style="color: white">Thống kê</a></h3>
    </div>
</div>
</body>
</html>