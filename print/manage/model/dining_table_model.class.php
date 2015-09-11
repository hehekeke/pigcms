<?php
bpBase::loadSysClass('model', '', 0);
class dining_table_model extends model {
	public function __construct() {
		$this->table_name = TABLE_PREFIX.'dining_table';
		parent::__construct();
	}
}
?>