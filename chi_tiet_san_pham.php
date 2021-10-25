<?php include("./include/header.php") ?>
<?php
// 1. Load file cấu hình để kết nối đến máy chủ CSDL 
include("./database/config.php");

// 2. Viết câu lệnh truy vấn lấy ra được dữ liệu mong muốn (TIN TỨC đã lưu trong CSDL)
$id_san_pham = $_GET["id"];
$sql = "SELECT * FROM product WHERE id = $id_san_pham;";
$noi_dung_san_pham = mysqli_query($ket_noi, $sql);
while ($row = mysqli_fetch_array($noi_dung_san_pham)) {; ?>

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="./admin/assets/<?php echo $row['thumbnail'] ?>" alt="First slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="images/big-img-02.jpg" alt="Second slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="images/big-img-03.jpg" alt="Third slide"> </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="images/smp-img-01.jpg" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="1">
                                <img class="d-block w-100 img-fluid" src="images/smp-img-02.jpg" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="2">
                                <img class="d-block w-100 img-fluid" src="images/smp-img-03.jpg" alt="" />
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2><?php echo $row['title'] ?></h2>
                        <h5> <?php echo number_format($row['price']) ?> VNĐ</h5>
                        <!-- <p class="available-stock"><span> More than 20 available / <a href="#">8 sold </a></span> -->
                        <p>
                        <h4>Mô tả sản phẩm:</h4>
                        <p><?php echo $row['description'] ?></p>
                        <!-- <ul> -->
                            <!-- <li>
                            <div class="form-group size-st">
                                <label class="size-label">Size</label>
                                <select id="basic" class="selectpicker show-tick form-control">
                                    <option value="0">Size</option>
                                    <option value="0">S</option>
                                    <option value="1">M</option>
                                    <option value="1">L</option>
                                    <option value="1">XL</option>
                                    <option value="1">XXL</option>
                                    <option value="1">3XL</option>
                                    <option value="1">4XL</option>
                                </select>
                            </div>
                        </li> -->
                            
                                <div style="width:100px" class="form-group quantity-box">
                                    <label class="control-label"><h4>Số Lượng</h4></label>
                                    <input class="form-control" value="0" min="0" max="20" type="number">
                                </div>
                           
                        <!-- </ul> -->

                        <div class="price-box-bar">
                            <div class="cart-and-bay-btn">
                                <a class="btn hvr-hover" data-fancybox-close="" href="#">Mua Ngay</a>
                                <a class="btn hvr-hover" data-fancybox-close="" href="#">Thêm Vào Giỏ Hàng</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row my-5">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Sản Phẩm MớI</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                </div>

                <div class="featured-products-box owl-carousel owl-theme">
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
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img style="width:230px;height:300px" src="./admin/assets/<?php echo $row['thumbnail'] ?>" alt="Image">
                                </div>
                                <div class="why-text">
                                    <a href="">
                                        <h4><?php echo $row['title'] ?></h4>
                                        <h5> <?php echo number_format($row['price']) ?> VNĐ</h5>
                                        <a href="chi_tiet_san_pham.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary mt-2"> Chi tiết </a>
                                    </a>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>

        </div>
    </div>
    <!-- End Cart -->
    <?php include("./include/footer.php") ?>