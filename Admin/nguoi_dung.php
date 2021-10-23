<?php
$title = "Quản Trị Người Dùng";
include "./include/header.php" ?>
<div id="layoutSidenav">
    <?php
    include "./include/sidebar.php";
    ?>
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
                                    <th>Địa Chỉ</th>
                                    <th>Quyền Hạn</th>
                                    <th>Sửa</th>
                                    <th>Xoá</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                // 1. Load file cấu hình để kết nối đến máy chủ CSDL 
                                include("../database/config.php");
                                // 2. Viết câu lệnh truy vấn lấy ra được dữ liệu mong   muốn (Người dùng đã lưu trong CSDL)
                                $sql = "select user.*, role.name from user,role where user.role_id = role.id and user.deleted = 0";

                                //3. Thực thi câu lệnh lấy dữ liệu mong muốn
                                $user = mysqli_query($ket_noi, $sql);

                                // 4. Hiển thị ra dữ liệu mà các bạn vừa lấy
                                $i = 0;
                                while ($row = mysqli_fetch_array($user)) {
                                    $i++;; ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row["fullname"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td><?php echo $row["phone_number"]; ?></td>
                                        <td><?php echo $row["address"]; ?></td>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td><a href="./nguoi_dung_sua.php?id=<?php echo $row['id'] ?>"> Sửa </a></td>
                                        <td><a href="./nguoi_dung_xoa.php?id=<?php echo $row['id'] ?>"> Xoá </a></td>
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