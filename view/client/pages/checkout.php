 <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index">Trang chủ</a>
                    <span class="breadcrumb-item active">Thanh Toán</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <form class="container-fluid" action="index?act=checkoutmomo" method="post">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thông tin giao hàng</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount" name="address_option" value="default">
                                <label class="custom-control-label" for="newaccount">Sử dụng thông tin mặc định</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto" name="address_option" value="different">
                                <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Sử dụng thông tin giao hàng khác</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse mb-5" id="shipping-address">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thông tin Giao hàng Khác</span></h5>
                    <div class="bg-light p-30">
                        <div class="row">
                            <div class="col-md-8 form-group">
                                <label>Họ và Tên</label>
                                <input class="form-control" type="text" name="fullname">
                            </div>
                            <div class="col-md-8 form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" type="text" name="phone">
                            </div>
                            <div class="col-md-8 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" placeholder="example@email.com" name="email">
                            </div>
                            <div class="col-md-8 form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" type="text" name="address">
                            </div>
                            <div class="col-md-8 form-group">
                                <label>Lời nhắn</label>
                                <input class="form-control" type="text" placeholder=" Lưu ý cho Người bán..">
                            </div>
                            <div class="col-md-8 form-group">
                                <label>Đơn vị vận chuyển</label>
                                <select class="custom-select">
                                    <option selected>Nhanh</option>
                                    <option>Cấp tốc</option>
                                    <option>Chậm</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tổng tiền đặt hàng</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Sản phẩm</h6>
                        <?php
                            $j=1;
                            $totalprice=0;
                              foreach($cart as $values){
                                    $formattedNumber = number_format($product[$j]['detail']['gia'], 0, ',', '.');
                                    $total=(int) $product[$j]['detail']['gia'] * (int) $product[$j]['total'];
                                    $formattotal = number_format($total, 0, ',', '.');
                                    $totalprice=$totalprice+$total;
                                    echo '<div class="d-flex justify-content-between">
                                            <p>'.$product[$j]['detail']['name'].'</p>
                                            <p>'.$formattotal.' đ</p>
                                        </div>';
                                $j++;
                              } 
                        ?>
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Tổng tiền sản phẩm</h6>
                            <h6><?php echo number_format($totalprice, 0, ',', '.'); ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Vận chuyển</h6>
                            <h6 class="font-weight-medium">25.000 đ</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Tổng tiền</h5>
                            <h5> <?php echo  number_format($totalprice+25000, 0, ',', '.');?> đ</h5>
                            <input type="hidden" name="totalprice" value="<?php echo $totalprice+25000;?>">
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thanh toán</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal" value="paypal">
                                <label class="custom-control-label" for="paypal">Trực tiếp</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck"  value="momo">
                                <label class="custom-control-label" for="directcheck">MOMO</label>
                            </div>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold py-3" name="payUrl">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Checkout End -->
<script>
    // Sử dụng JavaScript để chỉ cho phép chọn một ô checkbox
    var checkboxes = document.querySelectorAll('[name="address_option"]');
    
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            checkboxes.forEach(function(otherCheckbox) {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false;
                }
            });
        });
    });
</script>