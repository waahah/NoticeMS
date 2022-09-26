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
function check(form){
	if(form.txt_title.value==""){
		alert("请输入公告标题!");form.txt_title.focus();return false;
	}
	if(form.txt_content.value==""){
		alert("请输入公告内容!");form.txt_content.focus();return false;
	}
form.submit();
}
</script>
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
                    <form name="form1" method="post" action="addAction.php">
                        <table width="520" height="212" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                            <tr>
                                <td width="87" align="center">公告主题：</td>
                                <td width="433" height="31"><input name="title" type="text" id="txt_title" size="40">*</td>
                            </tr>
                            <tr>
                                <td height="124" align="center">公告内容：</td>
                                <td><textarea name="content" cols="50" rows="8" id="txt_content"></textarea></td>
                            </tr>
                            <tr>
                                <td height="40" colspan="2" align="center">
                                <input name="Submit" type="button" class="btn_grey" value="提交" onClick="return check(form1);">
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