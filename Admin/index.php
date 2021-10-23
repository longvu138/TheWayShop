<?php
$title = "QUẢN TRỊ HỆ THỐNG";
include "./include/header.php";
?>

<div id="layoutSidenav">

    <?php
    include "./include/sidebar.php";
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Quản trị hệ thống</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Quản trị hệ thống</li>
                </ol>
                <?php
                // 1. Load file cấu hình để kết nối đến máy chủ CSDL 
               
                // 2. Viết câu lệnh truy vấn lấy ra được dữ liệu mong muốn (TIN TỨC đã lưu trong CSDL)
                $lay_tat_ca_nguoi_dung = "SELECT * FROM user where deleted =0";
                $lay_tat_ca_san_pham = "SELECT * FROM product where deleted = 0";
                $so_luong_nguoi_dung = mysqli_query($ket_noi, $lay_tat_ca_nguoi_dung);
                $so_luong_san_pham = mysqli_query($ket_noi, $lay_tat_ca_san_pham);
                // 5. Lấy số lượng người dùng
                $so_luong_nguoi_dung = mysqli_num_rows($so_luong_nguoi_dung);
                $so_luong_san_pham = mysqli_num_rows($so_luong_san_pham);
                ?>

                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Quản Lý Tài Khoản (<?php echo $so_luong_nguoi_dung; ?> Người dùng)</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="nguoi_dung.php">Chi tiết</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Quản Lý Sản Phẩm (<?php echo $so_luong_san_pham; ?> Sản Phẩm)</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="san_pham.php">Chi tiết</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Quản Lý Đơn Hàng</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="sp_moi.php">Chi tiết</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

        </main>
        <?php include "./include/footer.php" ?>
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