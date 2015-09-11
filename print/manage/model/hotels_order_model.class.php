<?php
bpBase::loadSysClass('model', '', 0);
class hotels_order_model extends model {
	public function __construct() {
		$this->table_name = TABLE_PREFIX.'hotels_order';
		parent::__construct();
	}
}
?>