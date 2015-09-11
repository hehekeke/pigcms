<?php
$session_storage = getSessionStorageType();
bpBase::loadSysClass($session_storage);
bpBase::loadSysFunc('front');
class front {
	public $uid;
	public $username;
	public $email;
	public $realname;
	public $mp;
	public $qq;
	public $credits;
	public $isAdmin;
	public static $user;
	//
	public static $smarty;
	public function __construct() {
		
	}
	
	
}