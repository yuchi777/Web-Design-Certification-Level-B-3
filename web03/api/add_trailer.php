<?php
include '../base.php';

if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'], '../img/'.$_FILES['img']['name']);
    $data['img']=$_FILES['img']['name'];
}

$data['sh']=1;
$data['name']=$_POST['name'];
$data['rank']=$Trailer->math('max','id')+1;
$data['ani']=rand(1,3);// 加入亂數1~3

// print_r($data);
// print_r($_FILES);

$Trailer->save($data);

to('../backend.php?do=trailer');
?>