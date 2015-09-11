<?php

class updateSync extends BackAction
{
	static private $functionLibrary_url = '1';
	static private $functions_url = '1';
	static private $function_version_file = '1';
	static private $ifWeidian = '1';
//	static private $functionLibrary_url = 'http://up.pigcms.cn/oa/admin.php?m=server&c=sys_file&a=funLib&domain=';
//	static private $functions_url = 'http://up.pigcms.cn/oa/admin.php?m=server&c=sys_file&a=funModules&domain=';
//	static private $function_version_file = 'http://up.pigcms.cn/oa/admin.php?m=server&c=sys_file&a=versionFiles&domain=';
//	static private $ifWeidian = 'http://up.pigcms.cn/oa/admin.php?m=server&c=sys_file&a=haveweidian&domain=';
	static private $domain = array('jyupdate.sinaapp.com', 'jyupdate.sinaapp.com', 'jyupdate.sinaapp.com');

	static private function _init()
	{
		if (in_array(C('server_topdomain'), self::$domain)) {
			$url = parse_url(C('site_url'));
			self::$functionLibrary_url .= $url['host'];
			self::$functions_url .= $url['host'];
			self::$function_version_file .= $url['host'];
			self::$ifWeidian .= $url['host'];
		}
		else {
			self::$functionLibrary_url .= C('server_topdomain');
			self::$functions_url .= C('server_topdomain');
			self::$function_version_file .= C('server_topdomain');
			self::$ifWeidian .= C('server_topdomain');
		}
	}

	static public function getIfWeidian()
	{
				return true;

		self::_init();
		return self::curl_get_data(self::$ifWeidian);
	}

	static public function sync_function_library()
	{
				return true;

		$rt = self::curl_get_data(self::$functionLibrary_url);

		if ($rt) {
			$rt = explode(',', $rt);
			file_put_contents(RUNTIME_PATH . 'function_library.php', '<?php ' . "\n" . 'return ' . stripslashes(var_export($rt, true)) . ';', LOCK_EX);
		}
	}

	static private function sync_function_list()
	{
		return true;
		if (C('server_topdomain') != 'pigcms.cn') {
			$rt = json_decode(self::curl_get_data(self::$functions_url), true);

			if ($rt) {
				$db_model = M('Function');
				$current_functions = $db_model->field('funname')->where('funname != \'\'')->select();

				foreach ($rt as $value) {
					if ($value['status']) {
						$funname_arr[] = $value['funname'];
					}
				}

				foreach ($current_functions as $v) {
					$current_funname_arr[] = $v['funname'];
				}

				$less = array_diff($funname_arr, $current_funname_arr);

				foreach ($rt as $rk => $rv) {
					if (($rv['status'] == 1) && in_array($rv['funname'], $less)) {
						unset($rt[$rk]['id']);
						$db_model->add($rt[$rk]);
					}
					else if ($rv['status'] == 0) {
						$delete_data = $rt[$rk]['funname'];
						$db_model->where(array('funname' => $delete_data))->delete();
					}
				}
			}
		}
	}

	static private function sync_function_version_file()
	{
		if (C('server_topdomain') != 'pigcms.cn') {
			$versionFile = (array) json_decode(self::curl_get_data(self::$function_version_file), true);

			if ($versionFile) {
				foreach ($versionFile as $file) {
					$filename = '.' . $file;

					if (is_file($filename)) {
						$status = (@unlink($filename) ? 'SUCCESS' : 'ERROR');
					}
				}
			}
		}
	}

	public function finished_callback()
	{
		if (!C('PIGCMS_STAFF')) {
			self::_init();
			self::group_functions_add_Weixin();
			self::sync_function_library();
			self::sync_function_list();
			self::sync_function_version_file();
			NODEset::index();
		}
	}

	public function group_functions_add_Weixin()
	{
		$user_group = M('User_group')->field('id,func')->select();
		$flag = 0;

		if ($user_group) {
			foreach ($user_group as $value) {
				if (in_array('Weixin', explode(',', $value['func']))) {
					$flag++;
					break;
				}
			}

			if ($flag == 0) {
				foreach ($user_group as $v) {
					M('User_group')->where(array('id' => $v['id']))->setField('func', $v['func'] . ',Weixin');
				}
			}
		}
	}

	private function curl_get_data($url)
	{
		if (function_exists('curl_init')) {
			$ch = curl_init();
			$timeout = 10;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$return = curl_exec($ch);
			curl_close($ch);
		}
		else if (function_exists('file_get_contents')) {
			$return = file_get_contents($url);
		}
		else {
			$return = false;
		}

		return $return;
	}
}

?>
