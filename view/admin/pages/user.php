         <!-- Start container-fluid -->
                    <div class="container-fluid">

                        <!-- start  -->
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <h3 class="header-title mb-3">Người dùng</h3>
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
                                                <th>Họ và tên</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Số điện thoại</th>
                                                <th>Địa chỉ</th>
                                                <th>Hình ảnh</th>

                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                                <?php
                                                    if (!isset($user) || $user===NULL)
                                                        {
                                                            foreach($users as $row){
                                                                echo '
                                                                    <tr>
                    
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
                                                                        <td>
                                                                            <div class="checkbox checkbox-primary mr-2 float-left">
                                                                                <input id="checkbox2" type="checkbox">
                                                                            </div>
                                                                            <img src="../../uploads/'.$row['img'].'" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm">
                                                                        </td>   
                                                                        <td><a href="index?act=xoauser&iduser='.$row['id'].'">Xóa</a></td>                                                            
                                                                    </tr>';      
                                                                }
                                                            } else {
                                                                echo '
                                                                    <tr>
                                                                        <td>
                                                                            '.$user['fullname'].'
                                                                        </td>
                                                                        <td>
                                                                            '.$user['username'].'
                                                                        </td>
                                                                        <td>
                                                                            '.$user['email'].'
                                                                        </td>
                                                                        
                                                                        <td>
                                                                            '.$user['sdt'].'
                                                                        </td>
                                                                        
                                                                        <td>
                                                                            '.$user['address'].'
                                                                        </td> 
                                                                        <td>
                                                                            <div class="checkbox checkbox-primary mr-2 float-left">
                                                                                <input id="checkbox2" type="checkbox">
                                                                            </div>
                                                                            <img src="../../uploads/'.$user['img'].'" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm">
                                                                        </td>   
                                                                        <td><a href="index?act=xoauser&iduser='.$user['id'].'">Xóa</a></td>                                                            
                                                                    </tr>';  
                                                            }
                                                     
                                                    ?>
                                                                                                                      
                                        </tbody>
                                    </table>
                                       <div class="pagination">
                                       <?php                                               
                                            if (!isset($user) || $user===NULL)
                                                {
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