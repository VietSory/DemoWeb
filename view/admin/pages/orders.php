         <!-- Start container-fluid -->
                    <div class="container-fluid">

                        <!-- start  -->
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <h3 class="header-title mb-3">Đơn đặt hàng</h3>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->                              
                        <div class="row">
                            <div class="col-12">                           
                                <div class="mt-5">
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Tài khoản đặt</th>
                                                <th>Họ và tên</th>
                                                <th>Email</th>
                                                <th>Số điện thoại</th>
                                                <th>Địa chỉ</th>
                                                <th>Ngày đặt hàng</th>
                                                <th>Sản phẩm</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                                <?php
                                                     foreach($orders as $row){
                                                        echo '
                                                            <tr>
                                                                <td>
                                                                    <a href="index?act=user&userorder='.$row['iduser'].'">Xem tài khoản</a>
                                                                </td>

                                                                <td>
                                                                    '.$row['fullname'].'
                                                                </td>

                                                                <td>
                                                                    '.$row['email'].'
                                                                </td>
                                                                
                                                                <td>
                                                                    '.$row['phone'].'
                                                                </td>
                                                                
                                                                <td>
                                                                    '.$row['address'].'
                                                                </td> 

                                                                <td>
                                                                    '.$row['date'].'
                                                                </td> 
                                                                <td>
                                                                    <a href="index?act=sanpham&sanphamorder='.$row['id'].'">Xem sản phẩm</a>
                                                                </td>
                                                                <td><a href="index?act=accept&idorder='.$row['id'].'">Xác nhận</a> /-/ <a href="index?act=decline&idorder='.$row['id'].'">Từ chối</a></td>
                                                            </tr>';      
                                                        }
                                                    ?>
                                                                                                                      
                                        </tbody>
                                    </table>
                                       <div class="pagination">
                                       <?php 
                                            if ($current_page>1 && $total_page>1){
                                                echo "<a href='index?act=danhmuc&page=".($current_page-1)."'>Previous</a>";
                                            }
                                            if ($total_page>6){
                                                for ($i=$current_page;$i<=$current_page+5;$i++){
                                                
                                                    echo "<a href='index?act=danhmuc&page=".$i."'>" . $i ."</a>  ";                             
                                                }
                                                echo "...";
                                            }
                                            else{
                                                for ($i=1;$i<=$total_page;$i++){
                                                
                                                    echo "<a href='index?act=danhmuc&page=".$i."'>" . $i ."</a>  ";
                                
                                                }
                                            }                                          
                                            if ($current_page<$total_page && $total_page>1){
                                                echo "<a href='index?act=danhmuc&page=".($current_page+1)."'>Next </a>";
                                            }
                                        ?>
                                       </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end container-fluid -->
<script>
    $(document).ready(function() {
        if ($.fn.DataTable.isDataTable('#datatable-buttons')) {
            $('#datatable-buttons').DataTable().destroy(); // Hủy bỏ DataTable nếu đã tồn tại

        }

        $('#datatable-buttons').DataTable({
            dom: 'Bfrtip', // Include export buttons
            buttons: [
                'copy', 'excel', 'pdf'
            ],
            paging: false, // Disable pagination
        });
    });
</script>