<?php
bpBase::loadSysClass('model', '', 0);
class product_model extends model {
	public function __construct() {
		$this->table_name = TABLE_PREFIX.'product';
		parent::__construct();
	}
}
?>