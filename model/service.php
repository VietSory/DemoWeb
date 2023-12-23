<?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

   function autocomplete($searchTerm)
        {
            $sql = "SELECT name,id FROM sanpham WHERE name LIKE '%$searchTerm%'
                    UNION ALL
                    SELECT name,id  FROM danhmuc WHERE name LIKE '%$searchTerm%'";
            $rs=pdo_query($sql);
            return $rs;
        }
    function success($term,$id){
        echo "<a href=index?act=detail&idsp=$id><div class='result-item'>{$term}</div></a>";
    }
    function faill(){
        echo "<div class='result-item'>Không có sản phẩm được tìm thấy.</div>";
    }
    function search($searchTerm)
        {
            $sql = "SELECT name,id FROM sanpham WHERE name = '$searchTerm'
                    UNION ALL
                    SELECT name,id FROM danhmuc WHERE name = '$searchTerm'";
            $rs=pdo_query_one($sql);
            return $rs;
        }
        function execPostRequest($url, $data)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data))
            );
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            //execute post
            $result = curl_exec($ch);
            //close connection
            curl_close($ch);
            return $result;
        }
        function random_string($length) {
            $str = random_bytes($length);
            $str = base64_encode($str);
            $str = str_replace(["+", "/", "="], "", $str);
            $str = substr($str, 0, $length);
            return $str;
        }
        function sendemail($emai){

            //Load Composer's autoloader
            require 'PHPMailer/Exception.php';
            require 'PHPMailer/PHPMailer.php';
            require 'PHPMailer/SMTP.php';

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = '';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'vietpno3@gmail.com';                     //SMTP username
                $mail->Password   = '';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('');
                $mail->addAddress($emai);     //Add a recipient           
                
                $secretkey=random_string(14);

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'SET UP PASSWORD';
                $mail->Body    = 'Đây là mã bí mật bạn cần,xin không tiết lộ với bất kì ai!  <b> '.$secretkey.' </b>';

                $mail->send();
            } catch (Exception $e) {
                echo $mail->ErrorInfo;
            }
            return $secretkey;
        }
?>