<?php
     
    session_start();
    ob_start();

    include('../../model/pdo.php');
    include('../../model/usermodel.php');
    include('../../model/danhmuc.php');
    require('../../model/sanpham.php');
    require('../../model/service.php');
    require('../../model/cart.php');
    require('../../model/order.php');
    require('../../model/thongke.php');


    $amountorder=amountorder(-1);
    $countsp=countsp();
    $countdm=countdm();
    $countuser=countt();



include('../../view/admin/layouts/header.php');

if ( isset($_SESSION['user']) )
  {                    
    date_default_timezone_set('Asia/Ho_Chi_Minh');                        
    if (isset($_GET['act']))
        {
            $act=$_GET['act'];
            switch ($act)
            {
                case 'logout':
                    session_start();
                    session_unset();
                    session_destroy();
                    header("location:../../index");
                    break;

                case 'profile':
                    $id=$_SESSION['user']['id'];
                    $row=profile($id);
                    if (isset($_POST['submit']))
                    {
                        $fullname=$_POST['fullname'];
                        $email=$_POST['email'];
                        $sdt=$_POST['sdt'];
                        $dc=$_POST['dc'];
                        editprofile($id,$fullname,$email,$sdt,$dc);
                        header("location:index?act=profile");
                    }  else {
                        include "../../view/admin/pages/profile.php";
                    }    
                    break;
                
                case 'danhmuc':
                    $limit=7;
                    $total_records=countdm();
                    $current_page= isset($_GET['page']) ? $_GET['page']:1;
                    $total_page=ceil($total_records/$limit);
                    if ($current_page>$total_page){
                        $total_page=$current_page;
                    } else {
                        if ($current_page<1){
                        $current_page=1;
                        }
                    }
                    $start=($current_page-1)*$limit;   
                    $danhmuc=listdm($start,$limit); 
                    include "../../view/admin/pages/danhmuc.php";
                    break;

                case 'themdm':
                    $iddm=iddm()+1;
                    include "../../view/admin/pages/themdm.php";
                    if (isset($_POST['submit']))
                        {
                            $name=$_POST['name'];
                            $mota=$_POST['mota'];
                            adddm($name,$mota);
                            header("location:index?act=danhmuc");
                        }
                    break;

                case 'xoadm':
                        if (isset($_GET['iddm'])){
                            $iddm=$_GET['iddm'];
                            xoadm($iddm);
                            header("location:index?act=danhmuc");
                        }
                    break;

                case 'suadm':
                    if (isset($_GET['iddm']))
                    {
                        $iddm=$_GET['iddm'];
                        $row=danhmuc($iddm);
                        if (isset($_POST['submit']))
                        {
                                $name=$_POST['name'];
                                $mota=$_POST['mota'];
                                suadanhmuc($iddm,$name,$mota);
                                header("location:index?act=danhmuc");
                                } 
                        else {
                            include "../../view/admin/pages/suadm.php";
                        }        
                    }
                    break;

                case 'sanpham':
                    if (isset($_GET['sanphamorder'])){
                        $idorder=$_GET['sanphamorder'];
                        $limit=amountorder($idorder);
                        $total_records=amountorder($idorder);
                        $current_page= isset($_GET['page']) ? $_GET['page']:1;
                        $total_page=ceil($total_records/$limit);
                        if ($current_page>$total_page){
                            $total_page=$current_page;
                        } else {
                            if ($current_page<1){
                                $current_page=1;
                            }
                        }
                        $sanpham=order_item($idorder);
                        $start=($current_page-1)*$limit;  
                        $j=1;
                        foreach($sanpham as $values){
                            $sanphamorder[$j]=listorder($start,$limit,$values['product_id']);
                            $quantity[$j]=quantity($idorder,$values['product_id']);
                            $j++;
                        } 
                    } else {
                        $limit=7;
                        $total_records=countsp();
                        $current_page= isset($_GET['page']) ? $_GET['page']:1;
                        $total_page=ceil($total_records/$limit);
                        if ($current_page>$total_page){
                            $total_page=$current_page;
                        } else {
                            if ($current_page<1){
                            $current_page=1;
                            }
                        }
                        $start=($current_page-1)*$limit;   
                        $sanpham=listsp($start,$limit,-1);
                    }
                    
                    include "../../view/admin/pages/sanpham.php";
                    break;

                case 'themsp':
                    $rs=danhmuc(-1);
                    include "../../view/admin/pages/themsp.php";
                    if (isset($_POST['submit']))
                        {
                            $name=$_POST['name'];
                            $gia=$_POST['gia'];
                            $sl=$_POST['sl'];
                            $ms=$_POST['mausac'];
                            $size=$_POST['kichthuoc'];
                            $iddm=$_POST['iddm'];
                            $mota=$_POST['mota'];
                            addsp($name,$gia,$sl,$ms,$size,$iddm,$mota);
                            header("location:index?act=sanpham");
                        }
                    break;

                case 'xoasp':
                        if (isset($_GET['idsp'])){
                            $idsp=$_GET['idsp'];
                            $row=sanpham($idsp);
                            $iddm=$row['iddm'];
                            xoasp($idsp,$iddm); 
                            header("location:index?act=sanpham");                          
                        }
                    break;

                case 'suasp':
                        if (isset($_GET['idsp']))
                        {
                            $idsp=$_GET['idsp'];
                            $row=sanpham($idsp);
                            $rs=danhmuc(-1);
                            if (isset($_POST['submit']))
                            {
                                $name=$_POST['name'];
                                $gia=$_POST['gia'];
                                $sl=$_POST['sl'];
                                $ms=$_POST['mausac'];
                                $size=$_POST['kichthuoc'];
                                $iddm=$_POST['iddm'];
                                $mota=$_POST['mota'];
                                suasanpham($idsp,$name,$gia,$sl,$ms,$size,$iddm,$mota);
                                header("location:index?act=sanpham");
                            } else {
                                include "../../view/admin/pages/suasp.php";
                            }        
                        }    
                    break;
                case 'user':
                    if (isset($_GET['userorder'])){
                        $id=$_GET['userorder'];
                        $user=profile($id);
                    } else {
                        $limit=7;
                        $total_records=countt();
                        $current_page= isset($_GET['page']) ? $_GET['page']:1;
                        $total_page=ceil($total_records/$limit);
                        if ($current_page>$total_page){
                            $total_page=$current_page;
                        } else {
                            if ($current_page<1){
                            $current_page=1;
                            }
                        }
                        $start=($current_page-1)*$limit;   
                        $users=listuser($start,$limit); 
                    }
                    include "../../view/admin/pages/user.php";
                    break;  
                case 'xoauser':
                    if (isset($_GET['iduser'])){
                        $iduser=$_GET['iduser'];
                        xoa($iduser);
                        header("location:index?act=user");
                    }
                    break;
                case 'orders':
                    $limit=7;
                    $total_records=amountorder(-1);
                    $current_page= isset($_GET['page']) ? $_GET['page']:1;
                    $total_page=ceil($total_records/$limit);
                    if ($current_page>$total_page){
                        $total_page=$current_page;
                    } else {
                        if ($current_page<1){
                        $current_page=1;
                        }
                    }
                    $start=($current_page-1)*$limit;   
                    $orders=listorder($start,$limit,-1); 
                    include "../../view/admin/pages/orders.php";
                    break;
                case 'thongke':
                    $chart_data=solieu();
                    include "../../view/admin/pages/chart.php";
                    break;
                case 'accept':
                    if (isset($_GET['idorder'])){
                        $idorder=$_GET['idorder'];
                        statusorder(0,$idorder);
                    }
                    header("location:index?act=orders");
                    break;
                case 'decline':
                    if (isset($_GET['idorder'])){
                        $idorder=$_GET['idorder'];
                        statusorder(-1,$idorder);
                    }
                    header("location:index?act=orders");
                    break;  
                case 'baiviet':
                    include "../../view/admin/pages/baiviet.php";
                    break;

            }
        }  else {
                    $users=users(9);
                    include "../../view/admin/pages/home.php";
                }

include('../../view/admin/layouts/footer.php');
} else require('../../view/client/pages/login.php');
?>
