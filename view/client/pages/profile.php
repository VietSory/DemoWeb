<!DOCTYPE html>
<html lang="en">
<head>
  <title>information</title>
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
         <input type="text" class="form-control" id="name" name="fullname" value="<?php echo $row['fullname'] ?>" >
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

</body>
</html>
