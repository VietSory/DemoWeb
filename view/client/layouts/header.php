<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>HQA - Online Shop Website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <!-- Favicon -->
    <link href="public\client\img/logo.png" rel="shortcut icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="public\client\lib/animate/animate.min.css" rel="stylesheet">
    <link href="public\client\lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="public\client\css/style.css" rel="stylesheet">
    <link href="public\client\css/pagination.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="public\client\css/vote.css">
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger
       bot
    ></df-messenger>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">Thông tin</a>
                    <a class="text-body mr-3" href="index?act=lienhe">Liên Hệ</a>
                    <a class="text-body mr-3" href="">Hỗ trợ</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown" style="margin-right: 10px;">Tài khoản</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <?php
                                if (isset($_SESSION['user'])){
                                    echo '<a href="index?act=profile" style="color: black;"><button class="dropdown-item" type="button">Tài khoản của tôi</button></a>
                                    <a href="index?act=cart" style="color: black;"><button class="dropdown-item" type="button">Đơn Mua</button></a>
                                    <a href="index.php?act=logout" style="color: black;"><button class="dropdown-item" type="button">Đăng Xuẩt</button></a>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Tiếng Việt</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">English</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="index.php" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">HQA</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                    <form class="input-group" action="index?act=search" method="post">
                        <input type="text" id="searchTerm" name="searchTerm" class="form-control" placeholder="Tìm sản phẩm , danh mục">
                        <div class="input-group-append">
                            <button class="input-group-text bg-transparent text-primary" name="submit">
                                <i class="fa fa-search"></i>                             
                            </button>
                        </div>
                    </form>
                    <div id="autocomplete-results"></div>
            </div >
            <div class="col-lg-4 col-6 text-right" >
                <span class="m-0">
                    <?php
                        if (isset($_SESSION['user']) )
                        {
                                $img=$_SESSION['user']['img'];
                                if($img>0){
                                    echo "<img src='./uploads/$img' style='margin-right: 10px;size:1px;width:20%'>";
                                }
                                else echo '<img src="public/client/img/andanh.jfif" style="margin-right: 10px;size: 20px;">';
                            }
                        
                        
                        else echo '<img src="img/andanh.jfif" style="margin-right: 10px;size: 20px;">';
                    ?>
                </span>
                <span class="">
                    <?php
                         if (isset($_SESSION['user']) ) echo $_SESSION['user']['fullname'];
                    ?>
                </span>          
            </div>
        </div>
    </div>
    <!-- Topbar End -->
     <!-- Navbar Start -->
     <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-2 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Danh mục</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <?php
                            foreach($danhmuchead as $value){
                                echo '<a href="index?act=listspdm&iddm='.$value['id'].'" class="nav-item nav-link">'.$value['name'].'</a>';
                            }
                        ?>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">HQA</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index" class="nav-item nav-link active">Trang chủ</a>
                            <a href="index?act=listsp" class="nav-item nav-link">Sản Phẩm</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Săn sales <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="index?act=hethang" class="dropdown-item">Đồ 0đ</a>
                                    <a href="index?act=hethang" class="dropdown-item">Dép freeship</a>
                                    <a href="index?act=hethang" class="dropdown-item">Iphone 1k</a>
                                </div>
                            </div>
                            <?php
                                if ($_SESSION['user']['role']=='admin'){
                                    echo '<a href="view/admin/index.php" class="nav-item nav-link">Trở về trang admin</a>';
                                }
                            ?>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                            <a href="index?act=cart" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;" ><?php echo $totalcart; ?></span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- Navbar End -->
<script src="public\client\js/autocomplete.js"></script>
