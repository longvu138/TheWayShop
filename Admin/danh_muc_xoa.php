<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include "../database/config.php";
    $sql = "UPDATE category
   SET deleted = 1
   WHERE id=$id";
    if (mysqli_query($ket_noi, $sql)) {
        echo '<script language="javascript">alert("Xóa thành công");window.history.back(); </script>';
       
    } else {
        echo '<script language="javascript">alert("Xóa không thành công");window.location="danh_muc.php"; </script>';
    }
}
