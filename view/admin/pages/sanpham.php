      <!-- Start container-fluid -->
                    <div class="container-fluid">

                        <!-- start  -->
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <h3 class="header-title mb-3">Sản phẩm</h3>
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
                                                <th>Tên</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th>Màu Sắc</th>
                                                <th>Kích thước</th>
                                                <th>Hình ảnh</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                                <?php          
                                                     if (!isset($sanphamorder) )
                                                    {
                                                        foreach($sanpham as $row){
                                                            echo "<tr>";
                                                            echo ' <td>'.$row['name'].'</td>
                                                                    <td>'.$row['gia'].'</td>
                                                                    <td>'.$row['sl'].'</td>
                                                                    <td>'.$row['mausac'].'</td>
                                                                    <td>'.$row['kichthuoc'].'</td>                           
                                                                    <td><img src="../../uploads/'.$row['img'].'" style="height:80px"></td>
                                                                    <td><a href="index?act=xoasp&idsp='.$row['id'].'">Xóa</a> /-/ <a href="index?act=suasp&idsp='.$row['id'].'">Sửa</a></td>
                                                                    ';
                                                                    
                                                            echo "</tr>";
                                                         }
                                                    } else { 
                                                        $j=1; 
                                                        foreach($sanpham as $row){
                                                            echo "<tr>";
                                                            echo ' <td>'.$sanphamorder[$j]['name'].'</td>
                                                                    <td>'.$sanphamorder[$j]['gia'].'</td>
                                                                    <td>'.$quantity[$j]['quantity'].'</td>
                                                                    <td>'.$sanphamorder[$j]['mausac'].'</td>
                                                                    <td>'.$sanphamorder[$j]['kichthuoc'].'</td>                           
                                                                    <td><img src="../../uploads/'.$sanphamorder[$j]['img'].'" style="height:80px"></td>';                                                                    
                                                            echo "</tr>";
                                                            $j++;
                                                        }
                                                    }
                                                    
                                                ?>
                                                                                                                      
                                        </tbody>
                                    </table>
                                       <div class="pagination">
                                       <?php 
                                            if ($current_page>1 && $total_page>1){
                                                echo "<a href='index?act=sanpham&page=".($current_page-1)."'>Previous</a>";
                                            }
                                            if ($total_page>6){
                                                for ($i=$current_page;$i<=$current_page+5;$i++){
                                                
                                                    echo "<a href='index?act=sanpham&page=".$i."'>" . $i ."</a>  ";                             
                                                }
                                                echo "...";
                                            }
                                            else{
                                                for ($i=1;$i<=$total_page;$i++){
                                                
                                                    echo "<a href='index?act=sanpham&page=".$i."'>" . $i ."</a>  ";
                                
                                                }
                                            }                                          
                                            if ($current_page<$total_page && $total_page>1){
                                                echo "<a href='index?act=sanpham&page=".($current_page+1)."'>Next </a>";
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