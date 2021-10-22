<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Xóa Sản phẩm mới</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
         <?php
            // 1. Load file cấu hình để kết nối đến máy chủ CSDL 
            include("../config.php");
             // 2. Viết câu lệnh truy vấn để thêm mới dữ liệu vào bảng TIN TỨC trong CSDL

            $id_san_pham_moi = $_GET["id"];
            

            $sql =" 
                    DELETE FROM `tbl_san_pham_moi` WHERE `tbl_san_pham_moi`.`id_san_pham_moi` = '".$id_san_pham_moi."'

            ";            
            //3. Thực thi câu lệnh lấy dữ liệu mong muốn
            $sp_moi = mysqli_query($ket_noi, $sql);
         

            // 4.Thông báo việc chèn dữ liệu thành công và đẩy các bạn về trang quản trị tin tức
            echo "
                <script type='text/javascript'>
                    window.alert('Bạn đã xóa sản phẩm mới thành công');
                    window.location.href='sp_moi.php';
                </script>

            ";
            
        ;?>
        </body>
</html>