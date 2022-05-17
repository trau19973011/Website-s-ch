<?php
session_start();
require("function.php");
$idsach = $_GET['idsach'];
$sach = sach($idsach);
$num = mysqli_fetch_array($sach);
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
    $tensach = $_POST['ten'];
    $tacgia = $_POST['tacgia'];
    $nxb = $_POST['nxb'];
    $theloai = $_POST['theloai'];
    $soluong = $_POST['soluong'];
    $dongia = $_POST['dongia'];
    $ghichu = $_POST['ghichu'];
    $img_name = $_FILES['anh']['name'];
    $img_tmpname = $_FILES['anh']['tmp_name'];

    if(empty($tensach) || empty($tacgia) || empty($nxb) || empty($soluong) || empty($dongia) || empty($ghichu))
    {
        echo "<script>alert('Nhập đầy đủ thông tin sách')</script>";
    }
    elseif($_FILES['anh']['error'] > 0)
    {
        $sach1 = sua_sach1($idsach,$tensach,$tacgia,$nxb,$theloai,$soluong,$dongia,$ghichu);
        if($sach1) header('location: list_sach.php');
        else echo "<script>alert('Lỗi')</script>";
    }
    else
    {
        move_uploaded_file($img_tmpname, '../img/'.$img_name);
        $sach = sua_sach($idsach,$tensach,$tacgia,$nxb,$theloai,$img_name,$soluong,$dongia,$ghichu);
        if($sach) header('location: list_sach.php');
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
        <h3>Sửa thông tin sách</h3>
        <form method="post" enctype="multipart/form-data">
            <table cellspacing="8" style="margin: auto; background: #CCFFFF;">
                <tr>
                    <td>Tên sách</td>
                    <td>
                        <input type="text" name="ten" value="<?php echo $num['tensach']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Tác giả</td>
                    <td>
                        <input type="text" name="tacgia" value="<?php echo $num['tacgia']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Nhà xuất bản</td>
                    <td>
                        <input type="text" name="nxb" value="<?php echo $num['tensach']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Danh Mục</td>
                    <td>
                        <select name="theloai">
                            <?php
                            $tl = ds_theloai();
                            while($row = mysqli_fetch_array($tl))
                            {
                                ?>
                                <option value="<?php echo $row['id_theloai']; ?>" <?php if($num['id_theloai'] == $row['id_theloai']) echo 'selected'; ?> > <?php echo $row['ten_theloai']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Hình ảnh</td>
                    <td>
                        <img src="../img/<?php echo $num['hinhanh']; ?>" width="150px">
                    </td>
                </tr>
                <tr>
                    <td>Hình ảnh mới</td>
                    <td>
                        <input type="file" name="anh">
                    </td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td>
                        <input type="text" name="soluong" value="<?php echo $num['soluong']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Đơn giá</td>
                    <td>
                        <input type="text" name="dongia" value="<?php echo $num['dongia']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Ghi chú</td>
                    <td>
                        <textarea name="ghichu" cols="25" rows="5"><?php echo $num['ghichu']; ?></textarea>
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