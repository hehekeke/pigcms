<?php

class chat
{
    public $keyword;
    public $my;

    public function __construct($keyword)
    {
        $this->keyword = $keyword;
        $this->my = C("site_my");
        //jy    如果你们没有key的话 默认就是使用我的
        $this->key = C("jy_tuling_key") ? C("jy_tuling_key") : '69d44ba63ecb29f7863ee6bbf58bfc65';
    }

    public function index()
    {

        $name = $this->keyword;
        $key = $this->key;
        if (!strpos($name, "你是") === false) {
            return "咳咳，我是只能微信机器人";
        }

        if (($name == "你叫什么") || ($name == "你是谁")) {
            return "咳咳，我是聪明与智慧并存的美女,人家刚交男朋友,你不可追我啦";
        }
        else if ($name == "糗事") {
            $name = "笑话";
        }

        //$str = "http://liaotian.404.cn/pgicms_api/api.php?key=free&server_key=" . base64_encode(C("server_key")) . "&server_topdomain=" . C("server_topdomain") . "&appid=0&msg=" . urlencode($name);
        $str = "http://www.tuling123.com/openapi/api?key={$key}&info={$name}";
        $json = Http::fsockopenDownload($str);
        if ($json == false) {
            $json = file_get_contents($str);
        }

        $json = json_decode($json, true);

        //$str = str_replace("菲菲", $this->my, str_replace("提示：", $this->my . "提醒您:", str_replace("{br}", "\n", $json["content"])));
        $str = $json['text'];
        return $str;
        //  可以自己加一些信息....
        //return $str . "\n[我是聊天机器人--" . $this->my . "]";
    }
}


?>
