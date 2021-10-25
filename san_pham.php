<?php include("./include/header.php") ?>

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Sản Phẩm</h2>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<div class="shop-box-inner">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left mt-4">
                <div class="product-categori">
                    <div class="filter-sidebar-left">
                        <div class="">
                            <h3 class="text-center" style="font-weight: bold;">Danh Mục Sản Phẩm</h3>
                            <hr style="height:2px;background-color:black;" class="mt-0 mb-0">
                        </div>
                        <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                            <div class="list-group-collapse sub-men">
                                </a>
                                <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                                    <div class="list-group">
                                        <!-- lấy ra category -->
                                        <?php
                                        $id = $_GET['id'];
                                        include("./database/config.php");
                                        $sql = "SELECT * FROM category where deleted = 0  ";
                                        $result = mysqli_query($ket_noi, $sql);
                                        while ($row = mysqli_fetch_array($result)) {; ?>
                                            <a style="font-size: 18px;" href="san_pham.php?id=<?php echo $row['id']; ?>" class=" text-capitalize list-group-item list-group-item-action  <?php echo $row['id'] == $id ? "active" : "" ?>">
                                                <?php echo $row['name']; ?>
                                            </a>
                                        <?php }; ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                <div class="right-product-box">
                    <div class="col-12 col-sm-4 text-center text-sm-right  ">
                        <ul class="nav nav-tabs mr-0 ">
                            <li>
                                <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"> Dạng Lưới</i> </a>
                            </li>
                            <li>
                                <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"> Danh Sách</i> </a>
                            </li>
                        </ul>
                    </div>
                    <hr style="height:2px;background-color:black; margin-top:10px" class="pt-0">
                    <div class="row product-categorie-box mt-2">
                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                <div class="row">
                                    <!--  lấy ra prodcut theo category với id category và deleted = 0 -->
                                    <?php $id = $_GET['id'];
                                    $sql = "select product.id,product.thumbnail,product.title,product.price from Product left join Category on
                              Product.category_id = Category.id where Product.deleted = 0 AND category_id = $id; ";
                                    $noi_dung_san_pham = mysqli_query($ket_noi, $sql);
                                    while ($row = mysqli_fetch_array($noi_dung_san_pham)) { ?>
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <img src="./admin/assets/<?php echo $row['thumbnail'] ?>" style="width: 265px; height: 344px;" alt="Image">
                                                </div>
                                                <div class="why-text">
                                                    <h4><?php echo $row['title'] ?></h4>
                                                    <h4><?php echo number_format($row["price"]); ?> VNĐ</h4>
                                                    <a href="chi_tiet_san_pham.php? id=<?php echo $row["id"]; ?>" class="btn btn-primary mt-2"> Chi tiết </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }; ?>

                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="list-view">
                                <div class="list-view-box">
                                    <div class="row">
                                        <?php $id = $_GET['id'];
                                        $sql = "select * from Product left join Category on
                              Product.category_id = Category.id where Product.deleted = 0 AND category_id = $id; ";
                                        $noi_dung_san_pham = mysqli_query($ket_noi, $sql);
                                        while ($row = mysqli_fetch_array($noi_dung_san_pham)) { ?>
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <img src="./admin/assets/<?php echo $row['thumbnail'] ?>" style="width: 200px; height: 250px;" alt="Image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text mb-0" style="height: 250px;">
                                                    <h4><?php echo $row['title'] ?></h4>
                                                    <h4><?php echo number_format($row["price"]); ?> VNĐ</h4>
                                                    <p><?php echo $row['description'] ?></p>
                                                    <a href="" class="btn btn-primary mt-2 mb-0"> Chi tiết </a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Shop Page -->


<?php include("./include/footer.php") ?>
</body>

</html>