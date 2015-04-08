<?php
/**
 * Created by PhpStorm.
 * User: yl
 * Date: 2015/4/8
 * Time: 19:11
 */

if(!isset($_GET['get'])){
    echo 0;
    return;
}




$q = mysqli_connect("localhost","root","oracle","database","3306");
$sql = "select good_id,goodName,goodClass,goodPrice,goodAddress,goodComment,chaining from goods where good_id = '".$_GET['get']."';";




$result = mysqli_query($q,$sql);
$num = mysqli_num_rows($result);


$row = mysqli_fetch_array($result,MYSQL_ASSOC);

if($row == 0){
    echo 0;
    return;
}

$str = "{0:{good_id:\"{$row['good_id']}\",goodName:\"{$row['goodName']}\",goodClass:\"{$row['goodClass']}\",goodComment:\"{$row['goodComment']}\",
        goodPrice:\"{$row['goodPrice']}\",goodAddress:\"{$row['goodAddress']}\",chaining:\"{$row['chaining']}\"}}";

echo $str;
return;