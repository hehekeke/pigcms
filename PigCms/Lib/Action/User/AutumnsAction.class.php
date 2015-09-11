<?php
class AutumnsAction extends ActivityBaseAction{
	public $activityType;
	public $activityTypeName;
	public function _initialize() {
		parent::_initialize();
		$this->canUseFunction('Autumns');
		$this->activityType=1;
		$this->activityTypeName='拆礼盒';
		$this->assign('activityTypeName',$this->activityTypeName);
	}

	public function index(){
		parent::index($this->activityType);
		$this->display();
	
	}
	
	public function add(){
		parent::add($this->activityType);
	}
	
	public function edit(){
		parent::edit($this->activityType);
	}

	public function cheat(){
		parent::cheat($this->activityType);
		$this->display();
	}

	public function sn(){
		$lid=$this->_get('id','intval');
		$id=M('Lottery')->where(array('zjpic'=>$lid,'token'=>$this->token))->getField('id');
		$type=$this->_get('type','intval');
		$lottery=M('Activity')->where(array('token'=>$this->token,'id'=>$lid,'type'=>$type))->find();
		$this->assign('Activity',$lottery);

		$recordcount=$lottery['fistlucknums']+$lottery['secondlucknums']+$lottery['thirdlucknums']+$lottery['fourlucknums']+$lottery['fivelucknums']+$lottery['sixlucknums'];
		$datacount=$lottery['fistnums']+$lottery['secondnums']+$lottery['thirdnums']+$lottery['fournums']+$lottery['fivenums']+$lottery['sixnums'];
		$this->assign('datacount',$datacount);
		$this->assign('recordcount',$recordcount);
		
		$box=M('Autumns_box');
		
		$lcount = $box->where(array('token'=>$this->token,'bid'=>$id,'isprize'=>1))->count();
		$page 	= new Page($lcount,20);
		$this->assign('page',$page->show());

		$list = $box->where(array('token'=>$this->token,'bid'=>$id,'isprize'=>1))->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
		foreach($list as $key=>$val){
			$user =  M('Userinfo')->where(array('token'=>$this->token,'wecha_id'=>$val['wecha_id']))->field('wechaname,tel')->find();
			$list[$key]['tel'] = $user['tel'];
			$list[$key]['name'] = $user['wechaname'];
		}
		$this->assign('list',$list);

		$send = $box->where(array('bid'=>$id,'isprize'=>1,'sendstutas'=>1))->count();
		$this->assign('send',$send);
		
		$count=$box->where(array('bid'=>$id,'isprize'=>1,'isprizes'=>1))->count();
		$this->assign('count',$count);

		$lottery=M('Activity')->where(array('id'=>$lid,'token'=>$this->token))->find();
		$this->assign('id',$id);
		$this->display();
	}

	public function sendprize(){
		$bid = $this->_get('id','intval');
		$id = $this->_get('bid','intval');

		$where=array('bid'=>$bid,'token'=>$this->token,'id'=>$id);
	
		$data['sntime']=time();
		$data['sendstutas']=1;
		$back=M('Autumns_box')->where($where)->save($data);

		if($back==true){
			$this->success('操作成功');
		}else{
			$this->error('操作失败');
		}
	}

	public function sendnull(){
		$bid = $this->_get('id','intval');
		$id = $this->_get('bid','intval');
		$where=array('bid'=>$bid,'token'=>$this->token,'id'=>$id);
		$data['sntime']='';
		$data['sendstutas']=0;
		$back=M('Autumns_box')->where($where)->save($data);
		if($back==true){
			$this->success('已经取消');
		}else{
			$this->error('操作失败');
		}
	}

	public function sndelete(){
		$bid = $this->_get('id','intval');
		$id = $this->_get('bid','intval');
		$box=M('Autumns_box');
		$aid=M('Lottery')->where(array('token'=>$this->token,'id'=>$bid))->getField('zjpic');
		$lv=$box->where(array('id'=>$id,'token'=>$this->token))->getField('lvprize');
		$where=array('id'=>$id,'bid'=>$bid,'token'=>$this->token);
		$box->where($where)->delete();
		switch($lv){
			case 一等奖:
				$cont=M('Activity')->where(array('token'=>$this->token,'id'=>$aid))->setDec('fistlucknums');
			break;
			case 二等奖:
				$cont=M('Activity')->where(array('token'=>$this->token,'id'=>$aid))->setDec('secondlucknums');
			break;
			case 三等奖:
				$cont=M('Activity')->where(array('token'=>$this->token,'id'=>$aid))->setDec('thirdlucknums');
			break;
			case 四等奖:
				$cont=M('Activity')->where(array('token'=>$this->token,'id'=>$aid))->setDec('fourlucknums');
			break;
			case 五等奖:
				$cont=M('Activity')->where(array('token'=>$this->token,'id'=>$aid))->setDec('fivelucknums');
			break;
			case 六等奖:
				$cont=M('Activity')->where(array('token'=>$this->token,'id'=>$aid))->setDec('sixlucknums');
			break;
		}
		$this->success('操作成功');
	}

	public function endLottery(){
		parent::endLottery($this->activityType);
	}

	public function startLottery(){
		parent::startLottery($this->activityType);
	}
}

?>