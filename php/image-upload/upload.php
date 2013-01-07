<?php
/**
 * 上传文件只做演示，上传未做验证
 */
/*
 * 定义根路径常量
 */
define('ROOT', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR);

//上传的目录，相对于网站根目录
$upload_dir = 'image-upload/uploads/';

//文件验证
//上传最大尺寸
//上传格式验证
//mime类型验证
//文件上传

//原始文件名称
$org_name = $_FILES['myfile']['name'];

$tmp_name = $_FILES['myfile']['tmp_name'];

//完整上传路径
$filename = ROOT.$upload_dir.$org_name;

if(move_uploaded_file($tmp_name, $filename)){
    /*
     * 可以自行裁切缩略图后返回给客户端
     */
    echo '<img src="http://localhost/image-upload/uploads/'.$org_name.'" />';
}else{
    echo "上传失败!";
}
