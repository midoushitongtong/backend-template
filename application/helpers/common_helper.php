<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('is_pjax')) {
    /**
     * 判断是否为pjax请求
     *
     * @return boolean
     */
    function is_pjax()
    {
        return array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX'];
    }
}
