<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;
use NotificationChannels\Fcm\Resources\Notification as ResourceNotification;
use NotificationChannels\Fcm\Resources\WebpushConfig;
use NotificationChannels\Fcm\Resources\WebpushFcmOptions;

class WebPushFCM extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var string
     */
    protected $image;

    /**
     * @var string
     */
    protected $link;

    /**
     * @var array
     */
    protected $data;


    /**
     * Create a new notification instance.
     * @param  string  $title
     * @param  string  $body
     * @param  string  $image
     * @param  string  $link
     * @param  array  $data
     * @return void
     */
    public function __construct(string $title, string $body, string $image, string $link, array $data = [])
    {
        $this->title = $title;
        $this->body = $body;
        $this->image = $image;
        $this->link = $link;
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [FcmChannel::class];
    }

    public function toFcm($notifiable)
    {
        // リソースに関してはドキュメント参照
        // https://firebase.google.com/docs/reference/fcm/rest/v1/projects.messages#webpushconfig
        return FcmMessage::create()
            ->setData($this->data)
            ->setNotification(ResourceNotification::create()
                ->setTitle($this->title)
                ->setBody($this->body)
                ->setImage($this->image))
            ->setWebpush(WebpushConfig::create()
                ->setFcmOptions(WebpushFcmOptions::create()
                    ->setLink($this->link)
                )
            );
    }
}
