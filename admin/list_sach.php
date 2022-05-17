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
        <h3>Quản lý Sách</h3>
        <p style="text-align: center; padding: 10px 0px"><a href="them_sach.php">Thêm sách</a></p>
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
                <th width="200px">Ghi chú</th>
                <th>Tình trạng</th>
            </tr>
            <?php
            $stt = 1;
            $sach = ds_sach();
            while ($num = mysqli_fetch_array($sach))
            {
                ?>
                <tr style="height: 30px;">
                    <th><?php echo $stt; ?></th>
                    <td><?php echo $num['tensach']; ?></td>
                    <td><?php echo $num['tacgia']; ?></td>
                    <td><?php echo $num['nxb']; ?></td>
                    <td><?php echo $num['ten_theloai']; ?></td>
                    <td style="padding: 0px 10px"> <img src="../img/<?php echo $num['hinhanh']; ?>" width="150px" ></td>
                    <td><?php echo $num['soluong']; ?></td>
                    <td><?php echo $num['dongia']; ?></td>
                    <td><?php echo $num['ghichu']; ?></td>
                    <th colspan="2">
                        <a href="sua_sach.php?idsach=<?php echo $num['id_sach']; ?>">Sửa</a><br><a href="xoa_sach.php?idsach=<?php echo $num['id_sach']; ?>" onClick ="if(confirm('Bạn chắc chắn muốn xóa')) return true; else return false;">Xóa</a>
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