<?php
require_once 'function.php';
session_start();
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../Public/bootstrap-3.3.7-dist/css/bootstrap.css">
        <script src="../Public/bootstrap-3.3.7-dist/js/jquery-3.2.1.js"></script>
        <script src="../Public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
        <script src="../Public/bootstrap-3.3.7-dist/js/jquery-3.2.0.min.js"></script>
        <script src="../Public/JS/navbar.js"></script>
        <link rel="stylesheet" href="../Public/fontawesome-free-5.12.1-web/css/all.css">
        <link href="https://fonts.googleapis.com/css2?family=Notable&family=Racing+Sans+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../Public/CSS/index3.css">
        <title></title>
    </head>

    <body class="body-all-ad">
   <div class="tong">
		<div class="header">
			<?php echo 'Xin chào ADMIN'."<br>"."<a href='dangxuat.php'>Thoát</a>"; ?>
		</div>
		<div class="menu" style="width: auto">
			<ul>
				<li><a href="index.php">Tài Khoản</a></li>
				<li><a href="list_theloai.php">Danh Mục</a></li>
				<li><a href="list_sach.php">Sách</a></li>
				<li><a href="list_donhang.php">Đơn hàng</a></li>
			</ul>
		</div>
	   <div class="content" style="height: 600px;">
		   <h3>Thống Kê</h3>
            <div class="row text-center statistical" id="right-admin-bottom">
                <div class="col-md-3 dash" style="width: 280px; padding-left: 10px;">
                    <?php
                    $tktk = tk_kh();
                    $t1 = mysqli_fetch_array($tktk);
                    ?>
                    <a href="index.php">
                        <div class="dash-text">
                            <b><?php echo number_format($t1['sltk'],0,',','.')?></b> <br>
                            <i>Tài khoản</i>
                        </div>
                        <div class="dash-icon tk">
                            <i class="fa fa-user" style="width: 70px;"></i>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 dash" style="width: 280px;">
                    <?php
                    $tkdm = tk_dm();
                    $t2 = mysqli_fetch_array($tkdm);
                    ?>
                    <a href="list_theloai.php">
                        <div class="dash-text">
                            <b><?php echo number_format($t2['sldm'],0,',','.')?></b> <br>
                            <i>Danh mục</i>
                        </div>
                        <div class="dash-icon dm">
                            <i class="fas fa-align-justify" style="width: 70px;"></i>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 dash" style="width: 280px;">
                    <?php
                    $tksp = tk_sp();
                    $t3 = mysqli_fetch_array($tksp);
                    ?>
                    <a href="list_sach.php">
                        <div class="dash-text">
                            <b><?php echo number_format($t3['slsp'],0,',','.')?></b> <br>
                            <i>Đầu Cuốn sách</i>
                        </div>
                        <div class="dash-icon sp" style="width: 70px;">
                            <i class="fab fa-product-hunt"></i>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 dash" style="width: 280px;">
                    <?php
                    $tkddh = tk_ddh();
                    $t4 = mysqli_fetch_array($tkddh);
                    ?>
                    <a href="list_donhang.php">
                        <div class="dash-text">
                            <b><?php echo number_format($t4['slddh'],0,',','.')?></b> <br>
                            <i>Đơn hàng</i>
                        </div>
                        <div class="dash-icon ddh" style="width: 70px;">
                            <i class="fa fa-cart-plus"></i>
                             </div>
                    </a>
                </div>
				<div class="col-md-3 dash" style="width: 280px;">
                    <?php
                    $tkddh = tk_dh();
                    $t4 = mysqli_fetch_array($tkddh);
                    ?>
                        <div class="dash-text">
                            <b><?php echo number_format($t4['doanhthu'],0,',','.')?></b> <br>
                            <i>Doanh Thu</i>
                        </div>
                        <div class="dash-icon doanhthu" style="width: 70px;">
                            <i class="fa fa-money-bill"></i>
                             </div>
                    </a>
                </div>
                <div class="col-md-3 dash" style="width: 280px;">
                    <?php
                    $tkht = tk_tongsosach();
                    $t5 = mysqli_fetch_array($tkht);
                    ?>
                    <a href="list_hangtonkho.php">
                        <div class="dash-text">
                            <b><?php echo number_format($t5['tongsosach'],0,',','.')?></b> <br>
                            <i>Tổng Số Sách Còn Lại</i>
                        </div>
                        <div class="dash-icon doanhthu" style="width: 70px;">
                            <i class="fa fa-book-open"></i>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 dash" style="width: 280px;">
                    <?php
                    $tkht = tk_sachdaban();
                    $t6 = mysqli_fetch_array($tkht);
                    ?>
                        <div class="dash-text">
                            <b><?php echo number_format($t6['sachdaban'],0,',','.')?></b> <br>
                            <i>Tổng Số Sách Đã Bán</i>
                        </div>
                        <div class="dash-icon doanhthu" style="width: 70px;">
                            <i class="fa fa-book-reader"></i>
                        </div>
                    </a>
                </div>
            </div>
			</table>
		</div>
	   <div class="footer">
		</div>
	</div>
    <!--  Footer  -->
    </body>
    </html>