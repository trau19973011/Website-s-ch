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
			<h3>Quản lý tài khoản</h3>
			<table width="500px" border="1" cellspacing="0" cellpadding="0" style="margin: auto">
				<tr style="height: 40px;">
					<th>STT</th>
					<th>Tài khoản</th>
					<th>Địa chỉ</th>
					<th>Số điện thoại</th>
					<th>
						Tình trạng
					</th>
					<th>Mật Khẩu</th>
				</tr>
				<?php
					$stt = 1;
					$user = ds_user();
					while ($num = mysqli_fetch_array($user))
					{
				 ?>
				<tr style="height: 30px;">
					<th><?php echo $stt; ?></th>
					<td><?php echo $num['username']; ?></td>
					<td><?php echo $num['diachi']; ?></td>
					<td><?php echo $num['sodt']; ?></td>
					<th>
						<a href="sua_khachhang.php?iduser=<?php echo $num['id_user']; ?>">Sửa</a> - <a href="xoa_khachhang.php?iduser=<?php echo $num['id_user']; ?>" onClick ="if(confirm('Bạn chắc chắn muốn xóa')) return true; else return false;">Xóa</a>
					</th>
					<th><?php echo $num['password']; ?></th>
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