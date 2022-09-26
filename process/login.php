<?php
session_start();#检测是否已经登录
@$s_name = $_SESSION['name'];
@$S_pw = $_SESSION['pw'];
if ($s_name!="" and $S_pw!=""){
    echo("<script>window.location.href='index.php';</script>");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>在线登录</title>
    <script src="./js/jquery-3.6.0.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(function (){
            $("#pw").blur(function(){
                let pw = $("#pw").val();
                if (pw ==""){
                    $("#pwd_che").html("<small>密码不能为空！</small>");
                    //form.pw.focus();
                }else {
                    $("#pwd_che").text("");
            }
            })
            /*
            $("#repw").blur(function(){
                let pw = $("#pw").val();
                let repw = $("#repw").val();
                if(pw ==""){
                    $("#repwd_che").html("<small>请先输入密码！</small>");
                }
                if (pw !=="" && repw ==""){
                    $("#repwd_che").html("<small>确认密码不能为空！</small>");
                }
                if (pw !=="" && repw !==""){
                    if (pw !== repw){
                        $("#repwd_che").html("<small>密码不一致！</small>");
                        //form.repw.focus();
                    }else {
                        $("#repwd_che").text("");
                    }
                }
            })*/
            $("#code").blur(function(){
                let code = $("#code").val();
                if (code == ''){
                    $("#code_che").html("<small>验证码为空！</small>");
                    //form.code.focus();
                }else {
                    $("#code_che").text("");
                }
            });
        })

        function changing(){
            //点击图片，会再次执行code.php文件，后面的参数是防止静态页面缓存导致不能更换
            document.getElementById('checkpic').src="code.php?t="+ new Date().valueOf().toString();
            document.getElementById('code').value="";
        }
        function check(){
            let pw = $("#pw").val();
            //let repw = $("#repw").val();
            //let code = $("#code").val();
            if (pw !==""){
                /*if (pw !== repw){
                    //document.getElementById("repwd_che").innerHTML = "<small>密码不一致！</small>";
                    form.repw.focus();
                    return false;
                }else {*/
                    $("#repwd_che").text("");
                //}
            }
        }
    </script>
    <style type="text/css">
        .btnlogin {
            font-family: "宋体";font-size: 12px;border: none;cursor: pointer;
            background-color: #1f8dda;
            height: 33px;width: 240px;
    </style>
</head>
<body style="background-image: url(images/bg.jpg);">
<div style="border: solid 0px; width: 600px; height: 400px; margin: 200px auto; background-color: white;" >
    <form action="doAction.php?a=login" method="post" name="form">
        <table border="0" cellspacing="" cellpadding="" align="center" style="padding-top: 50px">
            <tr>
                <td  align="left"><h3>登录</h3></td>
                <td align="right"><small style="">没有帐号？<a href="register.html">去注册</a></small></td>
            </tr>
            <tr>
                <td align="right"><label for="name">姓名<span style="color: red;">*</span></label></td>
                <td align="left"><input type="text" name="name" id="name" value="" placeholder="姓名" required="required" autofocus="autofocus" style="height: 28px; border: 1px solid rgb(228, 228, 228); width: 190px"/></td>
            </tr>

            <tr><td></td><td><span id="retu" style="text-align: right;color: red"></span></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr>
                <td align="right"><label for="pw">密码<span style="color: red;">*</span></label></td>
                <td align="left"><input type="password" name="pw" id="pw" value="" placeholder="密码" required="required" style="height: 28px; border: 1px solid rgb(228, 228, 228);width: 190px"/></td>
            </tr>
            <tr><td></td><td><span id="pwd_che" style="text-align: right;color: red"></span></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <!--
            <tr>
                <td align="right"><label for="repw">确认密码<span style="color: red;">*</span></label></td>
                <td align="left" ><input  type="password" name="repw" id="repw" value="" placeholder="确认密码" required="required" style="height: 28px; border: 1px solid rgb(228, 228, 228);"/></td>
            </tr>
            <tr><td></td><td><span id="repwd_che" style="text-align: right;color: red"></span></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            -->
            <tr>
                <td align="" height="41" colspan="2" style="padding-left:0px;text-align:left;position:relative;" valign="bottom"><input type="text" name="code" id="code" value="" maxlength="4" size="7" required="required" style="text-indent: 5px; width: 236px; height: 28px; line-height: 28px; vertical-align: bottom; margin-bottom: 4px; border: 1px solid rgb(228, 228, 228); background-color: rgb(255, 255, 255); color: black;"><div style="position: absolute; right: 2px; top: 6px;"><img id="checkpic" onclick="changing();" src='code.php' title="看不清?换一张" style="width: 80px; height: 31px; cursor: pointer; margin: 0px; "/></div></td>


            </tr>
            <tr><td colspan="2"><span id="code_che" style="text-align: right;color: red"></span></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>

            <tr>
                <td align="" colspan="2" style="padding-left:2px;position:relative;"><button type="submit" name="提交" onclick="return check()" class="btnlogin"><span style="color: white; font-weight: bold">登 录</span></button></td>
                <!--<td align="left"><button type="reset">重置</button></td>-->
            </tr>
        </table>
    </form>
    </div>
</div>
</body>
</html>
