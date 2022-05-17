<?php
require('function.php');
$idtl = $_GET['idtl'];
$xoa = xoa_theloai($idtl);
if($xoa) header('location: list_theloai.php');
else echo "<script>alert('Lỗi')</script>";
?>