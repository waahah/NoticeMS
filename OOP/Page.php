<?php
//自定义分页类
class Page
{
    public $page = 1; //当前页
    public $pageSize = 4; //页大小
    public $maxRows =0; //总数据条数
    public $maxPage =0; //总页数
    
    public function __construct($maxRows,$pageSize)
    {
        $this->maxRows = $maxRows;
        $this->pageSize = $pageSize;
        @$this->page = isset($_GET['p'])?$_GET['p']:1;
        $this->loadMaxPage();
        $this->checkPage();
    }
    
    //计算最大页数
    protected function loadMaxPage()
    {
        $this->maxPage = ceil($this->maxRows/$this->pageSize);
    }
     
    //验证当前的有效性
    protected function checkPage()
    {
		@$this->Page = $this->Page+1;
		if($this->page > $this->maxPage){
            $this->page = $this->maxPage;
        }
		
		$this->Page = $this->Page-1;
        if($this->page < 1){
            $this->page = 1;
        }
        
    }
    
    public function limit()
    {
		return (($this->page-1)*$this->pageSize).",".$this->pageSize;
        
    }
    
    //输出分页信息
    public function show()
    {
        $url = $_SERVER["PHP_SELF"];
        //处理参数，实现状态维持
        $params = "";
        foreach($_GET as $k=>$v){
            if($k!="p" && !empty($v)){
                $params .= "&".$k."=".$v;
            }
        }
        $str = "当前第{$this->page}/{$this->maxPage}页 共计{$this->maxRows}条 ";
        $str .= " <a href='{$url}?p=1{$params}'>首页</a> ";
        $str .= " <a href='{$url}?p=".($this->page-1)."{$params}'>上一页</a> ";
        $str .= " <a href='{$url}?p=".($this->page+1)."{$params}'>下一页</a> ";
        $str .= " <a href='{$url}?p={$this->maxPage}{$params}'>尾页</a> ";

        
        return $str;
    }
     
}