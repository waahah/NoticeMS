<?php
require("illegal_login.php");
?>
<!doctype html>
<html>
<head>
<title>公告信息管理</title>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<link href="css/index.css" rel="stylesheet">
</head>

<body>
<?php
$con = mysqli_connect("localhost","root","","db_notice");
if (!$con){
    die("数据库连接失败：".mysqli_error());
}
mysqli_set_charset($con,"utf8");
$msg_id = $_GET["id"];
$sql = "select * from tb_notice where id=$msg_id";
$result = mysqli_query($con,$sql);
$obj = mysqli_fetch_object($result);
?>
<div class="bgimg"></div>
<div class="content">
    <div class="con_left">
        <div class="con_left1">
            <div class="con_header" style=""><div class="title" style=""><span>公告管理</span></div></div>
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
        <div class="">
            <div class="">
                <div class="con_header"><div class="title"><span>您当前的位置：后台管理系统</span></div></div>
                <div style="margin-top:100px;margin-left: 100px;">
                    <form name="form1" method="post" action="update_modify.php">
                        <table width="550" height="212" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                            <tr>
                                <td width="87" align="center">公告主题：</td>
                                <td width="433" height="31"><input name="title" type="text" id="txt_title" size="40" value="<?php echo $obj->title;?>">
                                <input name="id" type="hidden" value="<?php echo $obj->id;?>">
                                </td>
                            </tr>
                            <tr>
                                <td height="124" align="center">公告内容：</td>
                                <td><textarea name="content" cols="50" rows="8" ><?php echo $obj->content;?></textarea></td>
                            </tr>
                            <?php
                            mysqli_free_result($result);
                            mysqli_close($con);
                            ?>
                            <tr>
                                <td height="40" colspan="2" align="center">
                                <input name="Submit" type="submit" class="btn_grey" value="修改" >
                                    &nbsp; <input type="reset" name="Submit2" value="重置"></td>
                            </tr>
                        </table>
                    </form>
                </div>
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