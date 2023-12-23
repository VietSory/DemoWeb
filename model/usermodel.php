<?php
    function countt(){
        $sql="SELECT count(id) as total from users where id>1";
        $row=pdo_query_one($sql);
         $result=$row['total'];
         return $result;
    }
    function checkExists($email) {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = pdo_query_one($sql);           
        return $result;
    }
        function signup($fullname,$username,$password,$email){
        $sql = "INSERT INTO users (fullname,username, password, email)
                        VALUES ('$fullname','$username', '$password','$email')";
        pdo_execute($sql);     
    }
        
        function login($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = pdo_query_one($sql);                          
        return $result;
    }
    function profile($id){
        $sql = "SELECT * FROM users WHERE id = ".$id;
        $result = pdo_query_one($sql);           
        return $result; 
    }
    function editprofile($id,$fullname,$email,$sdt,$dc){

            $file=$_FILES['file'];
            $fileName=$_FILES['file']['name'];
            $fileTmpName=$_FILES['file']['tmp_name'];
            $fileSize=$_FILES['file']['size'];
            $fileError=$_FILES['file']['error'];
            $fileType=$_FILES['file']['type'];
        
            $fileExt=explode('.',$fileName);
            $fileActualExit = strtolower(end($fileExt));
            $allowed= array('jpg','jpeg','png','pdf');
            if ($fileActualExit!=null){
            if (in_array($fileActualExit,$allowed)){
                if ($fileError===0){
                    if ($fileSize<90000000){
                            $fileNameNew= uniqid('',true);
                            $fileDestination='G:\code\Web_Project\DACS\Năm 2(kì 1)\Shopping/uploads/'.$fileNameNew;
                            move_uploaded_file($fileTmpName,$fileDestination);
                            $Sql="UPDATE users set fullname='$fullname',email='$email',sdt='$sdt',address='$dc',img='$fileNameNew' where id=$id";
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
            } else {
                $Sql="UPDATE users set fullname='$fullname',email='$email',sdt='$sdt',address='$dc' where id=$id";
                pdo_execute($Sql);
            }
        }
    function users($limit){
        $sql="SELECT * from users where id>1 order by id DESC limit $limit";
        $result=pdo_query($sql);
        return $result;
    }
    function listuser($start,$limit){
        $sql="SELECT * from users where id>1 limit $start,$limit";
        $result=pdo_query($sql);
        return $result;
    }
    function xoa($iduser){
        $sql="DELETE from users where id=".$iduser;
        pdo_execute($sql);
    }
    function checkccount($username) {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = pdo_query_one($sql);           
        return $result;
    }
    function setuppassword($password,$email){
        $password=md5($password);
        $sql="UPDATE users set password='$password' where email='$email'";
        pdo_execute($sql);
    }
?>