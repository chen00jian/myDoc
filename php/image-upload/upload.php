<?php
/**
 * 
 */
require_once 'UploadFile.class.php';

$Upload = new UploadFile;
$Upload->maxSize = 2000000; //最大尺寸
$Upload->allowExts = array('gif','png','jpg','jpeg');
$Upload->savePath = './uploads/';
$Upload->saveRule = ''; //使用默认名称，不使用随机命名

if($Upload->upload()){
    echo '<span class="ok">';
    echo "<img src='images/ok.png' /> 上传成功！";
    echo '<span class="ok">';
    //也可以裁切图片，输出缩略图，到页面预览
}else{
    echo '<span class="error">';
    echo $Upload->getErrorMsg();
    echo '<span class="error">';
}