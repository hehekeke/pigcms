<?php
class ThirdPayGroupon
{	
	
	public function index($orderid,$paytype,$third_id){
		$product_cart_model=M('product_cart');
		$out_trade_no=$orderid;
		$order=$product_cart_model->where(array('orderid'=>$out_trade_no))->find();
		if (!$this->wecha_id){
			$this->wecha_id=$order['wecha_id'];
		}
		$sepOrder=0;
		if (!$order){
			$order=$product_cart_model->where(array('id'=>$out_trade_no))->find();
			$sepOrder=1;
		}
		if($order){
			if($order['paid']!=1){exit('该订单还未支付');}
			if (!empty($order['sn']) && empty($order['sn_content'])) {
				$where['sendstutas'] = 0;
				$where['order_id'] = 0;
				$where['token'] = $this->token;
				$where['pid'] = $order['productid'];
				$productSn = M('ProductSn');
				$models = $productSn->where($where)->limit($order['total'])->order('id ASC')->select();
				foreach ($models as $key => $model) {
					$model['order_id'] = $order['id'];
					$model['sendstutas'] = 1; 
					$model['sendtime'] = time();
					$model['wecha_id'] = $order['wecha_id'];
					$updateWhere['id'] = $model['id'];
					$updateWhere['sendstutas'] = 0;
					unset($model['id']);
					$productSn->where($updateWhere)->save($model);
					$models[$key] = $model;
				}
				$order['sent'] = 1;
				$order['handled'] = 1;
				$order['sn_content'] = serialize($models);
				$product_cart_model->save($order);								
			} else {
				M('Product')->where(array('id'=>$order['productid']))->setDec('groupon_num', $order['total']);
			}
			
			/************************************************/
			Sms::sendSms($this->token,'您的微信里有团购订单已经付款');
			/************************************************/
			header('Location:/index.php?g=Wap&m=Groupon&a=myOrders&token='.$order['token'].'&wecha_id='.$order['wecha_id']);
			
		}else{
			exit('订单不存在：'.$out_trade_no);
		}
	}
}
?>

