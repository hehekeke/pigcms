<?php
bpBase::loadSysClass('model', '', 0);
class hotels_house_sort_model extends model {
	public function __construct() {
		$this->table_name = TABLE_PREFIX.'hotels_house_sort';
		parent::__construct();
	}
}
?>