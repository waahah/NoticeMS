<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<?php
$con = mysqli_connect("localhost","root","","db_notice");
if (!$con){
    die("数据库连接失败：".mysqli_error());
}
mysqli_set_charset($con,"utf8");
$id = $_GET["id"];
if ($id ==""){
    echo "<script>window.location.href='delete_notice.php'</script>";
    return false;
}
$sql = "delete from tb_notice where id='$id'";
$result = mysqli_query($con,$sql);
if ($result){
    echo "<script>alert('信息删除成功！');history.back();window.location.href='delete_notice.php?page='</script>";
}else{
    echo "<script>alert('信息删除失败！');history.back();window.location.href='delete_notice.php?page='</script>";
}
mysqli_free_result($result);
mysqli_close($con);
?>