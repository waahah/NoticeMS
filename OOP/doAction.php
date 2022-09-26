<?php
//1.导入配置文件和Model类
require("config.php");
require("Model.php");
//2.实例化类
$mod = new Model("tb_notice"); 
//3.根据参数a执行对象操作
switch($_GET['a']){        
    case "update":                                   //对获取值进行判断，如果是update，则执行下述语句
        $data['id'] = $_GET['id'];                   //将读取的id值赋给数组变量
        $data['title'] = $_POST['title'];            //将获取的公告标题赋值给数组变量
        $data['content'] = $_POST['content'];        //将获取的公告内容赋值给数组变量
        date_default_timezone_set("PRC");#中国时区
        $time = date("Y-m-d H:i:s");
        $data['time'] = $time; 
        $row = $mod->update($data);                  //调用update()方法，更新记录
        //定义sql语句并发送执行
        if($row){
            echo "<script>alert('修改成功');window.location.href='search_notice.php'</script>";
        }else{
            echo ("<script>alert('修改失败！');history.go(-1);</script>");
            exit();
        }
        break;
    case "add" :
        $data['title'] = $_POST['title'];           //将获取的公告标题赋值给数组变量
        $data['content'] = $_POST['content'];       //将获取的公告内容赋值给数组变量
        date_default_timezone_set("PRC");#中国时区
        $time = date("Y-m-d H:i:s");
        $data['time'] = $time;                     //将系统当前时间赋值给数组变量
        $id = $mod->insert($data);                  //调用insert()方法
        if($id){
            echo "<script>alert('成功');window.location.href='search_notice.php'</script>";
            die;
        }else{
            echo "<script>alert('失败');history.go(-1);</script>";
            die;
        }
        break;
    case "del":
        $row = $mod->del($_GET['id']+0);            //调用del()方法，删除记录
        if($row){
            echo "<script>alert('删除成功');window.location.href='search_notice.php'</script>";
        }else{
            echo ("<script>alert('删除失败！');history.go(-1);</script>");
            exit();
        }
        break;
}
?>


