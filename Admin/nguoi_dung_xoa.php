<?php

// if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id == 1) {
        echo '<script language="javascript">alert(" Bạn không thể xoá admin");window.location="nguoi_dung.php"; </script>';
    }
     else {
        include "../database/config.php";
        $sql = "UPDATE user   SET deleted = 1 WHERE id=$id";
        if (mysqli_query($ket_noi, $sql)) {
            echo '<script language="javascript">alert("Xóa thành công");window.location="nguoi_dung.php"; </script>';
        } else {
            echo '<script language="javascript">alert("Xóa không thành công");window.location="nguoi_dung.php"; </script>';
        }
    }
