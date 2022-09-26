<?php
require("illegal_login.php");
?>
<html>
<head>
    <title>公告信息管理</title>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link href="css/index.css" rel="stylesheet">
    <script src="./js/jquery-3.6.0.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<script language="javascript">
    $(document).ready(function(){
        $("#name").blur(function(){
            let zhi = $("#name").val();
            let name_val = document.getElementById("hide_name").value;
            console.log(zhi);
            let data = {
                "str":zhi
            }
            if(zhi !== "" && zhi !== name_val){
                $.post("registerAPI.php",data,function(data,status){
                    console.log(data);
                    document.getElementById("retu").innerHTML = '<small>'+data+'</small>';
                })
            }else if(zhi == "" ){
                document.getElementById("retu").innerHTML = '<small>用户名并不能为空</small>';
                //form.name.focus();
            }else if(zhi == name_val){
                $("#retu").text("");
            }

        })
    })

    function check(){
        let pw = $("#pw").val();
        if (pw ==""){
            document.getElementById("pwd_che").innerHTML = "<small>密码不能为空！</small>";
            //form.pw.focus();
        }else {
            $("#pwd_che").text("");
        }
        if (document.getElementById("retu").innerHTML == '<small>用户名已存在</small>'){
            return false;
        }

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
                <ul><li><a href="doAction.php?a=deluser" onclick="return confirm('是否彻底删除账号');">删除账号</a></li></ul><hr/>
            </div>
        </div>
    </div>
    <div class="con_right">
        <div class="">
            <div class="">
                <div class="con_header"><div class="title"><span>您当前的位置：后台管理系统</span></div></div>
                <div style="margin-top:100px;margin-left: 100px;">
                    <form name="form1" method="post" action="update_user_ok.php">
                        <table width="520" height="212" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                            <tr>
                                <td width="87" align="center">昵称：<input type="text" name="hide_name" id="hide_name" value="<?php echo @$_SESSION['name']; ?>" hidden></td>
                                <td width="433" height="31"><input type="text" name="name" id="name" value="<?php echo @$_SESSION['name']; ?>" placeholder="" required="required" autofocus="autofocus" style="height: 28px; border: 1px solid rgb(228, 228, 228);"/></td>
                            </tr>
                            <tr><td></td><td><span id="retu" style="text-align: right;color: red"></span></td></tr>
                            <tr>
                                <td height="124" align="center">密码：</td>
                                <td><input type="password" name="pw" id="pw" value="<?php echo @$_SESSION['pw']; ?>" placeholder="" required="required" style="height: 28px; border: 1px solid rgb(228, 228, 228);"/></td></td>
                            </tr>
                            <tr><td></td><td><span id="pwd_che" style="text-align: right;color: red"></span></td></tr>
                            <tr>
                                <td height="40" colspan="2" align="center">
                                    <input name="Submit" type="submit" class="btn_grey" value="修改" onclick="return check();">
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