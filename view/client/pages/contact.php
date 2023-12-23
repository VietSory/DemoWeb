    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Trang chủ</a>
                    <span class="breadcrumb-item active">Liên hệ</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Liên hệ với chúng tôi</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="Họ và Tên"
                                required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="Email"
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="Tiêu đề"
                                required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="8" id="message" placeholder="Nhập tin nhắn"
                                required="required"
                                data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Gửi
                                tin nhắn</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-30 mb-30" style="padding: 15px;">
                    <iframe style="width: 100%; height: 280px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122717.74756117286!2d108.04692932664538!3d16.01717927933324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142199deb085271%3A0x8ac5d36794034e22!2zQ-G6qW0gTOG7hyBEaXN0cmljdCwgRGEgTmFuZywgVmlldG5hbQ!5e0!3m2!1sen!2sbd!4v1698425432818!5m2!1sen!2sbd"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Cẩm lệ , Đà nẵng , Việt Nam</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>HQA269@gmai.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>012 345 67890</p>
            </div>
        </div>
    </div>
