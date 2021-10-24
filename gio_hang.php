<?php
    session_start();

    include "thu_vien.php";

    if(!isset($_SESSION['gio_hang'])) $_SESSION['gio_hang']=[];
    //xóa giỏ hàng
    if (isset($_GET['delgiohang'])&&($_GET['delgiohang']==1)) {
        unset($_SESSION['gio_hang']);
    }
    //xóa sản phẩm trong giỏ hàng
    if (isset($_GET['delid'])&&($_GET['delid']>=0)){
        array_splice($_SESSION['gio_hang'],$_GET['delid'],1 );
    }
    //lấy dữ liệu từ form
    if (isset($_POST['addcart'])&&($_POST['addcart'])) {
        $tensanpham=$_POST['tensanpham'];
        $giaban=$_POST['giaban'];
        $soluong=$_POST['soluong'];
        $anhminhhoa=$_POST['anhminhhoa'];
        //kiểm tra sp có trong giỏ hàng hay không
        $fl = 0; // kiểm tra xem sản phẩm có trùng trong giỏ hàng không

        for ($i=0; $i < sizeof($_SESSION['gio_hang']); $i++) { 
            if ($_SESSION['gio_hang'][$i][0]==$tensanpham) {
                $fl=1;
                $soluongnew = $soluong+$_SESSION['gio_hang'][$i][2];
                $_SESSION['gio_hang'][$i][2] = $soluongnew;
                break;
            }
        }//nếu không trùng sản phẩm trong giỏ hàng thì thêm mới
        if ($fl==0) {
            // thêm mới sp vào giỏ hàng
            $sp=[$tensanpham,$giaban,$soluong,$anhminhhoa];
            $_SESSION['gio_hang'][] = $sp;
        }

            

        
        var_dump($_SESSION['gio_hang']);
    }

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
                <?php
                // 1. Load file cấu hình để kết nối đến máy chủ CSDL 
                include("config.php");
                  
                // 2. Viết câu lệnh truy vấn lấy ra được dữ liệu mong muốn (TIN TỨC đã lưu trong CSDL)
                $id_san_pham = $_GET["id"];
                $id_san_pham_moi = $_GET["id"];
                $ten_san_pham = $_POST['tensanpham'];
                $gia_ban = $_POST['giaban'];


                $sql1 = "SELECT * 
                FROM tbl_san_pham 
                WHERE id_san_pham = '".$id_san_pham."'
                ";
                $sql2 = "SELECT * 
                FROM tbl_san_pham_moi 
                WHERE id_san_pham_moi = '".$id_san_pham_moi."'
                ";

                //3. Thực thi câu lệnh lấy dữ liệu mong muốn
                $noi_dung_san_pham = mysqli_query($ket_noi, $sql1);
                $noi_dung_san_pham_moi = mysqli_query($ket_noi, $sql2);
                //var_dump($noi_dung_tin_tuc);
/*
                if (isset($_GET["id"])) {
                    $id =$_GET["id"];
                    $_SESSION["cart"];

                    $sql = "SELECT * 
                    FROM tbl_san_pham 
                    WHERE id_san_pham = '".$id_san_pham."'
                    ";

                    $noi_dung_san_pham = mysqli_query($ket_noi, $sql);
                    $data = mysqli_fetch_array($noi_dung_san_pham);

                    if (!empty($_SESSION["cart"])) {
                        //ktra mua hang lan thu 2
                        if (array_key_exists($id, $cart)) {
                            $cart[$id] = array(
                                "sl"=>(int)$cart[$id]["sl"]+1,
                                "gia"=>$data[6],
                                "name"=>$data[1]
                                );
                        }else{
                        $cart[$id] = array(
                            "sl"=>1
                            "gia_ban"=>$data[6],
                            "name"=>$data[1]

                            );
                        }
                    }else{
                    $cart[$id] = array(
                        "sl"=>1
                        "gia"=>$data[6],
                        "name"=>$data[1]
                        );
                    }
                $_SESSION["cart"] = $cart;
                }
                
*/
                // 4. Hiển thị ra dữ liệu mà các bạn vừa lấy 
                while($row = mysqli_fetch_array($noi_dung_san_pham)) {
                    var_dump($sql1);
                    ;?>     
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="<?php echo $row['anh_minh_hoa_1'] ? 'images/'.$row['anh_minh_hoa_1'] : 'images/img-pro-01.jpg' ;?>" class="cart-thumb" alt="" /></a>
                            <h6><a href="#"><?php echo "$ten_san_pham"; ?> </a></h6>
                            <p>1x - <span class="price"><?php echo "$gia_ban"; ?></span></p>
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
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
                <?php
                  }
                ;?>
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
                    <h2>Giỏ hàng</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Giỏ hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
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
                            <tbody>

                            <?php showgiohang(); ?>
                                <!-- <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
									<img class="img-fluid" src="<?php echo $row['anh_minh_hoa_1'] ? 'images/'.$row['anh_minh_hoa_1'] : 'images/img-pro-01.jpg' ;?>" " alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
									<php <?php echo $ten_san_pham ?>
								</a>
                                    </td>
                                    <td class="price-pr">
                                        <p>$ 80.0</p>
                                    </td>
                                    <td class="quantity-box"><input type="number" size="4" value="1" min="0" step="1" class="c-input-text qty text"></td>
                                    <td class="total-pr">
                                        <p>$ 80.0</p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="#">
									<i class="fas fa-times"></i>
								</a>
                                    </td>
                                </tr> -->
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Nhập phiếu giảm giá" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Phiếu giảm giá</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        <a href="gio_hang.php?delgiohang=1"><button>Xóa giỏ hàng</button></a>
                        <input value="Cập nhật giỏ hàng" type="submit">
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <!-- <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Hóa đơn mua hàng</h3>
                        <div class="d-flex">
                            <h4>Tổng sản phẩm</h4>
                            <div class="ml-auto font-weight-bold"> $ 130 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Giảm giá</h4>
                            <div class="ml-auto font-weight-bold"> $ 40 </div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Phiếu giảm giá</h4>
                            <div class="ml-auto font-weight-bold"> $ 10 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Thuế VAT</h4>
                            <div class="ml-auto font-weight-bold"> $ 2 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Phí ship</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Tổng cộng</h5>
                            <div class="ml-auto h5"> $ 388 </div>
                        </div>
                        <hr> </div>
                </div> -->
                <div class="col-12 d-flex shopping-box"><a href="thanh_toan.php" class="ml-auto btn hvr-hover">Thanh toán</a> </div>
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
                           <div class="footer-widgett">
                            <h4>Danh sách cửa hàng</h4>
                                <ul>
                                    <li><p>Cs1: 1 Tôn Thất Tùng, Đống Đa, Hà Nội </p></li>
                                    <li><p>Cs2: 378 Đường Láng, Láng Hạ, Đống Đa</p></li>
                                    <li><p>Cs3: 300 Lê Trọng Tấn, Thanh Xuân, Hà Nội</p></li>
                                    <li><p>Cs4: 36 Đường Cầu Giấy, Quan Hoa, Cầu Giấy, Hà Nội</p></li>
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
        <p class="footer-company"> <a href="trang_chu.php">ThewayShop</a> </p>
            
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