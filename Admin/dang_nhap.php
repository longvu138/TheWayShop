<?php
$msg="";
if (isset($_POST["btnDangNhap"])) { 
  //lấy thông tin từ form
  $email = $_POST["email"];
  $password = $_POST["password"];
 
  //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
  //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
  $email = strip_tags($email);
  $email = addslashes($email);
  $password = strip_tags($password);
  $password = addslashes($password);

  require_once "../database/config.php";
  $sql = "SELECT * FROM user where email ='$email' and password = '$password' ";
  $query = mysqli_query($ket_noi, $sql);
  $num_rows = mysqli_num_rows($query);
  if ($num_rows == 0) {
    // echo " <script> alert(' tài khoản hoặc mật khẩu không chính xác!') </script>";
    $msg = "Tài khoản hoặc mật khẩu không chính xác! vui lòng kiểm tra lại";

  } else {
    $result = mysqli_fetch_array($query);
    // var_dump( $result);
  
    //tiến hành lưu tên đăng nhập vào session 
    session_start();
    $_SESSION['username'] = $result['fullname'];
    $_SESSION['role_id'] =$result['role_id'];  
    // $_SESSION['id'] = $result['id_nguoi_dung'];

    if ($_SESSION['role_id'] == 1) {
        echo "abc";
      header("location:index.php");
    } else {
        $msg="bạn không có quyền";
    }

  }
 }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Đăng nhập hệ thống</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body >
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Đăng nhập hệ thống</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="dang_nhap.php">
                                            <div class="form-floating mb-3">
                                                <input required class="form-control" id="inputEmail" autocomplete="off" type="email" name="email" />
                                                <label for="inputEmail">Tài khoản Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input required class="form-control" id="inputPassword" type="password" autocomplete="off" name="password" />
                                                <label for="inputPassword">Mật khẩu</label>
                                            </div>
                                            <h5 style="color: red;font-size: 15px;" class="text-left"><?php echo $msg; ?></h5>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <input class="btn btn-primary" type="submit" name="btnDangNhap" value="Đăng nhập">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    
    </body>
</html>