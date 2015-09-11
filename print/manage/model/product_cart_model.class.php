<?php
bpBase::loadSysClass('model', '', 0);
class product_cart_model extends model {
	public function __construct() {
		$this->table_name = TABLE_PREFIX.'product_cart';
		parent::__construct();
	}
}
?>