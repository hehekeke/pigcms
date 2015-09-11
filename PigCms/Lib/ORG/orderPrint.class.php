<?php

class orderPrint
{
	public $serverUrl;
	public $key;
	public $topdomain;
	public $token;

	public function __construct($token)
	{
		$this->serverUrl = 'http://up.pigcms.cn/';
		$this->key = trim(C('server_key'));
		$this->topdomain = trim(C('server_topdomain'));

		if (!$this->topdomain) {
			$this->topdomain = $this->getTopDomain();
		}

		$this->token = $token;
	}

	public function printit($token, $companyid = 0, $ordertype = '', $content = '', $paid = 0, $qr = '')
	{
		$companyid = intval($companyid);
		$printers = M('Orderprinter')->where(array('token' => $token))->select();
		F('1', $printers);
		$usePrinters = array();

		if ($printers) {
			foreach ($printers as $p) {
				$ms = explode(',', $p['modules']);
				if (in_array($ordertype, $ms) && (!$companyid || ($p['companyid'] == $companyid) || !$p['companyid'])) {
					array_push($usePrinters, $p);
				}
			}
		}

		F('2', $usePrinters);

		if ($usePrinters) {
			foreach ($usePrinters as $p) {
				if (!$p['paid'] || ($p['paid'] && $paid)) {
					if ($p['mp'] != '') {
						$data = array('content' => $content, 'machine_code' => $p['mcode'], 'machine_key' => $p['mkey']);
						$url = $this->serverUrl . 'server.php?m=server&c=orderPrint&a=printit&count=' . $p['count'] . '&key=' . $this->key . '&domain=' . $this->topdomain;
						$rt[$p['mcode']] = $this->api_notice_increment($url, $data);
						F('3', $rt);
					}
					else if ($p['name'] != '') {
						$content = str_replace('*******************************', '************************', $content);
						$content = str_replace('※※※※※※※※※※※※※※※※', '※※※※※※※※※※※※', $content);
						$data = array('content' => $content);
						$url = $this->serverUrl . 'server.php?m=server&c=orderPrint&a=fcprintit&count=' . $p['count'] . '&mkey=' . $p['mkey'] . '&mcode=' . $p['mcode'] . '&name=' . $p['name'] . '&domain=' . $this->topdomain;

						if (!empty($qr)) {
							$url = $url . '&qr=' . urlencode($qr);
						}

						$rt[$p['mcode']] = $this->api_notice_increment($url, $data);
					}
				}
			}

			return $rt;
		}
	}

	public function api_notice_increment($url, $data)
	{
		$ch = curl_init();
		$header = 'Accept-Charset: utf-8';
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$tmpInfo = curl_exec($ch);
		$errorno = curl_errno($ch);

		if ($errorno) {
			return $errorno;
		}
		else {
			return $tmpInfo;
		}
	}

	public function getTopDomain()
	{
		$host = $_SERVER['HTTP_HOST'];
		$host = strtolower($host);

		if (strpos($host, '/') !== false) {
			$parse = @parse_url($host);
			$host = $parse['host'];
		}

		$topleveldomaindb = array('com', 'edu', 'gov', 'int', 'mil', 'net', 'org', 'biz', 'info', 'pro', 'name', 'museum', 'coop', 'aero', 'xxx', 'idv', 'mobi', 'cc', 'me');
		$str = '';

		foreach ($topleveldomaindb as $v) {
			$str .= ($str ? '|' : '') . $v;
		}

		$matchstr = '[^\\.]+\\.(?:(' . $str . ')|\\w{2}|((' . $str . ')\\.\\w{2}))$';

		if (preg_match('/' . $matchstr . '/ies', $host, $matchs)) {
			$domain = $matchs[0];
		}
		else {
			$domain = $host;
		}

		return $domain;
	}

	protected function https_request($url, $data = NULL)
	{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

		if (!empty($data)) {
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($curl);
		curl_close($curl);
		return $output;
	}
}


?>
