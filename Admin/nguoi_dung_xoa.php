<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo $id;
    include "../database/config.php";
    $sql = "UPDATE user
   SET deleted = 1
   WHERE id=$id";
    if (mysqli_query($ket_noi, $sql)) {
        echo '<script language="javascript">alert("Xóa thành công");window.location="nguoi_dung.php"; </script>';
    } else {
        echo '<script language="javascript">alert("Xóa không thành công");window.location="nguoi_dung.php"; </script>';
    }
}
