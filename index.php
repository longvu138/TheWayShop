<?php include("./include/header.php") ?>
<?php include("./include/slide.php") ?>
<!-- Start Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Sản phẩm</h1>
                </div>
            </div>
            <?php
            // 1. Load file cấu hình để kết nối đến máy chủ CSDL 
            include("./database/config.php");

            $sql = "SELECT * FROM product where deleted = 0  limit 9";

            $noi_dung_san_pham = mysqli_query($ket_noi, $sql);

            while ($row = mysqli_fetch_array($noi_dung_san_pham)) {; ?>

                <div class="col-4 col-md-4 col-sm-12">
                    <div class="card mt-4">
                        <img style="width: 250px; height: 300px;" src="./admin/assets/<?php echo $row['thumbnail']; ?>" class="card-img-top text-center mx-auto" alt="...">
                        <div style="background-color: #f5f5f5;" class="card-body">
                            <h2 class="card-title mb-0  pd-0 "><?php echo $row["title"]; ?></h2>
                            <p class="card-text"><?php echo number_format($row["price"]); ?> VNĐ</p>
                            <a href="chi_tiet_san_pham.php? id=<?php echo $row["id"]; ?>" class="btn btn-primary">Chi tiết</a>
                        </div>
                    </div>
                </div>

            <?php
            }; ?>



        </div>
        <!--/.row-->
    </div>
    <!--/.container-->
</div>
<!-- End Products  -->

<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Sản phẩm mới</h1>

                </div>
            </div>
            <?php
            // 1. Load file cấu hình để kết nối đến máy chủ CSDL 
            include("./database/config.php");

            // 2. Viết câu lệnh truy vấn lấy ra được dữ liệu mong muốn (TIN TỨC đã lưu trong CSDL)
            $sql = "SELECT * FROM product  where deleted = 0 ORDER BY created_at  desc limit 6";

            //3. Thực thi câu lệnh lấy dữ liệu mong muốn
            $noi_dung_san_pham_moi = mysqli_query($ket_noi, $sql);
            //var_dump($noi_dung_tin_tuc);

            // 4. Hiển thị ra dữ liệu mà các bạn vừa lấy 
            while ($row = mysqli_fetch_array($noi_dung_san_pham_moi)) {; ?>

                <div class="col-4 col-md-4 col-sm-12">
                    <div class="card mt-4">
                        <img style="width: 250px; height: 300px;" src="./admin/assets/<?php echo $row['thumbnail']; ?>" class="card-img-top text-center mx-auto" alt="...">
                        <div style="background-color: #f5f5f5;" class="card-body">
                            <div class="row d-flex justify-content-between">
                                <div class="col-8">
                                    <h2 class="card-title mb-0  pd-0 "><?php echo $row["title"]; ?></h2>
                                    <p class="card-text color-danger">Giá Bán: <?php echo number_format($row["price"]); ?> VNĐ</p>
                                </div>
                                <div class="col-4 mt-3">
                                    <a href="chi_tiet_san_pham.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Chi tiết</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            <?php
            }; ?>
        </div>
    </div>
</div>

<?php include("./include/footer.php") ?>
</body>

</html>