<?php

class ThirdPayCrowdfunding
{

	public function index($orderid,$paytype='',$third_id=''){
		$where 	= array('orderid'=>$orderid);

		$order 		= M('Crowdfunding_order')->where($where)->find();
		if(empty($order)){
			exit('订单不存在');
		}else{
			$wecha_id 	= $order['wecha_id'];
			$token 		= $order['token'];

			if($order['paid'] == 1){
				M('Crowdfunding_order')->where($where)->setField('pay_time',time());
				M('Crowdfunding')->where(array('token'=>$token,'id'=>$order['pid']))->setInc('supports',1);
				header('Location:'.U('Crowdfunding/index',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$order['pid'])));
			}else{
				exit('支付未完成');
			}
		}

	}

}


?>