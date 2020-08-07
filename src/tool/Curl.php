<?php

namespace Qbot\Tool;

use Ws\Http\Request;
use Ws\Http\Request\Body;

/**
 * curl请求
 *
 * @author Twor
 */
class Curl
{
    public function post($url, $data = '')
    {
        $headers = array(
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36',
            'Content-Type' => 'application/json; charset=utf-8',
        );

        $httpRequest = Request::create();
        $body = Body::json($data);

        $response = $httpRequest->post($url, $headers, $body);
        // $response->code;        // 请求响应码(HTTP Status code)
        // $response->curl_info;   // curl信息(HTTP Curl info)
        // $response->headers;     // 响应头(Headers)
        // $response->body;        // 处理后的响应消息体(Parsed body)
        return $response->raw_body;    // 原始响应消息体(Unparsed body)
    }
    public function get($url)
    {
        $headers = array(
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36'
        );
        $httpRequest = Request::create();
        $response = $httpRequest->post($url, $headers);
        return $response->raw_body;
    }
    public function url($funcname, $host = HOST, $qq = QQ)
    {
        $url = "${host}/v1/LuaApiCaller?qq=${qq}&funcname=${funcname}&timeout=10";
        return $url;
    }
}
