<?php

class LevelAction extends AgentAction
{
	public $where;

	public function _initialize()
	{
		parent::_initialize();

		if (LEVEL_ID != 0) {
			$this->error("没有权限");
		}

		$this->where = array("level" => $this->agentid);
	}

	public function index()
	{
		$count = $this->agent_db->where($this->where)->count();
		$page = new Page($count, 20);
		$info = $this->agent_db->order("id DESC")->where($this->where)->limit($page->firstRow . "," . $page->listRows)->select();
		$i = 0;

		if ($info) {
			foreach ($info as $item ) {
				$info[$i]["usercount"] = M("Users")->where(array("agentid" => intval($item["id"])))->count();
				$info[$i]["wxusercount"] = M("Wxuser")->where(array("agentid" => intval($item["id"])))->count();
				$i++;
			}
		}

		$this->assign("info", $info);
		$this->assign("page", $page->show());
		$this->display();
	}

	public function add()
	{
		if (isset($_GET["id"])) {
			$thisAgent = $this->agent_db->where(array("id" => intval($_GET["id"])))->find();
		}

		if (isset($_POST["dosubmit"])) {
			if (strlen($_POST["password"])) {
				$password = trim($_POST["password"]);
				$salt = rand(111111, 999999);
				$_POST["salt"] = $salt;
				$password = md5(md5($password) . $salt);
				$_POST["password"] = $password;
			}
			else if ($thisAgent) {
				unset($_POST["password"]);
			}
			else {
				$this->error("请设置密码!");
			}

			if (!$thisAgent) {
				$_POST["time"] = time();
			}

			$_POST["endtime"] = strtotime($_POST["endtime"]);
			$_POST["level"] = $this->agentid;

			if ($this->agent_db->create()) {
				if ($thisAgent) {
					$this->agent_db->where(array("id" => $thisAgent["id"], "level" => $this->agentid))->save($_POST);
					$this->success("修改成功！", U("Agent/Level/index"));
				}
				else {
					$agentid = $this->agent_db->add();

					if ($agentid) {
						$this->success("添加成功！", U("Agent/Level/index"));
					}
					else {
						$this->error("添加失败!");
					}
				}
			}
			else {
				$this->error($this->agent_db->getError());
			}
		}
		else {
			if (!$thisAgent) {
				$thisAgent["endtime"] = time() + (365 * 24 * 3600);
			}

			$this->assign("info", $thisAgent);
			$this->display();
		}
	}

	public function del()
	{
		$id = $this->_get("id", "intval");
		$this->where["id"] = $id;

		if ($this->agent_db->where($this->where)->delete()) {
			$this->success("操作成功", $_SERVER["HTTP_REFERER"]);
		}
		else {
			$this->error("操作失败", U(MODULE_NAME . "/index"));
		}
	}

	private function getLevelAuth()
	{
		if (!$_SESSION["LevelAuth"]) {
			session("LevelAuth", 1);
		}
	}

	public function users()
	{
		$this->getLevelAuth();
		$_SESSION[C("USER_AUTH_KEY")] = "admin";
		redirect(U("System/Users/index", array("agentid" => intval($_GET["id"]))));
	}

	public function token()
	{
		$this->getLevelAuth();
		$_SESSION[C("USER_AUTH_KEY")] = "admin";
		redirect(U("System/Token/index", array("agentid" => intval($_GET["id"]))));
	}
}


?>
