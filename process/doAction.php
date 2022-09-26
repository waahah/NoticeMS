<?php 
	session_start();
	$con = mysqli_connect("localhost","root","","db_notice");
	if (!$con){
		die("数据库连接失败！".mysqli_error());
	}
	mysqli_set_charset($con,"utf8");

	switch($_GET['a']) {
		//注册用户
		case "register":

			//获取用户提交的各项信息
			$name = $_POST['name'];
			$pw = $_POST['pw'];
			$code = $_POST['code'];
			$re_ip = $_SERVER['REMOTE_ADDR'];#getenv(REMOTE_ADDR);
			date_default_timezone_set("PRC");#中国时区
			$re_time = date("Y-m-d H:i:s");
			//判断验证码
			if ($code != $_SESSION['vcode']) {
				echo "<script>alert('验证码错误');window.location.href='register.html'</script>";
				die;
			}

			//定义sql语句并发送执行
			$sql = "insert into tb_user (name,password,time,re_ip) values ('$name','$pw','$re_time','$re_ip')";
			$result = mysqli_query($con, $sql);

			//判断是否添加成功
			if ($result) {
				echo "<script>alert('注册成功');window.location.href='index.php'</script>";
			} else {
				echo("<script>alert('注册失败！')</script>");#;history.go(-1);
				echo $name.$pw.$code.$re_ip.$re_time,$_GET["a"],$result;
				#exit();
			}

			break;

//登录
	case "login":
		//判断验证码
		$code = $_POST['code'];
		if ($code != $_SESSION['vcode']) {
			#echo $_SESSION['vcode'];
			echo("<script>alert('验证码不正确！');history.go(-1);</script>");
			exit();
		}
		//定义sql语句，并发送执行
		//获取表单提交的信息
		@$name = $_POST['name'];
		@$pw = $_POST['pw'];

		if (empty($name) || empty($pw)) {
			echo "<script>alert('账号或密码为空');window.location.href='login.php'</script>";
			die;
		}

		$sql = "select * from tb_user where name='{$name}'&& password='{$pw}';";
		$result = mysqli_query($con, $sql);
		//
		$rowcount = mysqli_num_rows($result);

		//解析结果集
		if ($rowcount) {
			// 设置session
			$_SESSION['name'] = $name;
			$_SESSION['pw'] = $pw;
			//跳转到index.PHP
			echo "<script>alert('登录成功');window.location.href='index.php'</script>";
			die;

		} else {
			echo "<script>alert('账号或密码错误');window.location.href='login.php'</script>";
			die;
		}

		break;

	//注销
	case "loginout":

		//销毁session
		unset($_SESSION);

		//3.删除服务器端的session文件
		session_destroy();

		//4.删除客户端的cookie文件
		setcookie(session_name(), "", time() - 1, "/");

		echo "<script>alert('你已经注销');window.location.href='login.php'</script>";
		break;

	case "deluser":
		$name = $_SESSION['name'];
		$pw = $_SESSION['pw'];
		$sql = " delete from tb_user where name='{$name}'&& password='{$pw}';";
		$result = mysqli_query($con, $sql);
		if ($result) {
			// 注销session
			unset($_SESSION['name']);
			unset($_SESSION['pw']);
			//跳转到login.PHP
			echo "<script>alert('删除成功');window.location.href='login.php'</script>";
			die;

		} else {
			echo "<script>alert('删除错误');history.go(-1);</script>";
			die;
		}


}
//释放
if ($result){
	mysqli_free_result($result);
}
//6.关闭数据库
mysqli_close($con);
	
?>	
		
		
		