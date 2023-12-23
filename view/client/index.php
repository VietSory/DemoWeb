<?php

    session_start();
    ob_start();

    include('../../model/pdo.php');
    include('../../model/usermodel.php');
    include('../../model/danhmuc.php');
    require('../../model/sanpham.php');
    require('../../model/service.php');


    if (isset($_GET['act']))
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');  
        $act=$_GET['act'];
        switch ($act){
            case 'xulicmt':
                $idsp=$_POST['idsp'];
                $name=$_POST['fullname'];
                $email=$_POST['email'];
                $content=$_POST['content'];
                $star=$_POST['star'];
                $date=date("Y-m-d H:i:s");
                $iduser=checkExists($email)['id'];
                $img=checkExists($email)['img'];
                xulicmt($iduser,$idsp,$date,$star,$content);
                include "./pages/comment.php";
            break;
            default:
                echo "fail";
                break;
        }
    } else{
        if (isset($_POST['searchTerm'])) {
            $searchTerm = $_POST['searchTerm'];
            $term=autocomplete($searchTerm);
            if ($term!=null)
                {
                    foreach ($term as $value){
                        success($value['name'],$value['id']);
                    }            
                } else  faill();
            }
    }
?>