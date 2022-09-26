<?php
// 连接服务器
$con = mysqli_connect("localhost","root","","db_notice");
$name = $_POST["str"];#post请求用$_POST[""]
if (!$con)
{
    echo "连接 MySQL 失败: " . mysqli_connect_error();
}
// 设置编码
mysqli_set_charset($con,"utf8");
// 执行SQL语句，并循环输出查询结果集
$sql = "SELECT * FROM tb_user where name='$name'";
$result=mysqli_query($con,$sql);
if ($result=mysqli_query($con,$sql))
{
    $count = mysqli_num_rows($result);
	#echo $count;
	if($count>0){
        echo "用户名已存在";
    }else{
        echo "用户名可用";
    }
    /*while ($obj=mysqli_fetch_object($result))
    {
        @printf("%s ",$obj->$name);
        echo "<br><br>";
    }*/
    // 释放结果集合
    mysqli_free_result($result);
}
//关闭数据库连接
mysqli_close($con);
?>