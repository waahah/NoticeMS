
<?php
session_start();
$con = mysqli_connect("localhost","root","","db_notice");
if (!$con){
    die("数据库连接失败：".mysqli_error());
}
mysqli_set_charset($con,"utf8");#不设置编码会出现乱码
$hide_name = $_POST["hide_name"];
$sql_id ="select * from tb_user where name = '$hide_name'";
$result_id = mysqli_query($con,$sql_id);
$row = mysqli_fetch_row($result_id);#返回一个与所取得行相对应的字符串数组
$id = $row[0];
$name = $_POST["name"];
$pw = $_POST["pw"];
date_default_timezone_set("PRC");
$time = date("Y-m-d H:i:s");
$re_ip = $_SERVER['REMOTE_ADDR'];
$sql = "update tb_user set name='$name',password='$pw',time='$time',re_ip='$re_ip' where id=$id";#此处''不可省略,否则sql语法错误
$result = mysqli_query($con,$sql);
if (!$result){
    echo "<script>alert('修改账号信息失败！');history.back();window.location.href='update_user.php?id=$id';</script>";#
    #echo $hide_name,$id,$time,$re_ip;
}else{
    // 设置session
    $_SESSION['name'] = $name;
    $_SESSION['pw'] = $pw;
    echo "<script>alert('修改账号信息成功！');history.back();window.location.href='update_user.php?id=$id';</script>";
}
mysqli_free_result($result);
mysqli_close($con);
?>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
