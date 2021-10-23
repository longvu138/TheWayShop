<?php
if (isset($_POST['themmoidanhmuc'])) {
    $tendanhmuc = $_POST['tendanhmuc'];
    require_once "../database/config.php";
    $sql = "INSERT INTO  category(name) value ('$tendanhmuc') ";
   
    if (mysqli_query($ket_noi, $sql)) {
        echo '<script language="javascript">alert("Thêm  danh mục mới thành công");window.history.back(); </script>';
    } else {
        echo " <script> alert(' thêm danh mục mới thất bại') </script>";
        header("Refresh:0");
    }
}
