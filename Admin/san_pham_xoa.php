<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include "../database/config.php";
    $sql = "UPDATE product
   SET deleted = 1
   WHERE id=$id";
    if (mysqli_query($ket_noi, $sql)) {
        echo '<script language="javascript">alert("Xóa thành công");window.location="san_pham.php"; </script>';
    } else {
        echo '<script language="javascript">alert("Xóa không thành công");window.location="san_pham.php"; </script>';
    }
}
