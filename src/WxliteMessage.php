<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/4
 * Time: 17:22
 */

namespace Vking\WxliteChannel;


use Reprover\WechatChannel\Exceptions\InvalidArgumentException;

class WxliteMessage
{
    private $url;
    private $templateId;
    private $data;

    public function __construct($templateId = null, $data = null, $url = null)
    {
        try {
            throw_unless(!is_null($data) || !is_array($data), InvalidArgumentException::class, "The Data Must Be an array");
        } catch (\Throwable $e) {
        }
        $this->data = $data;
        $this->url = $url;
        $this->templateId = $templateId;
    }

    public function __set($name, $value)
    {
        if (isset($this->$name))
            $this->$name = $value;
        else
            throw new InvalidArgumentException("No Such Variable As [$name]");
    }

    public function __get($name)
    {
        if (isset($this->$name))
            return $this->$name;
        else
            throw new InvalidArgumentException("No Such Variable As [$name]");
    }


}