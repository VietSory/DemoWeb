<?php
    function countsp(){
        $sql="SELECT count(id) as total from sanpham";
        $row=pdo_query_one($sql);
         $result=$row['total'];
         return $result;
    }

    function listsp($start,$limit,$iddm){
        if ($iddm==-1){
            $sql="SELECT * from sanpham limit $start,$limit";
            $result=pdo_query($sql);

        } else {
            $sql="SELECT * from sanpham where iddm=$iddm limit $start,$limit ";
            $result=pdo_query($sql);
        }
        return $result;
    }
    function idsp(){
        $sql="SELECT id FROM sanpham ORDER BY id DESC LIMIT 1;";
        $row=pdo_query_one($sql);
        $idsp=$row['id'];
        return $idsp;
    }
    function addsp($name,$gia,$sl,$ms,$size,$iddm,$mota){
        $fileNameNew=0;

        $name=$_POST['name'];
        $gia=$_POST['gia'];
        $sl=$_POST['sl'];
        $ms=$_POST['mausac'];
        $size=$_POST['kichthuoc'];
        $iddm=$_POST['iddm'];
        $mota=$_POST['mota'];

                $file=$_FILES['file'];
                $fileName=$_FILES['file']['name'];
                $fileTmpName=$_FILES['file']['tmp_name'];
                $fileSize=$_FILES['file']['size'];
                $fileError=$_FILES['file']['error'];
                $fileType=$_FILES['file']['type'];
        
            $fileExt=explode('.',$fileName);
            $fileActualExit = strtolower(end($fileExt));
            $allowed= array('jpg','jpeg','png','pdf','jfif');
            if (in_array($fileActualExit,$allowed)){
                if ($fileError===0){
                    if ($fileSize<90000000){
                            $fileNameNew= uniqid('',true);
                            $fileDestination='G:\code\Web_Project\DACS\Năm 2(kì 1)\Shopping/uploads/'.$fileNameNew;
                            move_uploaded_file($fileTmpName,$fileDestination);
                            $Sql="INSERT into sanpham(iddm,name,gia,sl,mausac,kichthuoc,mota,img) values ($iddm,'$name',$gia,$sl,'$ms','$size','$mota','$fileNameNew') ";
                            pdo_query($Sql);
                            $sql="Update danhmuc set totalsp=totalsp+1 where id=$iddm";
                            pdo_execute($sql);

                    } 				
                    else{
                        echo "Your file is too big!";
                    }
                } else{
                    echo "There was an error uploading your file!";
                }
            } else{
                echo "You cannot upload files of this type!";
            }

    }
    function xoasp($idsp,$iddm){
        $sql="DELETE from sanpham where id=".$idsp;
        pdo_query($sql);
        $sql="Update danhmuc set totalsp=totalsp-1 where id=$iddm";
        pdo_execute($sql);
    }
    function sanpham($idsp){
        if ($idsp!=-1){
            $sql="SELECT * from sanpham where id=".$idsp;
            $result=pdo_query_one($sql);
            return $result;
        }
        else {
            $sql="SELECT * from sanpham";
            $result=pdo_query($sql);
            return $result;     
        }
    }
    function suasanpham($idsp,$name,$gia,$sl,$ms,$size,$iddm,$mota){
        $fileNameNew=0;

        $name=$_POST['name'];
        $gia=$_POST['gia'];
        $sl=$_POST['sl'];
        $ms=$_POST['mausac'];
        $size=$_POST['kichthuoc'];
        $iddm=$_POST['iddm'];
        $mota=$_POST['mota'];

                $file=$_FILES['file'];
                $fileName=$_FILES['file']['name'];
                $fileTmpName=$_FILES['file']['tmp_name'];
                $fileSize=$_FILES['file']['size'];
                $fileError=$_FILES['file']['error'];
                $fileType=$_FILES['file']['type'];
        
            $fileExt=explode('.',$fileName);
            $fileActualExit = strtolower(end($fileExt));
            $allowed= array('jpg','jpeg','png','pdf','jfif');
         if($fileActualExit!=null){
            if (in_array($fileActualExit,$allowed)){
                if ($fileError===0){
                    if ($fileSize<90000000){
                            $fileNameNew= uniqid('',true);
                            $fileDestination='G:\code\Web_Project\DACS\Năm 2(kì 1)\Shopping/uploads/'.$fileNameNew;
                            move_uploaded_file($fileTmpName,$fileDestination);
                            $Sql="UPDATE sanpham set iddm=$iddm,name='$name',gia=$gia,sl=$sl,mausac='$ms',kichthuoc='$size',mota='$mota',img='$fileNameNew' where id=".$idsp;
                            pdo_execute($Sql);

                    } 				
                    else{
                        echo "Your file is too big!";
                    }
                } else{
                    echo "There was an error uploading your file!";
                }
            } else{
                echo "You cannot upload files of this type!";
            }
        } else{
            $Sql="UPDATE sanpham set iddm=$iddm,name='$name',gia=$gia,sl=$sl,mausac='$ms',kichthuoc='$size',mota='$mota' where id=".$idsp;
            pdo_execute($Sql);
         }
    }
    function latestsp($limit,$iddm){
        if ($limit==-1){
            if ($iddm!=-1){
                $sql="SELECT * from sanpham where id=$iddm";
            } else if ($limit==-1) {
                $sql="SELECT * from sanpham order by id DESC ";
            }      
        } else if ($limit!=-1) {
                $sql="SELECT * from sanpham order by id DESC limit $limit";
        }
        $result=pdo_query($sql);
        return $result;   
    }
    function comment($idsp){
        $sql_cmt = "SELECT * FROM comment WHERE idsp = $idsp ORDER BY id DESC";
        $rs=pdo_query($sql_cmt);
        return $rs;
    }
    function xulicmt($iduser,$idsp,$date,$star,$content){
        $sql="INSERT into comment (iduser,idsp,star,content,date) values ($iduser,$idsp,$star,'$content','$date')";
        pdo_execute($sql);
    }
    function averagecmt($idsp){
        $total=totalcmt($idsp);
        if  ( $total==0)    return 5;
        $sql = "SELECT sum(star) as total_sum FROM comment WHERE idsp = $idsp";
        $total_sum=pdo_query_one($sql);
        $rs=ceil($total_sum['total_sum']/$total);
        return $rs;
    }
    function totalcmt($idsp){
        $sql_cmt = "SELECT count(id) as total FROM comment WHERE idsp = $idsp";
        $rs=pdo_query_one($sql_cmt);
        $result=$rs['total'];
        return $result;
    }