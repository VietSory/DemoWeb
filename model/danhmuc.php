<?php
    function countdm(){
        $sql="SELECT count(id) as total from danhmuc";
        $row=pdo_query_one($sql);
         $result=$row['total'];
         return $result;
    }

    function listdm($start,$limit){
        $sql="SELECT * from danhmuc limit $start,$limit";
        $result=pdo_query($sql);
        return $result;
    }
    function iddm(){
        $sql="SELECT id FROM danhmuc ORDER BY id DESC LIMIT 1;";
        $row=pdo_query_one($sql);
        $iddm=$row['id'];
        return $iddm;
    }
    function adddm($name,$mota){
        $fileNameNew=0;

            $name=$_POST['name'];
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
                            $Sql="INSERT into danhmuc(name,mota,img) values ('$name','$mota','$fileNameNew') ";
                            pdo_query($Sql);

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
    function xoadm($iddm){
        $sql="DELETE from danhmuc where id=".$iddm;
        pdo_execute($sql);
    }
    function danhmuc($iddm){
        if ($iddm!=-1){
            $sql="SELECT * from danhmuc where id=".$iddm;
            $result=pdo_query_one($sql);
            return $result;
        } else {
            $sql="SELECT * from danhmuc";
            $result=pdo_query($sql);
            return $result;
        }
       
    }
    function suadanhmuc($iddm,$name,$mota){
        $fileNameNew=0;
        $id=$iddm;

             $file=$_FILES['file'];
             $fileName=$_FILES['file']['name'];
             $fileTmpName=$_FILES['file']['tmp_name'];
             $fileSize=$_FILES['file']['size'];
             $fileError=$_FILES['file']['error'];
             $fileType=$_FILES['file']['type'];
     
         $fileExt=explode('.',$fileName);
         $fileActualExit = strtolower(end($fileExt));
         $allowed= array('jpg','jpeg','png','pdf');
         if($fileActualExit!=null){
             if (in_array($fileActualExit,$allowed)){
                 if ($fileError===0){
                     if ($fileSize<90000000){
                             $fileNameNew= uniqid('',true);
                             $fileDestination='G:\code\Web_Project\DACS\Năm 2(kì 1)\Shopping/uploads/'.$fileNameNew;
                             move_uploaded_file($fileTmpName,$fileDestination);
                             $Sql="UPDATE danhmuc set name='$name',mota='$mota',img='$fileNameNew' where id=".$id;
                             pdo_execute($Sql);
                     } 				
                     else{
                         echo "Your file is too big!";
                     }
                 } else{
                     echo "There was an error uploading your file!";
                 }
             } else{
                 echo "You can upload this file!";
             }
         } else{
             $Sql="UPDATE danhmuc set name='$name',mota='$mota' where id= ".$id;
             pdo_execute($Sql);
         }
    }
    function totalspmuch($limit){
        $sql="SELECT * from danhmuc order by totalsp DESC limit $limit";
        $result=pdo_query($sql);
        return $result;
    }
    function settotalsp($iddm){
        $sql="SELECT count(id) as total from sanpham where iddm=$iddm";
        $row=pdo_query_one($sql);
        $result=$row['total'];
        $sql="update danhmuc set totalsp=$result where id=$iddm";
        pdo_execute($sql);
    }
