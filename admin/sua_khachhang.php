<?php
session_start();
require("function.php");
$iduser = $_GET['iduser'];
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
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $diachi = $_POST['diachi'];
    $sodt = $_POST['sodt'];

    $sua = sua_user($iduser,$user,$pass,$diachi,$sodt);
    if($sua) header('location: index.php');
    else echo "<script>alert('Lỗi')</script>";
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
        <h3>Sửa thông tin khách hàng</h3>
        <form method="post">
            <table cellspacing="8" style="margin: auto; background: #CCFFFF;">
                <?php
                $user = user($iduser);
                $num = mysqli_fetch_array($user);
                ?>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="user" value="<?php echo $num['username']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="text" name="pass" value="<?php echo $num['password']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>
                        <input type="text" name="diachi" value="<?php echo $num['diachi']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>
                        <input type="text" name="sodt" value="<?php echo $num['sodt']; ?>">
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