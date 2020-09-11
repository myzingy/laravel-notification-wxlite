<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/1
 * Time: 18:02
 */

namespace Vking\WxliteChannel;


use Illuminate\Notifications\Notification;

class WxliteChannel
{

    private $wechat;

    public function __construct()
    {
        $this->wechat = app("wechat.official_account");
    }

    /**
     * @param mixed $notifiable
     * @param Notification $notification
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toWechat($notifiable);
        $openid = $notifiable->routeNotificationForWechat();
        $this->wechat->template_message->send([
            'touser' => $openid,
            'template_id' => $message->templateId,
            'url' => $message->url,
            'data' => $message->data,
        ]);
    }

}