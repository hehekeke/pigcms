<?php
bpBase::loadSysClass('model', '', 0);
class company_model extends model {
	public function __construct() {
		$this->table_name = TABLE_PREFIX.'company';
		parent::__construct();
	}
}
?>