<?php
final class apiServer {
	public function __construct() {
		
	}
	public function getServerUrl(){
		return 'http://www.lexun.cc';
	}
	
	public function getApiUrltu(){
		return 'http://www.tuling123.com/openapi/api';
	}
	
	public function getApiKeyID(){
		return array('key'=>'3382804569e14b1961d097353184218e','ID'=>'55158');
	}
	
	public function getErrMsg($code){
		$error_code = array(
		/*	'100000'=>'文本类数据',
			'200000'=>'网址类数据',
			'302000'=>'新闻',
			'304000'=>'应用、软件、下载',
			'305000'=>'列车',
			'306000'=>'航班',
			'308000'=>'菜谱、视频、小说',
			'309000'=>'酒店',
			'311000'=>'价格',*/
			'40001'=>'key的长度错误（32位）',
			'40002'=>'请求内容为空',
			'40003'=>'key错误或帐号未激活',
			'40004'=>'当天请求次数已用完',
			'40005'=>'暂不支持该功能',
			'40006'=>'服务器升级中',
			'40007'=>'服务器数据格式异常',
		);
		if(isset($error_code[$code])){
			return $error_code[$code];
		}else{
			return "错误号：{$code},未知系统错误";
		}
			 
	}
}
?>