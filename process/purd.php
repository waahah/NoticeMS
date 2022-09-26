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
<script language="javascript" charset="utf-8">
    function check(form){                    //验证表单信息是否为空
//若查询关键字为空，则弹出提示信息，并定位光标
        if(form1.keyword.value==""){
            alert("请输入查询关键字!");
            form1.keyword.focus();
            return false;
        }
        form1.submit();                           //若各控件不为空，则提交表单信息
    }
    //获取地址栏参数，name:参数名称
    function getRequest() {
        var url = window.location.search; //获取url中"?"符后的字串
        var theRequest = new Object();
        if (url.indexOf("?") != -1) {
            var str = url.substr(1);
            strs = str.split("&");
            for(var i = 0; i < strs.length; i ++) {

                theRequest[strs[i].split("=")[0]]=decodeURI(strs[i].split("=")[1]);

            }
        }
        return theRequest;
    }
    var keyword= getRequest().keyword;

    function tiao(key){
        let max = document.getElementById("btu").value;
        let page_input = document.getElementById("page_input").value;
        if (page_input <1 ){
            page_input = 1;
        }
        if (page_input > max){
            page_input = max;
        }
        if (page_input !==""){
            let url = "purd.php?page="+page_input+"&keyword="+key;//+keyword;
            //console.log(keyword);
            console.log(url);
            window.location.href = url;
        }
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
                    <form name="form1" method="get" action="purd.php">
                        <label for="keyword">查询关键字</label>
                        <input name="keyword" type="search" id="keyword" size="40">
                        &nbsp;
                        <input type="submit" name="Submit" value="搜索" onClick="return check(form)">
                    </form>
                </div>
                <table class="table1">
                    <tr>
                        <td width="180">公告标题</td>
                        <td width="397">公告内容</td>
                        <td width="55" style="width:70px">编辑公告</td>
                    </tr>
                    <?php
                    $con = mysqli_connect("localhost","root","","db_notice");
                    if (!$con){
                        die("数据库连接失败！".mysqli_error());
                    }
                    mysqli_set_charset($con,"utf8");
                    @$keyword = $_GET["keyword"];
                    @$page_now = $_GET["page"];
                    if ($page_now ==""){
                        $page_now = 1;
                    }
                    if (is_numeric($page_now)){
                        $page_size = 4;
                        $offset = ($page_now-1)*$page_size;
                        if (empty($keyword)){
                            $sal_id = "select * from tb_notice order by id";
                            $result_id = mysqli_query($con,$sal_id);
                            $db_count = mysqli_num_rows($result_id);
                            $page_count = ceil($db_count/$page_size);
                            $sql = "select * from tb_notice order by id limit $offset, $page_size";
                        }else{
                            $sql_id ="select * from tb_notice where title like '%$keyword%' or content like '%$keyword%' or time like '%$keyword%' order by id";
                            $result_id = mysqli_query($con,$sql_id);
                            $db_count = mysqli_num_rows($result_id);
                            $page_count = ceil($db_count/$page_size);
                            $sql = "select * from tb_notice where title like '%$keyword%' or content like '%$keyword%' or time like '%$keyword%' order by id limit $offset,$page_size ";
                        }
                        $result = mysqli_query($con,$sql);#对成功的select,show查询，将返回一个mysqli_result对象,对其他成功的查询，将返回true；如果失败，则返回false
                        $row_count = mysqli_num_rows($result);
                        $row = mysqli_fetch_row($result);#返回一个与所取得行相对应的字符串数组
                        #$obj = mysqli_fetch_object($result_fen);#从查询结果集中取得当前行，并将其作为对象返回
                    }

                    if ($row == ""){
                        echo "<font color='red'>您搜索的信息不存在，请使用类似的关键字进行检索!</font>";
                    }
                    if($result = mysqli_query($con,$sql)){
                        #while ($obj= mysqli_fetch_object($result_fen)){
                        #$rowcount = mysqli_num_rows($result);
                        for ($i=0;$i<$row_count;$i++){
                            #从查询结果集中取得当前行，并将其作为字符串数组返回
                            $row = mysqli_fetch_row($result);
                            ?>
                            <tr>
                                <td style="font-size:14px; text-align:left"><?php echo $row[1];?></td>
                                <td style="font-size:14px; text-align:left"><?php echo $row[2];?></td>
                                <td align="center"><a width='23' height='30' href="modify.php?id=<?php echo $row[0];?> ">修改</a>&nbsp<a href="delete_notice_ok.php?id=<?php echo $row[0];?>" onclick="return confirm('确定将此记录删除?')">删除</a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
                </br>
                <table style="width:100%; font-size:14px; border:0px; cellspacing:0px; cellpadding:0px">
                    <tr>
                        <!--  翻页条 -->
                        <td width="37%">&nbsp;&nbsp;页次：<?php echo $page_now;?>/<?php echo $page_count;?>页&nbsp;记录：<?php echo $db_count;?> 条&nbsp; </td>
                        <td width="63%" align="right">
                            <?php
                            if ($page_now !=1){
                                #（踩坑）对查询出的结果进行分页时，要将搜索条件通过URL(GET)传值带到所显示的页数
                                echo "<a href='purd.php?page=1&keyword={$_GET['keyword']}'>首页</a>&nbsp;";
                                echo "<a href='purd.php?page=".($page_now-1)."&keyword={$keyword}'>上一页</a>&nbsp;";
                            }
                            ?>
                            <input type='text' size='1' name='page_input' id="page_input" value='' placeholder='页码'>
                            <?php
                            echo "<button type='button' id='btu' value=$page_count onclick=tiao('".@$_GET['keyword']."')>跳转</button>&nbsp";
                            if ($page_now<$page_count){
                                echo "<a href='purd.php?page=".($page_now+1)."&keyword=".(@$_GET['keyword'])."'>下一页</a>&nbsp;";
                                echo "<a href='purd.php?page=".$page_count."&keyword={$keyword}'>尾页</a>";
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