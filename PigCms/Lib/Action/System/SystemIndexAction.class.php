<?php
/**
 *网站后台
 *@package
 *@author
 **/
class SystemIndexAction extends BackAction{
	public $server_url;
	public $key;
	public $topdomain;
	public $dirtype;
	public function _initialize() {
		parent::_initialize();
		$this->server_url=trim(C('server_url'));
		if (!$this->server_url){
			$this->server_url='http://up.pigcms.cn/';
		}

		$this->key=trim(C('server_key'));
		$this->topdomain=trim(C('server_topdomain'));
		if (!$this->topdomain){
			$this->topdomain=$this->getTopDomain();
		}
		if (file_exists($_SERVER['DOCUMENT_ROOT'].'/Lib')&&is_dir($_SERVER['DOCUMENT_ROOT'].'/Lib')){
			$this->dirtype=2;
		}else {
			$this->dirtype=1;
		}
		$Model = new Model();
		//检查system表是否存在
		$Model->query("CREATE TABLE IF NOT EXISTS `".C('DB_PREFIX')."system_info` (`lastsqlupdate` INT( 10 ) NOT NULL ,`version` VARCHAR( 10 ) NOT NULL) ENGINE = MYISAM CHARACTER SET utf8");
		$Model->query("CREATE TABLE IF NOT EXISTS `".C('DB_PREFIX')."update_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` varchar(600) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT '',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8");

		$firstNode=M('Node')->where(array('name'=>'Function','title'=>'功能模块'))->find();
        $nodeExist=M('Node')->where(array('name'=>'aboutus'))->find();
        if (!$nodeExist){
            $row2=array(
            'name'=>'Aboutus',
            'title'=>'关于我们',
            'status'=>1,
            'remark'=>'0',
            'pid'=>$firstNode['id'],
            'level'=>2,
            'sort'=>0,
            'display'=>2
            );
            M('Node')->add($row2);
        }
        //
        $siteConfigNode=M('Node')->where(array('title'=>'站点设置'))->find();
        $platformConfigNode=M('Node')->where(array('title'=>'平台支付配置'))->find();
        if (!$platformConfigNode){
        	$row=array(
            'name'=>'platform',
            'title'=>'平台支付配置',
            'status'=>1,
            'remark'=>'',
            'pid'=>$siteConfigNode['id'],
            'level'=>3,
            'sort'=>0,
            'display'=>2
            );
        	M('Node')->add($row);
        }
        $extNode=M('Node')->where(array('title'=>'扩展管理'))->find();
        $platformPayNode=M('Node')->where(array('title'=>'平台支付'))->find();
        if (!$platformPayNode){
        	$row=array(
            'name'=>'Platform',
            'title'=>'平台支付',
            'status'=>1,
            'remark'=>'',
            'pid'=>$extNode['id'],
            'level'=>2,
            'sort'=>0,
            'display'=>2
            );
        	$platFormID=M('Node')->add($row);
        	//
        	$row=array(
            'name'=>'index',
            'title'=>'平台对账',
            'status'=>1,
            'remark'=>'',
            'pid'=>$platFormID,
            'level'=>3,
            'sort'=>0,
            'display'=>2
            );
           M('Node')->add($row);
        }
	}
    
	function getTopDomain(){
		$host=$_SERVER['HTTP_HOST'];
		$host=strtolower($host);
		if(strpos($host,'/')!==false){
			$parse = @parse_url($host);
			$host = $parse['host'];
		}
		$topleveldomaindb=array('com','edu','gov','int','mil','net','org','biz','info','pro','name','museum','coop','aero','xxx','idv','mobi','cc','me');
		$str='';
		foreach($topleveldomaindb as $v){
			$str.=($str ? '|' : '').$v;
		}
		$matchstr="[^\.]+\.(?:(".$str.")|\w{2}|((".$str.")\.\w{2}))$";
		if(preg_match("/".$matchstr."/ies",$host,$matchs)){
			$domain=$matchs['0'];
		}else{
			$domain=$host;
		}
		return $domain;
	}
	public function index(){
		header('Location:'.U('System/main'));
	}
	
}