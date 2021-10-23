<?php

$title = "Chi Tiết Đơn Hàng";
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

                <div class="container">
                    <?php

                    $orderID = $_GET['id'];
                    $sql = "select * from orders where id = $orderID";
                    $order = mysqli_query($ket_noi, $sql);

                    foreach ($order as $item) {
                        echo '
                            <h5 style="font-weight:400;font-size:20px"> Tên Khách Hàng: ' . $item['fullname'] . '</h5>
                            <h5 style="font-weight:400;font-size:20px"> Email: ' . $item['email'] . '</h5>
                            <h5 style="font-weight:400;font-size:20px"> Số Điện Thoại: ' . $item['phone_number'] . '</h5>
                            <h5 style="font-weight:400;font-size:20px"> Địa Chỉ: ' . $item['address'] . '</h5>
                            <h5> Tổng Tiền: ' . number_format($item['total_money']) . 'VNĐ </h5>
                            ';
                    }

                    ?>
                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Ảnh Sản Phẩm</th>
                                <th scope="col">Giá Tiền</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Tổng Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $orderID = $_GET['id'];
                            $sql = "select order_details.*, product.title, product.thumbnail
                             from order_details, product where product.id = order_details.product_id 
                             and order_details.order_id = $orderID";
                            $orderDetails = mysqli_query($ket_noi, $sql);
                            $i = 0;
                            while ($row = mysqli_fetch_array($orderDetails)) {
                                $i++;; ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row["title"]; ?></td>
                                    <td>
                                        <img style="width:150px; height: 200px;" src="./assets/<?php echo $row["thumbnail"]; ?>" alt="">
                                    </td>
                                    <td><?php echo number_format($row["price"]) ?></td>
                                    <td><?php echo $row["num"]; ?></td>
                                    <td><?php echo $row["total_money"]; ?></td>

                                </tr>

                            <?php
                            }; ?>
                        </tbody>
                    </table>
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