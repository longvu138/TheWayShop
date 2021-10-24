<?php include("./include/header.php") ?>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>LIÊN HỆ</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="trangchu.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active"> Liên hệ </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>Liên hệ chúng tôi</h2>
                        <p>Thewayshop chuyên cung cấp mẫu quần áo chất lượng. Với dòng sản phẩm đạt chất lượng cao, giá cả hợp lý. Mọi người liên hệ SHop ngay để được nhân viên tư vấn. </p>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Địa chỉ: Ngã Tư Sở, Quận Đống Đa, Tp Hà Nội </p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>SĐT: <a href="tel:0386487652">0386487652</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">thewayshop@gmail.com</a></p>
                            </li>
                            <li>
                                <p><i class="fab fa-facebook"></i><a href="https://www.facebook.com/thewayshop">https://www.facebook.com/thewayshop</a></p>
                            </li>
                            <li>
                                <p><i class="fab fa-instagram"></i> https://www.instagram.com/thewayshop<a href="#"></a></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Liên lạc</h2>
                        
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Họ tên " required data-error="Xin hãy nhập tên của bạn">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Email" id="email" class="form-control" name="Email" required data-error="Xin hãy nhập Email của bạn">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" name="name" placeholder="Dịch vụ yêu cầu" required data-error="Xin hãy nhập yêu cầu">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" placeholder="Nội dung" rows="4" data-error="Nội dung" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="submit" type="submit">Gửi</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->
    <?php include("./include/footer.php") ?>

</body>

</html>