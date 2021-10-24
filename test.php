<?php
                // 1. Load file cấu hình để kết nối đến máy chủ CSDL 
                include("config.php");
                  
                // 2. Viết câu lệnh truy vấn lấy ra được dữ liệu mong muốn (TIN TỨC đã lưu trong CSDL)
                if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                }


                $sql1 = "SELECT * 
                FROM tbl_san_pham 
                WHERE id_san_pham = '".$id."'
                ";
                // $sql2 = "SELECT * 
                // FROM tbl_san_pham_moi 
                // WHERE id_san_pham_moi = '".$id_san_pham_moi."'
                // ";

                //3. Thực thi câu lệnh lấy dữ liệu mong muốn
                $noi_dung_san_pham = mysqli_query($ket_noi, $sql1);
               // $noi_dung_san_pham_moi = mysqli_query($ket_noi, $sql2);
                $row = mysqli_fetch_array($noi_dung_san_pham);
                // while($row = mysqli_fetch_array($noi_dung_san_pham)) {
                    var_dump($noi_dung_san_pham);
                    $item = [
                    'id'=>$noi_dung_san_pham['id'],
                    'tensanpham'=>$noi_dung_san_pham['tensanpham'],
                    'anh_minh_hoa_1'=>$noi_dung_san_pham['anh_minh_hoa_1'],
                    'giaban'=>$noi_dung_san_pham['giaban'],
                    'soluong'=>$noi_dung_san_pham['soluong']
                    ]
                    ;?>     
