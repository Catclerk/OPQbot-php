<?php

namespace Qbot\Plugin;

use Qbot\Tool\Curl;

class Api
{

    /**
     * 发送消息
     *
     * @author Twor
     * @param array $data
     * @return json
     */
    public function LuaApiCaller($funcname, $data)
    {
        $curl = new Curl();
        $url = $curl->url($funcname);
        return $curl->post($url, $data);
    }

    /**
     * 获取当前用户集群信息
     *
     * @author Twor
     * @return json
     */
    public function clusterInfo()
    {
        $curl = new Curl();
        $url = HOST . '/v1/ClusterInfo';
        return $curl->get($url);
    }

    /**
     * 发送QQ空间图文
     *
     * @author Twor
     * @return void
     */
    public function qzoneNewService($qq = QQ)
    {
        $curl = new Curl();
        $url = HOST . '/QzoneNewService/Publish?qq=' . $qq;
        return $curl->get($url);
    }
}
