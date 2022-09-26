<html>
<head>
<title>公告信息管理</title>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<link href="css/index.css" rel="stylesheet">
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
				<ul><li><a href="search_notice.php">分页显示公告信息</a></li></ul><hr/>
				<ul><li><a href="search_notice.php">编辑公告信息</a></li></ul><hr/>
				<ul><li><a href="search_notice.php">删除公告信息</a></li></ul><hr/>
			</div>
		</div>
	</div>

	<div class="con_right">
		<div class="">
			<div class="blog_list_wrap">
				<div class="con_header"><div class="title"><span>您当前的位置：后台管理系统</span></div></div>
				<div style="margin-top: 20px;margin-left: 120px;">
					<form name="form1" method="post" action="search_notice.php">
						查询关键字&nbsp;
						<input name="keyword" type="text" id="txt_keyword" size="40" value="<?php echo empty($_POST['keyword'])?'':$_POST['keyword'];?>">
						&nbsp;
						<input type="submit" name="Submit" value="搜索" >
					</form>
				</div>
                <table class="table1" style="">
                    <tr>
                        <td>标题</td>
                        <td>内容</td>
                        <td>操作</td>
                        <td>添加时间</td>
                    </tr>
                </table>
                <?php
                    @$keyword=$_POST['keyword'];
                    //1.导入配置文件、Model类和Page类
                    require("config.php");
                    require("Model.php");
                    require("Page.php");
                    require("ZsubStr.php");#处理中文乱码
                    //2.实例化Model类
                    $mod = new Model("tb_notice");
                    //判断并封装搜索条件
                    if(!empty($keyword)){
                        $mod->where("title like '%$keyword%' or content like '%$keyword%'");
                    }
                    //获取数据总条数
                    $m = $mod->total();
                    //实例化分页类
                    $page = new Page($m,4);
                    //3.获取所有信息
                    $list = $mod->limit($page->limit())->select();

                    if(count($list)==0){
                        echo "<font color='red'>您搜索的信息不存在，请使用类似的关键字进行检索!</font>";
                    }else{
                        foreach($list as $v){
                ?>
                        <table class="table1" style="">
						<tr>
							<td><?php echo $v['title']?></td>
							<td><?php $mc = new ZsubStr(); echo $mc->chinesesubstr($v['content'],0,30);?></td>
							<td><a href="doAction.php?a=del&id=<?php echo $v['id']?>" onclick="return confirm('确定将此记录删除?')">删除</a>|<a href="add_notice.php?id=<?php echo $v['id']?>">编辑</a></td>
							<td><?php echo $v['time']?></td><!--date("Y-m-d H:i:s",$v['time'])-->
							</tr>

					    </table>
                <?php
                        }
                    }


                ?>
			</div>
		</div>
        <div style="text-align: center;margin-top: 50px;">
            <?php echo $page->show();?>
        </div>

	</div>

	<div class="clear"></div>
</div>
<?php
include('footer.php');
?>
</body>
</html>