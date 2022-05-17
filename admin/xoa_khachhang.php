<?php
require('function.php');
$iduser = $_GET['iduser'];
$xoa = xoa_user($iduser);
if($xoa) header('location: index.php');
else echo "<script>alert('Lỗi')</script>";
?>