<?php
	require("function.php");
	$id = $_GET['idgh'];
	$xoa = xoa_giohang($id);
	if($xoa) header('location: giohang.php');
	else echo "<script>alert('Lỗi')</script>";
 ?>