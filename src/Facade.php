<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/5
 * Time: 16:31
 */

namespace Vking\WxliteChannel;


class Facade extends \Illuminate\Support\Facades\Facade
{

    protected static function getFacadeAccessor()
    {
        return 'WxliteChannel';
    }

}