<?php
class ThirdPayStore
{	
	
	public function index($orderid, $paytype = '', $third_id = ''){
		if ($order = M('Product_cart')->where(array('orderid' => $orderid))->find()) {
			//TODO 发货的短信提醒
			if ($order['paid']) {
				$userInfo = D('Userinfo')->where(array('token' => $order['token'], 'wecha_id' => $order['wecha_id']))->find();
				$carts = unserialize($order['info']);
				$tdata = self::getCat($carts, $order['token'], $order['cid'], $userInfo['getcardtime']);
				$list = array();
				$info = '';
				$pre = '';
				foreach ($tdata[0] as $va) {
					$t = array();
					$salecount = 0;
					if (!empty($va['detail'])) {
						foreach ($va['detail'] as $v) {
							$t = array('num' => $v['count'], 'colorName' => $v['colorName'], 'formatName' => $v['formatName'], 'price' => $v['price'], 'name' => $va['name']);
							$list[] = $t;
							$salecount += $v['count'];
						}
					} else {
						$t = array('num' => $va['count'], 'price' => $va['price'], 'name' => $va['name']);
						$list[] = $t;
						$salecount = $va['count'];
					}
					$info .= $pre . $va['name'];
					$pre = ',';
					
					D("Product")->where(array('id' => $va['id']))->setInc('salecount', $salecount);
				}
		
				if ($order['twid']) {
					if ($set = M("Twitter_set")->where(array('token' => $order['token'], 'cid' => $order['cid']))->find()) {
						$price = $set['percent'] * 0.01 * $order['totalprice'];
						$info = $info ? '购买' . $info .'等产品,订单号：' . $orderid : '购买订单号：' . $orderid;
						D("Twitter_log")->add(array('token' => $order['token'], 'cid' => $order['cid'], 'twid' => $order['twid'], 'type' => 3, 'dateline' => time(), 'param' => $order['totalprice'], 'price' => $price, 'wecha_id' => $order['wecha_id'], 'info' => $info));
					
						if ($count = M("Twitter_count")->where(array('token' => $order['token'], 'cid' => $order['cid'], 'twid' => $order['twid']))->find()) {
							D("Twitter_count")->where(array('id' => $count['id']))->setInc('total', $price);
						} else {
							D("Twitter_count")->add(array('token' => $order['token'], 'cid' => $order['cid'], 'twid' => $order['twid'], 'total' => $price, 'remove' => 0));
						}
					}
				}
		
				$company = D('Company')->where(array('token' => $order['token'], 'id' => $order['cid']))->find();
				$op = new orderPrint();
				$msg = array('companyname' => $company['name'], 'companytel' => $company['tel'], 'truename' => $order['truename'], 'tel' => $order['tel'], 'address' => $order['address'], 'buytime' => $order['time'], 'orderid' => $order['orderid'], 'sendtime' => '', 'price' => $order['price'], 'total' => $order['total'], 'list' => $list);
				$msg = ArrayToStr::array_to_str($msg, 1);
				$op->printit($order['token'], $order['cid'], 'Store', $msg, 1);
				$userInfo = D('Userinfo')->where(array('token' => $order['token'], 'wecha_id' => $order['wecha_id']))->find();
				Sms::sendSms($order['token'], "您的顾客{$userInfo['truename']}刚刚对订单号：{$orderid}的订单进行了支付，请您注意查看并处理");
				$model = new templateNews();
				$model->sendTempMsg('OPENTM202521011', array('href' => U('Store/my',array('token' => $order['token'], 'wecha_id' => $order['wecha_id'], 'twid' => $order['twid']), true, false, true), 'wecha_id' => $order['wecha_id'], 'first' => '购买商品提醒', 'keyword1' => $orderid, 'keyword2' => date("Y年m月d日H时i分s秒"), 'remark' => '购买成功，感谢您的光临，欢迎下次再次光临！'));
			}
			header('Location:/index.php?g=Wap&m=Store&a=my&token='.$order['token'].'&wecha_id='.$order['wecha_id'] . '&twid='.$order['twid']);
		}else{
			exit('订单不存在：'.$out_trade_no);
			exit('订单不存在');
		}
	}
	
