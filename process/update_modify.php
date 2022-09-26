<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<?php
$con = mysqli_connect("localhost","root","","db_notice");
if (!$con){
    die("数据库连接失败：".mysqli_error());
}
mysqli_set_charset($con,"utf8");#不设置编码会出现乱码
$id = $_POST["id"];
$title = $_POST["title"];
$content = $_POST["content"];
date_default_timezone_set("PRC");
$time = date("Y-m-d H:i:s");
$sql = "update tb_notice set title='$title',content='$content',time='$time' where id=$id";#此处''不可省略,否则sql语法错误
$result = mysqli_query($con,$sql);
if (!$result){
    echo "<script>alert('公告信息编辑失败！');history.back();window.location.href='modify.php?id=$id';</script>";
}else{
    echo "<script>alert('公告信息编辑成功！');history.back();window.location.href='modify.php?id=$id';</script>";
}
mysqli_free_result($result);
mysqli_close($con);
?>
