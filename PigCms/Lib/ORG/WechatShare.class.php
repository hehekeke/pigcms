<?php

class WechatShare
{
	public $wxuser;
	public $wecha_id;
	public $error = array();

	public function __construct($wxuser, $wecha_id)
	{
		$this->wxuser = $wxuser;
		$this->wecha_id = $wecha_id;
	}

	public function getSgin()
	{
		$apiOauth = new apiOauth();
		$access_token = $apiOauth->update_authorizer_access_token($this->wxuser['appid'], $this->wxuser);
		$ticket = $apiOauth->getAuthorizerTicket($this->wxuser['appid'], $access_token);
		$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$sign_data = $this->addSign($ticket, $url);
		$share_html = $this->createHtml($sign_data);
		return $share_html;
	}

	public function getError()
	{
		dump($this->error);
	}

	public function addSign($ticket, $url)
	{
		$timestamp = time();
		$nonceStr = rand(100000, 999999);
		$array = array('noncestr' => $nonceStr, 'jsapi_ticket' => $ticket, 'timestamp' => $timestamp, 'url' => $url);
		ksort($array);
		$signPars = '';

		foreach ($array as $k => $v) {
			if (('' != $v) && ('sign' != $k)) {
				if ($signPars == '') {
					$signPars .= $k . '=' . $v;
				}
				else {
					$signPars .= '&' . $k . '=' . $v;
				}
			}
		}

		$result = array('appId' => $this->wxuser['appid'], 'timestamp' => $timestamp, 'nonceStr' => $nonceStr, 'url' => $url, 'signature' => SHA1($signPars));
		return $result;
	}

	public function getUrl()
	{
		$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		if (isset($_GET['code']) && isset($_GET['state']) && ($_GET['state'] == 'oauth')) {
			$url = $this->clearUrl($url);

			if (isset($_GET['wecha_id'])) {
				$url .= '&wecha_id=' . $this->wecha_id;
			}

			return $url;
		}
		else {
			return $url;
		}
	}

	public function clearUrl($url)
	{
		$param = explode('&', $url);
		$i = 0;

		for ($count = count($param); $i < $count; $i++) {
			if (preg_match('/^(code=|state=|wecha_id=).*/', $param[$i])) {
				unset($param[$i]);
			}
		}

		return join('&', $param);
	}

	public function getToken()
	{
	}

	public function getTicket($token)
	{
		$url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=' . $token . '&type=jsapi';
		return $this->https_request($url);
	}

