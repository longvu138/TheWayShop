<?php
$title = "Quản Lý Danh Mục";
include "./include/header.php" ?>
<div id="layoutSidenav">
    <?php
    include "./include/sidebar.php";
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4"> <?php echo $title ?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Quản trị hệ thống</a></li>
                    <li class="breadcrumb-item active"> <?php echo $title ?></li>
                </ol>
    
                <form action="danh_muc_them_moi.php" method="POST">
                    <div style="width: 450px;" class="input-group mb-3">
                        <input name="tendanhmuc" type="text" class="form-control" placeholder="Nhập vào tên danh mục">
                        <button type="submit" name="themmoidanhmuc" class="btn btn-primary">Thêm Danh Mục</button>
                    </div>
                </form>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Danh sách danh mục
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th  class="text-center " >STT</th>
                                    <th  class="text-center "> Tên Danh Mục</th>
                                    <th  class="text-center ">Xoá</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                // 1. Load file cấu hình để kết nối đến máy chủ CSDL 
                                // include("../database/config.php");
                                // 2. Viết câu lệnh truy vấn lấy ra được dữ liệu mong   muốn (Người dùng đã lưu trong CSDL)
                                $sql = "select * from category where deleted = 0";

                                //3. Thực thi câu lệnh lấy dữ liệu mong muốn
                                $category = mysqli_query($ket_noi, $sql);

                                // 4. Hiển thị ra dữ liệu mà các bạn vừa lấy
                                $i = 0;
                                while ($row = mysqli_fetch_array($category)) {
                                    $i++;; ?>
                                    <tr>
                                        <td class="text-center "  style="width: 100px;"><?php echo $i; ?></td>
                                        <td class="text-center "><?php echo $row["name"]; ?></td>
                                        <td class="text-center " style="width: 150px;">
                                            <a style="text-decoration: none; color:red" href="danh_muc_xoa.php?id=<?php echo $row["id"]; ?>">
                                                <i class="fas fa-trash"></i> Xóa</a>
                                        </td>
                                    </tr>
                                <?php
                                }; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
        <?php include('./include/footer.php') ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    </body>

    </html>