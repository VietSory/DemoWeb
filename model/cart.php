<?php
    function checkexistcart($iduser){
        $sql="SELECT * from cart where iduser_order=$iduser";
        $rs=pdo_query_one($sql);
        if ($rs<=0){
            return false;
        }  else return $rs;
    }
    function checkexistitem($idproduct){
        $sql="SELECT * from cart_item where product_id=$idproduct";
        $rs=pdo_query_one($sql);
        if ($rs<=0){
            return false;
        }  else return $rs;
    }
    function total_cart($iduser){
        $sql="select count(id) as total from cart where iduser_order=$iduser";
        $rs=pdo_query_one($sql)['total'];
        return $rs;
    }
    function lastest_item($quantity,$productid){
            $sql="INSERT into cart_item(quantity,product_id) values ($quantity,$productid)";
            $rs=pdo_lastest_id($sql);
            return $rs;
    }
    function updatesl($idproduct,$quantity){
        $sql="UPDATE cart_item set quantity=$quantity where product_id=$idproduct";
        pdo_execute($sql);
    }
    function addcart_user($iduser,$quantity,$productid){
        if (checkexistitem($productid)==false)
            {
                $id=lastest_item($quantity,$productid);
                $sql="INSERT into cart(iduser_order,idcart_item) values($iduser,$id)";
                pdo_execute($sql);
            } else {
                $id=checkexistitem($productid)['id'];
                updatesl($id,$quantity);
            }
    }
    function cart($iduser){
        $sql="select * from cart where iduser_order=$iduser";
        $rs=pdo_query($sql);
        return $rs;
    }
    function productitem($idcart_item){ 
        $sql="select * from cart_item where id=$idcart_item";
        $rs=pdo_query_one($sql);
        return $rs;
    }
    function declarecart($idsp){
        $id=checkexistitem($idsp)['id'];
        $sql="DELETE from cart where idcart_item=$id";
        pdo_query($sql);
        $sql="DELETE from cart_item where product_id=$idsp";
        pdo_execute($sql);
    }
    function addorder($idorder,$idcart){
        $sql="UPDATE cart set id_order=$idorder where id=$idcart";
        pdo_execute($sql);
    }
?>