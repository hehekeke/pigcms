<?php
bpBase::loadSysClass('model', '', 0);
class product_diningtable_model extends model {
	public function __construct() {
		$this->table_name = TABLE_PREFIX.'product_diningtable';
		parent::__construct();
	}
}
?>