	public function getCat($carts, $token, $cid, $getcardtime)
	{
		//邮费
		$mailPrice = 0;
		//商品的IDS
		$pids = array_keys($carts);
	
		//商品分类IDS
		$productList = $cartIds = array();
		if (empty($pids)) {
			return array(array(), array(), array());
		}
	
		//获取分类ID
		$productdata = M('Product')->where(array('id'=> array('in', $pids)))->select();
		foreach ($productdata as $p) {
			if (!in_array($p['catid'], $cartIds)) {
				$cartIds[] = $p['catid'];
			}
			$mailPrice = max($mailPrice, $p['mailprice']);
			$productList[$p['id']] = $p;
		}
	
		//商品规格参数值
		$catlist = $norms = array();
		if ($cartIds) {
			//产品规格列表
			$normsdata = M('norms')->where(array('catid' => array('in', $cartIds)))->select();
			foreach ($normsdata as $r) {
				$norms[$r['id']] = $r['value'];
			}
			//商品分类
			$catdata = M('Product_cat')-> where(array('id' => array('in', $cartIds)))->select();
			foreach ($catdata as $cat) {
				$catlist[$cat['id']] = $cat;
			}
		}
		$dids = array();
		foreach ($carts as $pid => $rowset) {
			if (is_array($rowset)) {
				$dids = array_merge($dids, array_keys($rowset));
			}
		}
		//商品的详细
		$totalprice = 0;
		$data = array();
		if ($dids) {
			$dids = array_unique($dids);
			$detail = M('Product_detail')->where(array('id'=> array('in', $dids)))->select();
			foreach ($detail as $row) {
				$row['colorName'] = isset($norms[$row['color']]) ? $norms[$row['color']] : '';
				$row['formatName'] = isset($norms[$row['format']]) ? $norms[$row['format']] : '';
				$row['count'] = isset($carts[$row['pid']][$row['id']]['count']) ? $carts[$row['pid']][$row['id']]['count'] : 0;
				if ($getcardtime > 0) {
					$row['price'] = $row['vprice'] ? $row['vprice'] : $row['price'];
				}
				$productList[$row['pid']]['detail'][] = $row;
				$data[$row['pid']]['total'] = isset($data[$row['pid']]['total']) ? intval($data[$row['pid']]['total'] + $row['count']) : $row['count'];
				$data[$row['pid']]['totalPrice'] = isset($data[$row['pid']]['totalPrice']) ? intval($data[$row['pid']]['totalPrice'] + $row['count'] * $row['price']) : $row['count'] * $row['price'];//array('total' => $totalCount, 'totalPrice' => $totalFee);
				$totalprice += $data[$row['pid']]['totalPrice'];
			}
		}
		//商品的详细列表
		$list = array();
		foreach ($productList as $pid => $row) {
			if (!isset($data[$pid]['total'])) {
				$count = $price = 0;
				if (isset($carts[$pid]) && is_array($carts[$pid])) {
					$a = explode("|", $carts[$pid]['count']);
					$count = isset($a[0]) ? $a[0] : 0;
					$price = isset($a[1]) ? $a[1] : 0;
				} else {
					$a = explode("|", $carts[$pid]);
					$count = isset($a[0]) ? $a[0] : 0;
					$price = isset($a[1]) ? $a[1] : 0;
				}
				$data[$pid] = array();
				$row['price'] = $price ? $price : ($getcardtime > 0 && $row['vprice'] ? $row['vprice'] : $row['price']);
				$row['count'] = $data[$pid]['total'] = $count;
				if (empty($count) && empty($price)) {
					$row['count'] = $data[$pid]['total'] = isset($carts[$pid]['count']) ? $carts[$pid]['count'] : (isset($carts[$pid]) && is_int($carts[$pid]) ? $carts[$pid] : 0);
					if ($getcardtime > 0) {
						$row['price'] = $row['vprice'] ? $row['vprice'] : $row['price'];
					}
				}
	
	
				$data[$pid]['totalPrice'] = $data[$pid]['total'] * $row['price'];
				$totalprice += $data[$pid]['totalPrice'];
			}
			$row['formatTitle'] =  isset($catlist[$row['catid']]['norms']) ? $catlist[$row['catid']]['norms'] : '';
			$row['colorTitle'] =  isset($catlist[$row['catid']]['color']) ? $catlist[$row['catid']]['color'] : '';
			$list[] = $row;
		}
		if ($obj = M('Product_setting')->where(array('token' => $token, 'cid' => $cid))->find()) {
			if ($totalprice >= $obj['price'] && $obj['price'] != -1) $mailPrice = 0;
		}
		return array($list, $data, $mailPrice);
	}
	
	private function savelog($type, $twid, $token, $cid, $param = 1)
	{
		if ($twid && $token && $cid) {
			$set = M("Twitter_set")->where(array('token' => $token, 'cid' => $cid))->find();
			if (empty($set)) return false;
			$db = D("Twitter_log");
			// 1.点击， 2.注册会员， 3.购买商品
			if ($type == 3) {//购买商品
				$price = $set['percent'] * 0.01 * $param;
				$db->add(array('token' => $token, 'cid' => $cid, 'twid' => $twid, 'type' => 3, 'dateline' => time(), 'param' => $param, 'price' => $price));
			} elseif ($type == 2) {//注册会员
				$price = $set['registerprice'];
				$db->add(array('token' => $token, 'cid' => $cid, 'twid' => $twid, 'type' => 2, 'dateline' => time(), 'param' => $param, 'price' => $set['registerprice']));
			} else {//点击
				$price = $set['clickprice'];
				$db->add(array('token' => $token, 'cid' => $cid, 'twid' => $twid, 'type' => 1, 'dateline' => time(), 'param' => $param, 'price' => $set['clickprice']));
			}
			//统计总收入
			if ($count = M("Twitter_count")->where(array('token' => $token, 'cid' => $cid, 'twid' => $twid))->find()) {
				D("Twitter_count")->where(array('id' => $count['id']))->setInc('total', $price);
			} else {
				D("Twitter_count")->add(array('twid' => $twid, 'token' => $token, 'cid' => $cid, 'total' => $price, 'remove' => 0));
			}
		}
	}
}
?>

