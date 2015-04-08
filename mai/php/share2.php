<?php
/**
 * Created by PhpStorm.
 * User: yl
 * Date: 2015/3/30
 * Time: 18:07
 */
$conn = mysqli_connect("localhost", "root", "oracle", "database", "3306");
$cookie = $_COOKIE['user_id'];

$goodName = $_POST['name'];
$goodClass = $_POST['select'];
$goodPrice = $_POST['price'];
$goodAddress = $_POST['address'];
$goodComment = $_POST['comment'];


$path="../upload/";


$extArr = array("jpg","png","gif");

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];

    if(empty($name)){
        echo "need";
        return;
    }
    $ext = extend($name);

    if(!in_array($ext,$extArr)){
        echo 'image';
        return;
    }

    $image_name = time().rand(100,999).'.'.$ext;
    $tmp = $_FILES['file']['tmp_name'];
    if(move_uploaded_file($tmp,$path.$image_name)){
       $path = $path.$image_name;  //图片的保存路径
       $sql = "INSERT INTO goods(user_id,goodName,goodClass,goodPrice,
        goodAddress,goodComment,chaining) VALUES({$cookie},'{$goodName}',
        '{$goodClass}','{$goodPrice}','{$goodAddress}','{$goodComment}','{$path}');";
        $r = mysqli_query($conn, $sql);
       if($r){
           echo "成功";
           return;
       }
    }else{
        echo 'bad';
    }
}else{
    echo "yulang";
}

function extend($file_name){
    $extend = pathinfo($file_name);
    $extend = strtolower($extend["extension"]);
    return $extend;
}

