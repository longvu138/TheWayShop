<?php
$title = "Quản Lý Đơn Hàng";
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


                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Danh sách đơn hàng
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ & Tên</th>
                                    <th>Email</th>
                                    <th>SĐT</th>
                                    <th>Địa Chỉ</th>
                                    <th>Nội Dung</th>
                                    <th>Ngày Tạo</th>
                                    <th>Trạng Thái</th>
                                    <th>Tổng Tiền</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                // 1. Load file cấu hình để kết nối đến máy chủ CSDL 
                                // include("../database/config.php");
                                // 2. Viết câu lệnh truy vấn lấy ra được dữ liệu mong   muốn (Người dùng đã lưu trong CSDL)\
                                // status Tiếp Nhận, Đang Giao, Đã Huỷ
                                $sql = "select * from orders order by status asc, order_date desc";

                                //3. Thực thi câu lệnh lấy dữ liệu mong muốn
                                $order = mysqli_query($ket_noi, $sql);

                                // 4. Hiển thị ra dữ liệu mà các bạn vừa lấy
                                $i = 0;
                                while ($row = mysqli_fetch_array($order)) {
                                    $i++;; ?>
                                    <tr>
                                        <td ><?php echo $i; ?></td>
                                        <td ><?php echo $row["fullname"]; ?></td>
                                        <td ><?php echo $row["email"]; ?></td>
                                        <td ><?php echo $row["phone_number"]; ?></td>
                                        <td ><?php echo $row["address"]; ?></td>
                                        <td ><?php echo $row["note"]; ?></td>
                                        <td ><?php echo $row["order_date"]; ?></td>
                                        <td >
                                            <?php
                                           switch ($row["status"]) {
                                               case '0':
                                                  echo "<span style='font-weight:bold; color:black'>Đang Xử Lý</span>";
                                                   break;
                                               case '1':
                                                  echo "<span style='font-weight:bold; color:green'>Đang Giao</span>";
                                                  break;
                                               case '2':
                                                   echo "<span style='font-weight:bold; color:red'>Đã huỷ</span>";
                                                   break; 
                                               default:
                                                   break;
                                           }
                                            ?>
                                        </td>
                                        <td ><?php echo $row["total_money"]; ?></td>
                                        <td >
                                            <a style="text-decoration: none; color:red" href="don_hang_chi_tiet.php?id=<?php echo $row["id"] ?>"> Xem Chi Tiết</a>
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