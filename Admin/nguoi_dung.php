<?php include "./include/header.php" ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">MENU</div>
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
                        <h1 class="mt-4">Quản trị người dùng</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Quản trị hệ thống</a></li>
                            <li class="breadcrumb-item active">Quản trị người dùng</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh sách người dùng
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên người dùng</th>
                                            <th>Email</th>
                                            <th>Điện thoại</th>
                                            <th>Sửa</th>
                                            <th>xóa</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            
                                            <th>STT</th>
                                            <th>Tên người dùng</th>
                                            <th>Email</th>
                                            <th>Điện thoại</th>
                                            <th>Sửa</th>
                                            <th>xóa</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                          // 1. Load file cấu hình để kết nối đến máy chủ CSDL 
                                          include("../database/config.php");
                                          // 2. Viết câu lệnh truy vấn lấy ra được dữ liệu mong   muốn (Người dùng đã lưu trong CSDL)
                                          $sql = "SELECT * FROM tbl_nguoi_dung ORDER BY id_nguoi_dung DESC";

                                          //3. Thực thi câu lệnh lấy dữ liệu mong muốn
                                          $khach_hang = mysqli_query($ket_noi, $sql);
                                          //var_dump($khach_hang);

                                          // 4. Hiển thị ra dữ liệu mà các bạn vừa lấy
                                          $i=0;
                                          while($row = mysqli_fetch_array($khach_hang)) {
                                            $i++;
                                          ;?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td><?php echo $row["ten_nguoi_dung"];?></td>
                                                    <td><?php echo $row["email"];?></td>
                                                    <td><?php echo $row["dien_thoai"];?></td>
                                                    <td>Sửa</td>
                                                    <td>Xóa</td>
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
        <script src="./###/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
