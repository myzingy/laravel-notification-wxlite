# Laravel 微信 小程序 订阅消息 通知系统


## 基本要求：
+ php>=7.0
+ 已集成 overtrue/laravel-wechat 并配置好了小程序信息
+ 已做好队列工作（非强制，做了更好）

## 用法：
>composer require vking/laravel-notification-wxlite

然后
>php artisan make:notification OrderCreated

然后
在其中新建方法 
>public function toWechat($notifiable){
>    return (new WxliteMessage(模板id,[
>    "key"=>"value",
>    "key2"=>"value2"
>    ]),跳转地址);
>}

在原有的via()方法中加上
>WechatChannel::class

搞定～
跟其他通知一样使用就好



## 感谢
>overtrue/laravel-wechat（这么完美的微信框架，做微信都离不开吧）
>以及各种laravel-notification-channels的代码参考学习
