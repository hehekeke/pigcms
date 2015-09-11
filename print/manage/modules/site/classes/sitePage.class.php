<?php
bpBase::loadAppClass('front','front',0);
class sitePage extends front {
	function index(){
		if($_GET){
			foreach($_GET as $g=>$v){
				//$token=$g;
			}
		}
		if (!$token){
			$token=TOKEN;
		}

		//$token=mysql_real_escape_string(stripslashes($token));
		$token = htmlspecialchars($token);
		$this->dish_order_model = M('dish_order');
		//$where='token=\''.$token.'\' AND printed=0 AND diningtype>0';
		$where='token=\''.$token.'\' AND printed=0';
		$count      = $this->dish_order_model->count($where);
		$orders=$this->dish_order_model->get_one($where, $data = '*', $order = 'time ASC');
		$now=time();
		if ($orders){
			$thisOrder=$orders;
			switch ($thisOrder['takeaway']){
				default:
					$orderType='预定餐桌';
					break;
				case 1:
					$orderType='外卖';
					break;
				case 2:
					$orderType='点餐';
					break;
//				case 3:
//					$orderType='预定餐桌';
//					break;
			}

			//订餐信息
			$diningtable_model = M('dining_table');
			if ($thisOrder['tableid']) {
				$thisTable = $diningtable_model->get_one(array('id'=>$thisOrder['tableid']),'*');
				$thisOrder['tableName'] = biconv($thisTable['name']);
			}else{
				$thisOrder['tableName']='';
			}
			$str="订单类型：".$orderType."\r\n订单编号：".$thisOrder['id']."\r\n姓名：".biconv($thisOrder['name'])."\r\n电话：".$thisOrder['tel']."\r\n地址：".biconv($thisOrder['address'])."\r\n桌台：".$thisOrder['tableName']."\r\n下单时间：".date('Y-m-d H:i:s',$thisOrder['time'])."\r\n预定时间：".date('Y-m-d H:i:s',$thisOrder['reservetime'])."\r\n打印时间：".date('Y-m-d H:i:s',$now)."\r\n--------------------------------\r\n";
			$str .= "备注：" . biconv($thisOrder['des']) . "\r\n--------------------------------\r\n";
			//
			$carts = unserialize($thisOrder['info']);
			foreach ($carts['list'] as $p){
				$str.=biconv($p['name'])."  ".$p['num']."份  单价：".$p['price']."元\r\n";
				$i++;
			}
			if ($thisOrder['takeaway'] == 1) {
				$str .= biconv('送餐费:') . "  " . $thisOrder['takeAwayPrice'] . "元\r\n";
			}
			$str.="\r\n--------------------------------\r\n合计：" . $thisOrder['price'] . "元\r\n     谢谢惠顾，欢迎下次光临\r\n";
			//店铺信息
			$thisCompany=M('company')->get_one(array('token' => $this->token, 'id' => $thisOrder['cid']));
			$str.="     " . biconv($thisCompany['name']) ."\r\n";
			//
			//$str=iconv('utf-8','gbk',$str);
			//设置为打印过了
			$this->dish_order_model->update(array('printed'=>1),array('id'=>$thisOrder['id']));
			echo "CMD=01	FLAG=0	MESSAGE=success	DATETIME=".date('YmdHis',$now)."	ORDERCOUNT=".$count."	ORDERID=".$thisOrder['id']."	PRINT=".$str;
		}else {
			echo "CMD=01	FLAG=1	MESSAGE=no order now ".$token."	DATETIME=".date('YmdHis',time())."\r\n";
		}
	}
	function hotel(){
		if (!$token){
			$token = TOKEN;
		}
		$token = htmlspecialchars($token);
		$this->hotels_order_model = M('hotels_order');
		$where='token=\''.$token.'\' AND printed=0';
		//$count      = $this->hotels_order_model->count($where);
		$orders = $this->hotels_order_model->get_one($where, $data = '*', $order = 'time ASC');
		$now = time();
		if ($orders) {
			$thisOrder = $orders;
			$sort = M('hotels_house_sort')->get_one(array('id' => $thisOrder['sid']),'*');
			$thisCompany = M('company')->get_one(array('token' => $token, 'id' => $thisOrder['cid']));
			$thisOrder['houseName'] = biconv($sort['name']);
			$str = "订单编号：".$thisOrder['id']."\r\n";
			$str .= "姓名：".biconv($thisOrder['name'])."\r\n";
			$str .= "电话：".$thisOrder['tel']."\r\n";
			$str .= "入住时间：".date('Y-m-d', strtotime($thisOrder['startdate']))."\r\n";
			$str .= "退房时间：".date('Y-m-d', strtotime($thisOrder['enddate']))."\r\n";
			
			$days = (strtotime($thisOrder['enddate']) - strtotime($thisOrder['startdate'])) / 86400;
			$str .= "入住天数：". $days . "天\r\n";
			
			$str .= "下单时间：" . date('Y-m-d H:i:s', $thisOrder['time'])."\r\n";
			$str .= "打印时间：".date('Y-m-d H:i:s', $now)."\r\n";
			$str .= "\r\n--------------------------------\r\n";
			$str .= "房间类型: " . $thisOrder['houseName'] . "\r\n";
			$str .= "房间数：" . $thisOrder['nums'] . "\r\n";
			$str .= "普通单价：" . $sort['price'] . "\r\n";
			$str .= "会员单价：" . $sort['vprice'] . "\r\n";
			$str.="\r\n--------------------------------\r\n";
			$str .= "合计：" . $thisOrder['price'] . "元\r\n";
			$str .= "     谢谢惠顾，欢迎下次光临\r\n\r\n";
			$str .= "     " . biconv($thisCompany['name']) ."\r\n";
			
			$this->hotels_order_model->update(array('printed'=>1),array('id'=>$thisOrder['id']));
			echo "CMD=01	FLAG=0	MESSAGE=success	DATETIME=".date('YmdHis',$now)."	ORDERCOUNT=".$count."	ORDERID=".$thisOrder['id']."	PRINT=".nl2br($str);
		} else {
			echo "CMD=01	FLAG=1	MESSAGE=no order now ".$token."	DATETIME=".date('YmdHis',time())."\r\n";
		}
	}
}
function biconv($str){
	return iconv('utf-8','gbk',$str);
}