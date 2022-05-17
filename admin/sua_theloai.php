<?php
session_start();
require("function.php");
$idtl = $_GET['idtl'];
$theloai = theloai($idtl);
$num = mysqli_fetch_array($theloai);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sửa thông tin khách hàng</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
if(isset($_POST['ok']))
{
    $ten = $_POST['ten'];
    if(empty($ten))
    {
        echo "<script>alert('Nhập tên thể loại')</script>";
    }
    else
    {
        $sua = sua_theloai($idtl,$ten);
        if($sua) header('location: list_theloai.php');
        else echo "<script>alert('Lỗi')</script>";
    }

}
?>
<div class="tong">
    <div class="header">
        <?php echo 'Xin chào ADMIN'."<br>"."<a href='dangxuat.php'>Thoát</a>"; ?>
    </div>
    <div class="menu">
        <ul>
            <li><a href="index.php">Tài Khoản</a></li>
            <li><a href="list_theloai.php">Danh mục</a></li>
            <li><a href="list_sach.php">Sách</a></li>
            <li><a href="list_donhang.php">Đơn hàng</a></li>
        </ul>
    </div>
    <div class="content">
        <h3>Sửa Danh mục</h3>
        <form method="post">
            <table cellspacing="8" style="margin: auto; background: #CCFFFF;">

                <tr>
                    <td>Tên Danh mục</td>
                    <td>
                        <input type="text" name="ten" value="<?php echo $num['ten_theloai']; ?>">
                    </td>
                </tr>
                <tr>
                    <th colspan="2">
                        <input type="submit" name="ok" value="Sửa" style="width: 80px; height: 40px">
                    </th>
                </tr>
            </table>
        </form>
    </div>
    <div class="footer"></div>
</div>
</body>
</html>