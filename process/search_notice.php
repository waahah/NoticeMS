<?php
require("illegal_login.php");
?>
<html>
<head>
<title>公告信息管理</title>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<link href="css/index.css" rel="stylesheet">
</head>
<body>
<script language="javascript">
function check(form){                    //验证表单信息是否为空
//若查询关键字为空，则弹出提示信息，并定位光标
	if(form1.keyword.value==""){
		alert("请输入查询关键字!");
		form1.keyword.focus();
		return false;
	} 
form1.submit();                           //若各控件不为空，则提交表单信息
}
</script>
<div class="bgimg"></div>
<div class="content">
	<div class="con_left">
		<div class="con_left1">
			<div class="con_header"><div class="title"><span>公告管理</span></div></div>
			<div class="">
				<ul><li><a href="add_notice.php">添加公告信息</a></li></ul><hr/>
				<ul><li><a href="search_notice.php">查询公告信息</a></li></ul><hr/>
                <ul><li><a href="page_notice.php">分页显示公告信息</a></li></ul><hr/>
				<ul><li><a href="update_notice.php">编辑公告信息</a></li></ul><hr/>
				<ul><li><a href="delete_notice.php">删除公告信息</a></li></ul><hr/>
                <ul><li><a href="purd.php">分页查询修改信息</a></li></ul><hr/>
                <ul><li><a href="doAction.php?a=loginout">注销登录</a></li></ul><hr/>
                <ul><li><a href="update_user.php">修改账号</a></li></ul><hr/>
                <ul><li><a href="doAction.php?a=deluser" onclick="return confirm('是否彻底删除账号');">删除账号</a></li></ul><hr/>
			</div>
		</div>
	</div>
	<div class="con_right">
		<div>
			<div class="blog_list_wrap">
				<div class="con_header"><div class="title"><span>您当前的位置：后台管理系统</span></div></div>
				<div style="margin-top: 20px;margin-left: 120px;">
					<form name="form1" method="post" action="search_notice.php">
                        <label for="keyword">查询关键字</label>
						<input name="keyword" type="search" id="keyword" size="40">
						&nbsp;
						<input type="submit" name="Submit" value="搜索" onClick="return check(form)">
					</form>
				</div>
                <table class="table1">
                    <tr>
                        <td>公告标题</td>
                        <td>公告内容</td>
                    </tr>
                    <?php
                    $con = mysqli_connect("localhost","root","","db_notice");
                    if (!$con){
                        die("数据库连接失败！".mysqli_error());
                    }
                    mysqli_set_charset($con,"utf8");
                    @$keyword = $_POST["keyword"];
                    $sql = "select * from tb_notice where title like '%$keyword%' or content like '%$keyword%' or time like '%$keyword%'";
                    $result = mysqli_query($con,$sql);#对成功的select,show查询，将返回一个mysqli_result对象,对其他成功的查询，将返回true；如果失败，则返回false
                    #$obj = mysqli_fetch_object($result);#从查询结果集中取得当前行，并将其作为对象返回
                    $row = mysqli_fetch_row($result);#返回一个与所取得行相对应的字符串数组
                    if ($row == ""){
                        echo "<font color='red'>您搜索的信息不存在，请使用类似的关键字进行检索!</font>";
                    }
                    if($result = mysqli_query($con,$sql)){
                    #while ($obj= mysqli_fetch_object($result)){
                    $rowcount = mysqli_num_rows($result);
                    for ($i=0;$i<$rowcount;$i++){
                        #从查询结果集中取得当前行，并将其作为字符串数组返回
                        $row = mysqli_fetch_row($result);
                    ?>
					<tr>
					    <td style="font-size:14px; text-align:left"><?php echo $row[1];?></td>
						<td style="font-size:14px; text-align:left"><?php echo $row[2];?></td>
					</tr>
                    <?php
                    }
                    }
                    mysqli_free_result($result);
                    mysqli_close($con);
                    ?>
				</table>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php
include('footer.php');
?>
</body>
</html>