	public function createHtml($sign_data)
	{
		$html = '	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>' . "\r\n" . '	<script type="text/javascript">' . "\r\n" . '		wx.config({' . "\r\n" . '		  debug: false,' . "\r\n" . '		  appId: 	\'' . $sign_data['appId'] . '\',' . "\r\n" . '		  timestamp: ' . $sign_data['timestamp'] . ',' . "\r\n" . '		  nonceStr: \'' . $sign_data['nonceStr'] . '\',' . "\r\n" . '		  signature: \'' . $sign_data['signature'] . '\',' . "\r\n" . '		  jsApiList: [' . "\r\n" . '	    	\'checkJsApi\',' . "\r\n" . '		    \'onMenuShareTimeline\',' . "\r\n" . '		    \'onMenuShareAppMessage\',' . "\r\n" . '		    \'onMenuShareQQ\',' . "\r\n" . '		    \'onMenuShareWeibo\',' . "\r\n" . '			\'openLocation\',' . "\r\n" . '			\'getLocation\',' . "\r\n" . '			\'addCard\',' . "\r\n" . '			\'chooseCard\',' . "\r\n" . '			\'openCard\',' . "\r\n" . '			\'hideMenuItems\'' . "\r\n" . '		  ]' . "\r\n" . '		});' . "\r\n" . '	</script>' . "\r\n" . '	<script type="text/javascript">' . "\r\n" . '	wx.ready(function () {' . "\r\n" . '	  // 1 判断当前版本是否支持指定 JS 接口，支持批量判断' . "\r\n" . '	  /*document.querySelector(\'#checkJsApi\').onclick = function () {' . "\r\n" . '	    wx.checkJsApi({' . "\r\n" . '	      jsApiList: [' . "\r\n" . '	        \'getNetworkType\',' . "\r\n" . '	        \'previewImage\'' . "\r\n" . '	      ],' . "\r\n" . '	      success: function (res) {' . "\r\n" . '	        //alert(JSON.stringify(res));' . "\r\n" . '	      }' . "\r\n" . '	    });' . "\r\n" . '	  };*/' . "\r\n" . '	  // 2. 分享接口' . "\r\n" . '	  // 2.1 监听“分享给朋友”，按钮点击、自定义分享内容及分享结果接口' . "\r\n" . '	    wx.onMenuShareAppMessage({' . "\r\n" . '			title: window.shareData.tTitle,' . "\r\n" . '			desc: window.shareData.tContent,' . "\r\n" . '			link: window.shareData.sendFriendLink,' . "\r\n" . '			imgUrl: window.shareData.imgUrl,' . "\r\n" . '		    type: \'\', // 分享类型,music、video或link，不填默认为link' . "\r\n" . '		    dataUrl: \'\', // 如果type是music或video，则要提供数据链接，默认为空' . "\r\n" . '		    success: function () { ' . "\r\n" . '				shareHandle(\'frined\');' . "\r\n" . '		    },' . "\r\n" . '		    cancel: function () { ' . "\r\n" . '		        //alert(\'分享朋友失败\');' . "\r\n" . '		    }' . "\r\n" . '		});' . "\r\n" . '' . "\r\n" . '' . "\r\n" . '	  // 2.2 监听“分享到朋友圈”按钮点击、自定义分享内容及分享结果接口' . "\r\n" . '		wx.onMenuShareTimeline({' . "\r\n" . '			title: window.shareData.fTitle?window.shareData.fTitle:window.shareData.tTitle,' . "\r\n" . '			link: window.shareData.sendFriendLink,' . "\r\n" . '			imgUrl: window.shareData.imgUrl,' . "\r\n" . '		    success: function () { ' . "\r\n" . '				shareHandle(\'frineds\');' . "\r\n" . '		        //alert(\'分享朋友圈成功\');' . "\r\n" . '		    },' . "\r\n" . '		    cancel: function () { ' . "\r\n" . '		        //alert(\'分享朋友圈失败\');' . "\r\n" . '		    }' . "\r\n" . '		});	' . "\r\n" . '' . "\r\n" . '	  // 2.4 监听“分享到微博”按钮点击、自定义分享内容及分享结果接口' . "\r\n" . '		wx.onMenuShareWeibo({' . "\r\n" . '			title: window.shareData.tTitle,' . "\r\n" . '			desc: window.shareData.tContent,' . "\r\n" . '			link: window.shareData.sendFriendLink,' . "\r\n" . '			imgUrl: window.shareData.imgUrl,' . "\r\n" . '		    success: function () { ' . "\r\n" . '				shareHandle(\'weibo\');' . "\r\n" . '		       	//alert(\'分享微博成功\');' . "\r\n" . '		    },' . "\r\n" . '		    cancel: function () { ' . "\r\n" . '		        //alert(\'分享微博失败\');' . "\r\n" . '		    }' . "\r\n" . '		});' . "\r\n" . '		if(window.shareData.timeline_hide == \'1\'){' . "\r\n" . '			wx.hideMenuItems({' . "\r\n" . '			  menuList: [' . "\r\n" . '				\'menuItem:share:timeline\', //隐藏分享到朋友圈' . "\r\n" . '			  ],' . "\r\n" . '			});' . "\r\n" . '		}' . "\r\n" . '		wx.error(function (res) {' . "\r\n" . '			/*if(res.errMsg == \'config:invalid signature\'){' . "\r\n" . '				wx.hideOptionMenu();' . "\r\n" . '			}else if(res.errMsg == \'config:invalid url domain\'){' . "\r\n" . '				wx.hideOptionMenu();' . "\r\n" . '			}else{' . "\r\n" . '				wx.hideOptionMenu();' . "\r\n" . '				//alert(res.errMsg);' . "\r\n" . '			}*/' . "\r\n" . '			if(res.errMsg){' . "\r\n" . '				wx.hideOptionMenu();' . "\r\n" . '			}' . "\r\n" . '		});' . "\r\n" . '	});' . "\r\n" . '		' . "\r\n" . '	function shareHandle(to) {' . "\r\n" . '		var submitData = {' . "\r\n" . '			module: window.shareData.moduleName,' . "\r\n" . '			moduleid: window.shareData.moduleID,' . "\r\n" . '			token:\'' . $this->wxuser['token'] . '\',' . "\r\n" . '			wecha_id:\'' . $this->wecha_id . '\',' . "\r\n" . '			url: window.shareData.sendFriendLink,' . "\r\n" . '			to:to' . "\r\n" . '		};' . "\r\n" . '' . "\r\n" . '		$.post(\'index.php?g=Wap&m=Share&a=shareData&token=' . $this->wxuser['token'] . '&wecha_id=' . $this->wecha_id . '\',submitData,function (data) {},\'json\');' . "\r\n" . '		if(window.shareData.isShareNum == 1){' . "\r\n" . '			var ShareNum = {' . "\r\n" . '				token:\'' . $this->wxuser['token'] . '\',' . "\r\n" . '				ShareNumData:window.shareData.ShareNumData' . "\r\n" . '			}' . "\r\n" . '			$.post(\'index.php?g=Wap&m=Share&a=ShareNum&token=' . $this->wxuser['token'] . '&wecha_id=' . $this->wecha_id . '\',ShareNum,function (data) {},\'json\');' . "\r\n" . '		}' . "\r\n" . '	}' . "\r\n" . '</script>';
		return $html;
	}

	protected function https_request($url, $data = NULL)
	{
		$curl = curl_init();
		$header = 'Accept-Charset: utf-8';
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

		if (!empty($data)) {
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($curl);
		$errorno = curl_errno($curl);

		if ($errorno) {
			return array('curl' => false, 'errorno' => $errorno);
		}
		else {
			$res = json_decode($output, 1);

			if ($res['errcode']) {
				return array('errcode' => $res['errcode'], 'errmsg' => $res['errmsg']);
			}
			else {
				return $res;
			}
		}

		curl_close($curl);
	}

	public function getShareData($params = array())
	{
		$params['moduleName'] = empty($params['moduleName']) ? MODULE_NAME : $params['moduleName'];
		$params['moduleID'] = empty($params['moduleID']) ? 0 : $params['moduleID'];
		$params['imgUrl'] = empty($params['imgUrl']) ? '' : $params['imgUrl'];

		if (empty($params['sendFriendLink'])) {
			$params['sendFriendLink'] = stripslashes(getSelfUrl(array('wecha_id')));
		}
		else {
			$params['sendFriendLink'] = stripslashes(getSelfUrl(array('wecha_id'), $params['sendFriendLink']));
		}

		$params['tTitle'] = empty($params['tTitle']) ? '' : shareFilter($params['tTitle']);
		$params['tContent'] = empty($params['tContent']) ? $params['tTitle'] : shareFilter($params['tContent']);
		$shareData = str_replace('\\/', '/', json_encode($params));
		$html = '		<script type="text/javascript">' . "\r\n" . '				window.shareData = ' . $shareData . ';' . "\r\n" . '		</script>';
		return $html;
	}
}


?>
