<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/1
 * Time: 18:02
 */

namespace Vking\WxliteChannel;


use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class WxliteChannel
{

    private $miniProgram;

    public function __construct()
    {
        $this->miniProgram = \EasyWeChat::miniProgram();
    }

    /**
     * @param mixed $notifiable
     * @param Notification $notification
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toWechat($notifiable);
        $openid = $notifiable->routeNotificationForWechat();
        $params=[
            'touser' => $openid,
            'template_id' => $message->templateId,
            'url' => $message->url,
            'data' => $message->data,
        ];
        Log:info('wxlite.send',$params);
        $this->miniProgram->subscribe_message->send($params);
    }

}