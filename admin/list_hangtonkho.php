<?php
session_start();
require('function.php');
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
        <h3>HÀNG TỒN KHO</h3>
        <table border="1" cellspacing="0" cellpadding="0" style="margin: auto">

            <tr style="height: 40px;">
                <th>STT</th>
                <th width="100px">Tên sách</th>
                <th>Tác giả</th>
                <th>NXB</th>
                <th>Danh Mục</th>
                <th width="150px">Hình ảnh</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
            </tr>
            <?php
            $stt = 1;
            $sach = ds_sach();
            while ($num = mysqli_fetch_array($sach))
            {
                ?>
                <tr style="height: 30px;">
                    <th><?php echo $stt; ?></th>
                    <td style="c"><?php echo $num['tensach']; ?></td>
                    <td><?php echo $num['tacgia']; ?></td>
                    <td><?php echo $num['nxb']; ?></td>
                    <td><?php echo $num['ten_theloai']; ?></td>
                    <td style="padding: 0px 10px"> <img src="../img/<?php echo $num['hinhanh']; ?>" width="150px" ></td>
                    <td><?php echo $num['soluong']; ?></td>
                    <td><?php echo $num['dongia']; ?></td>
                </tr>
                <?php $stt += 1; } ?>
        </table>
    </div>
    <div class="footer" style="text-align: center">

    </div>
</div>
</body>
</html>