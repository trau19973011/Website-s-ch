<?php
session_start();
require("function.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thêm sách mới</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
if(isset($_POST['ok']))
{
    $tensach = $_POST['tensach'];
    $tacgia = $_POST['tacgia'];
    $nxb = $_POST['nxb'];
    $theloai = $_POST['theloai'];
    $soluong = $_POST['soluong'];
    $dongia = $_POST['dongia'];
    $ghichu = $_POST['ghichu'];
    $img_name = $_FILES['anh']['name'];
    $img_tmpname = $_FILES['anh']['tmp_name'];

    if(empty($tensach) || empty($tacgia) || empty($nxb) || empty($soluong) || empty($dongia) || empty($ghichu) || $_FILES['anh']['error'] > 0)
    {
        echo "<script>alert('Nhập đầy đủ thông tin sách')</script>";
    }
    else
    {
        move_uploaded_file($img_tmpname, '../img/'.$img_name);
        $them = them_sach($tensach,$tacgia,$nxb,$theloai,$img_name,$soluong,$dongia,$ghichu);
        if($them)
        {
            header('location: list_sach.php');
        }
        else
        {
            echo "<script>alert('Lỗi')</script>";
        }
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
        <form method="post" enctype="multipart/form-data">
            <table cellspacing="8" style="margin: auto; background: #CCFFFF; margin-top: 20px">
                <tr>
                    <th colspan="2">Thêm Sách</th>
                </tr>
                <tr>
                    <td>Tên sách</td>
                    <td>
                        <input type="text" name="tensach">
                    </td>
                </tr>
                <tr>
                    <td>Tên tác giả</td>
                    <td>
                        <input type="text" name="tacgia">
                    </td>
                </tr>
                <tr>
                    <td>Nhà xuất bản</td>
                    <td>
                        <input type="text" name="nxb">
                    </td>
                </tr>
                <tr>
                    <td>Danh Mục</td>
                    <td>
                        <select name="theloai">
                            <?php
                            $tl = ds_theloai();
                            while($num = mysqli_fetch_array($tl))
                            {
                                ?>
                                <option value="<?php echo $num['id_theloai']; ?>"><?php echo $num['ten_theloai']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Hình ảnh</td>
                    <td>
                        <input type="file" name="anh">
                    </td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td>
                        <input type="text" name="soluong">
                    </td>
                </tr>
                <tr>
                    <td>Đơn giá</td>
                    <td>
                        <input type="text" name="dongia">
                    </td>
                </tr>
                <tr>
                    <td>Ghi chú</td>
                    <td>
                        <textarea name="ghichu" cols="25" rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">
                        <input type="submit" name="ok" value="Thêm" style="width: 80px; height: 40px">
                    </th>
                </tr>
            </table>
        </form>
    </div>
    <div class="footer"></div>
</div>
</body>
</html>