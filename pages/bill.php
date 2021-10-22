<?php 
	session_start();
	include "thu_vien.php";

	if (isset($_POST['dongydathang'])&&($_POST['dongydathang'])) {
		//lấy thông tin từ form để tạp đơn hàng
		$ho_ten=$_POST['hoten'];
		$dia_chi=$_POST['diachi'];
		$sdt=$_POST['sdt'];
		$tong_tien=tongtien();
		$pttt=0;
	}

	// insert thong tin vào bảng tbl_bill
	$idbill=taodonhang($ho_ten, $dia_chi, $sdt, $tong_tien, $pttt);
	//Lấy thông tin từ giỏ hàng từ session và id đơn hàng vừa tạo
	//Insert vào bảng tbl_cart
	for ($i=0; $i < sizeof($_SESSION['gio_hang']); $i++) { 
		$tensp=$_SESSION['gio_hang'][$i][0];
		$hinhsp=$_SESSION['gio_hang'][$i][3];
		$don_gia=$_SESSION['gio_hang'][$i][1];
		$so_luong=$_SESSION['gio_hang'][$i][2];
		$thanh_tien=$don_gia * $so_luong;
			include("config.php");
		$sql = "

                INSERT INTO `tbl_cart` (`id`, `tensp`, `hinhsp`, `don_gia`, `so_luong`, `thanh_tien`, `idbill`) VALUES (NULL, '".$tensp."', '".$hinhsp."', '".$don_gia."', '".$so_luong."', '".$thanh_tien."', '".$idbill."')
                ";
                //3. Thực thi câu lệnh lấy dữ liệu mong muốn
                $tao_gio_hang = mysqli_query($ket_noi, $sql);
		//taogiohang($tensp, $hinhsp, $don_gia, $so_luong, $thanh_tien,$idbill);
	}
	//unset giỏ
	unset($_SESSION['gio_hang']);

	//echo "Tạo đơn hàng thành công";
	//Hiện đơn hàng
 ?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>ThewayShop - Shop quần áo thời trang nam nữ đẹp nhất Hà Nội</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> Sale 10%! Mua sắm ngay các bạn ơi!
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% Cho các loại quần áo
                                </li>
                                
                                <li>
                                    <i class="fab fa-opencart"></i> Sale 50% Khi mua các sản phẩm
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Sale 10%! Mua sắm ngay các bạn ơi!
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% Cho các loại quần áo
                                </li>
                                
                                <li>
                                    <i class="fab fa-opencart"></i> Sale 50%! Khi mua các sản phẩm
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                    <div class="our-link" >
                        <ul>
                           <li><a href="#">Tel: 0386487652-0936548254</a></li>
                            <li><a href="#">Time: 7Am-11Pm</a></li>
                            <li><a href="ds_yeu_thich.php">Danh sách yêu thích</a></li>
                            <li><a href="tai_khoan.php">Đăng nhập</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="trang_chu.php"><img src="images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="trang_chu.php">Trang chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="gioi_thieu.php">Giới thiệu</a></li>
                        <li class="dropdown megamenu-fw">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Sản phẩm</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                <li>
                                    <div class="row">
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">Áo Mùa Hè</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="san_pham.php">Áo Polo</a></li>
                                                    <li><a href="san_pham.php">Áo Sơ mi</a></li>
                                                    <li><a href="san_pham.php">Áo Phông</a></li>
                                                    <li><a href="san_pham.php">Áo Tanktop</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">Áo Mùa Đông</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="san_pham.php">Áo Khoác Len</a></li>
                                                    <li><a href="san_pham.php">Áo Len</a></li>
                                                    <li><a href="san_pham.php">Áo Blazer</a></li>
                                                    <li><a href="san_pham.php">Áo Khoác</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">Sản phẩm khác</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="san_pham.php">Sơ Mi Thiết Kế</a></li>
                                                    <li><a href="san_pham.php">Áo Khoác Bò</a></li>
                                                    <li><a href="san_pham.php">Bộ Nỉ</a></li>
                                                    <li><a href="san_pham.php">Áo Nỉ Dài Tay</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">Quần</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="san_pham.php">Quần nỉ</a></li>
                                                    <li><a href="san_pham.php">Quần âu</a></li>
                                                    <li><a href="san_pham.php">Quần kaki</a></li>
                                                    <li><a href="san_pham.php">Quần jeans</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown active">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
                                <li><a href="gio_hang.php">Giỏ hàng</a></li>
                                <li><a href="thanh_toan.php">Thanh toán</a></li>
                                <li><a href="tai_khoan.php">Tài khoản</a></li>
                                <li><a href="ds_yeu_thich.php">Danh sách yêu thích</a></li>
                                <li><a href="Chi_tiet_san_pham.php">Chi tiết sản phẩm</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="dich_vu.php">Dịch vụ</a></li>
                        <li class="nav-item"><a class="nav-link" href="lien_he.php">Liên hệ</a></li>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#">
						<i class="fa fa-shopping-bag"></i>
                            <span class="badge">3</span>
					</a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="gio_hang.php" class="btn btn-default hvr-hover btn-cart">Xem giỏ hàng</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Thanh toán</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Thanh toán</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Địa chỉ thanh toán</h3>
                        </div>
                        <form class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="address">Họ và tên: </label>
                                <label><?php echo $ho_ten ?></label>
                            </div>
                            <div class="mb-3">
                                <label for="address">Địa chỉ: </label>
                                <label><?php echo $dia_chi ?></label>
                            </div>
                            <div class="mb-3">
                                <label for="address2">Số điện thoại: </label>
								<label><?php echo $sdt ?></label>
                            <hr class="mb-4">
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Đơn hàng</h3>
                                </div>
                                    <div class="table-main table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Ảnh</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th>Tổng</th>
                                                <th>Xóa</th>
                                            </tr>
                                        </thead>


                            <?php showgiohang(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->


    <!-- Start Footer  -->
    <footer>
         <div class="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="footer-widget">
                                <h4>Giới thiệu Thewayshop</h4>
                                <p>Thewayshop chuyên cung cấp mẫu quần áo chất lượng. Với dòng sản phẩm đạt chất lượng cao, giá cả hợp lý. Mọi người liên hệ SHop ngay để được nhân viên tư vấn.
                                    </p>
                                <ul>
                                    <li><a href="https://www.facebook.com/windstore.sneakers"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="footer-link-contact">
                                <h4>Danh sách cửa hàng</h4>
                                <ul>
                                    <li><p> Cs1: 1 Tôn Thất Tùng, Đống Đa, Hà Nội </p></li>
                                    <li><p> Cs2: 378 Đường Láng, Láng Hạ, Đống Đa</p></li>
                                    <li><p> Cs3: 300 Lê Trọng Tấn, Thanh Xuân, Hà Nội</p></li>
                                    <li><p> Cs4: 36 Đường Cầu Giấy, Quan Hoa, Cầu Giấy, Hà Nội</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="footer-link-contact">
                                <h4>Liên hệ</h4>
                                <ul>
                                    <li>
                                        <p><i class="fas fa-map-marker-alt"></i>Địa chỉ cơ sở chính: Ngã Tư Sở, Quận Đống Đa, Tp Hà Nội </p>
                                    </li>
                                    <li>
                                        <p><i class="fas fa-phone-square"></i>SĐT: <a href="tel:0386487652">0386487652</a></p>
                                    </li>
                                    <li>
                                        <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">thewayshop@gmail.com</a></p>
                                    </li>
                                    <li>
                                        <p><i class="fab fa-facebook"></i>Fanpage:<a href="https://www.facebook.com/windstore.sneakers">https://www.facebook.com/windstore.sneakers</a></p>
                                    </li>
                                    <li>
                                    <p><i class="fab fa-instagram"></i>Instagram:https://www.instagram.com/thewayshop/<a href="#"></a></p>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company"> <a href="trang_chu.php">ThewayShop</a></p>
            
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>