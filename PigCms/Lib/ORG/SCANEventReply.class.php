<?php
class SCANEventReply{
	public $token;
	public $wecha_id;
	public $id;
	public $siteUrl;
	public $weixin;
	public $ali;
	public $data;
	public function __construct($token,$wecha_id,$data,$siteUrl,$ali=0){
		$this->token = $token;
		$this->wecha_id = $wecha_id;
		$this->data = $data;
		$this->id = $data['EventKey'];
		$this->siteUrl = $siteUrl;
		$this->ali = $ali;
		$this->weixin = A('Home/Weixin');
	}
	public function index(){
		$id = $this->id;
		$GetDb=D('Recognition');
		$data=$GetDb->field('keyword,groupid')->where(array('id'=>$id,'status'=>0))->find();
		//return array($data['keyword'],'text');exit;
		if($data){
			$id_Recognition_data = M('recognition_data')->add(array('token'=>$this->token,'wecha_id'=>$this->wecha_id,'rid'=>$id,'time'=>time(),'year'=>intval(date('Y')),'month'=>intval(date('m')),'day'=>intval(date('d')),'is_ali'=>$this->ali));
			//return array((intval($id_Recognition_data)),'text');exit;
			$GetDb->where(array('id'=>$id))->setInc('attention_num');
			
			$wecha_id = $this->wecha_id;
			$group_list = M('wechat_group_list');
			//修改粉丝分组（本地）
			$fid = $group_list->where(array('token'=>$this->token,'openid'=>$wecha_id))->getField('id');
			if ($fid) {
				$group_list->where('id='.$fid)->setField('g_id',$data['groupid']);
			}else{
				$group_list->add(array('token'=>$this->token,'openid'=>$wecha_id,'g_id'=>$data['groupid']));
			}
			//更新分组信息到微信服务器

			$access_token=$this->weixin->api('_getAccessToken');
			$url='https://api.weixin.qq.com/cgi-bin/groups/members/update?access_token='.$access_token;
			$json=json_decode($this->weixin->api('curlGet',$url,'post','{"openid":"'.$wecha_id.'","to_groupid":'.$data['groupid'].'}'));

			$keyword = $data['keyword'];
		}else{
			$keyword = false;
		}
		return $this->weixin->api('keyword',$keyword,$this->token,$this->data,$this->siteUrl);
	}
}
?>