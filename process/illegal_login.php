<?php
session_start();#检测是否非法登录
@$s_name = $_SESSION['name'];
@$S_pw = $_SESSION['pw'];
if ($s_name=="" or $S_pw==""){
    echo("<script>alert('请先登录！');window.location.href='login.php';</script>");
}
?>