<?php
/**
 *网站后台
 *@package
 *@author
 *Crack by JY_pwn
 *QQ:398145059
 **/
class SystemAction extends BackAction{
	public $server_url;
	public $key;
	public $topdomain;
	public $dirtype;
	public function _initialize() {
		parent::_initialize();
		$this->server_url=trim(C('server_url'));
		/*
		if (!$this->server_url){
			$this->server_url='http://up.pigcms.cn/';
		}
		*/
		$this->server_url='http://jyupdate.sinaapp.com/';
        $this->server_url2='http://up.pigcms.cn/';

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
	public function index(){
		$where['display']=1;
		$where['status']=1;
		$order['sort']='asc';
		$nav=M('Node')->where($where)->order($order)->select();
		$this->assign('nav',$nav);

		$notice_record_lists = M('notice_record')->field('id,n_id')->where(array('userid'=>$_SESSION['userid']))->select();
		if(!empty($notice_record_lists)){
			$n_id = array();
			foreach($notice_record_lists as $key=>$val){
				$n_id[] = $val['n_id'];
			}
			$data['n_id'] = implode(',',$n_id);
		}
		$url = 'http://up.pigcms.cn/oa/admin.php?m=notice&c=view&a=get_list';
		if(isset($data['n_id']) && !empty($data['n_id'])){
			$url .= '&'.http_build_query($data);
		}
		if(function_exists('curl_init')){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			$content = curl_exec($ch);
			curl_close($ch);
		}else{
			$content = file_get_contents($url);
		}
		$content = json_decode($content,true);
		$this->assign('content',$content);
		D('Function')->query("delete from ".C('DB_PREFIX')."function where id not in ( select * from ( select min(id)  from ".C('DB_PREFIX')."function group by funname ) as ali );");
		$ndb=D('Node');
		$ndb->where(array('name'=>'email'))->setField('display','0');
		$ndb->where(array('name'=>'Users'))->setField('title','客户管理');
		$this->display();
	}
	public function closeAD(){
		if(IS_GET){
			$id = $this->_get('id','intval');
			if($id){
				M('notice_record')->add(array('n_id'=>$id,'userid'=>$_SESSION['userid']));
			}
		}
	}

	public function menu(){
		if(empty($_GET['pid'])){
			$where['display']=2;
			$where['status']=1;
			$where['pid']=2;
			$where['level']=2;
			$order['sort']='asc';
			$nav=M('Node')->where($where)->order($order)->select();
			$this->assign('nav',$nav);
		}
		$this->display();
	}

	public function main(){
		$firstNode=M('Node')->where(array('pid'=>1,'title'=>'站点管理'))->order('id ASC')->find();
		$nodeExist=M('Node')->where(array('pid'=>$firstNode['id'],'title'=>'后台首页'))->find();
		if (!$nodeExist){
			$submenu=array(
			'name'=>'SystemIndex',
			'title'=>'后台首页',
			'status'=>1,
			'remark'=>'0',
			'pid'=>$firstNode['id'],
			'level'=>2,
			'sort'=>0,
			'display'=>2
			);
			$submenuRowID=M('Node')->add($submenu);
		
		}
		/*
		require_once('test.php');
		if (!class_exists('test')){
		$canEnUpdate=0;
		}else {
		$canEnUpdate=1;
		}
		*/
		$canEnUpdate=1;
		$this->assign('canEnUpdate',$canEnUpdate);

		//
		//
		$updateRecord=M('System_info')->order('lastsqlupdate DESC')->find();
		if ($updateRecord['lastsqlupdate']>$updateRecord['version']){
			//$updateRecord['version']=$updateRecord['lastsqlupdate'];
		}
		$this->assign('updateRecord',$updateRecord);
		$this->display();
	}
	public function repairTable(){
		$Model = new Model();
		error_reporting(0);
		@mysql_query('REPAIR TABLE `'.C('DB_PREFIX').'behavior`');
		@mysql_query('REPAIR TABLE `'.C('DB_PREFIX').'requestdata`');
		$this->success('成功删除缓存',U('System/main'));
	}
	
	//
	public function _needUpdate(){
		$Model = new Model();
		$updateRecord=M('System_info')->order('lastsqlupdate DESC')->find();
		if (!$updateRecord){
			$Model->query('INSERT INTO `'.C('DB_PREFIX').'system_info` (`lastsqlupdate`, `version`) VALUES(0, \'0\')');
		}
		//
		$key=$this->key;
		$url=$this->server_url.'server.php?key='.$key.'&lastversion='.$updateRecord['version'].'&domain='.$this->topdomain.'&dirtype='.$this->dirtype;
		$remoteStr=@pigcms_getcontents($url);
		//
		$rt=json_decode($remoteStr,1);
		if ($rt['success']<1){
			//$this->error($rt['msg']);
			//exit();
		}
		return $rt;
	}
	public function _needSqlUpdate(){
		$updateRecord=M('System_info')->order('lastsqlupdate DESC')->find();
		//
		$key=$this->key;
		$url=$this->server_url.'sqlserver.php?key='.$key.'&lastsqlupdate='.$updateRecord['lastsqlupdate'].'&domain='.$this->topdomain.'&dirtype='.$this->dirtype;
		$remoteStr=pigcms_getcontents($url);

		//
		$rt=json_decode($remoteStr,1);
		if ($rt['success']<1){
			if ($rt['msg']){
				$this->error($rt['msg']);
			}else {
				$this->success('程序已经是最新的了');
			}
			exit();
		}
		return $rt;
	}
	public function checkUpdate(){
		$rt=$this->_needUpdate();
		$needUpdate=0;
		if ($rt['success']<1){
			$sqlrt=$this->_needSqlUpdate();
			if ($sqlrt['success']<1){
			}else {
				$needUpdate=1;
			}
		}else {
			$needUpdate=1;
		}
		$this->assign('needUpdate',$needUpdate);

		$this->display();
	}
	public function doUpdate(){
		
		@set_time_limit(0);
		
		//?document_root?
		$cannotWrite=0;
		$notSupportZip=0;
		if (!class_exists('ZipArchive')){
			//$this->error('您的服务器不支持php zip扩展，请配置好此扩展再来升级',U('System/main'));
			$notSupportZip=1;
		}
		if (!isset($_GET['ignore'])){
			if (!is_writable($_SERVER['DOCUMENT_ROOT'].'/PigCms')){
				$cannotWrite=1;
				$this->error('您的服务器PigCms文件夹不可写入，设置好再升级',U('System/main'));
			}
			if (!is_writable($_SERVER['DOCUMENT_ROOT'].'/PigCms/Lib/Action')){
				$cannotWrite=1;
				$this->error('您的服务器/PigCms/Lib/Action文件夹不可写入，设置好再升级',U('System/main'));
			}
			if (!is_writable($_SERVER['DOCUMENT_ROOT'].'/tpl')){
				$this->error('您的服务器tpl文件夹不可写入，设置好再升级',U('System/main'));
			}
			if (!is_writable($_SERVER['DOCUMENT_ROOT'].'/tpl/User/default')){
				$this->error('您的服务器/tpl/User/default文件夹不可写入，设置好再升级',U('System/main'));
			}
		}
		/*
		require_once('test.php');
		if (!class_exists('test')){
		$this->success('检查更新',U('System/doSqlUpdate'));
		}
		*/

		//
		$now=time();
		$updateRecord=M('System_info')->order('lastsqlupdate DESC')->find();
		$key=$this->key;
		$url=$this->server_url.'server.php?key='.$key.'&lastversion='.$updateRecord['version'].'&domain='.$this->topdomain.'&dirtype='.$this->dirtype;
		$remoteStr=@pigcms_getcontents($url);
		//
		$rt=json_decode($remoteStr,1);
		
		if (intval($rt['success'])<1){
			if (intval($rt['success'])==0){
				if (!isset($_GET['ignore'])){
					$this->success('继续检查更新了,不要关闭,跳是正常的'.$rt['msg'],U('System/doSqlUpdate'));
				}else {
					$this->success('继续检查更新了,不要关闭,跳是正常的'.$rt['msg'],U('System/doSqlUpdate',array('ignore'=>1)));
				}
			}else {
				$this->success($rt['msg'],U('System/main'));
			}
		}else {
			file_put_contents(CONF_PATH.$rt['fileid'].'.txt',json_encode($rt));
			$locationZipPath=CONF_PATH.$rt['fileid'].'_'.$now.'.zip';
			//$filename=$this->server_url.'server.php?getFile=1&key='.$key.'&lastversion='.$updateRecord['version'].'&domain='.$this->topdomain.'&dirtype='.$this->dirtype;
			$filename=$this->server_url2.$rt['filepath'];
			$fileStr=@pigcms_getcontents($filename);
			if (!$fileStr){
				$fileStr=@file_get_contents($filename);
			}
			if (!$fileStr){
				$this->error('竟然获取不到文件');
			}

			file_put_contents(CONF_PATH.$rt['fileid'].'.txt',json_encode($rt));
			file_put_contents($locationZipPath,$fileStr);
			//
			$cacheUpdateDirName2='caches_upgrade'.date('Ym',time());
			$cacheUpdateDirName='caches_upgrade'.date('Ymd',time()).time();
			if ($notSupportZip){
				$archive = new PclZip($locationZipPath);
				if($archive->extract(PCLZIP_OPT_PATH, CONF_PATH.$cacheUpdateDirName, PCLZIP_OPT_REPLACE_NEWER) == 0) {
					$this->error("Error : ".$archive->errorInfo(true));
				}
			}else {
				$zip = new ZipArchive();

				$rs = $zip->open($locationZipPath);
				if($rs !== TRUE)
				{
					$err='解压失败_2!Error Code:'. $rs.'!';
					//$this->error('解压失败_2!Error Code:'. $rs);
				}
			}
			//

			if(!file_exists(CONF_PATH.$cacheUpdateDirName)) {
				@mkdir(CONF_PATH.$cacheUpdateDirName,0777);
				@mkdir(CONF_PATH.$cacheUpdateDirName2,0777);
			}
			//
			if (!$notSupportZip){
				$zip->extractTo(CONF_PATH.$cacheUpdateDirName);
				$zip->extractTo(CONF_PATH.$cacheUpdateDirName2);
				$zip->close();
			}

			recurse_copy(CONF_PATH.$cacheUpdateDirName,$_SERVER['DOCUMENT_ROOT']);

			//delete
			if (!$cannotWrite){
				deletedir(CONF_PATH.$cacheUpdateDirName);
			}
			//@unlink($locationZipPath);
			//record to database
			if ($rt['time']){
				M('System_info')->where(array('version'=>$updateRecord['version']))->save(array('version'=>$rt['time']));
				M('Update_record')->add(array('msg'=>$rt['msg'],'time'=>$rt['time'],'type'=>$rt['type']));
			}
			if (isset($_GET['ignore'])){
				$this->success($err.'进入下一步(不要关闭,等待完成,跳是正常的):'.$rt['msg'],U('System/doUpdate',array('ignore'=>1)));
			}else {
				$this->success($err.'进入下一步(不要关闭,等待完成,跳是正常的):'.$rt['msg'],U('System/doUpdate'));
			}
		}
	}
	public function doSqlUpdate(){
		
		@set_time_limit(0);
		
		//
		$now=time();
		$updateRecord=M('System_info')->order('lastsqlupdate DESC')->find();
		$key=$this->key;
		$url=$this->server_url.'sqlserver.php?key='.$key.'&excute=1&lastsqlupdate='.$updateRecord['lastsqlupdate'].'&domain='.$this->topdomain.'&dirtype='.$this->dirtype;
		$remoteStr=pigcms_getcontents($url);
		$backUrl = ($_GET['install'] == 1) ? U('System/index') : U('System/main');
		$rt=json_decode($remoteStr,1);
		if (intval($rt['success'])<1){
			if (intval($rt['success'])==0){
				$this->success('升级完成',$backUrl);
			}else {
				$this->error($rt['msg'],$backUrl);
			}
		}else {
			$Model = new Model();
			error_reporting(0);
			@mysql_query(str_replace('{tableprefix}',C('DB_PREFIX'),$rt['sql']));
			//record to database
			if ($rt['time']){
				M('System_info')->where(array('lastsqlupdate'=>$updateRecord['lastsqlupdate']))->save(array('lastsqlupdate'=>$rt['time']));
			}
			if (!isset($_GET['ignore'])){
				$this->success('进入下一步(不要关闭,耐心等待完成,跳是正常的):'.date('Y-m-d H:i:s',$rt['time']).'-'.$rt['msg'],U('System/doSqlUpdate'));
			}else {
				$this->success('进入下一步(不要关闭,耐心等待完成,跳是正常的):'.date('Y-m-d H:i:s',$rt['time']).'-'.$rt['msg'],U('System/doSqlUpdate',array('ignore'=>1)));
			}
		}
	}
	function rollback(){
		//20140312
		$time=substr($_GET['time'],0,8);
		$year=substr($time,0,4);
		$month=substr($time,4,2);
		$day=substr($time,6,2);
		//exit($day);
		$timeStamp=mktime(0,0,0,$month,$day,$year);
		$updateRecord=M('System_info')->order('lastsqlupdate DESC')->find();
		M('System_info')->where('lastsqlupdate>0')->save(array('version'=>$timeStamp));
		$this->success('您可以重新进行升级了',U('System/main'));
	}
	function rollbacksql(){
		//20140312
		$time=substr($_GET['time'],0,8);
		$year=substr($time,0,4);
		$month=substr($time,4,2);
		$day=substr($time,6,2);
		//exit($day);
		$timeStamp=mktime(0,0,0,$month,$day,$year);
		$updateRecord=M('System_info')->order('lastsqlupdate DESC')->find();
		M('System_info')->where(array('lastsqlupdate'=>$updateRecord['lastsqlupdate']))->save(array('lastsqlupdate'=>$timeStamp));
		$this->success('您可以重新进行升级了',U('System/main'));
	}
	function curlGet($url){
		$ch = curl_init();
		$header = "Accept-Charset: utf-8";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$temp = curl_exec($ch);
		return $temp;
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
}
function recurse_copy($src,$dst) {  // 原目录，复制到的目录
	$now=time();
	$dir = opendir($src);
	@mkdir($dst);
	while(false !== ( $file = readdir($dir)) ) {
		if (( $file != '.' ) && ( $file != '..' )) {
			if ( is_dir($src . '/' . $file) ) {
				recurse_copy($src . '/' . $file,$dst . '/' . $file);
			}
			else {

				if (file_exists($dst . DIRECTORY_SEPARATOR . $file)){
					if (!is_writeable($dst . DIRECTORY_SEPARATOR . $file)){
						exit($dst . DIRECTORY_SEPARATOR . $file.'不可写');
					}
					@unlink($dst . DIRECTORY_SEPARATOR . $file);
				}
				if (file_exists($dst . DIRECTORY_SEPARATOR . $file)){
					@unlink($dst . DIRECTORY_SEPARATOR . $file);
				}
				$copyrt=copy($src . DIRECTORY_SEPARATOR . $file,$dst . DIRECTORY_SEPARATOR . $file);

				if (!$copyrt){
					echo 'copy '.$dst . DIRECTORY_SEPARATOR . $file.' failed<br>';
				}
			}
		}
	}
	closedir($dir);
}
function deletedir($dirname){
	$result = false;
	if(! is_dir($dirname)){
		echo " $dirname is not a dir!";
		exit(0);
	}
	$handle = opendir($dirname); //打开目录
	while(($file = readdir($handle)) !== false) {
		if($file != '.' && $file != '..'){ //排除"."和"."
			$dir = $dirname.DIRECTORY_SEPARATOR.$file;
			//$dir是目录时递归调用deletedir,是文件则直接删除
			is_dir($dir) ? deletedir($dir) : unlink($dir);
		}
	}
	closedir($handle);
	$result = rmdir($dirname) ? true : false;
	return $result;
}
function pigcms_getcontents($url,$recu=0){
	if (!$url){
		exit('空的url请求'.$recu);
	}
	if (function_exists('curl_init')){
		$ch = curl_init();
		$header = "Accept-Charset: utf-8";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$temp = curl_exec($ch);
		
		$headers = curl_getinfo($ch);
		if($headers['http_code'] == 302){
			$haderUrl=$headers['redirect_url'];
			if (!$haderUrl){
				$haderUrl=$headers['url'];
			}
			if (!$haderUrl){
				echo 'header有空请求，请查看<br>';
				var_export($headers);
				exit();
			}
			$haderUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
			return pigcms_getcontents($haderUrl,1);
		}
		
		$errorno=curl_errno($ch);
		
		curl_close($ch);
		
		if ($errorno) {
			if ($errorno==3){
				echo '请求地址是：'.$url.',或者'.$haderUrl.'<br>';
			}
			exit('curl发生错误：错误代码'.$errorno.'，如果错误代码是6，您的服务器可能无法连接我们升级服务器');
		}else {
			return $temp;
		}

	}else {
		$str=file_get_contents($url);
		return $str;
	}
}