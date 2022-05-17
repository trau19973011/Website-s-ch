<?php
	session_start();
	require('function.php');
 ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="Public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
<title>Đăng nhập</title>
</head>
<body>
<!--header-->
<div class="tong" style="background: #393E41">
    <div class="header">
        <div class="banner-top"><img src="img/12.PNG" style="width: 1200px; height: 70px"></div>
        <div class="thongtin">
            <div class="email" style="background: #393E41">
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
<!--    body-->
<div class="container">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="dangnhap.php" id="form_login" method="post">
                    <div class="modal-header">
                        <h3 style="margin-left: 220px">Đăng nhập</h3>
                    </div>
                    <br>
                    <div class="modal-body" >
                        <div class="form-group" style="margin: auto;">
                            <label for="">Tài khoản</label>
                            <input type="text" name="user" id="user" placeholder="Tên đăng nhập">
                        </div>
                        <div class="form-group">
                            <label for=""> Mật khẩu </label>
                            <input type="password" name="pass" id="password" placeholder="Mật khẩu" style="margin-left: 3px">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class=" btn btn-primary btn-click" name="OK" value="Đăng nhập"
                        </div>

                    </div>
                </form>

            </div>
        </div>
</div>
        <?php
			if(isset($_POST['OK']))
			{
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				$ktra = dangnhap($user,$pass);
				if(mysqli_num_rows($ktra) !=0)
				{
					$num = mysqli_fetch_array($ktra);
					$level = $num['level'];
					if($level == 2)
					{
						$_SESSION['id_user']= $num['id_user'];
						$_SESSION['username']= $user;
						header('location:trangchu.php');
					}
					else
					{
						$_SESSION['level'] = $level;
						header('location:admin/index.php');

					}
				}
				else
				{ 	
					echo "<script> alert ('Bạn dã nhập sai tên tài khoản hoặc mật khẩu')</script>";
				}
			}
		 ?>
     <?php
//     $user = $pass = '';
//     $user = $_POST['user'];
//     echo $user;
     ?>
    <!--    footer-->
</body>
</html>