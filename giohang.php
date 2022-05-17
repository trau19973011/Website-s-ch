<?php
	session_start();
	require('function.php');
	if(!isset($_SESSION['id_user']))
	{
		header('location: trangchu.php');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Bán sách</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="Public/bootstrap-3.3.7-dist/css/bootstrap.css">
</head>
<body>
	<div class="tong">
		<div class="header" style="background: #393E41">
			<div class="banner-top"><img src="img/12.PNG" style="width: 1200px; height: 70px"></div>
			<div class="thongtin">
				<div class="email">
					<a href="trangchu.php" style="text-decoration: none; color: #F7941E;padding-left: -02px"><img src="img/logo1.jpg" style="height: 70px"></a>
				</div>
				<div class="taikhoan">
					<a href="#"><img src="img/vietnam.png"></a>
					<a href="#"><img src="img/english.png"></a>
					<a href="#"><img src="img/japan.png"></a>
					<a href="dangky.php" style="color: white; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">Tạo tài khoản</a>
                    <?php
						if(isset($_SESSION['username']))
						{
							echo "<span style='color: violet'>".$_SESSION['username']."</span>"."<a href='dangxuat.php' style='border-right: none; font-size: 12px;'> Thoát</a>";
							}
						else
						{
					 ?>
							<a href="dangnhap.php" style="border-right: none; color: white; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">Đăng nhập</a>
                     <?php } ?>
				</div>
			</div>
		</div>
		<div class="menu-banner">
			<div class="menu">
				<ul>
					<li style="font-size: 22px; color: #FFF; background-color: #6a6a6a; width: 300px">
						Danh mục
					</li>
                    <?php
						$theloai = lay_theloai();
						while($num = mysqli_fetch_array($theloai))
						{
					 ?>
					<li><a href="theloai.php?idtl=<?php echo $num['id_theloai']; ?>"><?php echo $num['ten_theloai']; ?></a></li>
                    <?php } ?>
				</ul>
                <div style="border: 1px;">
                    <?php
                    // Mở và thống kê số lượt ghi trong file.txt
                    $fp = "dem.txt";
                    $fo = fopen($fp, 'r');
                    $fr = fread($fo, filesize($fp));
                    $fr++;
                    $fc = fclose($fo);
                    // mở ghi lại số lượt bằng thuộc tính w và w++
                    $fo = fopen($fp, 'w');
                    $fw = fwrite($fo, $fr);
                    $fc = fclose($fo);

                    ?>
                    <h4 style="background-color: grey; color: white">Thống kê truy cập</h4>
                    <p>Hiện có <span style="color: red"> <?php echo $fr?> </span> người đang truy cập</p>
                </div>
			</div>
			<div class="banner">
				<div class="search-box">
					<div class="search">
						<form method="post" action="timkiem.php">
							<input type="text" name="search" placeholder="Tìm kiếm sách...">
							<input type="submit" name="timkiem" value="Tìm kiếm">
						</form>
					</div>			
					<div class="giohang">

						<a href="giohang.php">
							Giỏ hàng
						</a>
					</div>
				</div>
				<div class="banner-main">
					<img src="img/banner.jpg" width="800px" height="369px">
				</div>
			</div>
		</div>
        <div class="anime">
            <img src="img/doraemon.png"><img src="img/dragonball.png"><img src="img/onepiece.png"><img src="img/shin.png">
        </div>
		<div class="content">
			<a href="donhang.php">Xem các đơn hàng đã đặt</a>
			<form method="post">
			<table bgcolor="#FFF" width="1200px" border="1" bgcolor="#CCC" cellspacing="1" style="color: #666;text-align: center">
				<tr>
					<th colspan="6" style="height: 50px; font-size: 30px; color: #c00;text-align: center">GIỎ HÀNG</th>
				</tr>
				<tr height="30px">
					<th>Hình ảnh</th>
					<th style="text-align: center">Tên sản phẩm</th>
					<th width="150px" style="text-align: center">Giá</th>
					<th style="text-align: center">Số lượng</th>
					<th style="text-align: center">Thành tiền</th>
					<th width="80px" style="text-align: center">Gỡ bỏ</th>
				</tr>
				<?php
					$mang = array();
					$tongtien = 0;
					$kt_giohang = thongtin_giohang($_SESSION['id_user']);
					if(mysqli_num_rows($kt_giohang) != 0)
					{
						while ($row = mysqli_fetch_array($kt_giohang))
						{
							$mang[] = array((int)$row['id_sach'],(int)$row['soluong'],(int)$row['thanhtien']);		 
					?>
				<tr>
					<th style="text-align: center"><img src="img/<?php echo $row['hinhanh']; ?>" width="75px" height="75px" style="text-align: center"></th>
					<th style="text-align: center"><?php echo $row['tensach']; ?></th>
					<th style="color: #c00;text-align: center"><?php echo $row['dongia']; ?> đ</th>
					<th style="text-align: center">
							<?php echo $row['soluong']; ?>
					</th>
					<th style="color: #c00;text-align: center"><?php echo $row['thanhtien']; ?> đ</th>
					<th style="text-align: center"><a href="xoagiohang.php?idgh=<?php echo $row['id_giohang']; ?>" style="text-decoration: none">X</a></th>
				</tr>
				<?php 
							$tongtien += $row['thanhtien']; 
						} 
					}
				?>
			</table>
			<div style="margin-top: 10px; text-align: center; height: 50px; line-height: 50px ">
				<a href="trangchu.php" style="padding: 10px; background: #FF99CC; color: #FFFFFF; text-decoration: none">Chọn thêm</a>
				<span style="color: #c00; font-size: 18px; font-weight: bold; margin: 0px 50px">Tổng tiền: <?php echo $tongtien; ?> đ</span>
				<input type="submit" name="datmua" value="Đặt mua" style="width: 100px; height: 34px; border: none; background: #F7941E; color: #FFF">
			</div>
			</form>
        </div>
       <div class="footer" style="background: #393E41">
            <div class="footer-info">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="footer-logo">
                                <a href="#">
                                    <img src="img/logo1.jpg" alt="" style="background-color: #c8bca7;margin-top: 5px;height: 80px">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <h4 class="title">
                               <span style="color: white; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">Thông tin</span>
                                <span style="color: white; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"> liên lạc</span>
                            </h4>
                            <p>
                                 <span style="vertical-align: inherit;" style="color: white; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">Số 08, Nguyễn Trãi, Hà Nội, Việt Nam</span>
                            </p>
                            <p>
                                <span style="vertical-align: inherit;" style="color: white; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">Gọi cho chúng tôi: (084) 1900 1008</span>
                            </p>
                            <p>
                                <span style="vertical-align: inherit;" style="color: white; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">Email: michael@leebros.us</span>
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <h4 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit; color: white; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">Hỗ trợ</font><font style="vertical-align: inherit; color: white; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"> khách hàng</font></font><strong><font style="vertical-align: inherit;"></font></strong></h4>
                            <ul class="support">
                                <li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit; color: white; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">Câu hỏi thường gặp</font></font></a></li>
                                <li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit; color: white; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">Phương thức thanh toán</font></font></a></li>
                                <li><a href="#"><font style="vertical-align: inherit; color: white"><font style="vertical-align: inherit; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">Mẹo đặt phòng</font></font></a></li>
                                <li><a href="#"><font style="vertical-align: inherit; color: white"><font style="vertical-align: inherit; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">Thông tin</font></font></a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                           <h4 class="title">
                                <span style="vertical-align: inherit; color: white; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">Nhận bản </span>
                                <b><span style="vertical-align: inherit; color: white; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">tin</span></b>
                                <span style="vertical-align: inherit; color: white; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"> của chúng tôi</span>
                            </h4>
                            <form class="newsletter">
                                <input type="text" name="" placeholder="Type your email...." style="height: 35px;border-radius: 6px;">
                                <span style="vertical-align: inherit;"><input type="submit" value="Đăng ký" class="button btn btn-danger"></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
	<?php
    global $conn;
		if(isset($_POST['datmua']))
		{
			if(empty($mang))
			{
				echo "<script>alert('Giỏ hàng trống')</script>";
			}
			else
			{
				$donhang = muahang($_SESSION['id_user']);
				if($donhang)
				{
					$idmh = mysqli_insert_id($conn);
					foreach ($mang as $key => $value) 
					{
						$chitiet = chitietmuahang($idmh,$value[0],$value[1],$value[2]);
					}
					
					if($chitiet) {
					    echo "<script>alert('Đặt hàng thành công')</script>";
					    foreach ($mang  as $key => $value){
					        $giam_soluong = giam_soluong($value[0], $value[1]);
                        }
                    }
					else echo "<script>alert('Đặt hàng thất bại')</script>";
				}
				else
				{
					echo "<script>alert('Lỗi')</script>";
				}
			}
		}
	 ?>
</body>
</html>