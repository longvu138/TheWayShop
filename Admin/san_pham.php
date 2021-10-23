<?php
$title = "Quản trị sản phẩm";
include "./include/header.php"
?>
<div id="layoutSidenav">
    <?php
    include "./include/sidebar.php";
    ?>
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
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th>STT</th>
                                        <th>Tên Sản phẩm</th>
                                        <th>Giá bán</th>
                                        <!-- <th>Giảm giá</th> -->
                                        <th>Ảnh Sản Phẩm</th>
                                        <th>Mô tả</th>
                                        <th>Cập nhật</th>
                                        <th>Xoá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // 1. Load file cấu hình để kết nối đến máy chủ CSDL 
                                    include("../database/config.php");
                                    // 2. Viết câu lệnh truy vấn lấy ra được dữ liệu mong   muốn (Người dùng đã lưu trong CSDL)
                                    $sql = "SELECT * FROM product";

                                    //3. Thực thi câu lệnh lấy dữ liệu mong muốn
                                    $san_pham = mysqli_query($ket_noi, $sql);
                                    //var_dump($khach_hang);

                                    // 4. Hiển thị ra dữ liệu mà các bạn vừa lấy
                                    $i = 0;
                                    while ($row = mysqli_fetch_array($san_pham)) {
                                        $i++;; ?>
                                        <tr>
                                            <td class="text-center " style="width: 20px;"><?php echo $i; ?></td>
                                            <td class="text-center " style="width: 200px;"><?php echo $row["title"]; ?></td>
                                            <!-- format số -->
                                            <td class="text-center" style="width: 120px;"><?php echo number_format($row["price"]); ?> VNĐ</td>
                                            <!-- <td><?php echo $row["discount"]; ?></td> -->
                                            <td class="text-center"><img style="width:150px; height: 200px;" src="./assets/<?php echo $row["thumbnail"]; ?>" alt="img"></td>
                                            <td style="width: 400px;"><?php echo $row["description"]; ?></td>
                                            <td class="text-center " style="width: 120px;">
                                            <a style="text-decoration: none;" href="san_pham_sua.php?id=<?php echo $row["id"]; ?>">
                                            <i class="fas fa-edit"></i> Cập nhật</a></td>
                                            <td class="text-center " style="width: 80px;">
                                            <a style="text-decoration: none; color:red" href="san_pham_xoa.php?id=<?php echo $row["id"]; ?>">
                                            <i class="fas fa-trash"></i> Xóa</a></td>
                                        </tr>
                                    <?php
                                    }; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include('./include/footer.php') ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>

</html>