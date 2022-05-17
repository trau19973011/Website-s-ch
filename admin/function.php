<?php
require('../connect.php');

/* KHÁCH HÀNG */
function ds_user()
{
    global $conn;
    connect();
    $sql = "SELECT * FROM user WHERE level = 2";
    $q = mysqli_query($conn,$sql);
    return $q;
}
function xoa_user($id)
{
    global $conn;
    connect();
    $sql = "DELETE FROM user WHERE id_user = '$id'";
    $q = mysqli_query($conn,$sql);
    if($q) return true;
    else return false;
}
function user($id)
{
    global $conn;
    connect();
    $sql = "SELECT * FROM user WHERE id_user = $id";
    $q = mysqli_query($conn,$sql);
    return $q;
}
function sua_user($id,$username,$password,$diachi,$sodt)
{
    global $conn;
    connect();
    $sql = "UPDATE user SET username = '$username', password = '$password', diachi = '$diachi', sodt = '$sodt' WHERE id_user = $id";
    $q = mysqli_query($conn,$sql);
    if($q) return true;
    else return false;
}
/* ===========*/

/* THỂ LOẠI */
function ds_theloai()
{
    global $conn;
    connect();
    $sql = "SELECT * FROM theloai";
    $q = mysqli_query($conn,$sql);
    return $q;
}
function theloai($id)
{
    global $conn;
    connect();
    $sql = "SELECT * FROM theloai WHERE id_theloai = $id";
    $q = mysqli_query($conn,$sql);
    return $q;
}
function them_theloai($ten)
{
    global $conn;
    connect();
    $sql = "INSERT INTO theloai(ten_theloai) VALUES('$ten')";
    $q = mysqli_query($conn,$sql);
    if($q) return true;
    else return false;
}
function sua_theloai($id,$ten)
{
    global $conn;
    connect();
    $sql = "UPDATE theloai SET ten_theloai = '$ten' WHERE id_theloai = $id";
    $q = mysqli_query($conn,$sql);
    if($q) return true;
    else return false;
}
function xoa_theloai($id)
{
    global $conn;
    connect();
    $sql = "DELETE FROM theloai WHERE id_theloai = '$id'";
    $q = mysqli_query($conn,$sql);
    if($q) return true;
    else return false;
}
/* ============ */

/* SÁCH */
function ds_sach()
{
    global $conn;
    connect();
    $sql = "SELECT * FROM sach, theloai WHERE sach.id_theloai = theloai.id_theloai ORDER BY id_sach DESC";
    $q = mysqli_query($conn,$sql);
    return $q;
}
function sach($id)
{
    global $conn;
    connect();
    $sql = "SELECT * FROM sach, theloai WHERE sach.id_theloai = theloai.id_theloai AND id_sach = $id";
    $q = mysqli_query($conn,$sql);
    return $q;
}
function them_sach($ten,$tacgia,$nxb,$theloai,$hinhanh,$soluong,$dongia,$ghichu)
{
    global $conn;
    connect();
    $sql = "INSERT INTO sach(tensach,tacgia,nxb,id_theloai,hinhanh,soluong,dongia,ghichu) VALUES('$ten','$tacgia','$nxb','$theloai','$hinhanh',$soluong,$dongia,'$ghichu')";
    $q = mysqli_query($conn,$sql);
    if($q) return true;
    else return false;
}
function sua_sach($id,$ten,$tacgia,$nxb,$theloai,$hinhanh,$soluong,$dongia,$ghichu)
{
    global $conn;
    connect();
    $sql = "UPDATE sach SET tensach = '$ten', tacgia = '$tacgia', nxb = '$nxb', id_theloai = $theloai, hinhanh = '$hinhanh', soluong = $soluong, dongia = $dongia, ghichu = '$ghichu' WHERE id_sach = $id";
    $q = mysqli_query($conn,$sql);
    if($q) return true;
    else return false;
}
function sua_sach1($id,$ten,$tacgia,$nxb,$theloai,$soluong,$dongia,$ghichu)
{
    global $conn;
    connect();
    $sql = "UPDATE sach SET tensach = '$ten', tacgia = '$tacgia', nxb = '$nxb', id_theloai = $theloai,soluong = $soluong, dongia = $dongia, ghichu = '$ghichu' WHERE id_sach = $id";
    $q = mysqli_query($conn,$sql);
    if($q) return true;
    else return false;
}
function xoa_sach($id)
{
    global $conn;
    connect();
    $sql = "DELETE FROM sach WHERE id_sach = $id";
    $q = mysqli_query($conn,$sql);
    if($q) return true;
    else return false;
}
/* ============= */

/* ĐƠN HÀNG */
function list_donhang()
{
    global $conn;
    connect();
    $sql = "SELECT id_muahang, user.username, user.diachi, user.sodt, ngaymua FROM muahang,user WHERE user.id_user = muahang.id_user";
    $q = mysqli_query($conn,$sql);
    return $q;
}
function chitiet_donhang($id)
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
    $sql = "DELETE FROM muahang WHERE id_muahang = '$id'";
    $q = mysqli_query($conn,$sql);
    if($q) return true;
    else return false;
}
function tk_kh(){
    global $conn;
    connect();
    $sql = "SELECT count(id_user) as sltk from user";
    $query = mysqli_query($conn, $sql);
    return $query;
}
function tk_dm(){
    global $conn;
    connect();
    $sql = "SELECT count(id_theloai) as sldm from theloai";
    $query = mysqli_query($conn, $sql);
    return $query;
}
function tk_sp(){
    global $conn;
    connect();
    $sql = "SELECT count(id_sach) as slsp from sach";
    $query = mysqli_query($conn, $sql);
    return $query;
}
function tk_ddh(){
    global $conn;
    connect();
    $sql = "SELECT count(id_muahang) as slddh from muahang";
    $query = mysqli_query($conn, $sql);
    return $query;
}
function tk_dh(){
    global $conn;
    connect();
    $sql = "SELECT sum(thanhtien) as doanhthu from chitietmuahang";
    $query = mysqli_query($conn, $sql);
    return $query;
}
function  tk_tongsosach(){
    global $conn;
    connect();
    $sql = "SELECT (sum(sach.soluong)) as tongsosach from sach";
    $query = mysqli_query($conn, $sql);
    return $query;
}
function tk_sachdaban(){
    global $conn;
    connect();
    $sql = "SELECT sum(chitietmuahang.soluong) as sachdaban from chitietmuahang";
    $query = mysqli_query($conn, $sql);
    return $query;
}
function tk_hangtonkho(){
    global $conn;
    connect();
    $sql = "SELECT (sum(sach.soluong) - sum(chitietmuahang.soluong)) as hangtonkho from sach,chitietmuahang where sach.id_sach = chitietmuahang.id_sach ";
    $query = mysqli_query($conn, $sql);
    return $query;
}
?>