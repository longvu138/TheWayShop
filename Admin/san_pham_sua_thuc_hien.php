
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cập nhật tin tức</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
         <?php
            // 1. Load file cấu hình để kết nối đến máy chủ CSDL 
             include("../config.php");
             // 2. Viết câu lệnh truy vấn để thêm mới dữ liệu vào bảng TIN TỨC trong CSDL
            $id_san_pham = $_POST['txtID'];
            $ten_san_pham = $_POST['txtTensanpham'];
            $gia_ban= $_POST['txtGiaban'];

            // Lấy ra được thông tin & xử lý liên quan đến bức ẢNH MINH HOA từ form TIN TỨC THÊM MỚI
            $noi_se_luu_buc_anh_tren_website = "../images/".basename($_FILES["txtAnhminhhoa"]["name"]);
            $luu_file_anh_tam = $_FILES["txtAnhminhhoa"]["tmp_name"];

            // UPLOAD bức ảnh tamh này lên máy chủ WEB
            $ket_qua_up_anh = move_uploaded_file($luu_file_anh_tam, $noi_se_luu_buc_anh_tren_website);

            // ghi nhận thông tin bức ảnh minh họa được UPLOAD lên hệ thống hay chưa?
            if (!$ket_qua_up_anh) {
                $anh_minh_hoa = null;

            } else{
                $anh_minh_hoa = basename($_FILES["txtAnhminhhoa"]["name"]);
            }

            if ($anh_minh_hoa==null) {
                $sql =" 
                    UPDATE `tbl_san_pham` 
                    SET `ten_san_pham` = '".$ten_san_pham."', `gia_ban` = '".$gia_ban."', 
                    WHERE `tbl_san_pham`.`id_san_pham` = '".$id_san_pham."'

            ";

            } else {
                $sql =" 
                    UPDATE `tbl_san_pham` 
                    SET `ten_san_pham` = '".$ten_san_pham."', `gia_ban` = '".$gia_ban."', anh_minh_hoa = '".$anh_minh_hoa."'
                    WHERE `tbl_san_pham`.`id_san_pham` = '".$id_san_pham."'

            ";
            }
            
            //3. Thực thi câu lệnh lấy dữ liệu mong muốn
            $san_pham= mysqli_query($ket_noi, $sql);
         

            // 4.Thông báo việc chèn dữ liệu thành công và đẩy các bạn về trang quản trị tin tức
            echo "
                <script type='text/javascript'>
                    window.alert('Bạn đã cập nhật bài viết thành công');
                    window.location.href='san_pham.php';
                </script>

            ";
            
        ;?>
        </body>
</html>

