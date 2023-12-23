
     <!-- Start container-fluid -->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <h4 class="header-title mb-3">Chào Mừng bạn trở lại!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <div class="card-box widget-inline">
                                        <div class="row">
                                            <div class="col-xl-3 col-sm-6 widget-inline-box">
                                                <div class="text-center p-3">
                                                    <h2 class="mt-2"><i class="text-primary mdi mdi-access-point-network mr-2"></i> <b><?php echo $countsp; ?></b></h2>
                                                    <p class="text-muted mb-0">Tổng số sản phẩm</p>
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-sm-6 widget-inline-box">
                                                <div class="text-center p-3">
                                                    <h2 class="mt-2"><i class="text-teal mdi mdi-airplay mr-2"></i> <b><?php echo $amountorder; ?></b></h2>
                                                    <p class="text-muted mb-0">Tổng Số đơn hàng</p>
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-sm-6 widget-inline-box">
                                                <div class="text-center p-3">
                                                    <h2 class="mt-2"><i class="text-danger mdi mdi-black-mesa mr-2"></i> <b><?php echo $countuser; ?></b></h2>
                                                    <p class="text-muted mb-0">Tổng số người dùng</p>
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-sm-6">
                                                <div class="text-center p-3">
                                                    <h2 class="mt-2"><i class="text-primary mdi mdi-cellphone-link mr-2"></i> <b><?php echo $countdm; ?></b></h2>
                                                    <p class="text-muted mb-0">Tổng số danh mục</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h5 class="mt-0 font-14">Thống Kê doanh số</h5>
                                    <div class="text-center">
                                        <ul class="list-inline chart-detail-list">
                                            <li class="list-inline-item">
                                                <p class="font-weight-semibold"><i ></i></p>
                                            </li>
                                            <li class="list-inline-item">
                                                <p class="font-weight-semibold"><i ></i></p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="dashboard-bar-stacked" class="morris-chart" dir="ltr" style="height: 320px;"></div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h5 class="mt-0 font-14">Tỉ lệ mua bán</h5>
                                    <div class="text-center">
                                        <ul class="list-inline chart-detail-list">
                                            <li class="list-inline-item">
                                                <p class="font-weight-semibold"><i class="fa fa-circle mr-2 text-primary"></i>Mua</p>
                                            </li>
                                            <li class="list-inline-item">
                                                <p class="font-weight-semibold"><i class="fa fa-circle mr-2 text-info"></i>Bán</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="dashboard-line-chart" class="morris-chart" dir="ltr" style="height: 300px;"></div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h5 class="mt-0 font-14 mb-3">Người dùng gần nhất</h5>
                                    <div class="table-responsive">
                                        <table class="table table-hover mails m-0 table table-actions-bar table-centered">
                                            <thead>
                                                <tr>
                                                    <th style="min-width: 95px;">

                                                        <div class="checkbox checkbox-single checkbox-primary">
                                                            <input type="checkbox" class="custom-control-input" id="action-checkbox">                                                        </div>
                                                    </th>
                                                    <th>Họ và tên</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Địa chỉ</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <?php
                                                        /*
                                                         $conn=mysqli_connect("localhost","root","","shopping");
                                                         $sql="SELECT * FROM users where id>9 ORDER BY id DESC LIMIT 6 ";     
                                                         $rs=mysqli_query($conn,$sql);*/
                                                         foreach($users as $row){
                                                                echo '
                                                                    <tr>
                                                                        <td>
                                                                            <div class="checkbox checkbox-primary mr-2 float-left">
                                                                                <input id="checkbox2" type="checkbox">
                                                                            </div>
                    
                                                                            <img src="../../uploads/'.$row['img'].'" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm">
                                                                        </td>
                    
                                                                        <td>
                                                                            '.$row['fullname'].'
                                                                        </td>
                                                                        <td>
                                                                            '.$row['username'].'
                                                                        </td>
                                                                        <td>
                                                                            '.$row['email'].'
                                                                        </td>
                                                                        
                                                                        <td>
                                                                            '.$row['sdt'].'
                                                                        </td>
                                                                        
                                                                        <td>
                                                                            '.$row['address'].'
                                                                        </td>                                                
                                                                    </tr>';      
                                                                }                                                   
                                                    ?>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div>
