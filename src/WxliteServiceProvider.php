<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/4
 * Time: 17:14
 */

namespace Vking\WxliteChannel;


use Illuminate\Support\ServiceProvider;

class WxliteServiceProvider extends ServiceProvider
{

    public function register(){
        $this->app->singleton('WxliteChannel',function($app){
            return new WxliteChannel();
        });
    }

}