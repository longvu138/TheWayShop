<?php include "./include/header.php" ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <div style="font-size: 25px;" class="sb-sidenav-menu-heading text-center text-white font-weight-bold">MENU</div>
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
                        <h1 class="mt-4">Quản trị Sản phẩm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Quản trị hệ thống</a></li>
                            <li class="breadcrumb-item active">Quản trị sản phẩm</li>
                            <li class="breadcrumb-item active"><a href="san_pham_them_moi.php">Thêm mới sản phẩm</a></li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh sách sản phẩm
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Sản phẩm</th>                                            
                                            <th>Giá bán</th>
                                            <th>Sửa</th>
                                            <th>xóa</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            
                                            <th>STT</th>
                                            <th>Tên Sản phẩm</th>                                           
                                            <th>Giá bán</th>
                                            <th>Sửa</th>
                                            <th>xóa</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                          // 1. Load file cấu hình để kết nối đến máy chủ CSDL 
                                          include("../database/config.php");
                                          // 2. Viết câu lệnh truy vấn lấy ra được dữ liệu mong   muốn (Người dùng đã lưu trong CSDL)
                                          $sql = "SELECT * FROM tbl_san_pham ORDER BY id_san_pham DESC";

                                          //3. Thực thi câu lệnh lấy dữ liệu mong muốn
                                          $san_pham = mysqli_query($ket_noi, $sql);
                                          //var_dump($khach_hang);

                                          // 4. Hiển thị ra dữ liệu mà các bạn vừa lấy
                                          $i=0;
                                          while($row = mysqli_fetch_array($san_pham)) {
                                            $i++;
                                          ;?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td><?php echo $row["ten_san_pham"];?></td>
                                                    <td><?php echo $row["gia_ban"];?></td>
                                                    <td><a href="san_pham_sua.php?id=<?php echo $row["id_san_pham"];?>">Sửa</a></td>
                                                    <td><a href="san_pham_xoa.php?id=<?php echo $row["id_san_pham"];?>">Xóa</a></td>
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
