<?php
require 'config.inc.php';
require 'vendor/autoload.php';

use Qbot\Plugin\Login;
use Qbot\Plugin\Api;

$login = new Login();

// print_r($login->getLoginQRcode());
// $api = new Api();
// $data = array(
//     "toUser" => 689533097,
//     "sendToType" => 2,
//     "sendMsgType" => "TextMsg",
//     "content" => "框架发送消息",
//     "groupid" => 0,
//     "atUser" => 0
// );
// echo $api->LuaApiCaller($funcname, $data);

echo $login->ifLogin();
// echo $login->loginOut();