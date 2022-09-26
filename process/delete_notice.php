<?php
require("illegal_login.php");
?>
<html>
<head>
<title>信息管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/index.css" rel="stylesheet">
    <script type="text/javascript" charset="utf-8">
        function tiao(){
             let max = document.getElementById("btu").value;
             let page_input = document.getElementById("page_input").value;
            if (page_input<1 || page_input>max){
                page_input = "";
            }
            if (page_input !==""){
                let url = "delete_notice.php?page="+page_input;
                window.location.href = url;
            }
        }
    </script>
</head>
<body>
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
                <ul><li><a href="update_user.php">修改账号</a></li></ul><hr/><ul><li><a href="doAction.php?a=deluser" onclick="return confirm('是否彻底删除账号');">删除账号</a></li></ul><hr/><ul><li><a href="doAction.php?a=deluser">删除账号</a></li></ul><hr/>
			</div>
		</div>
	</div>
<div class="con_right">
		<div>
			<div class="blog_list_wrap">
				<div class="con_header"><div class="title"><span>您当前的位置：后台管理系统</span></div></div>
<div style="margin-top: 20px; margin-bottom:30px; margin-left: 260px; color:red; font-weight:bold">删除公告信息</div>
                <table class="table1">
                    <tr>
                        <td width="180">公告标题</td>
                        <td width="397">公告内容</td>
                        <td width="55" style="width:70px">删除公告</td>
                    </tr>
                    <?php
					$con = mysqli_connect("localhost","root","","db_notice");
                    if (!$con){
                        die("数据库连接失败".mysqli_error());
                    }
                    mysqli_set_charset($con,"utf8");
                    @$page_now = $_GET["page"];
                    if ($page_now ==""){
                        $page_now = 1;
                    }
                    if (is_numeric($page_now)){
                        $page_size = 4;
                        $sql_id = "select * from tb_notice order by id";
                        $result_id = mysqli_query($con,$sql_id);
                        $db_count = mysqli_num_rows($result_id);
                        $page_count = ceil($db_count/$page_size);
                        $offset = ($page_now-1)*$page_size;
                        $sql = "select * from tb_notice order by id limit $offset, $page_size";
                        $result = mysqli_query($con,$sql);
                        $obj = mysqli_fetch_object($result);
                        if ($obj ==""){
                            echo "<font color='red'>暂无公告信息!</font>";
                        }
                        if($result = mysqli_query($con,$sql)){
                            while ($obj = mysqli_fetch_object($result)){
						?>
					<tr>
					    <td style="font-size:14px; text-align:left"><?php echo $obj->title;?></td>
						<td style="font-size:14px; text-align:left"><?php echo $obj->content;?></td>
                        <td align="center"><a href="delete_notice_ok.php?id=<?php echo $obj->id;?>"><img src="images/del.jpg" width="50" height="50" border="0"></a></td>

					</tr>
                    <?php
                            }
                        }
                    }
					?>
				</table>
                 <br>
                      <table style="width:100%; font-size:14px; border:0px; cellspacing:0px; cellpadding:0px">
                        <tr>
                          <!--  翻页条 -->
							<td width="37%">&nbsp;&nbsp;页次：<?php echo $page_now;?>/<?php echo $page_count;?>页&nbsp;记录：<?php echo $db_count;?> 条&nbsp; </td>
							<td width="63%" align="right">
							<?php
                            if ($page_now !=1){
                                echo "<a href=delete_notice.php?page=1>首页</a>&nbsp;";
                                echo "<a href='delete_notice.php?page='".($page_now-1).">上一页</a>&nbsp;";
                            }
                            ?>
                                <input type='text' size='1' name='page_input' id="page_input" value='' placeholder='页码'>
                            <?php
                            echo "<button type='button' id='btu' value=$page_count onclick='tiao()'>跳转</button>&nbsp";
                            if ($page_now<$page_count){
                                echo "<a href=delete_notice.php?page=".($page_now+1).">下一页</a>&nbsp;";
                                echo "<a href=delete_notice.php?page=".$page_count.">尾页</a>";
                            }
                            mysqli_free_result($result);
                            mysqli_close($con);
							?>
                        </tr>
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