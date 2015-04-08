<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>



<?php
/**
 * Created by PhpStorm.
 * User: yl
 * Date: 2015/4/8
 * Time: 18:34
 */



$q = mysqli_connect("localhost","root","oracle","database","3306");
$sql = "select good_id,goodName,goodClass,goodPrice,goodAddress,chaining from goods where goodClass LIKE '%手机%';";

$result = mysqli_query($q,$sql);
$num = mysqli_num_rows($result);

if($num == 0){
    echo "为空";
    return;
}


for($i = 0 ; $i < $num;$i++){
    $row = mysqli_fetch_array($result,MYSQL_ASSOC);

    echo $row['goodName']."<br>";
    echo $row['goodClass']."<br>";
    echo $row['goodPrice']."<br>";
    echo $row['goodAddress']."<br>";
    echo $row['chaining']."<br>";




}?>


</body>
</html>

