<?php 
class ThirdPaySeckill{
	public function index($order_id , $paytype='' , $third_id=''){
		$wecha_id = '';
		$token = '';
		$order = M('seckill_book')->where(array("orderid"=>$order_id))->find();
		if(!empty($order)){
			$wecha_id = $order['wecha_id'];
			$token = $order['token'];
			if($order['paid']){
				//给顾客发模板消息
				$model = new templateNews();
                $model->sendTempMsg('OPENTM202521011', array('href' => $this->siteUrl.U('Seckill/my_cart',array('token' => $token, 'wecha_id' => $wecha_id,'id'=>$order['book_aid'])), 'wecha_id' => $wecha_id, 'first' => '秒杀交易提醒', 'keyword1' => $order_id, 'keyword2' => date("Y年m月d日H时i分s秒"), 'remark' => '订单完成！'));
				//给商户发短信
				//Sms::sendSms($token, "顾客{$order['true_name']}刚刚对订单号：{$order_id}的订单进行了支付，请您注意查看并处理");
				//M('seckill_book')->where(array('orderid'=>$order_id))->save($data);
				header('Location:'.U('Seckill/my_cart', array('token' => $token, 'wecha_id' => $wecha_id,'id'=>$order['book_aid'])));
			}else{
				header('Location:'.U('Seckill/my_cart', array('token' => $token, 'wecha_id' => $wecha_id,'id'=>$order['book_aid'])));
			}
		}else{
			exit('订单不存在：'.$order_id);
		}
	}
}