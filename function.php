<?php
	require("connect.php");
	function dangnhap($user,$pass)
	{
		global $conn;
		connect();
		$sql = "SELECT * FROM user WHERE username =  '$user' AND password = '$pass'";
		$q = mysqli_query($conn,$sql);
		return $q;
		}
	function dangky($user,$pass,$diachi,$sodt)
	{
        global $conn;
        connect();
		$sql = "INSERT INTO user(username,password,diachi,sodt) VALUES('$user','$pass','$diachi','$sodt')";
		$q = mysqli_query($conn,$sql);
		if($q) return true;
		else return false;
		}
	function kttk($user)
	{
        global $conn;
        connect();
		$sql = "SELECT * FROM user WHERE username =  '$user'";
		$q = mysqli_query($conn,$sql);
		return $q;
		}
	function lay_theloai()
	{
        global $conn;
        connect();
		$sql = "SELECT * FROM theloai";
		$q = mysqli_query($conn,$sql);
		return $q;
		}
	function sach_theloai($id)
	{
        global $conn;
        connect();
		$sql = "SELECT * FROM sach WHERE id_theloai = $id ORDER BY id_sach DESC LIMIT 4";
		$q = mysqli_query($conn,$sql);
		return $q;
	}
	function tatca_sach($id)
	{
        global $conn;
        connect();
		$sql = "SELECT * FROM sach WHERE id_theloai = $id";
		$q = mysqli_query($conn,$sql);
		return $q;
	}
	function timkiem_sach($ten)
	{
        global $conn;
        connect();
		$sql = "SELECT * FROM sach WHERE tensach like'%$ten%'";
		$q = mysqli_query($conn,$sql);
		return $q;
	}
	function ten_theloai($id)
	{
		switch ($id) 
		{
			case 1: $ten = 'Sách văn học';  break;
			case 2: $ten = 'Truyện tranh'; break;
			case 3: $ten = 'Sách thiếu nhi'; break;
			case 4: $ten = 'Sách nấu ăn'; break;
			case 5: $ten = 'Sách khoa học'; break;
            case 6: $ten = 'Sách giáo khoa'; break;
            case 7: $ten = 'Truyện ngôn tình'; break;

        }
		return $ten;

	}
	function chitiet_sach($id)
	{
        global $conn;
        connect();
		$sql = "SELECT * FROM sach WHERE id_sach = $id";
		$q = mysqli_query($conn,$sql);
		return $q;
	}
	function them_giohang($iduser,$idsach,$soluong)
	{
        global $conn;
        connect();
		$sql = "INSERT INTO giohang(id_user,id_sach,soluong) VALUES($iduser,$idsach,$soluong)";
		$q = mysqli_query($conn,$sql);
		if($q) return true;
		else return false;
	}
	// kiểm tra sách trong giỏ hàng
	function sach_giohang($iduser,$idsach)
	{
        global $conn;
        connect();
		$sql = "SELECT * FROM giohang WHERE id_user = $iduser AND id_sach = $idsach";
		$q = mysqli_query($conn,$sql);
		return $q;
	}
	function capnhat_sl($id,$soluong)
	{
        global $conn;
        connect();
		$sql = "UPDATE giohang SET soluong = $soluong WHERE id_giohang = $id";
		$q = mysqli_query($conn,$sql);
		if($q) return true;
		else return false;
	}
	function thongtin_giohang($iduser)
	{
        global $conn;
        connect();
		$sql = "SELECT id_giohang, giohang.id_sach, hinhanh, tensach, dongia, giohang.soluong, (dongia * giohang.soluong) AS thanhtien FROM giohang,sach WHERE id_user = $iduser AND
		sach.id_sach = giohang.id_sach";
		$q = mysqli_query($conn,$sql);
		return $q;
	}
	function xoa_giohang($id)
	{
		global $conn;
        connect();
		$sql = "DELETE FROM giohang WHERE id_giohang = $id";
		$q = mysqli_query($conn,$sql);
		if($q) return true;
		else return false;
	}
	function muahang($iduser)
	{
        global $conn;
        connect();
		$sql = "INSERT INTO muahang(id_user,ngaymua) VALUES($iduser,now())";
		$q = mysqli_query($conn,$sql);
		if($q) return true;
		else return false;
	}
	function chitietmuahang($id,$idsach,$soluong,$thanhtien)
	{
        global $conn;
        connect();
		$sql = "INSERT INTO chitietmuahang(id_muahang,id_sach,soluong,thanhtien) VALUES($id,$idsach,$soluong,$thanhtien)";

		$q = mysqli_query($conn,$sql);
		if($q) return true;
		else return false;
	}
	function donhang($id)
	{
        global $conn;
        connect();
		$sql = "SELECT * FROM muahang WHERE id_user = $id";
		$q = mysqli_query($conn,$sql);
		return $q;
	}
	function chitietdh($id)
	{
        global $conn;
        connect();
		$sql = "SELECT sach.tensach, chitietmuahang.soluong, thanhtien FROM chitietmuahang,sach WHERE chitietmuahang.id_sach = sach.id_sach AND id_muahang = $id";
		$q = mysqli_query($conn,$sql);
		return $q;
	}
	function xoa_donhang($id)
	{
        global $conn;
        connect();
		$sql = "DELETE FROM muahang WHERE id_muahang = $id";
		$q = mysqli_query($conn,$sql);
		if($q) return true;
		else return false;
	}
function giam_soluong($id,$soluong)
{
    global $conn;
    connect();
    $sql = "UPDATE sach SET soluong = soluong - $soluong WHERE id_sach = $id";
    $q = mysqli_query($conn,$sql);
    if($q) return true;
    else return false;
}
function tang_soluong($id,$soluong)
{
    global $conn;
    connect();
    $sql = "UPDATE sach SET soluong = soluong + $soluong WHERE id_sach = $id";
    $q = mysqli_query($conn,$sql);
    if($q) return true;
    else return false;
}
 ?>