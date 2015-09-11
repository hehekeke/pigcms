<?php
class ThirdPayBargain
{	
	
	public function index($orderid,$paytype,$third_id){
		$this->m_bargain = M("bargain");
		$this->m_order = M("bargain_order");
		$this->m_kanuser = M("bargain_kanuser");
		$this->m_userinfo = M("userinfo");
		$where_order['orderid'] = $orderid;
		$order = $this->m_order->where($where_order)->find();
		if($order){
			$this->wecha_id = $order['wecha_id'];
			$this->token = $order['token'];
			if($order['paid']!=1){
				exit('该订单还未支付');
			}
			$save_order['state2'] = 1;
			$update_order = $this->m_order->where($where_order)->save($save_order);
			$where['token'] = $this->token;
			$where['pigcms_id'] = $order['bargain_id'];
			$bargain = $this->m_bargain->where($where)->find();
			$save['inventory'] = $bargain['inventory'] - 1;
			$update = $this->m_bargain->where($where)->save($save);
		}else{
			exit('订单不存在：'.$orderid);
		}
	}
}