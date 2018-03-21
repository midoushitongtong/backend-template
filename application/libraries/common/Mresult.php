<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Mresult
 *
 */
class Mresult
{
    /**
     * 响应状态
     *
     * @var int
     */
    public $errCode;

    /**
     * 响应内容
     *
     * @var string
     */
    public $errMsg;

    /**
     * 返回对象json
     *
     * @return string
     */
    public function toJson()
    {
        if (!is_numeric($this->errCode)) {
            $this->errCode = (integer) $this->errCode;
        }
        echo json_encode($this, JSON_UNESCAPED_UNICODE);
        exit;
    }
}