<?php
session_start();
if (!isset($_SESSION['status']) || ($_SESSION['status'] != 1)) {
    header("Location: dang_nhap.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Quản trị hệ thống</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Thewayshop</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Nội dung tìm kiếm..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <div style="color: white">
               Xin chào: <?php echo $_SESSION['username'] ?>
            </div>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Thiết lập</a></li>
                        <li><a class="dropdown-item" href="#!">Lịch sử truy cập</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="dang_xuat.php">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">MENU</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản trị hệ thống
                            </a>
                            <a class="nav-link" href="nguoi_dung.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản trị người dùng
                            </a>
                            <a class="nav-link" href="san_pham.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản trị Sản phẩm
                            </a>
                            <a class="nav-link" href="sp_moi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản trị Sản phẩm mới
                            </a>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản trị hệ thống
                            </a>
                            </div>
                        </div>     
                            
                            <div class="sb-sidenav-footer">
                        <!-- <div class="small">User:....</div> -->
                        
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Quản trị hệ thống</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Quản trị hệ thống</li>
                        </ol>
                        <?php
                              // 1. Load file cấu hình để kết nối đến máy chủ CSDL 
                              include("../database/config.php");
                              // 2. Viết câu lệnh truy vấn lấy ra được dữ liệu mong muốn (TIN TỨC đã lưu trong CSDL)
                              $sql = "SELECT * FROM tbl_nguoi_dung";
                              $sql = "SELECT * FROM tbl_san_pham ORDER BY id_san_pham DESC";
                              $sql = "SELECT * FROM tbl_san_pham_moi ORDER BY id_san_pham_moi DESC";

                              //3. Thực thi câu lệnh lấy dữ liệu mong muốn
                              $noi_dung_san_pham = mysqli_query($ket_noi, $sql);
                              $so_luong_nguoi_dung = mysqli_query($ket_noi, $sql);
                               $noi_dung_san_pham_moi = mysqli_query($ket_noi, $sql);
                              //var_dump($noi_dung_tin_tuc);

                              // 4. Lấy sô lượng sản phẩm
                              $so_luong_san_pham = mysqli_num_rows($noi_dung_san_pham);

                              // 4. Lấy sô lượng sản phẩm mới
                              $so_luong_san_pham_moi = mysqli_num_rows($noi_dung_san_pham_moi);

                              // 5. Lấy số lượng người dùng
                              $so_luong_nguoi_dung = mysqli_num_rows($so_luong_nguoi_dung);
                        ;?>

                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Quản trị người dùng (<?php echo $so_luong_nguoi_dung;?> Người dùng)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="nguoi_dung.php">Chi tiết</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Quản trị sản phẩm (<?php echo $so_luong_san_pham;?> Sản phẩm)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="san_pham.php">Chi tiết</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Quản trị sản phẩm mới (<?php echo $so_luong_san_pham_moi;?> Sản phẩm mới)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="sp_moi.php">Chi tiết</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div> -->
                        </div>                                    
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Bản quyền &copy; Thewayshop</div> 
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
