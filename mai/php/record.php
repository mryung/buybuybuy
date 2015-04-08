<?php
/**
 * Created by PhpStorm.
 * User: yl
 * Date: 2015/4/5
 * Time: 9:25
 */
if(!isset($_COOKIE['userName']) && !isset($_COOKIE['user_id']) ){
    echo "1";
    return;
}else{
    $num = 0 + $_POST['page']*4;
    if($num < 0){
        echo 2;
        return;
    }
    $q = mysqli_connect("localhost","root","oracle","database","3306");
    $sql = "select good_id,goodName,goodClass,goodPrice,goodAddress,chaining from goods where user_id = '".$_COOKIE['user_id']."'ORDER BY good_id DESC  limit {$num},4;";

    $result = mysqli_query($q,$sql);
    $num = mysqli_num_rows($result);
    $json = "num1:$num";
    $row = mysqli_fetch_array($result,MYSQL_ASSOC);

    if($row == 0){
        echo 0;
        return;
    }

    $str = "0:{good_id:\"{$row['good_id']}\",goodName:\"{$row['goodName']}\",goodClass:\"{$row['goodClass']}\",
        goodPrice:\"{$row['goodPrice']}\",goodAddress:\"{$row['goodAddress']}\",chaining:\"{$row['chaining']}\"}";
//
//    cho $str;
//    return; e

    for($i = 1;$row = mysqli_fetch_array($result,MYSQL_ASSOC);$i++){
        $r = ",{$i}:{good_id:\"{$row['good_id']}\",goodName:\"{$row['goodName']}\",goodClass:\"{$row['goodClass']}\",
        goodPrice:\"{$row['goodPrice']}\",goodAddress:\"{$row['goodAddress']}\",chaining:\"{$row['chaining']}\"}";
        $str = $str.$r;
    }
    $str ="{". $json .",".$str ."}" ;
    echo $str;
    return;
}

