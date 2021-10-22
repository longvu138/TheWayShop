<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Quản trị sản phẩm mới</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="./index.php">Thewayshop</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Nội dung tìm kiếm..." aria-label="Nội dung tìm kiếm..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Thiết lập</a></li>
                        <li><a class="dropdown-item" href="#!">Lịch sử truy cập</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Đăng xuất</a></li>
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
                                Quản trị sản phẩm
                            </a>
                            <a class="nav-link" href="sp_moi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản trị sản phẩm mới
                            </a>
                            <a class="nav-link" href="lien_he.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Quản trị liên hệ
                            </a>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">User:....</div>
                        
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                        <h1 class="mt-4">Quản trị Sản phẩm mới</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Quản trị hệ thống</a></li>
                            <li class="breadcrumb-item active">Quản trị sản phẩm</li>
                            <li class="breadcrumb-item active"><a href="sp_moi_them_moi.php">Thêm mới sản phẩm</a></li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh sách sản phẩm mới
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Sản phẩm mới</th>                                            
                                            <th>Giá bán</th>
                                            <th>Sửa</th>
                                            <th>xóa</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            
                                            <th>STT</th>
                                            <th>Tên Sản phẩm mới</th>                                           
                                            <th>Giá bán</th>
                                            <th>Sửa</th>
                                            <th>xóa</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                          // 1. Load file cấu hình để kết nối đến máy chủ CSDL 
                                          include("../config.php");
                                          // 2. Viết câu lệnh truy vấn lấy ra được dữ liệu mong   muốn (Người dùng đã lưu trong CSDL)
                                          $sql = "SELECT * FROM tbl_san_pham_moi ORDER BY id_san_pham_moi DESC";

                                          //3. Thực thi câu lệnh lấy dữ liệu mong muốn
                                          $sp_moi = mysqli_query($ket_noi, $sql);
                                          //var_dump($khach_hang);

                                          // 4. Hiển thị ra dữ liệu mà các bạn vừa lấy
                                          $i=0;
                                          while($row = mysqli_fetch_array($sp_moi)) {
                                            $i++;
                                          ;?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td><?php echo $row["ten_san_pham_moi"];?></td>
                                                    <td><?php echo $row["gia_ban"];?></td>
                                                    <td><a href="sp_moi_sua.php?id=<?php echo $row["id_san_pham_moi"];?>">Sửa</a></td>
                                                    <td><a href="sp_moi_xoa.php?id=<?php echo $row["id_san_pham_moi"];?>">Xóa</a></td>
                                                </tr>
                                        <?php
                                          }
                                        ;?>           
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                ...
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
