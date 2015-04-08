<?php
/**
 * Created by PhpStorm.
 * User: yl
 * Date: 2015/4/8
 * Time: 20:40
 */






if(!isset($_COOKIE['userName'])){
    $name = "未知用户";
}

$name = $_COOKIE['userName'];



$q = mysqli_connect("localhost","root","oracle","database","3306");
$sql = "insert into messege(good_id,date,userName,messegeText) values(".$_GET['get'].",NOW(),'".$name."','".$_GET['pinglun']."');";
mysqli_query($q,$sql);

$num =0 +  4*$_GET['num'];

$sql = "select * from messege WHERE good_id = '".$_GET['get']."' ORDER BY messege_id DESC  limit {$num},4;";
$result = mysqli_query($q,$sql);
$num = mysqli_num_rows($result);

if($num == 0){
    return;
}
$json = "num1:$num";
$row = mysqli_fetch_array($result,MYSQL_ASSOC);



$str = "0:{userName:\"{$row['userName']}\",messegeText:\"{$row['messegeText']}\",date:\"{$row['date']}\"}";

for($i = 1;$row = mysqli_fetch_array($result,MYSQL_ASSOC);$i++){
    $r = ",{$i}:{userName:\"{$row['userName']}\",messegeText:\"{$row['messegeText']}\",date:\"{$row['date']}\"}";
    $str = $str.$r;
}
$str ="{". $json .",".$str ."}" ;
echo $str;