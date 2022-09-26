<?php

$con = mysqli_connect("localhost","root","","db_notice");
if(!$con){
    die("数据库连接失败".mysqli_error());
}
mysqli_set_charset($con,"utf8");
$title = $_POST["title"];
$content = $_POST["content"];
if( $title=="" && $content==""){
    echo "<script>alert('请先添加信息!'); window.location.href = 'add_notice.php';</script>";
    return false;
}
date_default_timezone_set("PRC");#中国时区
$time = date("Y-m-d H:i:s");
$sql = "insert into tb_notice ( title,content,time ) values ('$title','$content','$time')";
$result = mysqli_query($con,$sql);
if($result){
    echo "<script>alert('公告信息添加成功!'); window.location.href = 'purd.php';</script>";
}else{
    echo "<script>alert('公告信息添加失败!'); window.location.href = 'add_notice.php';</script>";
}
mysqli_free_result($result);
mysqli_close($con);
?>
