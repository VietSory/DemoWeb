  <!-- Start container-fluid -->
    <div class="container-fluid">

        <!-- start  -->
        <div class="row">
            <div class="col-md-12">
                <div class="p-0 text-center">
                    <div class="member-card">
                        <div class="avatar-xxl member-thumb mb-2 center-page mx-auto" >
                            <img src="../../uploads/<?php echo $row['img']; ?>" class="rounded-circle img-thumbnail" alt="profile-image" style="border:0px;width: 300px;height: 121px;">
                            <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                        </div>
              
                    </div>
                </div>
                <!-- end card-box -->
            </div>
            <!-- end col -->
        </div>
    </div>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container" style="width:600px;">
  <h2 style="text-align: center;">Hồ sơ của tôi</h2>
  <form action="index?act=profile" method="post" enctype="multipart/form-data">
    <div class="form-group" >
         <label for="name">Họ và tên :</label>
         <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $row['fullname'] ?>" >
    </div>
    <div class="form-group">
      <label for="name">Email</label>
      <input type="text" class="form-control" id="email" name="email"   value="<?php echo $row['email'] ?>">
    </div>
    <div class="form-group">
      <label for="name">Số điện thoại</label>
      <input type="int" class="form-control" id="sdt" name="sdt" value="<?php echo $row['sdt'] ?>">
    </div>
    <div class="form-group">
      <label for="name">Địa chỉ</label>
      <input type="text" class="form-control" id="dc" name="dc" value="<?php echo $row['address'] ?>">
    </div>
      <label for="name">Ảnh đại diện</label>
      <input type="file"  id="file" name="file" value="<?php echo $row['img'] ?>"></br>
    <div style="text-align: right;"> <button type="submit" class="btn text-center " style="background-color: black;color: white; width: 80px;" name="submit">Lưu</button></div>
</form>
</div>
