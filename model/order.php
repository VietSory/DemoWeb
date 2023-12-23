<?php
    function create_payment($method,$iduser,$date){
        if ($date!=-1){
            $sql="INSERT into payment(method,iduser,date) values ('$method',$iduser,'$date')";
        } else {
            $sql="INSERT into payment(method,iduser) values ('$method',$iduser)";
        }
        $rs=pdo_execute($sql);
        return $rs;
    }
    function create_order($fullname,$iduser,$phone,$email,$total_price,$status,$address,$date,$idpayment){
        $sql="INSERT into orders(fullname,iduser,phone,email,total_price,status,address,date,id_payment) values ('$fullname',$iduser,'$phone','$email',$total_price,'$status','$address','$date',$idpayment)";
        pdo_execute($sql);
    }
    function latest_order(){
        $sql="SELECT id from orders ORDER BY id DESC LIMIT 1";
        $rs=pdo_query_one($sql);
        return $rs;
    }
    function latest_payment(){
        $sql="SELECT id from payment ORDER BY id DESC LIMIT 1";
        $rs=pdo_query_one($sql);
        return $rs;
    }
    function create_order_item($quantity,$productid,$id_order){
        $sql="INSERT into order_item(quantity,product_id,id_order) values ($quantity,$productid,$id_order)";
        $rs=pdo_execute($sql);
        return $rs;
    }
    function amountorder($idorder){
        if ($idorder==-1){
            $sql="SELECT count(id) as total from orders where status='Đã đặt hàng' or status='Đã Thanh toán'";         
        } else 
        {
            $sql="SELECT count(id) as total from order_item where id_order=$idorder";

        }
        $rs=pdo_query_one($sql);
        $result=$rs['total'];
        return $result;
       
    }
    function listorder($start,$limit,$idsp){
        if ($idsp==-1){
            $sql="SELECT * from orders where status='Đã đặt hàng' or status='Đã Thanh toán' limit $start,$limit ";
            $result=pdo_query($sql);
        } else {
            $sql="SELECT * from sanpham where id=$idsp limit $start,$limit ";
            $result=pdo_query_one($sql);
        }
        return $result;

    }
    function order_item($idorder){
        $sql="SELECT * from order_item where id_order=$idorder";
        $result=pdo_query($sql);
        return $result;
    }
    function statusorder($idchoice,$idorder){
        if ($idchoice!=-1){
            $sql="UPDATE orders set status='Đã xác nhận' where id=$idorder";
        } else $sql="UPDATE orders set status='Đã từ chối' where id=$idorder";
        pdo_execute($sql);
    }
    function quantity($idorder,$productid){
        $sql="SELECT * from order_item where id_order=$idorder and product_id=$productid";
        $result=pdo_query_one($sql);
        return $result;
    }
    function checkorder($iduser){
        $sql="SELECT * from orders where iduser=$iduser";
        $result=pdo_query_one($sql);
        return $result;
    }

?>