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
                <div class="our-link">
                    <ul>
                        <li><a href="#">Tel: 0386487652-0936548254</a></li>
                        <li><a href="#">Time: 7Am-11Pm</a></li>
                        <li><a href="">Danh sách yêu thích</a></li>
                        <li><a href="./admin/dang_nhap.php">Đăng nhập</a></li>
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
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Trang chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="gioi_thieu.php">Giới thiệu</a></li>
                        <li class="dropdown ">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Sản Phẩm</a>
                            <ul class="dropdown-menu">
                                <?php 
                                 include("./database/config.php");
                                 $sql = "SELECT * FROM category where deleted = 0  ";

                                 $noi_dung_san_pham = mysqli_query($ket_noi, $sql);
                 
                                 while ($row = mysqli_fetch_array($noi_dung_san_pham)) {; ?>
                                <li><a href="chi_tiet_san_pham.php?id=<?php echo $row['id'] ?> "><?php echo $row['name'] ?></a></li>
                                <?php }; ?>
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
