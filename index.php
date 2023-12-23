<?php

    session_start();
    ob_start();

    include('model/pdo.php');
    include('model/service.php');
    include('model/usermodel.php');
    include('model/danhmuc.php');
    require('model/sanpham.php');
    require('model/cart.php');
    require('model/order.php');


    if (isset($_POST['login']))
        {
            $name=$_POST['name'];
            $pass=md5($_POST['pass']);
            $login=login($name,$pass);
            if ($login!=0 )
                {
                    $_SESSION['user']=$login;
                    if  ($_SESSION['user']['role']=='admin') header("location:view/admin/index.php");
                    else header("location:index.php");
                }            
        }  
    if (isset($_GET['act']) && $_GET['act']=='signup' || isset($_POST['signup']))
        {
            if (isset($_POST['signup']))
            {
                $name=$_POST['fullname'];
                $user=$_POST['username'];
                $pass=md5($_POST['pass']);
                $email=$_POST['email'];
                $signup=signup($name,$user,$pass,$email);
                if ($signup!=0 )
                        {
                            header("location:index.php");
                        }
            }
            else include "view/client/pages/signup.php";
        } else if (isset($_SESSION['user']))
        {
                date_default_timezone_set('Asia/Ho_Chi_Minh');  
                $sanpham=latestsp(4,-1);                      
                $j=1;
                foreach($sanpham as $value){
                    $totalcmt[$j]=totalcmt($value['id']);
                    $average[$j]=averagecmt($value['id']);
                    $j++;
                }
                    $totalcart=total_cart($_SESSION['user']['id']);
                    $danhmuchead=totalspmuch(6);
                    include('view/client/layouts/header.php');
                    if (isset($_GET['act']))
                    {
                        $act=$_GET['act'];
                        switch ($act){
                            case 'logout':
                                session_start();
                                session_unset();
                                session_destroy();
                                header("location:index.php");
                                break;

                            case 'lienhe':
                                include "view/client/pages/contact.php";
                                break;

                            case 'hethang':
                                echo "<h3 style='text-align: center'>Sản phẩm đã hết hàng</h3>";
                                echo "<h4 style='text-align: center'>Bạn hãy quay lại sau!</h4>";
                                break;
                            
                            case 'ordersucess':
                                echo "<h3 style='text-align: center'>Bạn đã đặt hàng thành công</h3>";
                                echo "<a href=index><h4 style='text-align: center'>Quay lại trang chủ để tham khảo thêm các phẩm khác</h4></a>";
                                break;

                            case 'search':
                                if (isset($_POST['submit'])){
                                    $name=$_POST['searchTerm'];
                                    $rs=search($name);
                                    if ($rs!=null)
                                        {
                                            $id=$rs['id'];
                                            header("location:index?act=detail&idsp=$id");
                                        } else echo "<h3 style='text-align: center'>OOPS! Không có sản phẩm bạn đang tìm kiếm</h3>";

                                } 
                                break;

                            case 'detail':
                                if (isset($_GET['idsp'])){
                                    $idsp=$_GET['idsp'];
                                    $sanpham=sanpham($idsp);
                                    $row=latestsp(8,-1);
                                    $j=1;
                                    foreach($row as $value){
                                        $totalcmt[$j]=totalcmt($value['id']);
                                        $stars[$j]=averagecmt($value['id']);
                                        $j++;
                                    }
                                    $comment=comment($idsp);
                                    $i=1;
                                    foreach($comment as $user){          
                                        $fullname[$i]=profile($user['iduser'])['fullname'];
                                        $image[$i]=profile($user['iduser'])['img'];
                                        $i++;
                                    }
                                    $star=averagecmt($idsp);
                                    }
                                include "view/client/pages/detail.php";
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
                                    include "view/client/pages/profile.php";
                                }    
                                break;
                            case 'listsp':
                                    $limit=9;
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
                                    $total=countsp();
                                    $sanpham=sanpham(-1);
                                    $start=($current_page-1)*$limit;   
                                    $sanpham=listsp($start,$limit,-1);
                                    include "view/client/pages/listsp.php";
                                break;
                            
                            case 'listspdm':
                                if (isset($_GET['iddm'])){
                                    $iddm=$_GET['iddm'];
                                    $limit=9;
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
                                    $danhmuc=danhmuc($iddm);
                                    $start=($current_page-1)*$limit;   
                                    $sanpham=listsp($start,$limit,$iddm);
                                    include "view/client/pages/listsp.php";
                                }
                                break;
                                
                            case 'cart':     
                                $id=$_SESSION['user']['id'];                         
                                if (isset($_POST['submit']) || isset($_GET['idsp']) ){
                                        if (isset($_POST['soluong'])){
                                            $soluong=$_POST['soluong'];
                                        } else  $soluong=1;
                                        $idsp=$_GET['idsp'];
                                        addcart_user($id,$soluong,$idsp);                                      
                                }
                                if (checkexistcart($id)!=false){
                                    $idcart=(checkexistcart($id))['id'];
                                    $cart=cart($id);
                                    $i=1;
                                    foreach($cart as $value){
                                    $product[$i]['id']=productitem($value['idcart_item'])['product_id'];
                                    $product[$i]['detail']=sanpham($product[$i]['id']);
                                    $product[$i]['total']=productitem($value['idcart_item'])['quantity'];
                                    $i++;
                                    }
                                    include "view/client/pages/cart.php";
                                } else {
                                    echo "<h3 style='text-align: center'>Giỏ hàng đang rỗng</h3>";
                                }
                                break;
                            case 'declarecart':
                                if (isset($_GET['idsp'])){
                                    $idsp=$_GET['idsp'];
                                    declarecart($idsp);
                                    header("location:index?act=cart");
                                }
                                break;
                            case 'checkoutmomo':
                                if (isset($_POST['payUrl']) ){

                                    $fullname=$_POST['fullname'];
                                    $phone=$_POST['phone'];
                                    $email=$_POST['email'];
                                    $address=$_POST['address'];
                                    $orderInfo = $_POST['address_option'];;
                                    $amount = $_POST['totalprice'];

                                    $_SESSION['userorder']['fullname']=$fullname;
                                    $_SESSION['userorder']['phone']=$phone;
                                    $_SESSION['userorder']['email']=$email;
                                    $_SESSION['userorder']['address']=$address;

                                        if ($_POST['payment']==='momo'){
                                            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

                                            $partnerCode = '';
                                            $accessKey = '';
                                            $secretKey = '';
                                            $orderInfo = $orderInfo;
                                            $amount = $amount;
                                            $orderId = time() ."";
                                            $redirectUrl = "http://localhost:3000/index?act=checkout";
                                            $ipnUrl = "http://localhost:3000/index.php";
            
                                            $extraData = $_POST['payment'];
                                                                                                                            
                                        
                                            $partnerCode = $partnerCode;
                                            $accessKey = $accessKey;
                                            $serectkey = $secretKey;
                                            $orderId = $orderId; // Mã đơn hàng
                                            $orderInfo = $orderInfo;
                                            $amount = $amount;
                                            $ipnUrl =  $ipnUrl;
                                            $redirectUrl = $redirectUrl;
                                            $extraData = $extraData;
                                        
                                            $requestId = time() . "";
                                            $requestType = "payWithATM";
                                            //$extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                                            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData  . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                                            $signature = hash_hmac("sha256", $rawHash, $serectkey);
                                            $data = array('partnerCode' => $partnerCode,
                                                'partnerName' => "Test",
                                                "storeId" => "MomoTestStore",
                                                'requestId' => $requestId,
                                                'amount' => $amount,
                                                'orderId' => $orderId,
                                                'orderInfo' => $orderInfo,
                                                'redirectUrl' => $redirectUrl,
                                                'ipnUrl' => $ipnUrl,
                                                'lang' => 'vi',
                                                'extraData' => $extraData,
                                                'requestType' => $requestType,
                                                'signature' => $signature);
                                            $result = execPostRequest($endpoint, json_encode($data));
                                            $jsonResult = json_decode($result, true);  // decode json
                                    
                                            //Just a example, please check more in there
                                    
                                            header('Location: ' . $jsonResult['payUrl']);
                                    } else  header("Location:index?act=checkout&partnerCode&extraData=paypal&orderInfo=".$orderInfo."&amount=".$amount."");
                                    
                                }
                            case 'checkout':

                                $id=$_SESSION['user']['id'];   
                                $cart=cart($id);
                                $i=1;
                                    foreach($cart as $value){
                                        $product[$i]['id']=productitem($value['idcart_item'])['product_id'];
                                        $product[$i]['detail']=sanpham($product[$i]['id']);
                                        $product[$i]['total']=productitem($value['idcart_item'])['quantity'];
                                        $i++;
                                    }
                                $iduser=$_SESSION['user']['id'];
                                $date=date("Y-m-d H:i:s");
                                $id_payment=(int) latest_payment()['id'];
                                $id_payment=$id_payment+1;
                                $id_order=(int) latest_order()['id'];
                                $id_order=$id_order+1;

                                if (isset($_GET['partnerCode']) )
                                    {
                                        if (isset($_GET['extraData'])) $payment=$_GET['extraData']; 
                                        if (isset($_GET['orderInfo'])) $thongtin=$_GET['orderInfo'];
                                        if (isset($_GET['amount'])) $total_price=$_GET['amount']; 

                                        if ($payment === 'paypal') 
                                            { 
                                                if ($thongtin === 'default'){

                                                    $fullname=$_SESSION['user']['fullname'];
                                                    $phone=$_SESSION['user']['sdt'];
                                                    $email=$_SESSION['user']['email'];
                                                    $address=$_SESSION['user']['address'];

                                                } else if ($thongtin === 'different'){

                                                    $fullname=$_SESSION['userorder']['fullname'];
                                                    $phone=$_SESSION['userorder']['phone'];
                                                    $email=$_SESSION['userorder']['email'];
                                                    $address=$_SESSION['userorder']['address'];

                                                } 
                                                $status='Đã đặt hàng';

                                            } else if ($payment === 'momo') 
                                            {
                                                if ($thongtin === 'default')
                                                {

                                                    $fullname=$_SESSION['user']['fullname'];
                                                    $phone=$_SESSION['user']['sdt'];
                                                    $email=$_SESSION['user']['email'];
                                                    $address=$_SESSION['user']['address'];
                                                
                                                } else if ($thongtin === 'different'){

                                                    $fullname=$_SESSION['userorder']['fullname'];
                                                    $phone=$_SESSION['userorder']['phone'];
                                                    $email=$_SESSION['userorder']['email'];
                                                    $address=$_SESSION['userorder']['address'];

                                                }
                                                $status='Đã Thanh Toán';
                                            }
                                        $j=1;
                                        foreach($cart as $value){
                                            $idcart[$j]=$value['id'];
                                            $j++;
                                        }
                                        $j=1;
                                        create_payment($payment,$id,$date);                                      
                                        create_order($fullname,$iduser,$phone,$email,$total_price,$status,$address,$date,$id_payment);
                                        foreach($cart as $value){
                                            addorder($id_order,$idcart[$j]);
                                            create_order_item($product[$j]['total'],$product[$j]['id'],$id_order);
                                            $j++;
                                        }
                                        header("location:index?act=ordersucess");
                                    }
                                    
                                include "view/client/pages/checkout.php";
                                break;
                            }
                    }  else {
                                $danhmuc=totalspmuch(12);
                                include "view/client/pages/home.php";
                            }
                include('view/client/layouts/footer.php');
            }  else if (isset($_GET['act']) && $_GET['act']=='email'){
                    include "view/client/pages/name.php";
            }  else if (isset($_POST['check'])){
                    if (isset($_POST['mail'])) $mail=$_POST['mail'];
                    $check=checkExists($mail);
                    if ($check!=null)
                        {
                            $key=sendemail($mail);
                            include "view/client/pages/setuppass.php";            
                        } else header("location:index?act=email&status=fail");

            }  else if (isset($_POST['setup']) || isset($_GET['setup'])){
                    if (isset($_POST['secretkey'])) $secretkey=$_POST['secretkey'];
                    if (isset($_POST['mail'])) $mail=$_POST['mail'];
                    if (isset($_POST['key'])) $key=$_POST['key'];
                    if (isset($_POST['password'])) $password=$_POST['password'];
                    if (isset($_POST['typepassword'])) $typepassword=$_POST['typepassword'];
                    if ($secretkey==$key)
                        {
                            if ($password==$typepassword){
                                setuppassword($password,$mail);
                                header("location:index?act=email&status=success");
                            } else header("location:index?act=setup&status=failpass");
                        } else header("location:index?act=setup&status=failkey");

            } else  require('view/client/pages/login.php');    
        
        
?>