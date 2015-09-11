<?php

class checkFunc
{
	public $key;
	public $topdomain;

	public function __construct()
	{
		$this->key = trim(C('server_key'));
		$this->topdomain = trim(C('server_topdomain'));

		if (!$this->topdomain) {
			$this->topdomain = $this->getTopDomain();
		}

	}

	public function api_notice_increment($url, $data = '', $time = 2)
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
		curl_setopt($ch, CURLOPT_TIMEOUT, $time);
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

	private function check()
	{
        return true;
		$remoteStr = $this->api_notice_increment($this->getServer(), '');
		if (($remoteStr == 28) || ($remoteStr == 6)) {
			$remoteStr = $this->api_notice_increment($this->getServer(1), '', 5);

			if ($remoteStr == 28) {
				exit('wow-100');
			}
			else if ($remoteStr == 6) {
				exit('wow-101');
			}
		}

		$rt = json_decode($remoteStr, 1);

		if ($remoteStr != 1) {
			if (is_array($rt)) {
				switch (intval($rt['success'])) {
				case -1:
					exit('wow' . $rt['success'] . ':error domain format');
					break;

				case -2:
					exit('wow' . $rt['success'] . ':out of date');
					break;

				case -3:
					exit('wow' . $rt['success'] . ':correct customer in system');
					break;

				case -4:
					exit('wow' . $rt['success'] . ':unknown');
					break;

				case -5:
					exit('wow' . $rt['success'] . ':error ip source');
					break;

				case -6:
					exit('wow' . $rt['success'] . ':error key');
					break;
				}

				exit('wow' . $rt['success']);
			}
			else {
				exit('wow');
			}
		}
	}

	public function sduwskaidaljenxsyhikaaaa()
	{
		$this->check();
	}

	public function cfdwdgfds3skgfds3szsd3idsj()
	{
		$this->check();
	}

	private function getServer($num = NULL)
	{
		return 'http://up' . $num . '.pigcms.cn/func.php?key=' . $this->key . '&domain=' . $this->topdomain;
	}
}

if (!function_exists('fdsrejsie3qklwewerzdagf4ds')) {
	function fdsrejsie3qklwewerzdagf4ds()
	{
	}
}

if (!function_exists('fdsrejsie3qklwewerzdagf4dsz62hs5z421s')) {
	function fdsrejsie3qklwewerzdagf4dsz62hs5z421s()
	{
	}
}

?>
