<?php
	require("function.php");
 ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Đăng ký</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="Public/bootstrap-3.3.7-dist/css/bootstrap.css">
</head>
<body>
	<?php
		if(isset($_POST['OK']))
		{
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			$diachi = $_POST['diachi'];
			$sodt = $_POST['sodt'];
			if(empty($user) || empty($pass) || empty($diachi) || empty($sodt))
			{
				echo "<script>alert('Phải nhập đầy đủ thông tin')</script>";
			}
			else
			{
				$kt = kttk($user);
				if(mysqli_num_rows($kt) != 0)
				{
					echo "<script>alert('Tài khoản đã tồn tại')</script>";
					}
				else
				{
					$dangky = dangky($user,$pass,$diachi,$sodt);
					if($dangky == true)
					{
						header('location: dangnhap.php');
					}
					else
					{
						echo "<script>alert('Lỗi')</script>";
					}
				}
			}
		}
	 ?>
    <div class="tong" style="background: #393E41">
        <div class="header">
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
        <div class="container">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="dangky.php"  method="post">
                        <div class="modal-header">
                            <h3>Đăng ký</h3>
                        </div>
                        <br>
                        <div class="modal-body" style="margin-left: 120px;">
                            <div class="form-group">
                                <label for="">Tên tài khoản</label>
                                <input type="text" name="user" id="user" placeholder="Tên đăng nhập" style="margin-left: 5px">
                            </div>
                            <div class="form-group">
                                <label for=""> Mật khẩu </label>
                                <input type="password" name="pass" id="password" placeholder="Mật khẩu" style="margin-left: 36px;">
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" name="diachi" id="address" placeholder="Địa chỉ" style="margin-left: 54px;">
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" name="sodt" id="phone" placeholder="Số điện thoại" style="margin-left: 10px">
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class=" btn btn-primary btn-click" name="OK" value="Đăng kí"
                            </div>

                        </div>
                    </form>

                </div>
            </div>
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