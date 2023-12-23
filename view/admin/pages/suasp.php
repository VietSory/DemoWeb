﻿                <div class="container-fluid">

                    <!-- start  -->
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <h4 class="header-title mb-3">Sửa Sản phẩm</h4>
                                
                            </div>
                        </div>
                    </div>
<!-- end row -->

                    <div class="row"style="margin-top: 35px;" >
                        <div class="col-lg-6">
                            <form class="form-horizontal" style="width: 640px;" method="post" action="index?act=suasp&idsp=<?php echo $row['id']; ?>"  enctype="multipart/form-data">
                            <span style="text-align: left;">
                                <div class="form-group row" style="margin-bottom: 30px;">
                                    <label class="col-md-2 col-form-label">Tên sản phẩm</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="name" value="<?php echo $row['name'] ?>">
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <div class="form-group row" style="margin-bottom: 30px;">
                                    <label class="col-md-2 col-form-label" for="example-email">Giá</label>
                                    <div class="col-md-10">
                                        <input type="text" id="example-email" name="gia" class="form-control" placeholder="Nhập giá sản phẩm" value="<?php echo $row['gia'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom: 30px;">
                                    <label class="col-md-2 col-form-label" for="example-email">Số lượng</label>
                                    <div class="col-md-10">
                                        <input type="text" id="example-email" name="sl" class="form-control" placeholder="Nhập số lượng sản phẩm" value="<?php echo $row['sl'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom: 30px;">
                                    <label class="col-md-2 col-form-label" for="example-email">Màu sắc</label>
                                    <div class="col-md-10">
                                        <input type="text" id="example-email" name="mausac" class="form-control" placeholder="Nhập màu sắc sản phẩm" value="<?php echo $row['mausac'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom: 30px;">
                                    <label class="col-md-2 col-form-label" for="example-email">Kích thước</label>
                                    <div class="col-md-10">
                                        <input type="text" id="example-email" name="kichthuoc" class="form-control" placeholder="Nhập kích thước sản phẩm" value="<?php echo $row['kichthuoc'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom: 30px;">
                                    <label class="col-md-2 col-form-label" for="example-email">Danh mục</label>
                                    <div class="col-md-10 " >
                                        <select name="iddm" >
                                            <?php
                                                foreach($rs as $option){
                                                    echo "<option  value=".$option['id'].">".$option['name']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row" style="margin-bottom: 30px;">
                                    <label class="col-md-2 col-form-label" for="example-textarea">Mô tả</label>
                                    <div class="col-md-10">
                                        <textarea  class="form-control" rows="5" id="mota" name="mota" ><?php echo $row['mota']; ?></textarea>
                                    </div>
                                </div>
                            </span>

                            <span >
                            <div class="form-group row" style="margin-bottom: 30px;">
                                    <label class="col-md-2 col-form-label" for="example-email">Hình ảnh</label>
                                    <div class="col-md-10">
                                        <input type="file" id="example-email" name="file" >
                                    </div>
                                </div>
                            </span>
                            <div style= "text-align: left;margin-left:110px;"> <button type="submit" class="btn text-center " style="background-color: green;color: white;width: 160px;" name="submit">Sửa sản phẩm</button></div>
                        </form>
                    </div>
                    <div class="col-lg-6">                       
                         <span style="float: right;"><img style="height:310px;width:400px"  id="previewImage" src="../../uploads/<?php echo $row['img'] ?>"></span>                           
                    </div>
                           
                            <!-- end -->                      
    </div>
                        <!-- end row -->
</div>
<script>
    // Lắng nghe sự kiện khi tệp đã được chọn
    document.querySelector('input[name="file"]').addEventListener('change', function() {
        // Lấy thẻ <img> bằng id
        var previewImage = document.getElementById('previewImage');

        // Kiểm tra nếu tệp hình ảnh đã chọn và định dạng hợp lệ
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                // Cập nhật thuộc tính src của thẻ <img> với dữ liệu hình ảnh đã tải lên
                previewImage.src = e.target.result;
            }

            // Đọc và hiển thị hình ảnh
            reader.readAsDataURL(this.files[0]);
        }
    });
    CKEDITOR.replace('mota');
</script>

