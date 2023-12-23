    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index">Trang chủ</a>
                    <span class="breadcrumb-item active">Giỏ hàng</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền sản phẩm</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                            $j=1;
                            $totalprice=0;
                            foreach($cart as $values){
                                
                                $formattedNumber = number_format($product[$j]['detail']['gia'], 0, ',', '.');
                                $total=(int) $product[$j]['detail']['gia'] * (int) $product[$j]['total'];
                                $formattotal = number_format($total, 0, ',', '.');
                                $totalprice=$totalprice+$total;
                                echo '<tr>
                                        <td class="align-middle"><img src="uploads/'.$product[$j]['detail']['img'].'" alt="" style="width: 50px;"></td>
                                        <td class="align-middle"><a href="index?act=detail&idsp='.$product[$j]['detail']['id'].'">'.$product[$j]['detail']['name'].'</a></td>
                                        <td class="align-middle">'.$formattedNumber.' đ</td>
                                        <td class="align-middle">
                                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                                <lable class="form-control form-control-sm border-0 text-center">'.$product[$j]['total'].'</lable>
                                            </div>
                                        </td>
                                        <td class="align-middle">'.$formattotal.' đ</td>
                                        <td class="align-middle"><a class="btn btn-sm btn-danger" href="index?act=declarecart&idsp='.$product[$j]['detail']['id'].'"><i class="fa fa-times"></i></a></td>
                                    </tr>';
                                $j++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Mã giảm giá">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Nhập mã giảm giá</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tổng giỏ hàng</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Tổng tiền sản phẩm</h6>
                            <h6><?php echo number_format($totalprice, 0, ',', '.'); ?> đ</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Tiền vận chuyển</h6>
                            <h6 class="font-weight-medium">25.000 đ</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Tổng tiền</h5>
                            <h5>
                                <?php 
                                    echo  number_format($totalprice+25000, 0, ',', '.');
                                ?>
                             đ</h5>
                        </div>
                        <a href="index?act=checkout"><button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Thanh toán</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->