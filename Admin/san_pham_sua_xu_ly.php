<?php
   
require_once "../database/config.php";
if (isset($_POST['btnSubmit']) && isset($_FILES['anhSanPham'])) {
    $danhMucSanPham = $_POST['danhMucSanPham'];
    $tenSanPham = $_POST['tenSanPham'];
    $giaBan = $_POST['giaBan'];
    $giamGia = $_POST['giamGia'];
    $moTa = $_POST['moTa'];
    $created_at = $updated_at = date('Y-m-d H:i:s');
    $id = $_POST['id'];
    //KiểM tra dữ liệu có bị lỗi hay không
    if ($_FILES['anhSanPham']['error'] > 0) {
        $sql = "UPDATE  product set title = '$tenSanPham' ,category_id = '$danhMucSanPham' ,price = '$giaBan',
        discount = '$giamGia' ,description = '$moTa' ,updated_at = '$updated_at' where id = '$id'";

        // nếU thêm thành công sản phẩm thì lưu vào csdl, đưa ra thông báo và quay về trang danh sách sản phẩm
        if (mysqli_query($ket_noi, $sql)) {
            echo '<script language="javascript">alert("Cập nhật sản phẩm thành công");window.location="san_pham.php"; </script>';
        }
        else {
            echo '<script language="javascript">alert("Cập nhật sản phẩm không thành công");window.location="san_pham.php"; </script>';
        }
       
    } else {

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
            $sql = "UPDATE  product set title = '$tenSanPham' ,category_id = '$danhMucSanPham' ,price = '$giaBan',
            discount = '$giamGia' ,thumbnail = '$image',description = '$moTa'
            ,updated_at = '$updated_at' where id = '$id'";


            // die();
            // nếU thêm thành công sản phẩm thì lưu vào csdl, đưa ra thông báo và quay về trang danh sách sản phẩm
            if (mysqli_query($ket_noi, $sql)) {
                echo '<script language="javascript">alert("Cập nhật sản phẩm thành công");window.location="san_pham.php"; </script>';
            }
        } else {
            echo " <script> alert(' file bạn vừa chọn không phải file ảnh vui lòng chọn lại') </script>";
            header("Refresh:0");
        }
    }
}
