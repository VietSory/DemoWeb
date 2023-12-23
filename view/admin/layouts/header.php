<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Administrator</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="../../public/admin/images/logo.png">
        <!-- third party css -->
        <link href="../../public\admin\libs\datatables\dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
        <link href="../../public\admin\libs\datatables\buttons.bootstrap4.css" rel="stylesheet" type="text/css">
        <link href="../../public\admin\libs\datatables\responsive.bootstrap4.css" rel="stylesheet" type="text/css">
        <link href="../../public\admin\libs\datatables\select.bootstrap4.css" rel="stylesheet" type="text/css">
        <!-- App css -->
        <link href="../../public\admin\css\bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="../../public\admin\css\icons.min.css" rel="stylesheet" type="text/css">
        <link href="../../public\admin\css\app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">
        <link href="../..//public/client/css/pagination.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script src="public\client\js/autocomplete.js"></script>

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    <li class="dropdown d-none d-lg-block">                
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-bell noti-icon"></i>
                            <span class="badge badge-danger rounded-circle noti-icon-badge">4</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="font-16 m-0">
                                    <span class="float-right">
                                        <a href="" class="text-dark">
                                            <small>Dọn hết</small>
                                        </a>
                                    </span>Thông báo
                                </h5>
                            </div>

                            <div class="slimscroll noti-scroll">

                                 <!-- item-->
                                 <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info"><i class="mdi mdi-account-plus"></i></div>
                                        <p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-danger"><i class="mdi mdi-heart"></i></div>
                                        <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">3 days ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning"><i class="mdi mdi-comment-account-outline"></i></div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">4 days ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-heart"></i>
                                        </div>
                                        <p class="notify-details">Carlos Crouch liked <b>Admin</b>
                                            <small class="text-muted">13 days ago</small>
                                        </p>
                                    </a>
                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-primary text-center notify-item notify-all ">
                               Xem tất cả
                                <i class="fi-arrow-right"></i>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <?php echo '<img src="../../uploads/'.$_SESSION['user']['img'].'" alt="user-image" class="rounded-circle" style="border:0px;width: 45px;height: 40px;">'; ?>
                            <span class="pro-user-name ml-1">
                                    <?php echo ''.$_SESSION['user']['fullname'].'  <i class="mdi mdi-chevron-down"></i> '; ?>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            
                                 <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Chào mừng !</h6>
                                </div>
    
                                <!-- item-->
                                <a href="index?act=profile" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-outline"></i>
                                    <span>Thông tin</span>
                                </a>
    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-settings-outline"></i>
                                    <span>Khóa màn hình</span>
                                </a>
    
                                <div class="dropdown-divider"></div>
    
                                <!-- item-->
                                <a href="index?act=logout" class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout-variant"></i>
                                    <span>Đăng xuất</span>
                                </a>
    
                        </div>
                    </li>

                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="../../index.php" class="logo text-center logo-dark">
                        <span class="logo-lg">
                            <img src="../../public\admin\images\logo.png" alt="" height="35">
                            <!-- <span class="logo-lg-text-dark">Simple</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">S</span> -->
                            <img src="../../public\admin\images\logo.PNG" alt="" height="35">
                        </span>
                    </a>

                    <a href="index.php?ok=2" class="logo text-center logo-light">
                        <span class="logo-lg">
                            <img src="../../public\admin\images\logo.png" alt="" height="35">
                            <!-- <span class="logo-lg-text-light">Simple</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-light">S</span> -->
                            <img src="../../public\admin\images\logo.PNG" alt="" height="35">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
        
                    <li class="d-none d-sm-block">
                        <form class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm danh mục,sản phầm,người dùng...">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- end Topbar --> <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">
               <div class="user-box">
                            <div class="float-left">
                                <?php
                                    echo '<img src="../../uploads/'.$_SESSION['user']['img'].'" alt="" class="avatar-md rounded-circle">';
                                ?>
                            </div>
                            <div class="user-info">
                                <?php
                                    echo '<a href="index?taikhoanql">'.$_SESSION['user']['fullname'].'</a>';
                                ?>
                                <p class="text-muted m-0">Administrator</p>
                            </div>
                        </div>
        
    
            <!--- Sidemenu -->
            <div id="sidebar-menu">
    
                <ul class="metismenu" id="side-menu">
        
                    <li>
                        <a href="index.php">
                            <i class="ti-home"></i>
                            <span> Trang chủ </span>
                        </a>
                    </li>
    
                    <li>
                        <a href="javascript: void(0);">
                            <i class="ti-paint-bucket"></i>
                            <span> Danh mục </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="index?act=danhmuc">Xem danh mục</a></li>
                            <li><a href="index?act=themdm">Thêm danh mục</a></li>
                        </ul>
                    </li>
    

                    <li>
                        <a href="javascript: void(0);">
                            <i class="ti-spray"></i>
                            <span> Sản Phẩm </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="index?act=sanpham">Xem sản phẩm</a></li>
                            <li><a href="index?act=themsp">Thêm sản phẩm</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="index.php?act=user">
                            <i class="ti-user"></i>
                            <span>Người dùng</span>
                        </a>
                    </li>
    
                    <li>
                        <a href="index.php?act=thongke">
                            <i class="ti-pie-chart"></i>
                            <span>Thống kê</span>
                        </a>
                    </li>
    
                    <li>
                        <a href="index?act=orders">
                            <i class="ti-files"></i>
                            <span>Đơn hàng</span>
                            <span class="badge badge-primary float-right"><?php echo $amountorder; ?></span>
                        </a>
                    </li>
    
                    <li>
                        <a href="index.php?act=baiviet">
                            <i class="ti-widget"></i>
                            <span> Bài Viết </span>
                        </a>
                    </li>
                </ul>
    
            </div>
            <!-- End Sidebar -->
    
            <div class="clearfix"></div>

    
    </div>
    <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

            
            

       