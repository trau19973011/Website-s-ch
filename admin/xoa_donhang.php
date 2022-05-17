<?php
require('function.php');
$iddh = $_GET['iddh'];
$xoa = xoa_donhang($iddh);
if($xoa) header('location: list_donhang.php');
else echo "<script>alert('Lỗi')</script>";
?>