<?php
$title = "Thêm mới sản phẩm";
include "./include/header.php"
?>

<?php
require_once "../database/config.php";
if (isset($_POST['btnSubmit']) && isset($_FILES['anhSanPham'])) {
    $danhMucSanPham = $_POST['danhMucSanPham'];
    $tenSanPham = $_POST['tenSanPham'];
    $giaBan = $_POST['giaBan'];
    $giamGia = $_POST['giamGia'];
    $moTa = $_POST['moTa'];
    $created_at = $updated_at = date('Y-m-d H:i:s');
    //KiểM tra dữ liệu có bị lỗi hay không
    if ($_FILES['anhSanPham']['error'] > 0)
        echo " <script> alert(' cập nhật avatar không thành công!') </script>";
    else {
        
        //Kiểm tra kiểU dữ liệu có phải file ảnh hay không? duôi png, jpeg
        if ($_FILES["anhSanPham"]["type"] == "image/jpeg" || $_FILES["anhSanPham"]["type"] == "image/png") {
          
            //Thư mục lưu ảnh
            $path = "assets/";

            //lưu ảnh vào thư mục tạm của sever 
            $tmp_name = $_FILES['anhSanPham']['tmp_name'];
            
            // lấy ra tên của ảnh
            $image = $_FILES['anhSanPham']['name'];
           
            // di chuyển ảnh từ thư mục tmp sang thư mục (assets ở trên)
            move_uploaded_file($tmp_name, $path . $image);

            // insert sản phẩm kèm theo tên ảnh trong thư mục assets
            $sql = "INSERT INTO  product(title,category_id,price,discount,thumbnail,description,created_at,updated_at)
               VALUES ('$tenSanPham','$danhMucSanPham', '$giaBan','$giamGia','$image','$moTa','$created_at','$updated_at')";
            
            // nếU thêm thành công sản phẩm thì lưu vào csdl, đưa ra thông báo và quay về trang danh sách sản phẩm
            if (mysqli_query($ket_noi, $sql)) {
                echo '<script language="javascript">alert("Thêm mới sản phẩm thành công");window.location="san_pham.php"; </script>';
            }
        } else {
            echo " <script> alert(' file bạn vừa chọn không phải file ảnh vui lòng chọn lại') </script>";
            header("Refresh:0");
        }
    }
}
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
                                <h3 class="text-center font-weight-light my-4">Thêm Mới Sản Phẩm</h3>
                            </div>
                            

                            <div class="card-body">
                                <form method="POST" action="san_pham_them_moi.php" enctype="multipart/form-data">
                                    <select name="danhMucSanPham" style="width:240px" class="form-select mb-3">
                                        <option class="text-center" selected> -- Danh mục sản phẩm -- </option>
                                        <?php
                                        // 1. Load file cấu hình để kết nối đến máy chủ CSDL 
                                        // include("../database/config.php");
                                        // 2. Viết câu lệnh truy vấn lấy ra được dữ liệu mong   muốn (Người dùng đã lưu trong CSDL)
                                        $sql = "select * from category";
                                        //3. Thực thi câu lệnh lấy dữ liệu mong muốn
                                        $category = mysqli_query($ket_noi, $sql);
                                        while ($cate =  mysqli_fetch_array($category)) {
                                            echo "<option value='" . $cate[0] . "'>" . $cate[1] . "</option>";
                                        };
                                        ?>
                                    </select>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="inputEmail">Ảnh Sản Phẩm</label>
                                            <input name="anhSanPham" type="file" class="form-control">
                                        </div>
                                    </div>
                                   
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Tên Sản Phẩm</label>
                                        <input name="tenSanPham" type="text" class="form-control">
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label>Giá bán</label>
                                            <input name="giaBan" type="number" min="1000" max="10000000000" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label>Giảm Giá</label>
                                            <input name="giamGia" type="number" min="0" max="10000000000" class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                                        <textarea name="moTa" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>

                                    <div class="mt-4 mb-0">
                                        <input type="submit" name="btnSubmit" class="btn btn-primary" value="Thêm mới">
                                    </div>
                                </form>
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