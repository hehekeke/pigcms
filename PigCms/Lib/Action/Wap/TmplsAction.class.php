<?php

class TmplsAction extends WapAction
{
	public $live_info;

	public function _initialize()
	{
		parent::_initialize();
	}

	public function show()
	{
		if ($this->isGet()) {
			$id = $this->_get('id', 'intval');
			$meihuaUrl = 'http://www.meihua.com';
			$content = file_get_contents($meihuaUrl . '/index.php?m=Wap&c=tmpls&a=index&id=' . $id);
			echo $content;
		}
	}
}

?>
