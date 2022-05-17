<?php
	require("function.php");
	$id = $_GET['iddh'];
	$donhang = chitietdh($id);
	//Tăng số lương
while ($num = mysqli_fetch_array($donhang)){
    $tang_soluong = tang_soluong($num['id_sach'],$num['soluong']);
}
	$xoa = xoa_donhang($id);
	if($xoa) header('location: donhang.php');
	else echo "<script>alert('Lỗi')</script>";
 ?>