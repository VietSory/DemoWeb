<?php
?>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
     <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Thống kê theo : 365 ngày qua</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 
        <div class="row">
            <div class="col-12">
                <div class="card-box">                                 
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <h4 style="text-align: center;">Doanh số bán ra trong năm</h4>                                          

                                <div class="p-3">
                                    <div id="fchart" height="300"></div >
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    <!-- end row -->

                </div>
            </div><!-- end col-->
        </div>
        <!-- end row --> 
    </div> <!-- end container-fluid -->
    <script>
        $(document).ready(function(){
        new Morris.Line({
        
        element: 'fchart',

        data: <?php echo $chart_data; ?>,
        xkey: 'date',
        ykeys: ['order','sales','quantity'],

        labels: ['Doanh thu','Đơn hàng','Số lượng sản phẩm bán ra']
        });
    });
    </script>

