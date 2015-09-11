<?php
class FuwuUserAction extends UserAction{
	public $appid;
	public $fuwuuser;
	public function _initialize(){
		parent::_initialize();
		$this->canUseFunction("FuwuUser");
		
		$this->appid = M("Wxuser")->where(array('token'=>$this->token))->getField('fuwuappid');
		
		$this->m_fuwuuser = M("fuwuuser");
	}
	//服务窗粉丝管理首页
	public function index(){
		$where_fuwuuser['token'] = $this->token;
		$where_page['token'] = $this->token;
		if(!empty($_GET['name'])){
			$where_fuwuuser['real_name'] = array("like","%".$_GET['name']."%");
			$where_page['name'] = $_GET['name'];
		}
		import('ORG.Util.Page');
		$count = $this->m_fuwuuser->where($where_fuwuuser)->count();
		$page = new Page($count,8);
		foreach($where_page as $key=>$val){
			$page->parameter.="$key=".urlencode($val).'&';
		}
		$show = $page->show();
		$fuwuuser_list = $this->m_fuwuuser->where($where_fuwuuser)->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page',$show);
		$this->assign("fuwuuser_list",$fuwuuser_list);
		$fuwuuser_count = count($fuwuuser_list);
		
		//F为男性，M为女性
		$where_fuwuuser_f['gender'] = "F";
		$where_fuwuuser_f['token'] = $this->token;
		$fuwuuser_f_count = $this->m_fuwuuser->where($where_fuwuuser_f)->count();
		
		$where_fuwuuser_m['gender'] = "M";
		$where_fuwuuser_m['token'] = $this->token;
		$fuwuuser_m_count = $this->m_fuwuuser->where($where_fuwuuser_m)->count();
		
		$fuwuuser_u_count = $fuwuuser_count-$fuwuuser_f_count-$fuwuuser_m_count;
		
		$xml='<chart borderThickness="0" caption="粉丝性别比例图" baseFontColor="666666" baseFont="宋体" baseFontSize="14" bgColor="FFFFFF" bgAlpha="0" showBorder="0" bgAngle="360" pieYScale="90"  pieSliceDepth="5" smartLineColor="666666"><set label="男性" value="'.$fuwuuser_f_count.'"/><set label="女性" value="'.$fuwuuser_m_count.'"/><set label="未知性别" value="'.$fuwuuser_u_count.'"/></chart>';
		$this->assign("xml",$xml);
		$this->display();
	}
}