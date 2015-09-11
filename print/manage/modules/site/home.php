<?php
class home {
	function __construct() {
	}
	/**
	 * 网站首页
	 *
	 */
	function home(){
		$sitePage=bpBase::loadAppClass('sitePage','site',1);
		$sitePage->index();
	}
	function hotel(){
		$sitePage=bpBase::loadAppClass('sitePage','site',1);
		$sitePage->hotel();
	}
}
?>