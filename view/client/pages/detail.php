 <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Trang chủ</a>
                    <span class="breadcrumb-item active">Chi tiết sản phẩm</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="uploads/<?php echo $sanpham['img']; ?>" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3><?php echo $sanpham['name']; ?></h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                        <?php
                                  for ($j = 1; $j <= $star; ++$j) {
                                    echo "<div id='rating'>";
                                    echo "  <input type='radio' name='rating' value='$j' />";
                                    echo "  <label class = 'voted' for='star5' title='Awesome - 5 stars'></label>";
                                    echo "</div>";
                                }
                            ?>
                        </div>
                        <small class="pt-1" style=" margin-top: 6px;">(<?php echo --$i; ?> Reviews)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">
                        <?php
                            $formattedNumber = number_format($sanpham['gia'], 0, ',', '.');
                            echo $formattedNumber.' đ'; 
                         ?>
                    </h3>
                    <p class="mb-4">Chúng tôi cam kết sản phẩm chính hãng và giá tốt nhất thị trường.</br>Deal sốc:  mua 2 tặng 3</p>
                    <div class="d-flex mb-3">
                        <?php
                                if ($sanpham['kichthuoc']!=null){
                                    echo '<strong class="text-dark mr-3">Kích thước:</strong>
                                        <form>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="size-1" name="size">
                                                <label class="custom-control-label" for="size-1">'.$sanpham['kichthuoc'].'</label>
                                            </div>
                                        </form>';
                                }
                        ?>
                    </div>
                    <div class="d-flex mb-4">
                        <strong class="text-dark mr-3">Màu Sắc:</strong>
                        <?php
                            if ($sanpham['mausac']!=null){
                                echo '<form>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="color-1" name="color">
                                            <label class="custom-control-label" for="color-1">'.$sanpham['mausac'].'</label>
                                        </div>
                                    </form>';
                            }
                        ?>
                    </div>
                    <form action="index?act=cart&idsp=<?php echo $idsp; ?>" method="post">
                        <div class="d-flex align-items-center mb-4 pt-2">
                            <div class="input-group quantity mr-3" style="width: 130px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary btn-minus" type="button">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control bg-secondary border-0 text-center" value="1" name="soluong">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary btn-plus" type="button">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>                        
                            <button class="btn btn-primary px-3" name="submit"><i class="fa fa-shopping-cart mr-1"></i>Thêm vào giỏ hàng</button>
                        </div>
                    </form>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Đánh giá <?php echo "(".$i.")"; ?></a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Mô tả sản phẩm</h4>
                            <p><?php echo $sanpham['mota']; ?></p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="media mb-4" id="newcomment">
                                        
                                    </div>
                                    <?php
                                        $j=1;
                                        foreach($comment as $value){
                                            if ($image[$j]==null) $src="public/client/img/andanh.jfif"; else $src="uploads/$image[$j]";
                                            echo '<div class="media mb-4">
                                                    <img src='.$src.' alt="Image" class="img-fluid mr-3 mt-1" style="width: 60px;height:52px">
                                                    <div class="media-body">
                                                        <h6> '. $fullname[$j] .'<small> - <i>'. $value['date'].'</i></small></h6>
                                                        <div class="text-primary mb-2" style="margin-bottom: 99px;">
                                                        ';
                                                                for ($i = 1; $i <= $value['star']; ++$i) {
                                                                    echo "<div id='rating'>";
                                                                    echo "  <input type='radio' name='ratin' value='$i' />";
                                                                    echo "  <label class = 'voted' for='star5' title='Awesome - 5 stars'></label>";
                                                                    echo "</div>";
                                                                }
                                            echo    '</div> </br>                                             
                                                        <p style="padding-top: 25px;">'. $value['content'].'</p>
                                                    </div>
                                                </div>';
                                                $j++;
                                        }
                                    ?>
                                    
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4">Đánh giá sản phẩm</h4>
                                    <small>Email của bạn sẽ không được công khai *</small>
                                    <div class="d-flex my-3">
                                        <input type="hidden" class="fullname" name="fullname" value="<?php echo $_SESSION['user']['fullname']; ?>">
                                        <input type="hidden" class="idsp" name="idsp" value="<?php echo $idsp; ?>">
                                        <input type="hidden" class="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>">
                                        <p class="mb-0 mr-2" style="padding-top: 8px;">Mức độ hài lòng * :</p>
                                        <div id="rating">
                                                <input class="star-input" type="radio" id="star5" name="rating" value="5" />
                                                <label class="full" for="star5" title="Awesome - 5 stars"></label>

                                                <input class="star-input" type="radio" id="star4" name="rating" value="4" />
                                                <label class="full" for="star4" title="Pretty good - 4 stars"></label>

                                                <input class="star-input" type="radio" id="star3" name="rating" value="3" />
                                                <label class="full" for="star3" title="Meh - 3 stars"></label>

                                                <input class="star-input" type="radio" id="star2" name="rating" value="2" />
                                                <label class="full" for="star2" title="Kinda bad - 2 stars"></label>

                                                <input class="star-input" type="radio" id="star1" name="rating" value="1" />
                                                <label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                            </div>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label for="message">Đánh giá của bạn *</label>
                                            <textarea id="message" cols="30" rows="5" class="form-control content"></textarea>
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Đăng bình luận" class="btn_submit btn-primary px-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid " style="padding-left: 0px;padding-right: 0px;">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Bạn có thể thích</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                        <?php
                            $j=1;
                            foreach($row as $row){
                                $formattedNumber = number_format($row['gia'], 0, ',', '.');
                                echo '
                                    <div class="product-item bg-light">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid w-100" src="uploads/'.$row['img'].'" alt="">
                                            <div class="product-action">
                                                <a class="btn btn-outline-dark btn-square" href="index?act=cart&idsp='.$row['id'].'"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate" href="index?act=detail&idsp='.$row['id'].'">'.$row['name'].'</a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5>'.$formattedNumber.'</h5><h6 class="text-muted ml-2">đ</h6>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mb-1">';
                                            for ($i = 1; $i <= $stars[$j]; ++$i) {
                                                echo "<div id='rating'>";
                                                echo "  <input type='radio' name='rating' value='$i' />";
                                                echo "  <label class = 'voted' for='star5' title='Awesome - 5 stars'></label>";
                                                echo "</div>";
                                            }
                                            echo   '<small style="margin-bottom: 8px;">('.$totalcmt[$j].')</small>
                                            </div>
                                        </div>
                                    </div>';     
                                $j++;              
                            }
                        ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
<script src="public\client\js/comment.js"></script>

