<?php
    function thongke($date,$subday){
        $sql="SELECT * from orders where date > '$subday' order by date ASC " ;
        $rs=pdo_query($sql);
        return $rs;
    }
    function subdays($day,$date){
        date_sub($date,date_interval_create_from_date_string("$day days"));
        return date_format($date,"Y-m-d");
    }
    function solieu(){
        $date=date("Y-m-d");
        $now=date_create($date);
        $subday=subdays(365,$now);
        $chart=thongke($date,$subday);
        foreach($chart as $value){
            $chart_data[]=array(
                'date' => $value['date'],
                'order' => $value['id'],
                'sales' => $value['total_price'],
                'quantity' => $value['total_price']
            );
        }
        $data=json_encode($chart_data);  
        return $data;
    }
?>
