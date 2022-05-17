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
        <h3>Quản lý Danh Mục</h3>
        <p style="text-align: center; padding: 10px 0px"><a href="them_theloai.php">Thêm Danh Mục</a></p>
        <table width="500px" border="1" cellspacing="0" cellpadding="0" style="margin: auto">

            <tr style="height: 40px;">
                <th>STT</th>
                <th>Tên Danh Mục</th>
                <th>
                    Tình trạng
                </th>
            </tr>
            <?php
            $stt = 1;
            $theloai = ds_theloai();
            while ($num = mysqli_fetch_array($theloai))
            {
                ?>
                <tr style="height: 30px;">
                    <th><?php echo $stt; ?></th>
                    <td><?php echo $num['ten_theloai']; ?></td>
                    <th colspan="2">
                        <a href="sua_theloai.php?idtl=<?php echo $num['id_theloai']; ?>">Sửa</a> - <a href="xoa_theloai.php?idtl=<?php echo $num['id_theloai']; ?>" onClick ="if(confirm('Bạn chắc chắn muốn xóa')) return true; else return false;">Xóa</a>
                    </th>
                </tr>
                <?php $stt += 1; } ?>
        </table>
    </div>
    <div class="footer" style="text-align: center">
        <h3 style="color: white; padding-top: 10px;"><a href="thongke.php" style="color: white">Thống kê</a></h3>
    </div>
</div>
</body>
</html>