<?php
$title = "Cập nhật sản phẩm";
include "./include/header.php"
?>



<div id="layoutSidenav">
    <?php include "./include/sidebar.php" ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4"><?php echo $title; ?> </h3>
                            </div>

                            <?php
                            $id = $_GET['id'];
                            // 1. Load file cấu hình để kết nối đến máy chủ CSDL 
                            // include("../database/config.php");
                            // 2. Viết câu lệnh truy vấn lấy ra được dữ liệu mong   muốn (Người dùng đã lưu trong CSDL)
                            $sql = "select * from product where id = $id and deleted = 0 ";
                            $category = "select * from category";
                            //3. Thực thi câu lệnh lấy dữ liệu mong muốn
                            $product = mysqli_query($ket_noi, $sql);
                            $category = mysqli_query($ket_noi, $category);
                            foreach ($product as $key => $value) {
                            ?>

                                <div class="container">
                                    <form method="POST" action="san_pham_sua_xu_ly.php" enctype="multipart/form-data">
                                        <input type="text" value="<?php echo $value['id'] ?>" name="id" hidden>
                                        <div class="row mb-3 mt-4">
                                            <div class="col">
                                                <div class="col mb-3">
                                                    <div class="col">
                                                        <img class="center-side" style="width:265px; height:400px;    margin-left: 25px;" src="./assets/<?php echo $value['thumbnail'] ?>" alt="" />
                                                        <input name="anhSanPham" value="<?php echo $value['thumbnail'] ?>" type="file" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="col">
                                                    <select name="danhMucSanPham" class="form-select mb-3">
                                                        <?php
                                                        foreach ($category as $item) {
                                                            if ($item['id'] == $value['category_id']) {
                                                                echo '<option selected value="' . $item['id'] . '">' . $item['name'] . '</option>';
                                                            } else {
                                                                echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="exampleFormControlInput1" class="form-label">Tên Sản Phẩm</label>
                                                    <input name="tenSanPham" type="text" value="<?php echo $value['title'] ?>" class="form-control">
                                                </div>


                                                <div class="col">
                                                    <label>Giá bán</label>
                                                    <input name="giaBan" type="number" min="1000" max="10000000000" value="<?php echo $value['price'] ?>" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label>Giảm Giá</label>
                                                    <input name="giamGia" type="number" min="0" max="10000000000" value="<?php echo $value['discount'] ?>" class="form-control">
                                                </div>

                                                <div class="col">
                                                    <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                                                    <textarea name="moTa" class="form-control" id="exampleFormControlTextarea1" rows="5"><?php echo $value['description'] ?> </textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="mt-4 mb-0">
                                            <input type="submit" name="btnSubmit" class="btn btn-primary" value="Cập Nhật">
                                        </div>
                                    </form>
                                <?php } ?>
                                </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>

</html>