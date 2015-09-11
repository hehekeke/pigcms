<?php

class ChinabankAction extends BaseAction
{
	public $token;
	public $wecha_id;
	public $payConfig;

	public function __construct()
	{
		$this->token = $this->_get('token');
		$this->wecha_id = $this->_get('wecha_id');

		if (!$this->token) {
		}

		if (empty($_GET['platform'])) {
			$payConfig = M('Alipay_config')->where(array('token' => $this->token))->find();
			$payConfigInfo = unserialize($payConfig['info']);
			$this->payConfig = $payConfigInfo['chinabank'];
		}
		else {
			$payConfigInfo['chinabank_account'] = C('platform_chinabank_account');
			$payConfigInfo['chinabank_key'] = C('platform_chinabank_key');
			$this->payConfig = $payConfigInfo;
		}
	}

	public function pay()
	{
		$orderName = $_GET['orderName'];

		if (!$orderName) {
			$orderName = microtime();
		}

		$orderid = $_GET['orderid'];

		if (!$orderid) {
			$orderid = $_GET['single_orderid'];
		}

		$payHandel = new payHandle($this->token, $_GET['from'], 'chinabank');
		$orderInfo = $payHandel->beforePay($orderid);

		if ($orderInfo['paid']) {
			exit('您已经支付过此次订单！');
		}

		if (!$orderInfo['price']) {
			exit('必须有价格才能支付！');
		}

		$data_vid = trim($this->payConfig['chinabank_account']);
		$data_orderid = $orderid;
		$data_vamount = $orderInfo['price'];
		$data_vmoneytype = 'CNY';
		$data_vpaykey = trim($this->payConfig['chinabank_key']);
		$data_vreturnurl = C('site_url') . '/index.php?g=Wap&m=Chinabank&a=return_url&token=' . $_GET['token'] . '&wecha_id=' . $_GET['wecha_id'] . '&from=' . $_GET['from'];
		$MD5KEY = $data_vamount . $data_vmoneytype . $data_orderid . $data_vid . $data_vreturnurl . $data_vpaykey;
		$MD5KEY = strtoupper(md5($MD5KEY));
		$def_url = '<span style="display:none;">';
		$def_url .= '<form  method="post" action="https://pay3.chinabank.com.cn/PayGate" id="chinabanksubmit" name="chinabanksubmit">';
		$def_url .= '<input type=HIDDEN name=\'v_mid\' value=\'' . $data_vid . '\'>';
		$def_url .= '<input type=HIDDEN name=\'v_oid\' value=\'' . $data_orderid . '\'>';
		$def_url .= '<input type=HIDDEN name=\'v_amount\' value=\'' . $data_vamount . '\'>';
		$def_url .= '<input type=HIDDEN name=\'v_moneytype\'  value=\'' . $data_vmoneytype . '\'>';
		$def_url .= '<input type=HIDDEN name=\'v_url\'  value=\'' . $data_vreturnurl . '\'>';
		$def_url .= '<input type=HIDDEN name=\'v_md5info\' value=\'' . $MD5KEY . '\'>';
		$def_url .= '<input type=HIDDEN name=\'remark1\' value=\'' . $remark1 . '\'>';
		$def_url .= '<input type=submit class=\'button\' value=\'去付款...\'>';
		$def_url .= '</form>';
		$def_url .= '</span>';
		$def_url .= '<script>document.forms[\'chinabanksubmit\'].submit();</script>';
		exit($def_url);
	}

	public function return_url()
	{
		$v_oid = trim($_POST['v_oid']);
		$v_pmode = trim($_POST['v_pmode']);
		$v_pstatus = trim($_POST['v_pstatus']);
		$v_pstring = trim($_POST['v_pstring']);
		$v_amount = trim($_POST['v_amount']);
		$v_moneytype = trim($_POST['v_moneytype']);
		$remark1 = trim($_POST['remark1']);
		$remark2 = trim($_POST['remark2']);
		$v_md5str = trim($_POST['v_md5str']);
		$key = $this->payConfig['chinabank_key'];
		$md5string = strtoupper(md5($v_oid . $v_pstatus . $v_amount . $v_moneytype . $key));

		if ($v_md5str == $md5string) {
			if ($v_pstatus == '20') {
				$order_id = $_POST['v_oid'];
				$payHandel = new payHandle($_GET['token'], $_GET['from'], 'chinabank');
				$orderInfo = $payHandel->afterPay($order_id, $_POST['v_idx']);
				$from = $payHandel->getFrom();
				$this->redirect('/index.php?g=Wap&m=' . $from . '&a=payReturn&token=' . $orderInfo['token'] . '&wecha_id=' . $orderInfo['wecha_id'] . '&orderid=' . $order_id);
			}
		}
		else {
			$this->error('支付时发生错误！请检查。');
		}
	}
}

?>
