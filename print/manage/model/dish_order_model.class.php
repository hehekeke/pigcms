<?php
bpBase::loadSysClass('model', '', 0);
class dish_order_model extends model {
	public function __construct() {
		$this->table_name = TABLE_PREFIX.'dish_order';
		parent::__construct();
	}
}
?>