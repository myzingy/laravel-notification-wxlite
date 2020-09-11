# Laravel 微信 小程序 订阅消息 通知系统


## 基本要求：
+ php>=7.0
+ 已集成 overtrue/laravel-wechat 并配置好了小程序信息
+ 已做好队列工作（非强制，做了更好）

## 用法：
#### 1、 composer require vking/laravel-notification-wxlite

#### 2、 php artisan make:notification YouerNotice

#### 3、 编辑 YouerNotice
```
public $data;
public function __construct($data)
{
    //
    $this->data=$data;
}
public function via($notifiable)
{
    return [WxliteChannel::class];
}
#添加 toWechat 函数，名称必须是 toWechat
public function toWechat($notifiable){
    return new WxliteMessage(
    "订阅消息id",
    [
        'name1' => [
            'value' => $name1,
        ],
        'name1' => [
            'value' => $name1,
        ],
    ],
    "小程序的页面地址"
    );
}
``` 
#### 4、 你的用户模型（或wechat表模型）中增加 routeNotificationForWechat
```php
use Notifiable;
public function routeNotificationForWechat(){
   	return $this->openid;
}
```
#### 5、 调用,以wechat模型为例
```php
#case 1，单发
$wechat=wechat::find('openid');
$wechat->notify(new YouerNotice($一些数据));

#case 2，发给多人
$wechats=wechat::where(...)->get()
Notification::send($wechats,new YouerNotice($一些数据));

```
#### 6、 log的打印，wxlite.send 开头的数据 
祝好运



## 感谢
>overtrue/laravel-wechat（这么完美的微信框架，做微信都离不开吧）
>以及各种laravel-notification-channels的代码参考学习
>等等前人
