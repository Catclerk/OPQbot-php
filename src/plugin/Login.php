<?php

namespace Qbot\Plugin;

use Ws\Http\Request;
use Qbot\Plugin\Api;

class Login
{

    /**
     * 获取登录二维码
     *
     * @author Twor
     * @return void
     */
    public function getLoginQRcode()
    {
        $url = HOST . "/v1/Login/GetQRcode";
        $httpRequest = Request::create();
        $response = $httpRequest->get($url);
        return $response->raw_body;
        // return $this->getContentImg($body);
    }

    /**
     * 刷新Key 二次登录
     *
     * @author Twor
     * @return void
     */
    public function refreshKeys()
    {
        $url = HOST . "/v1/RefreshKeys?qq=" . QQ;
        $httpRequest = Request::create();
        $response = $httpRequest->post($url);
        $body = $response->raw_body;
        return $body;
    }

    /**
     * 提取二维码图片
     *
     * @author Twor
     * @param [type] $content
     * @return void
     */
    function getContentImg($content)
    {
        preg_match_all('/src="([^"]+)"/', $content, $images);
        return $images[1][0];
    }


    /**
     * 退出登录
     *
     * @author Twor
     * @param boolean $Flag
     * @return boolean
     */
    public function loginOut($Flag = false)
    {
        $api = new Api();
        $data = array('Flag' => $Flag);
        return $api->LuaApiCaller('LogOut', $data);
    }

    public function ifLogin()
    {
        $api = new Api();
        $userinfo = json_decode($api->clusterInfo(), true);
        if ($userinfo['QQUsers']) {
            return '当前用户已登录';
        } else {
            return '当前用户未登录';
        }
    }
}
