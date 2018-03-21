<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Tool
 *
 */
class Tool
{
    /**
     * httpGet
     *
     * @param  string $url 地址
     * @return string
     */
    public static function httpGet($url)
    {
        if (empty($url)) return false;
        // create curl resource
        $curl = curl_init();
        // set url
        curl_setopt($curl, CURLOPT_URL, $url);
        // 设置获取的信息以文件流的形式返回，而不是直接输 @return string
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        // https request
        if (strlen($url) > 15 && strtolower(substr($url, 0, 5)) == 'https') {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        }
        // 执行会话
        $output = curl_exec($curl);
        // 关闭会话 释放资源句柄
        curl_close($curl);
        // 返回字符串
        return $output;
    }

    /**
     * httpPost
     *
     * @param  string $url 地址
     * @param  array  $param
     * @return string
     */
    public static function httpPost($url = '', $param = array())
    {
        if (empty($url) || empty($param)) return false;
        $data = '';
        foreach ($param as $_key => $_value) {
            $data .= $_key . '=' . $_value . '&';
        }
        $data = rtrim($data, '&');
        // create curl resource
        $curl = curl_init();
        // set url
        curl_setopt($curl, CURLOPT_URL, $url);
        // 设置获取的信息以文件流的形式返回，而不是直接输 @return string
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        // 使用POST协议发送请求
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        // https request
        if (strlen($url) > 5 && strtolower(substr($url, 0, 5)) == 'https') {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        }
        // 执行会话
        $output = curl_exec($curl);
        // 关闭会话 释放资源句柄
        curl_close($curl);
        // 返回字符串
        return $output;
    }
}
