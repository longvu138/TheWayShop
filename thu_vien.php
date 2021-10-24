<?php 


function showgiohang(){
    if (isset($_SESSION['gio_hang'])&&(is_array($_SESSION['gio_hang']))) {
        if (sizeof($_SESSION['gio_hang'])>0) {
        $tong = 0;
        for ($i=0; $i < sizeof($_SESSION['gio_hang']); $i++) { 
            $tt = $_SESSION['gio_hang'][$i][1] * $_SESSION['gio_hang'][$i][2];
            $tong+=$tt;
            echo    ' <tr>
                                <td class="thumbnail-img">
                                    <a href="#">
                                <img class="img-fluid" src="images/'.$_SESSION['gio_hang'][$i][3].'" alt="" />
                            </a>
                                </td>
                                <td class="name-pr">
                                    <a href="#">
                                '.$_SESSION['gio_hang'][$i][0].'
                            </a>
                                </td>
                                <td class="price-pr">
                                    <p>'.$_SESSION['gio_hang'][$i][1].'</p>
                                </td>
                                <td class="quantity-box">'.$_SESSION['gio_hang'][$i][2].'</td>
                                <td class="total-pr">
                                    <p>'.$tt.'</p>
                                </td>
                                <td class="remove-pr">
                                    <a href="gio_hang.php?delid='.$i.'">
                                <i class="fas fa-times"></i>
                            </a>
                                </td>
                            </tr>
            ';
        }
        echo '<div class="col-lg-4 col-sm-12">
                <div class="order-box">
                    <h3>Hóa đơn mua hàng</h3>
                    <div class="d-flex">
                        <h4>Tổng sản phẩm</h4>
                        <div class="ml-auto font-weight-bold">'.$tong.'</div>
                    </div>  
                    <div class="d-flex">
                        <h4>Giảm giá</h4>
                        <div class="ml-auto font-weight-bold"> $ 40 </div>
                    </div>
                    <hr class="my-1">
                    <div class="d-flex">
                        <h4>Phiếu giảm giá</h4>
                        <div class="ml-auto font-weight-bold"> $ 10 </div>
                    </div>
                    <div class="d-flex">
                        <h4>Thuế VAT</h4>
                        <div class="ml-auto font-weight-bold"> $ 2 </div>
                    </div>
                    <div class="d-flex">
                        <h4>Phí ship</h4>
                        <div class="ml-auto font-weight-bold"> Free </div>
                    </div>
                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Tổng cộng</h5>
                        <div class="ml-auto h5"> $ 388 </div>
                    </div>
                    <hr> </div>
            </div>            
        ';
    }else{
        echo "Giỏ hàng rỗng";
          }
        }
    }

function tongtien(){
    $tong = 0;
    if (isset($_SESSION['gio_hang'])&&(is_array($_SESSION['gio_hang']))) {
        if (sizeof($_SESSION['gio_hang'])>0) {
        for ($i=0; $i < sizeof($_SESSION['gio_hang']); $i++) { 
            $tt = $_SESSION['gio_hang'][$i][1] * $_SESSION['gio_hang'][$i][2];
            $tong+=$tt;
        
            }
        }
    }
    return $tong;
}    

function taodonhang($ho_ten, $dia_chi, $sdt, $tong_tien, $pttt){
                // 1. Load file cấu hình để kết nối đến máy chủ CSDL 
                include("config.php");
                $sql = "
                INSERT INTO `tbl_bill` (`id`, `ho_ten`, `dia_chi`, `sdt`, `tong_tien`, `pttt`) 
                VALUES (NULL, '$ho_ten', '$dia_chi', '$sdt', '$tong_tien', '$pttt')
                ";
                //3. Thực thi câu lệnh lấy dữ liệu mong muốn
                $tao_don_hang = mysqli_query($ket_noi, $sql);
                //$last_id= $ket_noi->lastInsertId();
                $last_id = $ket_noi->insert_id;
                return $last_id;
                

}

function taogiohang($tensp, $hinhsp, $don_gia, $so_luong, $thanh_tien,$idbill){
                // 1. Load file cấu hình để kết nối đến máy chủ CSDL 
                include("config.php");
                $sql = "

                INSERT INTO `tbl_cart` (`id`, `tensp`, `hinhsp`, `don_gia`, `so_luong`, `thanh_tien`, `idbill`) VALUES (NULL, '$tensp', '$hinhsp', '$don_gia', '$so_luong', '$thanh_tien', '$idbill')
                ";
                //3. Thực thi câu lệnh lấy dữ liệu mong muốn
                $tao_gio_hang = mysqli_query($ket_noi, $sql);

}

?>