<?php
if(isset($_POST['btnSubmit'])){
        $idOrder = $_POST['idOrder'];
        $status = $_POST['statusOrder'];
        // echo $idOrder .'-'. $status;
        include("../database/config.php");
        $sql = "update orders set status = '$status' where id = $idOrder";
        if (mysqli_query($ket_noi, $sql)) {
            echo '<script language="javascript">alert("Cập nhật trạng thái đơn hàng thành công ");window.location="don_hang.php"; </script>';
        } else {
            echo '<script language="javascript">alert("Cập nhật trạng thái đơn hàng không thành công ");window.history.back(); </script>';
        }
}
