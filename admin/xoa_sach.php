<?php
require('function.php');
$idsach = $_GET['idsach'];
$xoa = xoa_sach($idsach);
if($xoa) header('location: list_sach.php');
else echo "<script>alert('Lỗi')</script>";
?>