<?php
class ThirdPayUnitary
{	
	
	public function index($orderid,$paytype,$third_id){
		$this->m_unitary = M("unitary");
		$this->m_cart = M("unitary_cart");
		$this->m_order = M("unitary_order");
		$this->m_lucknum = M("unitary_lucknum");
		$this->m_user = M("unitary_user");
		$this->m_userinfo = M("userinfo");
		$where_order['orderid'] = $orderid;
		$order = $this->m_order->where($where_order)->find();
		$this->wecha_id = $order['wecha_id'];
		$this->token = $order['token'];
		if($order){
			if($order['paid']!=1){
				$where_cart['token'] = $this->token;
				$where_cart['wecha_id'] = $this->wecha_id;
				$where_cart['order_id'] = $order['pigcms_id'];
				$save_cart['state'] = 0;
				$save_cart['order_id'] = 0;
				$update_cart = $this->m_cart->where($where_cart)->save($save_cart);
				$del_order = $this->m_order->where($where_order)->delete();
				exit('该订单还未支付');
			}
			$where_cart['token'] = $this->token;
			$where_cart['wecha_id'] = $this->wecha_id;
			$where_cart['order_id'] = $order['pigcms_id'];
			$where_cart['state'] = 0;
			$save_cart['state'] = 1;
			$update_cart = $this->m_cart->where($where_cart)->save($save_cart);
			if($update_cart > 0){
				$where_cart['state'] = 1;
			}
			$cart_list = $this->m_cart->where($where_cart)->select();
			foreach($cart_list as $vo){
				$where_cart2['unitary_id'] = $vo['unitary_id'];
				$where_cart2['token'] = $this->token;
				$where_cart2['state'] = 1;
				$cart_list2 = $this->m_cart->where($where_cart2)->select();
				$pay_count = 0;
				foreach($cart_list2 as $cvo){
					$pay_count = $pay_count + $cvo['count'];
				}
				$where_unitary['id'] = $vo['unitary_id'];
				$where_unitary['token'] = $this->token;
				$find_unitary = $this->m_unitary->where($where_unitary)->find();
				
				for($j=0;$j<$find_unitary['price'];$j++){
					$price[$vo['unitary_id']][] = $j;
				}
				for($i=0;$i<$vo['count'];$i++){
					$add_lucknum['token'] = $this->token;
					$add_lucknum['wecha_id'] = $this->wecha_id;
					$add_lucknum['order_id'] = $order['pigcms_id'];
					$add_lucknum['cart_id'] = $vo['id'];
					$add_lucknum['unitary_id'] = $vo['unitary_id'];
					list($s1, $s2) = explode(' ', microtime());
					$mtime = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
					$add_lucknum['addtime'] = $mtime;
					$where_lucknum['unitary_id'] = $vo['unitary_id'];
					$lucknum_list = $this->m_lucknum->where($where_lucknum)->order("lucknum desc")->select();
					if($find_unitary['price'] > count($lucknum_list)){
						foreach($lucknum_list as $lvo){
							if(in_array($lvo['lucknum'],$price[$vo['unitary_id']])){
								$k = array_search($lvo['lucknum'],$price[$vo['unitary_id']]);
								array_splice($price[$vo['unitary_id']],$k,1);
							}
						}
						$mylucknum = $price[$vo['unitary_id']][rand(0,count($price[$vo['unitary_id']])-1)];
						$add_lucknum['lucknum'] = $mylucknum;
					}else{
						$add_lucknum['lucknum'] = $lucknum_list[0]['lucknum'] + 1;
					}
					$add_lucknum['state'] = 0;
					$id_lucknum = $this->m_lucknum->add($add_lucknum);
				}
				$where_lucknum_num['token'] = $this->token;
				$where_lucknum_num['unitary_id'] = $vo['unitary_id'];
				$pay_count = $this->m_lucknum->where($where_lucknum_num)->count();
				$save_unitary = null;
				$save_unitary['proportion'] = $pay_count/$find_unitary['price']*100;
				if($pay_count == $find_unitary['price']){
					$where_lucknum_all['token'] = $this->token;
					$lucknum_all_count = $this->m_lucknum->where($where_lucknum_all)->count();
					if($lucknum_all_count < 100){
						$save_unitary['lastnum'] = $lucknum_all_count;
					}else{
						$save_unitary['lastnum'] = 100;
					}
					$lucknum_all = $this->m_lucknum->where($where_lucknum_all)->order('addtime desc')->limit($save_unitary['lastnum'])->select();
					$save_unitary['lasttime'] = $lucknum_all[0]['id'];
					$sum = 0;
					foreach($lucknum_all as $avo){
						$thistime = floor($avo['addtime']/1000);
						$ms = substr($avo['addtime'],-3);
						$sum = $sum + (date('h',$thistime).date('i',$thistime).date('s',$thistime).$ms);
					}
					$lucknum = fmod($sum,$find_unitary['price']);
					$save_unitary['lucknum'] = $lucknum;
					$save_unitary['state'] = 2;
					$save_unitary['endtime'] = time()+$find_unitary['opentime'];
					
					$where_cart3['state'] = 0;
					$where_cart3['token'] = $this->token;
					$where_cart3['unitary_id'] = $vo['unitary_id'];
					$del_cart3 = $this->m_cart->where($where_cart3)->delete();
					$save_unitary['proportion'] = 100;
					$update_unitary = $this->m_unitary->where($where_unitary)->save($save_unitary);
					$where_lucknum2['unitary_id'] = $vo['unitary_id'];
					$where_lucknum2['token'] = $this->token;
					$where_lucknum2['lucknum'] = $lucknum;
					$where_lucknum2['state'] = 0;
					$save_lucknum2['state'] = 1;
					$update_lucknum2 = $this->m_lucknum->where($where_lucknum2)->save($save_lucknum2);
					$where_lucknum2['state'] = 1;
					$find_lucknum2 = $this->m_lucknum->where($where_lucknum2)->find();
					require_once './PigCms/Lib/ORG/templateNews.class.php';
					$model = new templateNews();
					$model->sendTempMsg('TM00695', array('href' => $this->siteUrl.U('Wap/Unitary/goodswhere',array('token' => $this->token, 'unitaryid' => $vo['unitary_id'])), 'wecha_id' => $find_lucknum2['wecha_id'], 'title' => '一元夺宝中奖通知', 'headinfo' => '恭喜您在一元夺宝中获得【'.$find_unitary['name'].'】点击查看', 'program' => $find_unitary['name'], 'result' => date("Y年m月d日H时i分s秒"), 'remark' => ''));
				}
				$update_unitary = $this->m_unitary->where($where_unitary)->save($save_unitary);
			}
		}else{
			$where_cart['order_id'] = $order['pigcms_id'];
			$save_cart['state'] = 0;
			$save_cart['order_id'] = 0;
			$update_cart = $this->m_cart->where($where_cart)->save($save_cart);
			$del_order = $this->m_order->where($where_order)->delete();
			exit('订单不存在：'.$order['pigcms_id']);
		}
	}
}
?>

