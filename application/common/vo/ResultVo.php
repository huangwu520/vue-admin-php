<?php

namespace app\common\vo;

class ResultVo
{

    /**
     * 错误码
     * @var
     */
    public $code;

    /**
     * 错误信息
     * @var
     */
    public $message;

    private function __construct($code, $message)
    {
        $this->code = $code;
        $this->message = $message;
    }

    /**
     * 请求成功的方法
     * @param $data
     * @return \think\response\Json
     */
    public static function success($data)
    {
        return json($data);
    }

    /**
     * 请求错误
     * @param $code
     * @param null $message
     * @return \think\response\Json
     */
    public static function error($code, $message = null)
    {
        if (is_array($code)) {
            $message = isset($code['message']) && $message == null ? $code['message'] : $message;
            $code = isset($code['code']) ? $code['code'] : null;
        }
        $instance = new self($code, $message);
        return json($instance);
    }

}