

<?php
/**
 * Created by PhpStorm.
 * User: yl
 * Date: 2015/3/29
 * Time: 21:28
 */

$path="../temp/";
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

        echo $path.$image_name;

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
